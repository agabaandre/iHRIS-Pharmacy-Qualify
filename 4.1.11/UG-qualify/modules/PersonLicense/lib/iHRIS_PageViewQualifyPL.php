<?php
/*
 * © Copyright 2007, 2008 IntraHealth International, Inc.
 * 
 * This File is part of iHRIS
 * 
 * iHRIS is free software; you can redistribute it and/or modify
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
 * View a person's record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * The page class for displaying the a person's record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageViewQualifyPL extends iHRIS_PageView {
        
    /**
     * Perform the main actions of the page.
     */
    protected function action() {
        parent::action();
        $factory = I2CE_FormFactory::instance();
        $modules = I2CE_ModuleFactory::instance();
        $this->person->populateChildren( array(  "education",  "training", "out_migration", "person_disciplinary_action" ) );
        $pop_last_list = array( "deployment" => "deployment_date", "person_license" => "end_date" );
        if ( $modules->isEnabled( "RecordVerify" ) ) {
            $pop_last_list["record_verify"] = "verify_date";
        }
        $this->person->populateLast( $pop_last_list );

        //$this->person->setDisplayData( $this->template );
        $this->template->setForm( $this->person );
        
        $contact_seen= array();
        $has_suspension = false;
        $has_registration = false;
        foreach( $this->person->children as $form => $list ) {
            foreach( $list as $obj ) {
                $node = $this->template->appendFileById( "view_" . $form . ".html", "div", $form );
                if ( $form == "person_license" ) {
                    // Since there's only one person_license on a page set it for the whole page
                    // instead of just the node so other links can work with it.
                    $this->template->setForm( $obj );
                } else {
                    $this->template->setForm( $obj, $node );
                }
                if ( $form == "contact" ) {
                    $contact_seen[ $obj->contact_type ] = true;
                } elseif ( $form == "training" ) {
                    $obj->populateChildren( array( "registration" ) );
                    if ( array_key_exists( "registration", $obj->children ) ) {
                        $reg = current( $obj->children['registration'] );
                        $this->template->setForm( $reg, $node );
                        $has_registration = true;
                    } else {
                        $this->template->setForm( $factory->createForm( "registration"), $node  );
                    }
                }
                if ( $form == "person_disciplinary_action" ) {
                    if ( $obj->suspend ) {
                        $has_suspension = true;
                    }
                }
            }
        }

                
        if ( !array_key_exists( "demographic", $this->person->children ) ) {
            $this->template->appendFileById( "view_demographic_link.html", "span", "individual_links" );
        }
        if ( !array_key_exists( "education", $this->person->children ) ) {
            $this->template->appendFileById( "view_education_link.html", "span", "individual_links" );
        }
        if ( array_key_exists( "person_license", $this->person->children ) ) {
            if ( $has_suspension ) {
                $this->template->appendFileById( "view_person_reinstate_link.html", "span", "disciplinary_links" );
            } else {
                $this->template->appendFileById( "view_person_renew_link.html", "span", "license_links" );
                $this->template->appendFileById( "view_person_disciplinary_action_link.html", "span", "disciplinary_links" );
            }
        } elseif ( $has_registration ) {
            $this->template->appendFileById( "view_person_license_link.html", "span", "license_links" );
        }
                
        $contacts = array("TYPE_PERSONAL","TYPE_WORK","TYPE_OTHER");
        $this->showContacts($contacts,$contact_seen,'records');
                
    }
        
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
