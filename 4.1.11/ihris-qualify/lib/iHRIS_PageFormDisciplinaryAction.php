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
 * Manage adding or editing disciplinary action details to the database.
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
 * Page object to handle the adding or editing disciplinary action details to the database.
 * 
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageFormDisciplinaryAction extends iHRIS_PageFormParentTraining {
        
    /**
     * Check to see if a different template should be used when editing this form.
     * @return boolean
     */
    protected function editForm() { return true; }

    /**
     * Save the objects to the database.
     * 
     * Save the default object being edited and return to the view page.  If the action needs to be 
     * logged then the {@link log} method is also called.  Any pages overriding this default save method
     * will need to include any logging necessary.
     */
    protected function save() {
        parent::save();
                
        if ( $this->getPrimary()->suspend ) {
            $parent = $this->getParent();
            $parent->populateLast( array( "license" => "end_date" ) );
            $license = current( $parent->children['license'] );
            if ( $license ) {
                $license->suspend = true;
                $license->save( $this->user );
            }
        }
    }
                        
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
