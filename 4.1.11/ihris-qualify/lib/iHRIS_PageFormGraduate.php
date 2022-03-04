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
 * Manage adding the graduation date to the training details.
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
 * Page object to handle the adding the graduate date to the training details.
 * 
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageFormGraduate extends iHRIS_PageFormParentPerson {
                
    /**
     * Load the HTML template files for editing.
     */
    protected function loadHTMLTemplates() {
        I2CE_PageForm::loadHTMLTemplates();
        $this->template->appendFileById( "menu_view_tr_link.html", "li", "navBarUL", true );
        $this->template->appendFileById( "form_tr_graduate.html", "tbody", "training_form" );
    }
    /**
     * Set the data to be displayed for the page.
     */
    protected function setDisplayData() {
        I2CE_PageForm::setDisplayData();
        $this->template->setDisplayData( "training_header", $this->getTitle() );
        $this->template->setDisplayData( "training_form", "graduate" );
    }
    /**
     * Display the save or confirm buttons as needed.
     * 
     * If the page is a confirmation view then the save / edit button template will be displayed.  Otherwise the confirm
     * and return buttons will be shown.
     * @param boolean $save Flag to show the save button.
     * @param boolean $show_edit (defaults to true)
     */
    protected function displayControls( $save = false, $show_edit = true ) {
        if ( !$save ) {
            $this->template->addFile( "button_confirm_tr_grad.html" );     
        } else {
            parent::displayControls( $save, $show_edit );
        }
    }
    /**
     * Save the objects to the database.
     * 
     * Save the default object being edited and return to the view page.  If the action needs to be 
     * logged then the {@link log} method is also called.  Any pages overriding this default save method
     * will need to include any logging necessary.
     */
    protected function save() {
        parent::save();
        $this->setRedirect( "view_training?id=" . $this->getPrimary()->getId() );
    }

                        
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
