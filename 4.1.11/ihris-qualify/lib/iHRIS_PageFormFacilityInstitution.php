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
 * Handles the action of linking health facilities with training institutions.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * The page class for displaying the form to link health facilities with
 * training institutions.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageFormFacilityInstitution extends I2CE_PageForm {
        
    /**
     * Perform the main actions of the page.
     */
    protected function action() {
        if ( $this->get_exists( 'health_facility' ) || 
                $this->post('is_health_facility') == "1" ) {
            $edit_form = $this->factory->createContainer( "facility_institution_edit_fac" );

            if ( $this->get_exists( 'health_facility' ) ) {
                $edit_form->getField("health_facility")->setFromDB( $this->get('health_facility') );
                $current = $this->search( "health_facility",
                        $edit_form->getField("health_facility")->getDBValue() );
                $selected = array();
                foreach( $current as $id => $obj ) {
                    if ( $obj->active == 1 ) {
                        $selected[] = $obj->getField("training_institution")->getDBValue();
                    }
                }
                $edit_form->getField( "training_institution" )->setFromDB( 
                        implode( ",", $selected ) );
            }
            $this->setObject( $edit_form );
                        
        } elseif ( $this->get_exists( 'training_institution' ) || 
                $this->post('is_training_institution') == "1" ) {
            $edit_form = $this->factory->createContainer( "facility_institution_edit_inst" );
            if ( $this->get_exists( 'training_institution' ) ) {
                $edit_form->getField("training_institution")->setFromDB( $this->get('training_institution') );
                $current = $this->search( "training_institution",
                        $edit_form->getField("training_institution")->getDBValue() );
                $selected = array();
                foreach( $current as $id => $obj ) {
                    if ( $obj->active == 1 ) {
                        $selected[] = $obj->getField("health_facility")->getDBValue();
                    }
                }
                $edit_form->getField( "health_facility" )->setFromDB( 
                        implode( ",", $selected ) );
            }
            $this->setObject( $edit_form );
                        
        }

        parent::action();
        if ( $edit_form->getName() == "facility_institution_edit_fac" ) {
            $this->template->addFile( "facility_institution_hf.html", "tbody" );
            $this->template->setDisplayData( "add_fac_inst", array("type"=>'health_facility','id' => $edit_form->getField("health_facility")->getDBValue() ));
            $this->template->setDisplayData( "facility_institution_header", "Associate Training Institutions with: " . $edit_form->getField( "health_facility" )->getDisplayValue() );
        } elseif ( $edit_form->getName() == "facility_institution_edit_inst" ) {
            $this->template->addFile( "facility_institution_ti.html", "tbody" );
            $this->template->setDisplayData( "add_fac_inst", array("type"=>"training_institution", "id" =>$edit_form->getField("training_institution")->getDBValue()) );
            $this->template->setDisplayData( "facility_institution_header", "Associate Health Facilities with: " . $edit_form->getField( "training_institution" )->getDisplayValue() );
        }

    }

    /**
     * Search the database for the matching facilities or institutions.
     * @param string $field
     * @param string $value
     * @return array
     */
    protected function search( $field, $value ) {
        $where_data = array(
                'operator' => 'FIELD_LIMIT',
                'field' => $field,
                'style' => 'equals',
                'data' => array(
                    'value' => $value
                    )
                );
        $found = I2CE_FormStorage::search( 
                "facility_institution", false, $where_data );
        $matches = array();
        foreach( $found as $id ) {
            $matches["facility_institution|" . $id] =
                $this->factory->createContainer( "facility_institution|" . $id );
            $matches["facility_institution|" . $id]->populate();
        }
        return $matches;
    }
        
    /**
     * Display the save or confirm button templates as needed.
     * @param boolean $save Flag to show the save button.
     * @param boolean $show_edit (defaults to true)
     */
    protected function displayControls( $save = false, $show_edit = true ) {
        if ( $save ) {
            $this->template->addFile( "button_save.html" );
        } else {
            $this->template->addFile( "button_confirm_fac_inst.html" );     
        }
    }
        
    /**
     * Save the objects to the database.
     * 
     * This method overrides the default save because the object used to edit on this page needs
     * to be converted to multiple FacilityInstitution objects.
     */
    protected function save() {
        if ( $this->getPrimary()->getName() == "facility_institution_edit_fac" ) {
            $current = $this->search( "health_facility", 
                    $this->getPrimary()->getField("health_facility")->getDBValue() );
            $by_ti = array();
            foreach( $current as $fi => $obj ) {
                $by_ti[ $obj->getField("training_institution")->getDBValue() ] = $obj;
            }
            $insts = $this->getPrimary()->getField("training_institution")->getDBValue();
            foreach( explode( ",", $insts ) as $ti ) {
                if ( array_key_exists( $ti, $by_ti ) ) {
                    $obj = $by_ti[$ti];
                    if ( $obj->active == 0 ) {
                        $obj->active = 1;
                        $obj->save( $this->user );
                    }
                    unset( $by_ti[$ti] );
                } else {
                    $obj = $this->factory->createContainer( "facility_institution" );
                    $obj->getField("health_facility")->setFromDB( 
                            $this->getPrimary()->getField( "health_facility" )->getDBValue() 
                            );
                    $obj->getField("training_institution")->setFromDB( $ti );
                    $obj->active = 1;
                    $obj->save( $this->user );
                }
            }
            foreach( $by_ti as $ti => $obj ) {
                $obj->active = 0;
                $obj->save( $this->user );
            }
            $this->redirect( "view_list?type=health_facility&id=" 
                    . $this->getPrimary()->getField("health_facility")->getDBValue() );
        } elseif ( $this->getPrimary()->getName() == "facility_institution_edit_inst" ) {
            $current = $this->search( "training_institution",
                    $this->getPrimary()->getField("training_institution")->getDBValue() );
            $by_hf = array();
            foreach( $current as $fi => $obj ) {
                $by_hf[ $obj->getField("health_facility")->getDBValue() ] = $obj;
            }
            $facs = $this->getPrimary()->getField("health_facility")->getDBValue();
            foreach( explode( ",", $facs ) as $hf ) {
                if ( array_key_exists( $hf, $by_hf ) ) {
                    $obj = $by_hf[$hf];
                    if ( $obj->active == 0 ) {
                        $obj->active = 1;
                        $obj->save( $this->user );
                    }
                    unset( $by_hf[$hf] );
                } else {
                    $obj = $this->factory->createContainer( "facility_institution" );
                    $obj->getField("training_institution")->setFromDB(
                           $this->getPrimary()->getField( "training_institution" )->getDBValue()
                           );
                    $obj->getField("health_facility")->setFromDB( $hf );
                    $obj->active = 1;
                    $obj->save( $this->user );
                }
            }
            foreach( $by_hf as $hf => $obj ) {
                $obj->active = 0;
                $obj->save( $this->user );
            }
            $this->redirect( "view_list?type=training_institution&id=" 
                    . $this->getPrimary()->getField("training_institution")->getDBValue() );
        }
    }
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
