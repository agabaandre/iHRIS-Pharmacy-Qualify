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


class iHRIS_Module_FacilityService extends I2CE_Module {

    public static function getMethods() {
        return array(
            'iHRIS_PageViewPrivateFacility->action_facility_service' => 'action_facility_service'
            );
    }
    
    public function action_facility_service( $page ) {
        if ( !$page instanceof iHRIS_PageViewPrivateFacility ) {
            return;
        }
        $facility = $page->getFacility();
               
        $success = $page->addChildForms( 'facility_service' );
        $template = $page->getTemplate();
        
        return $success;
    }
  


}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
