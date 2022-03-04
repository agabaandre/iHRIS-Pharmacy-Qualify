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
*  iHRIS_PageFormPrivateFacility
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


class iHRIS_PageFormPrivateFacility extends I2CE_PageForm{



    /**
     * Create and load data for the objects used for this form.
     * 
     * Create the list object and if this is a form submission load
     * the data from the form data.
     */
    protected function loadObjects() {
        $factory = I2CE_FormFactory::instance();
        if ($this->isPost()) {
            $privatefacility = $factory->createContainer('privatefacility');
            if (!$privatefacility instanceof iHRIS_PrivateFacility) {
                I2CE::raiseError("Could not create privatefacility form");
                return;
            }
            $privatefacility->load($this->post);
            $name_ignore = $privatefacility->getField('name_ignore');
            $ignore_path = array('forms','privatefacility',$privatefacility->getID(),'ignore','name');
            if ($name_ignore instanceof I2CE_FormField && $this->post_exists($ignore_path)) {
                $name_ignore->setFromPost($this->post($ignore_path));
            }
        } else {
            if ($this->get_exists('id')) {
                $id = $this->get('id');
                if (strpos($id,'|')=== false) {
                    I2CE::raiseError("Depcreated use of id variable");
                    $id = 'privatefacility|' . $id;
                }
            } else {
                $id = 'privatefacility|0';
            }
            $privatefacility = $factory->createContainer($id);
            if (!$privatefacility instanceof iHRIS_PrivateFacility) {
                I2CE::raiseError("Could not create valid privatefacility form from id:$id");
                return;
            }
            $privatefacility->populate();
        }
        $this->setObject( $privatefacility);
    }

    /**
     * Save the objects to the database.
     * 
     * Save the default object being edited and return to the view page.
     * @global array
     */
    protected function save() {
        parent::save();
        $this->setRedirect(  "viewprivate?id=" . $this->getPrimary()->getNameId() );
    }

    /** 
     * Display the save or confirm buttons as needed.
     * 
     * If the page is a confirmation view then the save / edit button template will be displayed.  
     * Otherwise the confirm and return buttons will be shown.
     * @param boolean $save Flag to show the save button. (Defaults to false)
     * @param boolean $show_edit (defaults to true)
     * @global array
     */
    protected  function displayControls( $save = false, $show_edit = true ) {
        if ( $save ) {
            parent::displayControls( $save, $show_edit );
        }  else {       
            $this->template->addFile( 'button_facility_confirm_notchild.html' );
        }               
    }               


}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
