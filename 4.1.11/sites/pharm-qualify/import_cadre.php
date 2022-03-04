<?php

/**
 * The best way to run this is:
 * php import_qualification_ug.php 2> convert.log
 * There's lots of notice messages you probably want to ignore for the most
 * part.
 * You'll need to change the include file to find the right config file
 * as well as the path to I2CE which may not work right using the one
 * from the config file.
 * The ID for the User object should be valid in your user table.
 * The $forms array is an associative array with the value being
 * an array of forms that are required for the given form to work e.g. 
 * region needs country first since it uses country as a map for a field.
 *
 * 
 *
 */
 global $dictionary;
$dictionary = array();
 
 
define( 'iHRIS_DEFAULT_COUNTRY', 'Uganda' );

define( 'iHRIS_QUALIFICATION', 0 );
define( 'iHRIS_CADRE', 1 );



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
    die( "Couldn't update file: $argv[0].  Syntax: import_qualification_ug.php file.csv\n" );
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

	


$cache = array();
$cache['qualification'] = array_flip( I2CE_List::listOptions( "qualification" ) );
$cache['cadre'] = array_flip( I2CE_List::listOptions( "cadre" ) );


$row = 0;
$errors = 0;
while ( ( $data = fgetcsv( $fh ) ) !== false ) {

    array_walk( $data, "dotrim" );
    $row++;

    if ( !find_or_create( $data[iHRIS_QUALIFICATION], "qualification", false, false, true ) ) {
        echo "Row $row: qualification is invalid: '" . $data[iHRIS_QUALIFICATION] . "'\n";
        $errors++;
    }

}
fclose($fh);

if ( $errors > 0 ) {
    die( "There were errors in the import file.  Please add additional entries to the data dictionary or correct the data!" );
}
$fh = fopen( $argv[0], "r" );
if ( $fh === false ) {
    die( "Couldn't update file: $argv[0].  Syntax: importCSV.php [erase] file.csv\n" );
}


$Skip_no_cadre = 0;
$no_cadre = 0;
while ( ( $data = fgetcsv( $fh ) ) !== false ) {

    array_walk( $data, "dotrim" );
	    // Creating New Cadre

		if( $data[iHRIS_QUALIFICATION] != "" ) 
		{
		    if ( !array_key_exists( $data[iHRIS_CADRE] , $cache['cadre'] ) )
		     {
			    $qualification_id = find_or_create( $data[iHRIS_QUALIFICATION], "qualification" );

                $cadre_id = find_or_create( $data[iHRIS_CADRE], "cadre",
                        array( "name" => $data[iHRIS_CADRE],
                            "qualification" => $qualification_id ),
                        true );
			
		    } else{
			     echo "\n cadre " . $data[iHRIS_CADRE] . " is already in the system \n";
		    }
		} else 
		{
		   $Skip_no_cadre++;
		}
	}
fclose($fh);
echo "\n Created $no_cadre cadre  \n Skipped $Skip_no_cadre because of no cadre Title.\n";

?>
