<?php

/**
 * The way to run this is:
 * php updateCSV.php 2> convert.log
 * You'll need to change the include file to find the right config file
 * as well as the path to I2CE which may not work right using the one
 * from the config file.
 * The ID for the User object should be valid in your user table.
 * Am only trying to update the  registration date, license Start and End dates
 */

global $dictionary;
$dictionary = array();

define( 'iHRIS_DEFAULT_COUNTRY', 'Uganda' );
define( 'iHRIS_PERSON_ID', 0 );
define( 'iHRIS_LICENSE_NUMBER', 3 );

for ($i = 4; $i <= 25; $i++) {
   
   define( "iHRIS_LICENSE_START_DATE". $i , $i++ ); 
   define( "iHRIS_LICENSE_END_DATE". $i , $i );
  
}

$i2ce_site_user_access_init = null;
$script = array_shift( $argv );
if (file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages/local' . DIRECTORY_SEPARATOR . 'config.values.php')) {
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages/local' . DIRECTORY_SEPARATOR . 'config.values.php');
} else {
	require_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages/config.values.php');
}

$i2ce_site_i2ce_path = "/var/lib/iHRIS/4.0.23/I2CE";

require_once ($i2ce_site_i2ce_path . DIRECTORY_SEPARATOR . 'I2CE_config.inc.php');

@I2CE::initializeDSN($i2ce_site_dsn,   $i2ce_site_user_access_init,    $i2ce_site_module_config);

unset($i2ce_site_user_access_init);
unset($i2ce_site_dsn);
unset($i2ce_site_i2ce_path);
unset($i2ce_site_module_config);


global $user;

$user = new I2CE_User(1, false, false, false);
$db = MDB2::singleton();
if ( PEAR::isError( $db ) ) {
	die( $db->getMessage() );
}
$form_factory = I2CE_FormFactory::instance();

echo "Memory Limit: " . ini_get( "memory_limit" ) . "\n";
echo "Execution Time: " . ini_get( "max_execution_time" ) . "\n";

function dotrim(&$value){
  $value = trim($value);
}

$fh = fopen( $argv[0], "r" );
if ( $fh === false ) {
    die( "Couldn't update file: $argv[0].  Syntax: importCSV.php [erase] file.csv\n" );
}

function find_or_create( $value, $form, $fields=false, $do_create=false, $validate=false ) {
    global $user, $cache, $dictionary;
    if ( $value == "" ) return "";
    if ( array_key_exists( $form, $dictionary ) && array_key_exists( $value, $dictionary[$form] ) ) {
        $value = $dictionary[$form][$value];
    }
    if ( !array_key_exists( $form, $cache ) ) {
        $cache[$form] = array();
    }
    
    $is_valid = true;
    if ( !array_key_exists( $value, $cache[$form] ) ) {
        if ( $do_create ) {
            $obj = I2CE_FormFactory::instance()->createContainer( $form );
            if ( !$fields ) {
                $fields = array( 'name' => $value );
            } 
            foreach( $fields as $key => $val ) {
                $obj->getField($key)->setFromDB($val);
            }
            $obj->save( $user );
            echo "Creating new form ($form) " . $obj->getId() . " ";
            print_r( $fields );
            $cache[$form][$value] = $obj->getId();
            $obj->cleanup();
            unset( $obj );
        } else {
            if ( $validate ) {
                $is_valid = false;
            } else {
                die( "Invalid value for form: $form, value: $value.  Can't continue." );
            }
        }
    }
    if ( $validate ) {
        return $is_valid;
    } else {
        return $form . '|' . $cache[$form][$value];
    }
}

function arrange_date( $date ) {
    list( $day, $month, $year ) = explode( '/', $date );
    return sprintf( "%04d-%02d-%02d", $year, $month, $day );
}
function validate_date( $date ) {
    $date_arr = explode( '/', $date, 3 );
    if ( count($date_arr) == 3 ) {
        return checkdate( (int)$date_arr[1], (int)$date_arr[0], (int)$date_arr[2] );
    } else {
        return false;
    }
}
function arrange_date3( $day, $month, $year ) {
    if ( $year <= 20 ) $year += 2000;
    elseif ( $year <= 99 ) $year += 1900;
    return sprintf( "%04d-%02d-%02d", $year, $month, $day );
}


$cache = array();

$row = 0;
$errors = 0;
while ( ( $data = fgetcsv( $fh ) ) !== false ) {

    array_walk( $data, "dotrim" );
    $row++;
    
for ($i = 4; $i <= 25; $i++) {  
    
        if ( $data[constant("iHRIS_LICENSE_START_DATE". $i)] && !validate_date( $data[constant("iHRIS_LICENSE_START_DATE". $i)] ) ) {
                echo "Row $row: License Start Date is invalid: '" . $data[constant("iHRIS_LICENSE_START_DATE". $i)] . "'\n";
                $errors++;
            }
            
        $i++;
            
        if ( $data[constant("iHRIS_LICENSE_END_DATE". $i)] && !validate_date( $data[constant("iHRIS_LICENSE_END_DATE". $i)] ) ) {
            echo "Row $row: License End Date is invalid: '" . $data[constant("iHRIS_LICENSE_END_DATE". $i)] . "'\n";
            $errors++;
        }        
    }
 }   
fclose($fh);

if ( $errors > 0 ) {
    die( "There were errors in the import file.  Please add additional entries to the data dictionary or correct the data!" );
}

$fh = fopen( $argv[0], "r" );
if ( $fh === false ) {
    die( "Couldn't update file: $argv[0].  Syntax: updateCSV.php file.csv\n" );
}

$row = 0;
$skip_no_reg = 0;
while ( ( $data = fgetcsv( $fh ) ) !== false ) {

    array_walk( $data, "dotrim" );
	$row++ ;
	
	if( $data[iHRIS_PERSON_ID] == "" ) {
        echo "Couldn't do anything for " . $data[iHRIS_PERSON_ID] 
            . " because no person ID!\n";
        $skip_no_reg ++;
        continue;
    }
	
	if ( $data[iHRIS_PERSON_ID] != "" ) {
		$person = $form_factory->createContainer( $data[iHRIS_PERSON_ID] );
		$person->populate();
		$person->save($user);
		
		
	}
	//Creating/issuing a license to a person who didn't have one previously
	
	for ($i = 4; $i <= 25; $i++) {
	
	    if($data[constant("iHRIS_LICENSE_START_DATE". $i)] != ""){
	    
		$license = $form_factory->createContainer( "person_license" );
		$license->setParent( $person->getNameId() );
			if ( $data[iHRIS_LICENSE_NUMBER] ) {
				$license->license_number = $data[iHRIS_LICENSE_NUMBER];
			}
			if ( $data[constant("iHRIS_LICENSE_START_DATE". $i)] ) {
				$license->getField('start_date')->setFromDB( arrange_date( 
							$data[constant("iHRIS_LICENSE_START_DATE". $i)] ) );
			}
			$i++;
			
			if ( $data[constant("iHRIS_LICENSE_END_DATE". $i)] ) {
				$license->getField('end_date')->setFromDB( arrange_date( 
							$data[constant("iHRIS_LICENSE_END_DATE". $i)] ) );
			}
		
		$license->save( $user );
		
		$license->cleanup();
		unset( $license );
		} else{ 
		
		    $i++; 
		}
	
	 }  
	    //echo "Row $row: Added '" . $license->getId() . "'\n";
   		echo "Row $row: Updated Person ID " . $person->getId() . "\n";
	$person->cleanup();
	unset( $person );
}
fclose($fh);
echo "DONE \n";

?>
