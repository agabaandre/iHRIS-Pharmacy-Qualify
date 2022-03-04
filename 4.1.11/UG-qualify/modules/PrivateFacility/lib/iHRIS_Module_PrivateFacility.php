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
* Class iHRIS_Module_PrivateFacility
*
* @access public
*/


class iHRIS_Module_PrivateFacility extends I2CE_Module {



    /**
     * Return the array of hooks available in this module.
     * @return array
     */
    public static function getHooks() {
        return array(
                'validate_form_privatefacility' => 'validate_form_privatefacility',
                );
    }

    /**
     * Perform extra validation for the privatefacility form.
     * A new privatefacility record needs to verify there aren't any existing 
     * records with the same name.
     * @param I2CE_Form $form
     */
    public function validate_form_privatefacility( $form ) {

        $search = array();
        $name_ignore = false;
        if ( isset( $form->name_ignore ) ) {
            $name_ignore = $form->name_ignore;
        }
        if ( I2CE_ModuleFactory::instance()->isEnabled('forms-storage') 
             && $form->getId() == 0 && !$name_ignore
             && I2CE_Validate::checkString( $form->name )) {
            $where = array(
                'operator' => 'AND',
                'operand'=>array(
                    0=>array(
                        'operator'=>'FIELD_LIMIT',
                        'field'=>'name',
                        'style'=>'lowerequals',
                        'data'=>array('value'=>strtolower($form->name))
                        )
                    )
                );
            $results = I2CE_FormStorage::listFields('privatefacility',array('name'),false,$where,array('name'));
            if( count($results) > 0 ) {
                foreach ($results as $id=>&$data) {
                    $data = implode(', ', $data);
                }
                $form->getField('name')->setInvalid( "Duplicate records match this record's name:",
                        array( "view?id=" => $results ) );
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
