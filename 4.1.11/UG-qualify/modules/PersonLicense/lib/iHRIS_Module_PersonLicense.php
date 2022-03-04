<?php
/**
* © Copyright 2009 IntraHealth International, Inc.
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
*
* @package UG-Qualify
* @author Luke Duncan <lduncan@intrahealth.org>
* @version v4.0.6
* @since v4.0.6
* @filesource
*/
/**
* Class iHRIS_Module_PersonLicense
*
* @access public
*/


class iHRIS_Module_PersonLicense extends I2CE_Module {

    public static function getMethods() {
        return array(
            'iHRIS_PageView->action_person_license' => 'action_person_license',
            'iHRIS_PageView->action_person_disciplinary_action' => 'action_person_disciplinary_action'
            );
    }


    public function action_person_license( $page ) {
        if ( !$page instanceof iHRIS_PageView ) {
            return;
        }
        $has_suspension = false;
        $person = $page->getPerson();
        $person->populateChildren( array( "person_disciplinary_action" ) );
        if ( array_key_exists( "person_disciplinary_action", 
                    $person->children ) &&
                is_array( $person->children["person_disciplinary_action"] ) ) {
            foreach ( $person->children["person_disciplinary_action"] 
                    as $action ) {
                if ( $action->suspend ) {
                    $has_suspension = true;
                }
            }
        }
        $success = $page->addLastChildForm( 'person_license', 
                'end_date', 'siteContent' );
        $template = $page->getTemplate();
	$person->populateChildren( "training");
        if ( array_key_exists( "person_license", $person->children ) ) {
            if ( $has_suspension ) {
                $template->appendFileById( "view_person_reinstate_link.html", "span", "disciplinary_links" );
            } else {
                $template->appendFileById( "view_person_renew_link.html", "span", "license_links" );
                $template->appendFileById( "view_person_disciplinary_action_link.html", "span", "disciplinary_links" );
            }
        } elseif ( array_key_exists( "training", $person->children ) ) {
            $has_reg = false;
            foreach( $person->children["training"] as $train ) {
		$train->populateChildren( "registration");
                if ( array_key_exists( "registration", $train->children ) ) {
                    foreach( $train->children['registration'] as $reg ) {
                        if ( $reg->registration_number != "" ) {
                            $has_reg = true;
                        }
                    }
                }
            }
            if ( $has_reg ) {
		//I2CE::raiseMessage( "has registration number" );
                $template->appendFileById( "view_person_license_link.html", "span", "license_links" );
            }
        }
	//$template->appendFileById( "view_person_license_link.html", "span", "license_links" );
        return $success;
    }

    public function action_person_disciplinary_action( $page ) {
        if ( !$page instanceof iHRIS_PageView ) {
            return;
        }
        return $page->addChildForms('person_disciplinary_action');
    }


}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
