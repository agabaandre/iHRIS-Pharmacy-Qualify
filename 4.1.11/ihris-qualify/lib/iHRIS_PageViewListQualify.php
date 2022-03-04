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
 * View the details for then given record that is an instance of a I2CE_List.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * The page class for displaying a I2CE_List record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageViewListQualify extends iHRIS_PageViewList {

        
    /**
     * Perform the main actions of the page.
     */
    protected function action() {
        parent::action();
        $factory = I2CE_FormFactory::instance();

        if ( $this->type == "health_facility" ) {

            $where_data = array(
                    'operator' => 'FIELD_LIMIT',
                    'field' => 'health_facility',
                    'style' => 'equals',
                    'data' => array(
                        'value' => $this->list->getNameId()
                        )
                    );
            $institutions = I2CE_FormStorage::search( 'facility_institution', 
                    false, $where_data );

            //$institutions = iHRIS_FacilityInstitution::search( "health_facility", $this->id );
            foreach( $institutions as $id ) {
                $obj = $factory->createContainer( "facility_institution|" . $id );
                $obj->populate();
                if ( $obj->active == 1 ) {
                    $node = $this->template->appendFileById( "view_list_hf_ti.html", "span", "training_institution" );
                    $obj->getField( "training_institution" )->setHref( "view_list?type=training_institution&id=" );
                    $this->template->setForm( $obj, $node );
                }
            }

        } elseif ( $this->type == "training_institution" ) {

            $where_data = array(
                    'operator' => 'FIELD_LIMIT',
                    'field' => 'training_institution',
                    'style' => 'equals',
                    'data' => array(
                        'value' => $this->list->getNameId()
                        )
                    );
            $facilities = I2CE_FormStorage::search( 'facility_institution', 
                    false, $where_data, array("health_facility") );

                                                       
            //$facilities = iHRIS_FacilityInstitution::search( "training_institution", $this->id );
            foreach( $facilities as $id ) {
                $obj = $factory->createContainer( "facility_institution|" . $id );
                $obj->populate();
                if ( $obj->active == 1 ) {
                    $node = $this->template->appendFileById( "view_list_ti_hf.html", "span", "health_facility" );
                    $obj->getField( "health_facility" )->setHref( "view_list?type=health_facility&id=" );
                    $this->template->setForm( $obj, $node );
                }
            }
            $where_data = array(
                    'operator' => 'FIELD_LIMIT',
                    'field' => 'training_institution',
                    'style' => 'equals',
                    'data' => array(
                        'value' => $this->list->getNameId()
                        )
                    );
            $programs = I2CE_FormStorage::search( 'training_program', 
                    false, $where_data );
                                                       
            foreach( $programs as $id ) {
                $obj = $factory->createContainer( "training_program|" . $id );
                $obj->populate();
                $node = $this->template->appendFileById( "view_list_training_program.html", "div", "training_program" );
                $this->template->setForm( $obj, $node );
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
