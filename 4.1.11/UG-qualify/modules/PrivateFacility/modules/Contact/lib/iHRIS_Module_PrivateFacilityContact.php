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
* @package iHRIS
* @subpackage Common
* @author Carl Leitner <litlfred@ibiblio.org>
* @version v3.2
* @since v3.2
* @filesource
*/
/**
* Class iHRIS_Module_PersonContact
*
* @access public
*/


class iHRIS_Module_PersonContact extends I2CE_Module {

    public static function getMethods() {
        return array(
            'iHRIS_PageView->action_person_contact_work' => 'action_person_contact_work',
            'iHRIS_PageView->action_person_contact_personal' => 'action_person_contact_personal',
            'iHRIS_PageView->action_person_contact_other' => 'action_person_contact_other',
            'iHRIS_PageView->action_person_contact_emergency' => 'action_person_contact_emergency'
            );
    }


    protected static $contacts = array("personal","work","emergency","other"); 

    /**
     * Return the array of hooks available in this module.
     * @return array
     */
    public static function getHooks() {
        $hooks = array();
        foreach ( self::$contacts as $type ) {
            $hooks["validate_form_person_contact_${type}_field_email"] = "validate_form_contact_field_email";
        }
        return $hooks;
    }

    /**
     * Validate the email field for contact forms.
     * @param I2CE_FormField $formfield
     */
    public function validate_form_contact_field_email( $formfield ) {
        $value = $formfield->getValue();
        if ( I2CE_Validate::checkString( $value ) 
                && !I2CE_Validate::checkEmail( $value ) ) {
            $formfield->setInvalid( "Please enter a valid email address." );
        } 
    }

    /**
     * Upgrades the modules
     * @param string $old_vers
     * @param string $new_vers
     * @returns boolean
     */
    public function upgrade($old_vers,$new_vers) {
        if (I2CE_Validate::checkVersion($old_vers,'<','3.2.6') || I2CE_Validate::checkVersion($old_vers,'=','3.2.10')) {
            if (!$this->updateContacts()) {
                return false;
            }
        }
        return true;
    }

    public function post_update($old_vers,$new_vers) {        
        if (I2CE_Validate::checkVersion($old_vers,'=','0')) { 
            //this module is new to 3.2, we may need to update contacts from 3.1
            //only fixup contact on a new installation
            if (!$this->updateContacts()) {
                return false;
            }
        }
        return true;
    }

    protected function updateContacts() {
        foreach (self::$contacts as $contact) {
            I2CE::raiseError("Changing contact child form of type $contact  of person to person_contact_$contact");
            if (! iHRIS_Module_Contact::changeContactForm('person', "contact_type|$contact","person_contact_$contact",true,false)) {
                I2CE::raiseError("Could not upgrade training funder contacts");
                return false;
            }
        }
        iHRIS_Module_Contact::removeContactForm('person');
        return true;
    }







    public function action_person_contact_work($page) {
        return $this->action_contact($page, 'work');
    }
    public function action_person_contact_personal($page) {
        return $this->action_contact($page, 'personal');
    }
    public function action_person_contact_emergency($page) {
        return $this->action_contact($page, 'emergency');
    }
    public function action_person_contact_other($page) {
        return $this->action_contact($page, 'other');
    }

    

    protected function action_contact($page,$contact) {
        if (!$page instanceof iHRIS_PageView) {
            return false;
        }
        $person = $page->getPerson();
        if (!$person instanceof iHRIS_Person) {
            return false;
        }
        $page->addChildForms('person_contact_' . $contact);
        $template = $page->getTemplate();
        $contactObjs = $person->getChildren('person_contact_' . $contact);
        if (count($contactObjs) == 1) {
            return true;
        }  else if (count($contactObjs) > 1) {
            I2CE::raiseError("Too many contacts of type " . $contact . " for " . $person->getId());
            return false;
        } else if ($page->hasPermission("task(person_can_edit_child_form_person_contact_$contact)")) {
            $template->appendFileById("add_person_contact_" . $contact . ".html", 'span','contact_links');
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
