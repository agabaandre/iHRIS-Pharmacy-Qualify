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
* @package ihris-common
* @author Carl Leitner <litlfred@ibiblio.org>
* @version v3.2
* @since v3.2
* @filesource
*/
/**
* Class iHRIS_Module_PersonDemographic
*
* @access public
*/


class iHRIS_Module_ArchivedScan extends I2CE_Module {

 

    public static function getMethods() {
        return array(
            'iHRIS_PageView->action_person_archive_scan' => 'action_person_archive_scan'
            );
    }


    public function action_person_archive_scan($obj) {
        if (!$obj instanceof iHRIS_PageView) {
            return;
        }
        return $obj->addChildForms('person_archive_scan');
    }


}
# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
