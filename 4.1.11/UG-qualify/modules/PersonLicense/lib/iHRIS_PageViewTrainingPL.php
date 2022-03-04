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
 * View a person's training record for a cadre.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * The page class for displaying the a person's training record for a cadre.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageViewTrainingPL extends I2CE_Page {
        
    /**
     * Perform the main actions of the page.
     */
    protected function action() {
        parent::action();
        $this->template->addHeaderLink("view.js");
                
        $this->template->appendFileById( "menu_view.html", "li", "navBarUL", true );
        $this->template->appendFileById( "menu_view_training.html", "ul", "menuView" );
                
        $factory = I2CE_FormFactory::instance();
        $training = $factory->createContainer( "training|". $this->get('id') );
        $training->populate();
        $person = $factory->createContainer( $training->getParent() );
        $person->populate();
                
        $training->populateChildren( array( "training_disrupt", "exam", "registration", 
                                            "private_practice", "continuing_education" ) );
                
                
        //$training->setDisplayData( $this->template );
        $this->template->setForm( $training );
        $this->template->setForm( $person );
                
        $has_disrupt = false;
        $has_suspension = false;
        $all_resume = true;
        if ( count( $training->children ) > 0 ) {
            foreach( $training->children as $form => $list ) {
                foreach( $list as $obj ) {
                    $node = $this->template->appendFileById( "view_tr_" . $form . ".html", "div", $form );
                    if ( $form == "registration" || $form == "exam" ) {
                        // There's only one registration and other template nodes want access to it.
                        $this->template->setForm( $obj );
                    } else {
                        $this->template->setForm( $obj, $node );
                    }
                    if ( $form == "training_disrupt" ) {
                        $has_disrupt = true;
                        if ( !I2CE_Validate::checkDate( $obj->resumption_date ) ) {
                            $all_resume = false;
                        }
                    }
                }
            }
        }
                
        if ( $has_disrupt && !$all_resume ) {
            $this->template->appendFileById( "view_tr_resume_link.html", "span", "training_links" );
        } elseif ( ( $has_disrupt ? $all_resume : true ) && !I2CE_Validate::checkDate( $training->graduation ) ) {
            $this->template->appendFileById( "view_tr_disrupt_link.html", "span", "training_links" );
        }
        if ( !array_key_exists( "exam", $training->children ) ) {
            $this->template->addFile( "view_tr_exam_link.html", "tbody" );
        }
        if ( !array_key_exists( "registration", $training->children ) && I2CE_Validate::checkDate( $training->graduation ) ) {
            $this->template->appendFileById( "view_tr_registration_link.html", "span", "registration_links" );
        }

    }
        
}


# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
