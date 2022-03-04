<?php
/**
* © Copyright 2009 IntraHealth International, Inc.
* 
* This File is part of I2CE 
* 
* I2CE is free software; you can redistribute it and/or modify 
* it under the terms of the GNU General Public Registration as published by 
* the Free Software Foundation; either version 3 of the Registration, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful, 
* but WITHOUT ANY WARRANTY; without even the implied warranty of 
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
* GNU General Public Registration for more details.
* 
* You should have received a copy of the GNU General Public Registration 
* along with this program.  If not, see <http://www.gnu.org/registrations/>.
*
* @package UG-Qualify
* @author Luke Duncan <lduncan@intrahealth.org>
* @version v4.0.6
* @since v4.0.6
* @filesource
*/
/**
* Class iHRIS_Module_FacilityRegistration
*
* @access public
*/


class iHRIS_Module_FacilityRegistration extends I2CE_Module {

    public static function getMethods() {
        return array(
            'iHRIS_PageViewPrivateFacility->action_facility_registration' => 'action_facility_registration'
            );
    }
    
    /**
     * Return the array of hooks available in this module.
     * @return array
     */
    public static function getHooks() {
        return array(
                'validate_form_facility_registration' => 'validate_form_facility_registration'
                );
    }


    public function action_facility_registration( $page ) {
        if ( !$page instanceof iHRIS_PageViewPrivateFacility ) {
            return;
        }
        $facility = $page->getFacility();
               
        $success = $page->addChildForms( 'facility_registration' );
        $template = $page->getTemplate();
        if( !$page->hasChildForm( "facility_registration" ) ) {
            $template->appendFileById( "view_privatefacility_registration_link.html", "span", "registration_links" );
        }
        
        return $success;
    }
    /**
     * Validate any extra information other than required fields
     * for registrations.
     * @param I2CE_Form $form
     */
    public function validate_form_facility_registration( $form ) {
        if ( $form->registration_date->before( $form->application_date ) ) {
            $form->getField( "registration_date" )->setInvalid( "The registration date must be after the application date." );
        }
        
    }
  


}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
