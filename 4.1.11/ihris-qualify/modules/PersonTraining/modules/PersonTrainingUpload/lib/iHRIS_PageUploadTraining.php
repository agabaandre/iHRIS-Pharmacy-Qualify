<?php
/*
 * © Copyright 2013 IntraHealth International, Inc.
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
 * Edit training for a person
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2013 IntraHealth International, Inc. 
 * @since v4.1.6
 * @version v4.1.6
 */

/**
 * The page class for uploading trainings for a person
 * @package iHRIS
 * @subpackage Train
 * @access public
 */
class iHRIS_PageUploadTraining extends I2CE_PageFormCSV { 

    /**
     * @var array The list of trainings
     */
    protected $trainings;

    /**
     * Displa the save or confirm buttons as needed.
     *
     * @param boolean @save Flag to show the save button.
     * @param boolean $show_edit
     */
    protected function displayControls( $save = false, $show_edit = true ) {
        if ( $save ) {
            $this->template->addFile( 'button_training_save.html' );
        } else {
            $this->template->addFile( 'button_training_confirm.html' );
        }
    }


    /**
     * Validate the CSV for this page.
     */
    protected function validate() {
        // Just check the headers for now.
        if ( !$this->checked_validation ) {
            if ( !$this->processHeaderRow( 'trainings' ) ) {
                $this->userMessage("Unable to read headers from CSV file.");
                $this->invalid = true;
                return false;
            }
            $required_headers = array( 'Surname', 'Firstname', 'Registration Number', 'Training Course', 
                    'Training Provider', 'Training Location', 'Start Date', 
                    'End Date', 'CPD Credit' );
            $invalid_headers = array();
            foreach( $required_headers as $header ) {
                if ( !in_array( $header, $this->current['trainings']['header'] ) ) {
                    $invalid_headers[] = $header;
                }
            }
            if ( count( $invalid_headers ) > 0 ) {
                $this->userMessage( "There are missing headers from the CSV file: " . implode( ', ', $invalid_headers ) );
                $this->invalid = true;
                return false;
            }

            $this->checked_validation = true;
        }
        return true;
    }

    /**
     * Save the CSV for this page.
     */
    protected function save() {
        if ( parent::save() ) {
            $this->userMessage("The CSV file has been uploaded.");
        } else {
            $this->userMessage("An error occurred trying to upload your file.");
        }
        $this->setRedirect( "uploadtraining" );
    }

    /**
     * Validate the current row for the given key
     * @param string $key
     */
    protected function validateRow( $key ) {
        // Don't do any validations for now
        return true;
    }

    /**
     * Save the current row for the given key
     * @param string $key
     */
    protected function saveRow( $key ) {
        if ( !$this->current[$key]['row']['Firstname'] && !$this->current[$key]['row']['Surname'] ) {
            $this->userMessage("Unable to people without names.");
            return;
        }
        $person_id = false;
        if ( $this->current[$key]['row']['Registration Number'] ) {
            $find_reg = array( 
                    'operator' => 'FIELD_LIMIT',
                    'style' => 'lowerequals',
                    'field' => 'registration_number',
                    'data' => array( 'value' => $this->current[$key]['row']['Registration Number'] ),
                    );
            $reg_id = I2CE_FormStorage::search( "registration", false, $find_reg );
            if ( count( $reg_id ) > 1 ) {
                $this->userMessage("Found multiple matches for registration number: " .  $this->current[$key]['row']['Registration Number'] );
                return;
            } else {
                $reg_id = current( $reg_id );
            }
            if ( $reg_id ) {
                $reg = $this->factory->createContainer( "registration|$reg_id" );
                $reg->populate();
                $training_id = $reg->getParent();
                $training = $this->factory->createContainer( $training_id );
                $training->populate();
                $person_id = $training->getParent();
            }
        }
        if ( !$person_id ) {
            $find_pers = array( 
                    'operator' => 'AND',
                    'operand' => array(
                        0 => array(
                            'operator' => 'FIELD_LIMIT',
                            'style' => 'lowerequals',
                            'field' => 'firstname',
                            'data' => array( 'value' => $this->current[$key]['row']['Firstname'] ),
                            ),
                        1 => array(
                            'operator' => 'FIELD_LIMIT',
                            'style' => 'lowerequals',
                            'field' => 'surname',
                            'data' => array( 'value' => $this->current[$key]['row']['Surname'] ),
                            ),
                        ),
                    );
            $person_id = I2CE_FormStorage::search( "person", false, $find_pers );
            if ( count( $person_id ) > 1 ) {
                $this->userMessage("Found multiple matches for person " . $this->current[$key]['row']['Firstname'] . " " . $this->current[$key]['row']['Surname'] );
                return;
            } else {
                $person_id = current( $person_id );
            }
            if ( $person_id ) {
                $person_id = "person|" . $person_id;
            }
        }

        if ( !$person_id ) {
            $this->userMessage("Unable to find or add person " . $this->current[$key]['row']['Firstname'] . " " . $this->current[$key]['row']['Surname'] );
        } else {
            $person_training = $this->factory->createContainer( "person_training" );
            $person_training->getField('start_date')->setFromDB( $this->current[$key]['row']['Start Date'] );
            $person_training->getField('end_date')->setFromDB( $this->current[$key]['row']['End Date'] );
            $person_training->getField('training')->setFromDB( $this->current[$key]['row']['Training Course'] );
            $person_training->getField('provider')->setFromDB( $this->current[$key]['row']['Training Provider'] );
            $person_training->getField('location')->setFromDB( $this->current[$key]['row']['Training Location'] );
            $person_training->getField('cpd_credit')->setFromDB( $this->current[$key]['row']['CPD Credit'] );
            $person_training->setParent( $person_id );
            $person_training->validate();
            if ( $person_training->hasInvalid() ) {
                $this->userMessage("Unable to add continuing education for " . $this->current[$key]['row']['Firstname'] . " " . $this->current[$key]['row']['Surname'] . " because of invalid data." );
            } elseif ( !$person_training->save( $this->user ) ) {
                $this->userMessage("Unable to add continuing education for " . $this->current[$key]['row']['Firstname'] . " " . $this->current[$key]['row']['Surname'] );
                I2CE::raiseError( "Unale to save child form of person_training" );
                return false;
            }
            return true;
        }
        return true;
    }
    
}



# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
