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
 * View a privatefacility's record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * The page class for displaying the a privatefacility's record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageViewPrivateFacility extends I2CE_Page{ 
    protected $privatefacility;

    /**
     * Perform the main actions of the page.
     */
    protected function action() {
        parent::action();
        if (!$this->hasPermission("task(person_can_view)")) {
            $this->userMessage("You do not have permission to view this person");
            return false;
        }
        $this->template->addHeaderLink("view.js");
        $this->template->appendFileById( "menu_view.html", "li", "navBarUL", true );
        $this->template->appendFileById( "menu_view_privatefacility.html", "ul", "menuView" );
        $factory = I2CE_FormFactory::instance();
        if (!$this->request_exists('id')) {
            $this->userMessage("Invalid Private Health Unit Requested");
            return false;
        }
        if ($this->request_exists('id')) {
            $id = $this->request('id');
            if (strpos($id,'|')=== false) {
                I2CE::raiseError("Deprecated use of id variable");
                $id = 'privatefacility|' . $id;
            }
        } else {
            $id = 'privatefacility|0';
        }
        $privatefacility = $factory->createContainer( $id);
        if (!$privatefacility instanceof iHRIS_PrivateFacility) {
            return false;
        }

        $this->privatefacility = $privatefacility;
        $this->privatefacility->populate();
        $this->privatefacility->getField("supervisor")->setHref("view?id=");
        $this->template->setForm( $this->privatefacility );
        $child_forms = $this->privatefacility->getChildForms();
        foreach($child_forms as $form) {
            if (!$this->hasPermission("task(person_can_view_child_forms|person_can_view_child_form_{$form})")) {
                continue;
            }
            $method = 'action_' . $form;
            if ($this->_hasMethod($method)) {
                if (!$this->$method()) {
                    I2CE::raiseError("Could not do action for $form");
                }
            }
        }

        return true;
    }
    
    public function getFacility() {
        return $this->privatefacility;
    }

    public function hasChildForm($form, $populate = false) {
        if ($populate) {
            $this->privatefacility->populateChildren($form);
        }
        return (array_key_exists($form,$this->privatefacility->children) && is_array($this->privatefacility->children[$form]) && count($this->privatefacility->children[$form]) > 0);
    }

    public function addChildForms($form, $set_on_node = null , $template = false, $tag = 'div', $append_node = null) {
        $this->privatefacility->populateChildren($form);
        return $this->appendChildTemplate($form,$set_on_node,$template,$tag, $append_node );
    }


    public function addLastChildForm($form, $field,  $set_on_node = null,  $template = false, $tag = 'div', $append_node = null) {
        $this->privatefacility->populateLast(array($form=> $field));
        return $this->appendChildTemplate($form,$set_on_node,$template,$tag, $append_node );
    }




    public function appendChildTemplate($form,$set_on_node = null, $template = false, $tag = 'div', $appendNode = null) {
        if (!array_key_exists($form,$this->privatefacility->children) || !is_array($this->privatefacility->children[$form])) {
            return true;
        }
        if (!is_string($template)) {
            $template = 'view_' . $form . '.html';
        }
        if ($appendNode === null) {
            $appendNode = $form;
        }
        if (is_string($appendNode)) {
            $appendNode = $this->template->getElementById($appendNode);
        }        
        if (! $appendNode instanceof DOMNode) {
            I2CE::raiseError("Do not know where to add child form $form ");
            return false;
        }
        foreach ($this->privatefacility->children[$form] as $child) {
            I2CE_ModuleFactory::callHooks( 'pre_add_child_form_' . $form, 
                    array( 'form' => $child, 
                        'page' => $this, 'set_on_node' => $set_on_node, 
                        'append_node' => $appendNode ) );
            $node = $this->template->appendFileByNode($template, $tag,  $appendNode );
            if (!$node instanceof DOMNode) {
                I2CE::raiseError("Could not find template $template for child form $form of privatefacility");
                return false;
            }
            $this->template->setForm($child,$node);
            if ($set_on_node !== null) {
                $this->template->setForm($child,$set_on_node);
            }
            I2CE_ModuleFactory::callHooks( 'post_add_child_form_' . $form, 
                    array( 'form' => $child, 'node' => $node,
                        'page' => $this, 'set_on_node' => $set_on_node, 
                        'append_node' => $appendNode ) );
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
