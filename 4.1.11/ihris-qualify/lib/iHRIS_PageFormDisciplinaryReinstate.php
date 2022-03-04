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
 * Manage reinstating a license after a disciplinary action.
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
 * Page object to handle the reinstatement of a license after a disciplinary action.
 * 
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageFormDisciplinaryReinstate extends iHRIS_PageFormParentTraining {
        
    /**
     * Load the HTML template files for editing.
     */
    protected function loadHTMLTemplates() {
        I2CE_PageForm::loadHTMLTemplates();
        $this->template->appendFileById( "menu_view_tr_link.html", "li", "navBarUL", true );
        $this->template->appendFileById( "form_tr_reinstate.html", "tbody", "training_form" );
    }
    /**
     * Set the data to be displayed for the page.
     */
    protected function setDisplayData() {
        I2CE_PageForm::setDisplayData();
        $this->template->setDisplayData( "training_header", $this->getTitle() );
        $this->template->setDisplayData( "training_form", "disciplinary_reinstate" );
    }
    /**
     * Create and load data for the objects used for this form.
     */
    protected function loadObjects() {
        $loaded = false;
        if ( $this->isPost() ) {
            $obj = $this->factory->createContainer( "disciplinary_action" );
            $obj->load( $this->post );
            $this->parent_id = $obj->getParent();
        }
        $parent = $this->factory->createContainer( $this->parent_id );
        $parent->populate();
        $parent->populateChildren( "disciplinary_action" );
        foreach( $parent->children as $form => $list ) {
            if ( $form != "disciplinary_action" ) continue;
            foreach( $list as $obj ) {
                if ( $obj->suspend ) {
                    $this->id = $obj->getId();
                    $this->setObject( $obj );
                    $this->setObject( $parent, I2CE_PageForm::EDIT_PARENT );
                    $loaded = true;
                    break;
                }
            }
        }
        I2CE_PageForm::loadObjects();
        if ( $loaded && !$this->isPost() ) $this->getPrimary()->reinstate_date = I2CE_Date::now();
        if ( !$loaded ) {
            $this->setRedirect( "view_training?id=" . $parent->getId() );
        }
        /*
                if ( $this->factory->exists( $this->getForm() ) )
                        $this->setObject( $this->factory->createContainer( $this->getForm().'|'. $this->id ) );
                $parent = $this->factory->createContainer( "training".'|'. $this->parent_id );
                $parent->populate();
                $this->setObject( $parent, PageForm::EDIT_PARENT );
                parent::loadObjects();
        */
    }

    /**
     * Run extra validation to make sure the reinstatement date has been entered.
     */
    protected function validate() {
        $reinstate_date = $this->getPrimary()->getField( "reinstate_date" );
        if ( !$reinstate_date->isValid() ) {
            $reinstate_date->setInvalidMessage('required' );
        } else if ( $this->getPrimary()->reinstate_date->before( $this->getPrimary()->action_date ) ) {
            $reinstate_date->setInvalidMessage('bad_date');
        }
    }

    /**
     * Save the objects to the database.
     * 
     * Save the default object being edited and return to the view page.  If the action needs to be 
     * logged then the {@link log} method is also called.  Any pages overriding this default save method
     * will need to include any logging necessary.
     */
    protected function save() {
        $this->getPrimary()->suspend = false;
        parent::save();
        
        $parent = $this->getParent();
        $parent->populateLast( array( "license" => "end_date" ) );
        $license = current( $parent->children['license'] );
        if ( $license ) {
            $license->suspend = false;
            $license->save( $this->user );
        }
    }

}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
