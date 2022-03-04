<?php

/**
 * The best way to run this is:
 * php importCSV.php 2> convert.log
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

define( 'iHRIS_NAME', 0 );
//define( 'iHRIS_HOME_DISTRICT', 1 );
define( 'iHRIS_RESIDENCE_DISTRICT', 1 );
define( 'iHRIS_NATIONALITY', 2 );
define( 'iHRIS_MARITAL_STATUS', 3 );
define( 'iHRIS_GENDER', 4 );
define( 'iHRIS_DATE_OF_BIRTH', 5 );
define( 'iHRIS_TRAINING_PROGRAM', 6 );
define( 'iHRIS_GRADUATION_DATE', 9 );
define( 'iHRIS_CADRE', 10 );
//define( 'iHRIS_INTAKE_DATE', 9 );
define( 'iHRIS_REGISTRATION_NUM', 11 );
define( 'iHRIS_REGISTRATION_DATE', 12 );
define( 'iHRIS_REGISTRATION_TYPE', 13 );
define( 'iHRIS_LICENSE_START_DATE', 14 );
define( 'iHRIS_LICENSE_END_DATE', 15 );
define( 'iHRIS_LIC_RECIEPT_NO', 16 );
define( 'iHRIS_LIC_SERIAL_NO', 17 );
define( 'iHRIS_ADDRESS', 18 );
define( 'iHRIS_PHONE', 19 );
define( 'iHRIS_EMAIL', 20 );
define( 'iHRIS_HEALTH_FACILITY' , 21 );
//define( 'iHRIS_POST' , 20 );
define( 'iHRIS_COG_COUNTRY' , 23 );
define( 'iHRIS_COG_PURPOSE' , 24 );
define( 'iHRIS_COG_START_DATE' , 25 );
define( 'iHRIS_COG_END_DATE' , 26 );
define( 'iHRIS_COG_SERIAL_NO' , 27 );
define( 'iHRIS_COG_RECEIPT_NO' , 28 );

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

if ( $argv[0] == "erase" ) {
    echo "Erasing all records and entries...";
    $db->query( "TRUNCATE TABLE record" );
    $db->query( "TRUNCATE TABLE entry" );
    $db->query( "TRUNCATE TABLE last_entry" );
    echo "Done\n";
    $tmp = array_shift( $argv );
}

function dotrim(&$value){
  $value = trim($value);
}

$fh = fopen( $argv[0], "r" );
if ( $fh === false ) {
    die( "Couldn't update file: $argv[0].  Syntax: importCSV.php [erase] file.csv\n" );
}

function find_district( $value ) {
    global $cache;
    if ( array_key_exists( 'district', $cache ) ) {
        foreach( $cache['district'] as $district => $id ) {
            if ( substr( $district, 0, strlen( $value )+1 ) == strtoupper( $value ) . ',' ) {
                return "district|$id";
            }
        }
    }
    return "";
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
    if ( $month > 12 ){
        return sprintf( "%04d-%02d-%02d", $year, $day, $month );
    }else{
        return sprintf( "%04d-%02d-%02d", $year, $month, $day );
    }
}
function validate_date( $date ) {
    $date_arr = explode( '/', $date, 3 );
    if ( count($date_arr) == 3 ) {
        if ( $date_arr[1] > 12 ) {
            return checkdate( (int)$date_arr[0], (int)$date_arr[1], (int)$date_arr[2] );
        }else {
            return checkdate( (int)$date_arr[1], (int)$date_arr[0], (int)$date_arr[2] );
        }
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
$cache['training_program'] = array_flip( I2CE_List::listOptions( "training_program" ) );
$cache['gender'] = array_flip( I2CE_List::listOptions( "gender" ) );
$cache['registration_type'] = array_flip( I2CE_List::listOptions( "registration_type" ) );
$cache['health_facility'] = array_flip( I2CE_List::listOptions( "health_facility" ) );
$cache['cadre'] = array_flip( I2CE_List::listOptions( "cadre" ) );
$cache['country'] = array_flip( I2CE_List::listOptions( "country" ) );
$cache['marital_status'] = array_flip( I2CE_List::listOptions( "marital_status" ) );
$cache['training_institution'] = array_flip( I2CE_List::listOptions( "training_institution" ) );
$cache['district'] = array_flip( I2CE_List::listOptions( "district" ) );
//$cache['qualification'] = array_flip( I2CE_List::listOptions( "qualification" ) );
//$cache['academic_level'] = array_flip( I2CE_List::listOptions( "academic_level" ) );
//$cache['institution'] = array_flip( I2CE_List::listOptions( "institution" ) );
//$cache['training_institution'] = array_flip( I2CE_List::listOptions( "training_institution" ) );
//print_r ($cache['country']);
//exit;
$row = 0;
$errors = 0;
while ( ( $data = fgetcsv( $fh ) ) !== false ) {

    array_walk( $data, "dotrim" );
    $row++;

    /*
    if ( !find_or_create( $data[iHRIS_HEALTH_FACILITY], "health_facility", false, false, true ) ) {
        echo "Row $row: Facility is invalid: '" . $data[iHRIS_HEALTH_FACILITY] . "'\n";
        $errors++;
    }
    */
    if ( $data[iHRIS_CADRE] && !find_or_create( $data[iHRIS_CADRE], "cadre", false, false, true ) ) {
        echo "Row $row: Cadre is invalid: '" . $data[iHRIS_CADRE] . "'\n";
        $errors++;
    }
   
    if ( $data[iHRIS_TRAINING_PROGRAM] && !find_or_create( $data[iHRIS_TRAINING_PROGRAM], "training_program" , false, false, true ) ) {
        echo "Row $row: Training Program is invalid: '" . $data[iHRIS_TRAINING_PROGRAM] . "'\n";
        $errors++;
    }
    /*
    if ( $data[iHRIS_GENDER] && !find_or_create( $data[iHRIS_GENDER], "gender", false, false, true ) ) {
        echo "Row $row: Gender is invalid: '" . $data[iHRIS_GENDER] . "'\n";
        $errors++;
    }
    if ( $data[iHRIS_MARITAL_STATUS] && ! find_or_create( $data[iHRIS_MARITAL_STATUS], "marital_status" , false, false, true ) ) {
        echo "Row $row: Marital Status is invalid: '" . $data[iHRIS_MARITAL_STATUS] . "'\n";
        $errors++;
    }
    */
    if ( $data[iHRIS_DATE_OF_BIRTH] && !validate_date( $data[iHRIS_DATE_OF_BIRTH] ) ) {
        echo "Row $row: Date of bith is invalid: '" . $data[iHRIS_DATE_OF_BIRTH] . "'\n";
        $errors++;
    }
    
    if ( $data[iHRIS_REGISTRATION_DATE] && !validate_date( $data[iHRIS_REGISTRATION_DATE] ) ) {
        echo "Row $row: Registration Date is invalid: '" . $data[iHRIS_REGISTRATION_DATE] . "'\n";
        $errors++;
    }
	if ( $data[iHRIS_LICENSE_START_DATE] && !validate_date( $data[iHRIS_LICENSE_START_DATE] ) ) {
        echo "Row $row: License Start Date is invalid: '" . $data[iHRIS_LICENSE_START_DATE] . "'\n";
        $errors++;
    }
    if ( $data[iHRIS_LICENSE_END_DATE] && !validate_date( $data[iHRIS_LICENSE_END_DATE] ) ) {
        echo "Row $row: License End Date is invalid: '" . $data[iHRIS_LICENSE_END_DATE] . "'\n";
        $errors++;
    }
    /*
	if ( $data[iHRIS_INTAKE_DATE] && !validate_date( $data[iHRIS_LICENSE_END_DATE] ) ) {
        echo "Row $row: License End Date is invalid: '" . $data[iHRIS_LICENSE_END_DATE] . "'\n";
        $errors++;
    }
	if ( $data[iHRIS_GRADUATION_DATE] && !validate_date( $data[iHRIS_LICENSE_END_DATE] ) ) {
        echo "Row $row: License End Date is invalid: '" . $data[iHRIS_LICENSE_END_DATE] . "'\n";
        $errors++;
    }
    */

}
fclose($fh);

if ( $errors > 0 ) {
    die( "There were errors in the import file.  Please add additional entries to the data dictionary or correct the data!" );
}

$fh = fopen( $argv[0], "r" );
if ( $fh === false ) {
    die( "Couldn't update file: $argv[0].  Syntax: importCSV.php [erase] file.csv\n" );
}

$row = 0;
$skip_no_post = 0;
while ( ( $data = fgetcsv( $fh ) ) !== false ) {

    array_walk( $data, "dotrim" );
    $row++;
    if( $data[iHRIS_NAME] == "" ) {
        echo "Couldn't do anything for " . $data[iHRIS_NAME] 
            . " because no designation!\n";
        $skip_no_post++;
        continue;
    }
    /* 
     * Create the person form and save it.
     */
    $person = $form_factory->createContainer( "person" );

    $names = explode( ' ', $data[iHRIS_NAME], 3 );

    if (count($names) == 3 ) { 
        $person->firstname = $names[1];
        $person->surname = $names[0];
        $person->othername = $names[2];
    } elseif (count($names) == 2 ) { 
        $person->surname = $names[0];
        $person->firstname = $names[1];
    }else {
        $person->surname = $names[0];
    }

    if( $data[iHRIS_NATIONALITY] == "" ) {
        $data[iHRIS_NATIONALITY] = iHRIS_DEFAULT_COUNTRY;
    }
    $nationality_id = find_or_create( $data[iHRIS_NATIONALITY], "country" );

	$person->getField('nationality')->setFromDB($nationality_id);

	//$residence_district_id = find_or_create( $data[iHRIS_RESIDENCE_DISTRICT], "district" );
	//$home_district_id = find_or_create( $data[iHRIS_HOME_DISTRICT], "district" );
	$residence_district_id = find_district( $data[iHRIS_RESIDENCE_DISTRICT] );
	$home_district_id = find_district( $data[iHRIS_HOME_DISTRICT] );
	$person->getField('residence')->setFromDB($residence_district_id);
	$person->getField('home')->setFromDB($home_district_id);
    
	$person->surname_ignore = true;
    $person->save( $user );
    echo "Row $row; created " . $person->getId() . "\n";
    
    /*
     * Create the demographic form and save it.
     */
    $demographic = $form_factory->createContainer( "demographic" );
    $demographic->setParent( $person->getNameId() );

    if ( $data[iHRIS_DATE_OF_BIRTH] ) {
        $demographic->getField('birth_date')->setFromDB( arrange_date( 
                    $data[iHRIS_DATE_OF_BIRTH] ) );
    }
    if ( $data[iHRIS_GENDER] ) {
        $gender_id = find_or_create( $data[iHRIS_GENDER], "gender" );
        $demographic->getField('gender')->setFromDB( $gender_id );
    }
    if ( $data[iHRIS_MARITAL_STATUS] ) {
        $marital_status_id = find_or_create( $data[iHRIS_MARITAL_STATUS], "marital_status", false, true );
        $demographic->getField('marital_status')->setFromDB( $marital_status_id );
    }
	//$birth_district_id = find_or_create( $data[iHRIS_BIRTH_DISTRICT], "district" );
    //$demographic->getField('birth_location')->setFromDB($birth_district_id);
    $demographic->save( $user );
    $demographic->cleanup();
    unset( $demographic );
	
	//importing contact information
	if($data[iHRIS_ADDRESS] != "" || $data[iHRIS_PHONE] != "" )
		{
			$contact = $form_factory->createContainer("person_contact_personal");
			$contact->setParent( $person->getNameId() );
			$contact->address = ($data[iHRIS_ADDRESS] );
			$contact->telephone = ($data[iHRIS_PHONE] );
			$contact->save( $user );
			$contact->cleanup();
			unset( $contact );
		}
	// Training	
	if($data[iHRIS_CADRE] != "" && $data[iHRIS_TRAINING_PROGRAM] != "" )
	{
		$training_program_id = find_or_create( $data[iHRIS_TRAINING_PROGRAM], "training_program" );
		$training = $form_factory->createContainer("training");
		$training->setParent( $person->getNameId() );
		$training->index_num = ($data[iHRIS_REGISTRATION_NUM]);
		
		if ($data[iHRIS_INTAKE_DATE] !="" ) { {
		    $training->getField('intake_date')->setFromDB( arrange_date( 
							$data[iHRIS_INTAKE_DATE] ) );
        }
		
        if ( $data[iHRIS_GRADUATION_DATE] !="")
		    $training->getField('graduation')->setFromDB( arrange_date( 
							$data[iHRIS_GRADUATION_DATE] ) );
		}
		

		$training->getField('training_program')->setFromDB( $training_program_id );


		$training->save( $user );
		//Registration
		if ( $data[iHRIS_REGISTRATION_NUM] != "" ) {
		
		    $registration_type_id = find_or_create( $data[iHRIS_REGISTRATION_TYPE], "registration_type" );
		    //echo $registration_type_id;
		    //exit;
			$registration = $form_factory->createContainer("registration");
			$registration->setParent( $training->getNameId() );
				if ( $data[iHRIS_REGISTRATION_NUM] ) {
					$registration->registration_number = $data[iHRIS_REGISTRATION_NUM];
				}
				if ( $data[iHRIS_REGISTRATION_DATE] ) {
					$registration->getField('registration_date')->setFromDB( arrange_date( 
								$data[iHRIS_REGISTRATION_DATE] ) );
				}
				if ( $data[iHRIS_CADRE] ) {
				    $cadre_id = find_or_create( $data[iHRIS_CADRE], "cadre" );
					$registration->getField('cadre')->setFromDB( $cadre_id );
				}
				
		    $registration->getField('practice_type')->setFromDB( $registration_type_id );		
			$registration->save( $user );
			
			echo "Row $row: Updated '" . $registration->getId() . "'\n";
			
			$registration->cleanup();
			unset( $registration );
		}	
		$training->cleanup();
		unset( $training );
	}
	//License
	if ( $data[iHRIS_LICENSE_START_DATE] != "" ) {
	
		$license = $form_factory->createContainer("person_license");
		$license->setParent( $person->getNameId() );
			if ( $data[iHRIS_REGISTRATION_NUM] ) {
				$license->license_number = $data[iHRIS_REGISTRATION_NUM];
			}
			if ( $data[iHRIS_LICENSE_START_DATE] ) {
				$license->getField('start_date')->setFromDB( arrange_date( 
							$data[iHRIS_LICENSE_START_DATE] ) );
			}
			if ( $data[iHRIS_LICENSE_END_DATE] ) {
				$license->getField('end_date')->setFromDB( arrange_date( 
							$data[iHRIS_LICENSE_END_DATE] ) );
			}
		$license->reciept_number = ($data[iHRIS_LIC_RECIEPT_NO] ) ;
        $license->serial_number = ($data[iHRIS_LIC_SERIAL_NO] ) ;
		$license->save( $user );
		
		echo "Row $row: Updated '" . $license->getId() . "'\n";
		
		$license->cleanup();
		unset( $license );
		}
	//importing Deployment information
    
	if($data[iHRIS_POST] != "" ){
	$facility_id = find_or_create( $data[iHRIS_HEALTH_FACILITY], "health_facility", false, true );
		
			$deployment = $form_factory->createContainer("deployment");
			$deployment->setParent( $person->getNameId() );
			$deployment->getField('health_facility')->setFromDB( $facility_id);
			$deployment->job_title = ($data[iHRIS_POST] );
			$deployment->save( $user );
			$deployment->cleanup();
			unset( $deployment );
		}
        
	 //Qualification for this person.
   /* if ( $data[iHRIS_QUALIFICATION] != "" || $data[iHRIS_ACADEMIC_LEVEL] != "" || $data[iHRIS_INSTITUTION] != "" ) {
        $qualification_id = find_or_create( $data[iHRIS_QUALIFICATION], "qualification" );
        $academic_level_id = find_or_create( $data[iHRIS_ACADEMIC_LEVEL], "academic_level" );
        
        $education = $form_factory->createContainer( "education");
        $education->setParent( $person->getNameId());
        $education->institution = ($data[iHRIS_INSTITUTION] ) ;
        $education->getField("qualification")->setFromDB( $qualification_id );
        $education->getField("academic_level")->setFromDB( $academic_level_id );
        $education->save($user);        
        $education->cleanup();
        
    } */
      if ( $data[iHRIS_COG_COUNTRY] != "" ) {
        $country_id = find_or_create( $data[iHRIS_COG_COUNTRY], "country" );
        
        $outmigration = $form_factory->createContainer( "out_migration");
        $outmigration->setParent( $person->getNameId());
        $outmigration->purpose = ($data[iHRIS_PURPOSE] ) ;
        $outmigration->reciept_number = ($data[iHRIS_COG_RECIEPT_NO] ) ;
        $outmigration->serial_number = ($data[iHRIS_COG_SERIAL_NO] ) ;
        $outmigration->getField("country")->setFromDB( $country_id );
        if ( $data[iHRIS_COG_START_DATE] ) {
				$outmigration->getField('request_date')->setFromDB( arrange_date( 
							$data[iHRIS_COG_START_DATE] ) );
							}
		if ( $data[iHRIS_COG_END_DATE] ) {
				$outmigration->getField('expiry_date')->setFromDB( arrange_date( 
							$data[iHRIS_COG_END_DATE] ) );
        $outmigration->save($user);        
        $outmigration->cleanup();
        
        }
	$person->cleanup();
    unset( $person );
    }//While_loop closing  bracket
 }
 ?>
