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
 * Manage license renewals.
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
 * Page object to handle the renewal of licenses.
 * 
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageFormRenew extends iHRIS_PageFormParentTraining {
        
    /**
     * Load the HTML template files for editing.
     */
    protected function loadHTMLTemplates() {
        I2CE_PageForm::loadHTMLTemplates();
        $this->template->appendFileById( "menu_view_tr_link.html", "li", "navBarUL", true );
        $this->template->appendFileById( "form_tr_renew.html", "tbody", "training_form" );
    }
    /**
     * Set the data to be displayed for the page.
     */
    protected function setDisplayData() {
        I2CE_PageForm::setDisplayData();
        $this->template->setDisplayData( "training_header", $this->getTitle() );
        $this->template->setDisplayData( "training_form", "renew" );
    }
    /**
     * Create and load data for the objects used for this form.
     */
    protected function loadObjects() {
        parent::loadObjects();
        if ( !$this->isPost() ) {
            $parent = $this->getParent();
            $parent->populateLast( array( "license" => "end_date" ) );
            $last = current( $parent->children['license'] );
            if ( $last )
                $this->getPrimary()->license_number = $last->license_number;
        }
    }
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
