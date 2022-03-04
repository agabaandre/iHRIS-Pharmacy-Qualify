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
 * The page class for displaying the history of a form associated with a person's record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * The page class for displaying the history of a form associated with a person's record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageHistoryQualify extends iHRIS_PageHistory {

    /**
     * Return a prefix to be used for templates associated with this page.
     * @return string
     */
    protected function getPrefix() { return "tr_"; }
        
    /**
     * Load the history object for this page.
     */
    protected function loadObjects() {
        $factory = I2CE_FormFactory::instance();
        $this->history = $factory->createContainer( $this->get('id') );
        $this->history->populate();
        $person = $factory->createContainer( $this->history->getParent() );
        $person->populate();
        $this->template->setForm( $person );    
    }
        
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
