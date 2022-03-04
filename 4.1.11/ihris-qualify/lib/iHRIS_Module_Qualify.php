<?php
/**
* © Copyright 2007 IntraHealth International, Inc.
* 
* This File is part of I2CE 
* 
* I2CE is free software; you can redistribute it and/or modify 
* it under the terms of the GNU General Public License as published by 
* the Free Software Foundation; either version 3 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful, 
* but WITHOUT ANY WARRANTY; without even the implied warranty of 
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License 
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
/**
*  iHRIS_Module_Qualify
* @package I2CE
* @subpackage Core
* @author Carl Leitner <litlfred@ibiblio.org>
* @copyright Copyright &copy; 2007 IntraHealth International, Inc. 
* This file is part of I2CE. I2CE is free software; you can redistribute it and/or modify it under 
* the terms of the GNU General Public License as published by the Free Software Foundation; either 
* version 3 of the License, or (at your option) any later version. I2CE is distributed in the hope 
* that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY 
* or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have 
* received a copy of the GNU General Public License along with this program. If not, see <http://www.gnu.org/licenses/>.
* @version 2.1
* @access public
*/


class iHRIS_Module_Qualify extends I2CE_Module {


    /**
     * Return any fuzzy methds that this module implements
     * @return array
     */
    public static function getMethods() {
        return array(
                'iHRIS_PageView->action_record_verify' => 'action_record_verify',
                'iHRIS_PageView->action_education' => 'action_education',
                'iHRIS_PageView->action_out_migration' => 'action_out_migration',
                'iHRIS_PageView->action_deployment' => 'action_deployment',
                'iHRIS_PageView->action_training' => 'action_training',
                );
    }

    /**
     * Return the array of hooks available in this module.
     * @return array
     */
    public static function getHooks() {
        return array(
                'validate_form_license' => 'validate_form_license',
                'validate_form_training_disrupt' => 'validate_form_training_disrupt',
                'validate_form_registration' => 'validate_form_registration',
                'validate_form_exam' => 'validate_form_exam',
                'validate_form_training' => 'validate_form_training',
                'validate_form_private_practice' => 'validate_form_private_practice',
                'validate_form_disciplinary_action' => 'validate_form_disciplinary_action',
                );
    }

    /**
     * Handle adding the record verify form to the person page view page.
     * @param iHRIS_PageView $page
     * @return boolean
     */
    public function action_record_verify( $page ) {
        if ( !$page instanceof iHRIS_PageView ) {
            return false;
        }
        return $page->addLastChildForm( 'record_verify', 'verify_date' );
    }

    /**
     * Handle adding the education form to the person page view page.
     * @param iHRIS_PageView $page
     * @return boolean
     */
    public function action_education( $page ) {
        if ( !$page instanceof iHRIS_PageView ) {
            return false;
        }
        return $page->addChildForms( 'education', 'siteContent' );
    }

    /**
     * Handle adding the out_migration form to the person page view page.
     * @param iHRIS_PageView $page
     * @return boolean
     */
    public function action_out_migration( $page ) {
        if ( !$page instanceof iHRIS_PageView ) {
            return false;
        }
        return $page->addChildForms( 'out_migration' );
    }

    /**
     * Handle adding the deployment form to the person page view page.
     * @param iHRIS_PageView $page
     * @return boolean
     */
    public function action_deployment( $page ) {
        if ( !$page instanceof iHRIS_PageView ) {
            return false;
        }
        return $page->addChildForms( 'deployment' );
    }

    /**
     * Handle adding the training form to the person page view page.
     * @param iHRIS_PageView $page
     * @return boolean
     */
    public function action_training( $page ) {
        if ( !$page instanceof iHRIS_PageView ) {
            return false;
        }
        $page->getPerson()->populateChildren( array("training"), array( "training" => "intake_date" ) );
        if ( !array_key_exists( "training", $page->getPerson()->children ) 
                || !is_array( $page->getPerson()->children["training"]) ) {
            return true;
        }
        $factory = I2CE_FormFactory::instance();
        foreach( $page->getPerson()->children["training"] as $obj ) {
            $node = $page->getTemplate()->appendFileById( "view_training.html", "div", "training" );
            $page->getTemplate()->setForm( $obj, $node );
            $obj->populateChildren( array( "registration", "license" ), 
                    array( "registration" => "registration_date", "license" => "-start_date" ) );
            if ( array_key_exists( "registration", $obj->children ) ) {
                $page->getTemplate()->setForm( current( $obj->children["registration"] ), $node );
            } else {
                $page->getTemplate()->setForm( $factory->createContainer( "registration" ), $node );
            }
            if ( array_key_exists( "license", $obj->children ) ) {
                $page->getTemplate()->setForm( current( $obj->children["license"] ), $node );
            } else {
                $page->getTemplate()->setForm( $factory->createContainer( "license" ), $node );
            }
        }
        return true;
    }


    /**
     * Perform any extra validation for the license form.
     * @param I2CE_Form $form
     */
    public function validate_form_license( $form ) {
        if ( I2CE_Validate::checkDate( $form->end_date ) && I2CE_Validate::checkDate( $form->start_date ) ) {
            if ( $form->end_date->compare( $form->start_date ) > -1 ) {
                $form->setInvalidMessage( "end_date","bad_date");
            }
        }
    }

    /**
     * Validate any extra information other than required fields
     * for training disruptions.
     * @param I2CE_Form $form
     */
    public function validate_form_training_disrupt( $form ) {
        if ( I2CE_Validate::checkDate( $form->disruption_date ) && I2CE_Validate::checkDate( $form->resumption_date ) ) {
            if ( $form->resumption_date->before( $form->disruption_date ) ) {
                $form->setInvalidMessage('resumption_date','bad_date'); 
            }
        }
    }

    /**
     * Validate any extra information other than required fields
     * for registrations.
     * @param I2CE_Form $form
     */
    public function validate_form_registration( $form ) {
        if ( $form->registration_date->before( $form->application_date ) ) {
            $form->setInvalidMessage('registration_date','bad_date');
        }
        
    }

    /**
     * Perform any additional required validation for the exam.
     * @param I2CE_Form $form
     */
    public function validate_form_exam( $form ) {
        if ( I2CE_Validate::checkDate( $form->exam_date ) && I2CE_Validate::checkDate( $form->application_date ) ) {
            if ( $form->exam_date->before( $form->application_date ) ) {
                $form->setInvalidMessage("exam_date","bad_date");
            }
        }       
    }
 
    /**
     * Validate all fields for the training form.
     * @param I2CE_Form $form
     */
    public function validate_form_training( $form ) {
        if ( !I2CE_Validate::checkMap( $form->training_program ) && !I2CE_Validate::checkMap( $form->out_cadre ) ) {
            $form->setInvalidMessage( "training_program" ,'bad_cadre');
        } elseif ( I2CE_Validate::checkMap( $form->out_cadre ) ) {
            if ( !I2CE_Validate::checkMap( $form->out_country ) ) {
                $form->setInvalidMessage( "out_country",'bad_country');
            }
            if ( !I2CE_Validate::checkDate( $form->graduation ) ) {
                $form->setInvalidMessage( "graduation",'required_out' );
            }
        }
        if ( I2CE_Validate::checkDate( $form->intake_date ) && I2CE_Validate::checkDate( $form->graduation ) ) {
            if ( $form->graduation->before( $form->intake_date ) ) {
                $form->setInvalidMessage( "graduation" ,"bad_date");
            }
        }
    }
 
    /**
     * Perform any extra validation for the private practice license.
     * @param I2CE_Form $form
     */
    public function validate_form_private_practice( $form ) {
        if ( I2CE_Validate::checkDate( $form->end_date ) && I2CE_Validate::checkDate( $form->start_date ) ) {
            if ( $form->end_date->compare( $form->start_date ) > -1 ) {
                $form->setInvalidMessage( "end_date" , "bad_date" );
            }
        }
    }

    /**
     * Perform any extra validation for the disciplinary action.
     * @param I2CE_From $form
     */
    public function validate_form_disciplinary_action( $form ) {
        if ( I2CE_Validate::checkDate( $form->reinstate_date ) && I2CE_Validate::checkDate( $form->action_date ) ) {
            if ( $form->reinstate_date->before( $form->action_date ) ) {
                $form->setInvalidMessage("reinstate_date",'bad_date_action');
            }
        }
    }




    /**
     * Do any pre upgrade actions if necessary.
     * @param string $old_vers
     * @param string $new_vers
     * @param I2CE_MagicDataNode $new_storage
     * @return boolean
     */
    public function pre_upgrade( $old_vers, $new_vers, $new_storage ) {
        if ( I2CE_Validate::checkVersion( $old_vers, "<", "3.3.3" ) ) {
            $migrate_path = "/I2CE/formsData/migrate_data/3.2.3";
            I2CE_FormStorage::storeMigrateData( array( "person" => 
                        array( "home_country", "home_district", "home_county" ) ),
                $migrate_path );
        }
        if ( I2CE_Validate::checkVersion( $old_vers, "<", "3.3.5" ) ) {
            $migrate_path = "/I2CE/formsData/migrate_data/3.2.3";
            I2CE_FormStorage::storeMigrateData( array( "health_facility" => 
                        array( "country", "district", "county", "facility_type", 
                            "facility_agent", "facility_status" ) ),
                $migrate_path );
        }
        if ( I2CE_Validate::checkVersion( $old_vers, "<", "3.3.6" ) ) {
            $migrate_path = "/I2CE/formsData/migrate_data/3.2.3";

            I2CE_FormStorage::storeMigrateData( array( "cadre" => 
                        array( "qualification" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "certificate" => 
                        array( "academic_level" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "deployment" => 
                        array( "health_facility" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "training_disruption_reason" => 
                        array( "training_disruption_category" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "training_disrupt" => 
                        array( "disruption_reason" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "disciplinary_action_reason" => 
                        array( "disciplinary_action_category" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "disciplinary_action" => 
                        array( "disciplinary_action_category", "disciplinary_action_reason" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "training_institution" => 
                        array( "facility_agent", "facility_status", "country", "district", "county" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "training_program" => 
                        array( "cadre" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "facility_institution" => 
                        array( "health_facility", "training_institution" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "demographic" =>
                        array( "birth_country", "birth_district", "birth_county" ) ),
                    $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "education" => 
                        array( "academic_level", "certificate" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "training" => 
                        array( "training_institution", "cadre", "out_country" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "exam" => 
                        array( "try", "results" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "registration" => 
                        array( "practice_type" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "out_migration" => 
                        array( "country", "out_migration_reason" ) ),
                $migrate_path );
            I2CE_FormStorage::storeMigrateData( array( "private_practice" => 
                        array( "health_facility" ) ),
                $migrate_path );
        }
        return parent::pre_upgrade( $old_vers, $new_vers, $new_storage );
    }
    
    /**
     * Upgrade this module if necessary based on the previous and new
     * versions of the module.
     * @param string $old_vers
     * @param string $new_vers
     * @return boolean
     */
    public function upgrade($old_vers,$new_vers) {
        if (I2CE_Validate::checkVersion($old_vers,'<','3.0.1000')) {
            if (! $this->updateContactTypes()) {
                return false;
            }
            if (! $this->ensureFormsAndPages()) {
                return false;
            }
        }
        if ( I2CE_Validate::checkVersion( $old_vers, "<", "3.3.3" ) ) {
            $user = new I2CE_User( 1, false, false, false );
            $class_config = I2CE::getConfig()->modules->forms->formClasses;
            $migrate_path = "/I2CE/formsData/migrate_data/3.2.3";

            if ( !I2CE_FormStorage::migrateField( "person",
                        array( "home" => array( "home_county" => "county",
                                "home_district" => "district",
                                "home_country" => "country" ) ),
                        $migrate_path, $user ) ) {
                return false;
            }
            unset( $class_config->iHRIS_PersonQualify->fields->home_country );
            unset( $class_config->iHRIS_PersonQualify->fields->home_district );
            unset( $class_config->iHRIS_PersonQualify->fields->home_county );
        }
        if ( I2CE_Validate::checkVersion( $old_vers, "<", "3.3.5" ) ) {
            $user = new I2CE_User( 1, false, false, false );
            $class_config = I2CE::getConfig()->modules->forms->formClasses;
            $migrate_path = "/I2CE/formsData/migrate_data/3.2.3";

            $facilityObj = I2CE_FormFactory::instance()->createContainer( "health_facility" );
            if ( !$facilityObj instanceOf iHRIS_HealthFacility ) {
                I2CE::raiseError( "Bad health facility form" );
                return false;
            }
            $childForms = $facilityObj->getChildForms();
            if ( in_array("contact", $childForms) ) {
                I2CE::raiseError( "Changing contact child forms of health facility to facility_contact" );
                if ( !iHRIS_Module_Contact::changeContactForm( "health_facility", 
                            "contact_type|facility", "facility_contact", true ) ) {
                    return false;
                }
            }

            if ( !I2CE_FormStorage::migrateField( "health_facility",
                        array( "location" => array( "county" => "county",
                                "district" => "district",
                                "country" => "country" ),
                            "facility_type" => "facility_type",
                            "facility_agent" => "facility_agent",
                            "facility_status" => "facility_status" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            unset( $class_config->iHRIS_HealthFacility->fields->country );
            unset( $class_config->iHRIS_HealthFacility->fields->district );
            unset( $class_config->iHRIS_HealthFacility->fields->county );
            unset( $class_config->iHRIS_HealthFacility->fields->type );
        }
        if ( I2CE_Validate::checkVersion( $old_vers, "<", "3.3.6" ) ) {
            $user = new I2CE_User( 1, false, false, false );
            $class_config = I2CE::getConfig()->modules->forms->formClasses;
            $migrate_path = "/I2CE/formsData/migrate_data/3.2.3";

            $migrate_node = I2CE::getConfig()->traverse( $migrate_path, true, false );

            $constant_try = array( 1 => 'exam_try|first', 2 => 'exam_try|retry',
                    3 => 'exam_try|final' );
            foreach( $constant_try as $old_id => $new_id ) {
                $migrate_node->forms->exam_try->$old_id = $new_id;
            }
            $constant_result = array( 1 => 'exam_result|pass', 2 => 'exam_result|fail',
                    3 => 'exam_result|notake' );
            foreach( $constant_result as $old_id => $new_id ) {
                $migrate_node->forms->exam_result->$old_id = $new_id;
            }
            $constant_reg_type = array( 1 => 'registration_type|permanent',
                    2 => 'registration_type|temporary' );
            foreach( $constant_reg_type as $old_id => $new_id ) {
                $migrate_node->forms->registration_type->$old_id = $new_id;
            }


            if ( !I2CE_FormStorage::migrateField( "cadre",
                        array( "qualification" => "qualification" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "certificate",
                        array( "academic_level" => "academic_level" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "deployment",
                        array( "health_facility" => "health_facility" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "training_disruption_reason",
                        array( "training_disruption_category" => "training_disruption_category" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "training_disrupt",
                        array( "disruption_reason" => "training_disruption_reason" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "disciplinary_action_reason",
                        array( "disciplinary_action_category" => "disciplinary_action_category" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "disciplinary_action",
                        array( "disciplinary_action_reason" => "disciplinary_action_reason" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            $traininstObj = I2CE_FormFactory::instance()->createContainer( "training_institution" );
            if ( !$traininstObj instanceOf iHRIS_QualifyTrainingInstitution ) {
                I2CE::raiseError( "Bad training institution form" );
                return false;
            }
            $childForms = $traininstObj->getChildForms();
            if ( in_array("contact", $childForms) ) {
                I2CE::raiseError( "Changing contact child forms of training institution to facility_contact" );
                if ( !iHRIS_Module_Contact::changeContactForm( "training_institution", 
                            "contact_type|facility", "facility_contact", true ) ) {
                    return false;
                }
            }

           if ( !I2CE_FormStorage::migrateField( "training_institution",
                        array( "location" => array( "county" => "county",
                                "district" => "district",
                                "country" => "country" ),
                            "facility_agent" => "facility_agent",
                            "facility_status" => "facility_status" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "training_program",
                        array( "cadre" => "cadre" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "facility_institution",
                        array( "health_facility" => "health_facility",
                           "training_institution" => "training_institution" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "demographic",
                        array( "birth_location" => array( "birth_county" => "county",
                                "birth_district" => "district",
                                "birth_country" => "country" ) ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "education",
                        array( "certificate" => "certificate" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "training",
                        array( "cadre" => "cadre",
                            "training_institution" => "training_institution",
                            "out_country" => "country" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "exam",
                        array( "try" => "exam_try", "results" => "exam_result" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "registration",
                        array( "practice_type" => "registration_type" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "out_migration",
                        array( "country" => "country",
                           "out_migration_reason" => "out_migration_reason" ),
                        $migrate_path, $user ) ) {
                return false;
            }
            if ( !I2CE_FormStorage::migrateField( "private_practice",
                        array( "health_facility" => "health_facility" ),
                        $migrate_path, $user ) ) {
                return false;
            }
 
            unset( $class_config->iHRIS_DisciplinaryAction->fields->disciplinary_action_category );
            unset( $class_config->iHRIS_Education->fields->academic_level );
            unset( $class_config->iHRIS_QualifyDemographic->fields->birth_country );
            unset( $class_config->iHRIS_QualifyDemographic->fields->birth_district );
            unset( $class_config->iHRIS_QualifyDemographic->fields->birth_county );
            unset( $class_config->iHRIS_Search );
            unset( $class_config->iHRIS_TrainingDisrupt->fields->disruption_category );
            unset( $class_config->iHRIS_Cadre->fields->type );
            unset( $class_config->iHRIS_Certificate->fields->type );
            unset( $class_config->iHRIS_DisciplinaryActionReason->fields->type );
            unset( $class_config->iHRIS_HealthFacility->fields->type );
            unset( $class_config->iHRIS_TrainingDisruptionReason->fields->type );
        }
        if ( I2CE_Validate::checkVersion( $old_vers, "<", "3.3.15" ) ) {
            $user = new I2CE_User( 1, false, false, false );
            $factory = I2CE_FormFactory::instance();
            $training_programs = $factory->getRecords( "training_program" );
            I2CE::raiseError( "Training programs are: " . print_r( $training_programs, true ) );
            foreach ( $training_programs as $id ) {
                $program = $factory->createContainer( "training_program|" . $id );
                $program->populate();
                $program->getField("training_institution")->setFromDB( $program->getParent() );
                I2CE::raiseError( "Saving training_program $id to have institution " . $program->getParent() );
                $program->setParent( "" );
                $program->save( $user );
                $program->cleanup();
                unset( $program );
            }
        }
        return true;
    }

    /*
     *in version 3.0.1 and above, we made ihris qualify and manage share the same contact
     *form iHRIS_Contact.  unfortunately, the contact types are not quite the same. this
     * method attempts to remedy this
     */
    protected function updateContactTypes() {        
        $db = MDB2::singleton(); 
        $factory = I2CE_FormFactory::instance();
        if ($db->supports('transactions')) {
            $db->beginTransaction(); 
        }
        $contactFormId = I2CE_Form::getFormId("contact");
        if ($contactFormId == 0) {
            I2CE::raiseError("Unable to get contact form id");
            if ($db->in_transaction) { 
                $db->rollback();
            }
            return false;
        }
        $adminUser = I2CE_User::findUser('role','admin',false);
        if (!$adminUser instanceof I2CE_User) {
            I2CE::raiseError("Cannot find an administrative user");
            if ($db->in_transaction) { 
                $db->rollback();
            }
            return false;
        }
        $changes = array ( 4=> 5, 3=>4);
        // TYPE_OTHER = 3 => TYPE_OTHER = 4
        // TYPE_FACILITY = 4 => TYPE_FACILITY = 5
        $qry = $db->prepare( 'SELECT id from record where form = ?', array('integer'), MDB2_PREPARE_RESULT );
        if (I2CE::pearError( $qry, "Error preping select records" )) {
            if ($db->in_transaction) { 
                $db->rollback();
            }
            return false;
        }
        $results = $qry->execute( $contactFormId);
        if (I2CE::pearError( $results, "Error getting records" )) {
            if ($db->in_transaction) { 
                $db->rollback();
            }
            return false;
        }
        while( $row = $results->fetchRow() ) {
            $contact = $factory->createContainer('contact'.'|'. $row->id);
            if (!$contact instanceof iHRIS_Contact) {
                I2CE::raiseError("Unable to create contact with id " . $row->id);
                if ($db->in_transaction) { 
                    $db->rollback();
                }
                return false;
            }
            $contact->populate();
            foreach ($changes as $old=>$new) {
                if ( $contact->contact_type == $old) {
                    I2CE::raiseError("Changing contact type $old to $new for record " . $row->id);                
                    $contact->contact_type = $new;
                    if (!$contact->save($adminUser)) {
                        I2CE::raiseError("Unable to save record " . $row->id);
                        if ($db->in_transaction) { 
                            $db->rollback();
                        }
                        return false;
                    }
                    $contact->cleanup();
                    continue 2;
                }
            }       
            $contact->cleanup();
        }  
        if ($db->in_transaction) { 
            return $db->commit()  == MDB2_OK; 
        } else{
            return true;  
        }
    }


    public function ensureFormsAndPages() {
        $config = I2CE::getConfig();
        $forms = $config->modules->forms->forms;
        $changes = array(
            'demographic'=>array('old'=>'iHRIS_Demographic','new'=>'iHRIS_QualifyDemographic'),
            'person'=>array('old'=>'iHRIS_Person','new'=>'iHRIS_QualifyPerson')
            );
        foreach ($changes as $form=>$data) {
            if ($forms->$form->class != $data['old']) {
                $msg = "You have the class for the form $form set to " . $forms->$form->class . ".  There is defferent from the default ".
                    "iHRIS Qualify installation values of " . $data['old'] . ".  The system is going through an upgrade to version > 3.0.999 and will" .
                    " now use " . $data['new'] . " instead.  Please make the neccesary changes to the class " . $forms->$form->class . " so that is uses " .
                    $data['new'] . " instead of " . $data['old'];
                I2CE::raiseError($msg);
                $this->userMessage($msg,'notice');
            } else {
                $forms->$form->class = $data['new'];
            }
        }
        $changes = array(
            'person'=>array('old'=>'iHRIS_PageFormPerson', 'new'=>'iHRIS_PageFormPersonQualify'),
            'view'=>array('old'=>'iHRIS_PageView', 'new'=>'iHRIS_PageViewQualify'),
            );
        $pages = $config->I2CE->page;
        foreach ($changes as $page=>$data) {
            if ($pages->$page->class != $data['old']) {
                $msg = "You have the class for the page $page set to " . $pages->$page->class . ".  There is defferent from the default ".
                    "iHRIS Qualify installation values of " . $data['old'] . ".  The system is going through an upgrade to version > 3.0.999 and will" .
                    " now use " . $data['new'] . " instead.  Please make the neccesary changes to the class " . $pages->$page->class . " so that is uses " .
                    $data['new'] . " instead of " . $data['old'];
                I2CE::raiseError($msg);
                $this->userMessage($msg,'notice');
            } else {
                $pages->$page->class = $data['new'];
            }
        }
        return true;
    }

}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
