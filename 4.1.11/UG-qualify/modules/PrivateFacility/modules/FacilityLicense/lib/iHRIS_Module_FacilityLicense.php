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
* Class iHRIS_Module_FacilityLicense
*
* @access public
*/


class iHRIS_Module_FacilityLicense extends I2CE_Module {

    public static function getMethods() {
        return array(
            'iHRIS_PageViewPrivateFacility->action_facility_license' => 'action_facility_license'
            );
    }
     /**
     * Return the array of hooks available in this module.
     * @return array
     */
    public static function getHooks() {
        return array(
                'validate_form_facility_license' => 'validate_form_facility_license'
                );
    }


    public function action_facility_license( $page ) {
        if ( !$page instanceof iHRIS_PageViewPrivateFacility ) {
            return;
        }
        $facility = $page->getFacility();
        $success = $page->addLastChildForm( 'facility_license', 
                'end_date', 'siteContent' );
        $template = $page->getTemplate();
        if( !$page->hasChildForm( "facility_license" ) ) {
            $template->appendFileById( "view_privatefacility_license_link.html", "span", "license_links" );
        } else {
            $template->appendFileById( "view_privatefacility_renew_link.html", "span", "license_links" );
        }
        return $success;
    }
       /**
     * Validate any extra information other than required fields
     * for licenses.
     * @param I2CE_Form $form
     */
    public function validate_form_facility_license( $form ) {
        if ( $form->end_date->before( $form->start_date ) ) {
            $form->getField( "end_date" )->setInvalid( "The license Start date must be after the end date." );
        }
        
    }


}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
