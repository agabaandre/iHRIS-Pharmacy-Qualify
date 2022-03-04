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
 * Handles the action of linking Training Programs to Training Institutions
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v3.3.16
 */

/**
 * The page class for displaying the form to link training programs with
 * training institutions.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageFormTrainingProgram extends I2CE_PageForm {

    /**
     * @var integer The id being edited by this page.
     */
    protected $id;

    /**
     * Construct this page
     * @param array $args
     * @param array $request_remainder
     */
    public function __construct( $args, $request_remainder ) {
        parent::__construct( $args, $request_remainder );
        $this->id = 0;
        if ( $this->request_exists( "id" ) ) {
            $this->id = $this->request( "id" );
        }
    }
        
    /**
     * Create and load any necessary objects for this form.
     */
    protected function loadObjects() {
        if ( $this->id != '0' ) {
            $obj = $this->factory->createContainer( $this->id );
        } else {
            $obj = $this->factory->createContainer( "training_program" );
        }
        if ( $this->get_exists( 'training_institution' ) ) {
            $obj->getField("training_institution")->setFromDB( $this->get('training_institution') );
        }
        $this->setObject( $obj );
        parent::loadObjects();
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
            $this->template->addFile( "button_confirm_training_program.html" );     
        }
    }
        
    /**
     * Save the objects to the database.
     * 
     * This method overrides the default save because the object used to edit on this page needs
     * to be converted to multiple FacilityInstitution objects.
     */
    protected function save() {
        parent::save();
        $factory = I2CE_FormFactory::instance();
        $this->redirect( "view_list?type=training_institution&id=" . $this->getPrimary()->getField("training_institution")->getDBValue() );
    }
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
