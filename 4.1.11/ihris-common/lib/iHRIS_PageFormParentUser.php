<?php
/**
* © Copyright 2007-11 IntraHealth International, Inc.
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
*  iHRIS_PageFormParentUser
* @package I2CE
* @subpackage Common
* @author Luke Duncan <lduncan@intrahealth.org>
* @copyright Copyright &copy; 2007-11 IntraHealth International, Inc. 
* @since 4.1
* @version 4.1
* @access public
*/


class iHRIS_PageFormParentUser extends I2CE_PageFormParentUser {
    
    /**
     * Load the HTML template files.
     */
    protected function loadHTMLTemplates() {
        parent::loadHTMLTemplates();
        $this->template->setAttribute( "class", "active", "menuConfigure", "a[@href='configure']" );
        $this->template->appendFileById( "menu_configure.html", "ul", "menuConfigure" );
        $this->template->setAttribute( "class", "active", "menuUser", "a[@href='user']" );
    }

}

# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
