<?php
/**
 * @copyright © 2008, 2009 Intrahealth International, Inc.
 * This File is part of I2CE
 *
 * I2CE is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by
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
*  I2CE_Page_SwissConfig
* @package I2CE
* @subpackage Core
* @author Carl Leitner <litlfred@ibiblio.org>
* @version 2.1
* @access public
*/


class I2CE_Page_SwissConfig extends I2CE_Page {
  

    protected $factory;
    protected $module;
    protected $swiss_path;

    public function __construct($args,$request_remainder) {
        parent::__construct($args,$request_remainder);
        $this->factory = null;
        if (count($request_remainder) > 0) {
            $this->module = array_shift($request_remainder);
            $this->swiss_path = '/' . implode('/', $request_remainder);
            try {
                $this->factory = new I2CE_SwissConfigFactory($this,array('module'=>$this->module));
            } catch (Exception $e) {
                I2CE::raiseError("Could not get swiss factory for $this->module:\n" . $e->getMessage());
                return;
            }
            try {
                $this->factory->setRootSwiss();
            } catch (Expection $e) {
                $this->factory = null;
            }
        } else {
            $this->module = false;
            $this->swiss_path  = false;
            $this->factory = null;
        }
    }


    protected function action() {
        parent::action();
        if ($this->factory instanceof I2CE_SwissConfigFactory) {
            $action = $this->page();
            if ($action == 'update') {
                $action = 'edit';
                if ($this->isPost()) {
                    return $this->factory->updateValues($this->post());
                }            
            }
            return $this->factory->displayValues( $this->template->getElementById('siteContent'),$this->swiss_path,$action);
        } else { 
            return $this->displayModules($this->template->getElementById('siteContent'));
        }
    }


    protected function displayModules($contentNode) {
        if (!$contentNode instanceof DOMNode) {
            I2CE::raiseError("Nowhere to display content");
            return false;
        }
        $mod_factory = I2CE_ModuleFactory::instance();
        $modules = $mod_factory->getAvailable();
        foreach ($modules as $module) {
            if (!$mod_factory->isInitialized($module)) {
                continue;
            }
            if (!$mod_factory->hasConfigData($module)) {
                continue;
            }
            $contentNode->appendChild(
                $this->template->createElement(
                    'a',
                    array('href' => $this->module() . '/edit/' . $module),
                    'Edit ' . $module));
            $contentNode->appendChild(
                $this->template->createElement(
                    'a',
                    array('href' => $this->module() . '/view/' . $module),
                    'view ' . $module));
            $contentNode->appendChild($this->template->createElement('br'));
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
