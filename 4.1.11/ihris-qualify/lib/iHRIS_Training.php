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
 * @package iHRIS
 * @subpackage Qualify
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v1.0.0
 * @version v2.0.0
 */
/**
 * Object for dealing with trainings for people.
 * 
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_Training extends I2CE_Form {

    /**
     * Populate the member variables of the object from the database.
     */
    public function populate() {
        parent::populate();
        if ( $this->trained_outside ) {
            $this->out_cadre = $this->cadre;
        } else {
            $this->in_cadre = $this->cadre;
            $where_data = array(
                    'operator' => 'AND',
                    'operand' => array(
                        array( 
                            'operator' => 'FIELD_LIMIT',
                            'field' => 'training_institution',
                            'style' => 'equals',
                            'data' => array(
                                'value' => 
                                $this->getField("training_institution")->getDBValue()
                                )
                            ),
                        array(
                            'operator' => 'FIELD_LIMIT',
                            'field' => 'cadre',
                            'style' => 'equals',
                            'data' => array(
                                'value' =>
                                $this->getField("in_cadre")->getDBValue()
                                )
                            ),
                        )
                    );
            $training_program = I2CE_FormStorage::search( 'training_program',
                    false, $where_data );
            if ( count($training_program) > 0 ) {
                $this->getField("training_program")->setFromDB( "training_program|" . $training_program[0] );
            }
        }
    }
    
    /**
     * Save the training object.
     * 
     * Sets all the required fields for the training object based on the form data.
     * Since a training may be inside or outside the country certain fields may be required
     * depending on which case it is.
     * 
     * @param I2CE_User &$user The user saving this object.
     * @param boolean $transact
     */
    public function save( &$user, $transact=true ) {
        if ( I2CE_Validate::checkMap( $this->training_program ) ) {
            $tp = I2CE_FormFactory::instance()->createContainer( $this->getField("training_program")->getDBValue() );
            $tp->populate();
            $this->in_cadre = $tp->cadre;
            $this->training_institution = $tp->training_institution;
            $this->trained_outside = false;
            $this->cadre = $this->in_cadre;
            unset( $this->out_country );
            unset( $this->out_institution );
        } else {
            $this->trained_outside = true;
            $this->cadre = $this->out_cadre;
            unset( $this->training_institution );
        }
        parent::save( $user, $transact );
    }
}

# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
