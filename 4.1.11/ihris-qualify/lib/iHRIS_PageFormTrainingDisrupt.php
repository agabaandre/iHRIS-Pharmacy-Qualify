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
 * Manage adding or editing training disruption details to the database.
 * 
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * Page object to handle the adding or editing training disruption details to the database.
 * 
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageFormTrainingDisrupt extends iHRIS_PageFormParentTraining {
        
    /**
     * Check to see if a different template should be used when editing this form.
     * @return boolean
     */
    protected function editForm() { return true; }

    /**
     * Extra validation for training disruptions to make sure the disruption date
     * is after the intake date of the training being disrupted.
     *
     */
    protected function validate() {
        parent::validate();

        if ( I2CE_Validate::checkDate( $this->getPrimary()->disruption_date ) && $this->getPrimary()->disruption_date->before( $this->getParent()->intake_date ) ) {
            $this->getPrimary()->setInvalidMessage( "disruption_date", "bad_date");
        }
    }

}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
