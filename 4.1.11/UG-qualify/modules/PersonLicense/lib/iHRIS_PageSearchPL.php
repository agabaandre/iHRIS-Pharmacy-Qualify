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
 * Search for a person's record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since v2.0.0
 * @version v2.0.0
 */

/**
 * The page class for searching for a person's record.
 * @package iHRIS
 * @subpackage Qualify
 * @access public
 */
class iHRIS_PageSearchPL extends I2CE_Page {

    /**
     * @var I2CE_Form The search object for this page to display the form.
     */
    private $search;

    /**
     * Load the HTML template files for editing and confirming the index and demographic information.
     */
    protected function loadHTMLTemplates() {
        parent::loadHTMLTemplates();
        if ( $this->get_exists('do_search') ) {
            $this->template->addFile( "search_results.html" );
            $this->template->setDisplayData( "search_return", array("search_limit" => $this->search->limit) );
        } else {
            $this->search->setFormLists( $this->template );
            $this->template->setForm( $this->search );
            $this->template->setShowForm();
            $this->template->addFile( "search_form.html" );
        }
        $this->template->setAttribute( "class", "active", "menuSearch", "a[@href='search']" );
    }
        
    /**
     * Perform the main actions of the page.
     */
    protected function action() {
        $factory = I2CE_FormFactory::instance();
        if ( $this->get('redirect') ) {
            header("Location: " . $this->get('redirect') );
        }
        $this->search = $factory->createForm( "search" );
        $this->search->load( $_GET );
        parent::action();
        if ( $this->get_exists('do_search') ) {
            $andor = "AND";
            $search = array();
            if ( $this->get('do_search') == 'find' ) {
                if ( I2CE_Validate::checkString( $this->search->surname ) ) {
                    $search["person"][] = array( 'field' => 'surname', 'history' => true,
                                                 'values' => array( array( 'value' => '%' . strtolower( $this->search->surname ) . '%', 
                                                                           'method' => 'LIKE', 'lower' => true ) ) );
                }
                if ( I2CE_Validate::checkNumber( $this->search->index_number, 0 ) ) {
                    $search["training"][] = array( 'field' => 'index_num',
                                                   'values' => array( array( 'value' => $this->search->index_number ) ) );
                }
                if ( I2CE_Validate::checkNumber( $this->search->registration_number, 0 ) ) {
                    $search["registration"][] = array( 'field' => 'registration_number',
                                                       'values' => array( array( 'value' => $this->search->registration_number ) ),
                                                       'parent' => true );
                }
                if ( I2CE_Validate::checkNumber( $this->search->license_number, 0 ) ) {
                    $search["person_license"][] = array( 'field' => 'license_number',
                                                  'values' => array( array( 'value' => $this->search->license_number ) ),
                                                  );
                }
            }
            switch( $this->search->limit ) {
            case iHRIS_Search::LIMIT_IN_TRAINING :
                $search["training"][] = array( 'field' => 'graduation',
                                               'values' => array( array( 'method' => 'ISNULL' ) ) );
                $search["training_disrupt"][] = array( 'field' => 'resumption_date',
                                                'values' => array( array( 'method' => 'ISNULL' ) ),
                                                'parent' => true, 'not' => true );
                break;
            case iHRIS_Search::LIMIT_REGISTERED :
                $search["registration"][] = array( 'field' => 'registration_date',
                                                   'values' => array( array( 'value' => I2CE_Date::now()->dbFormat(), 'method' => '<=' ) ),
                                                   'parent' => true );
                break;
            case iHRIS_Search::LIMIT_LICENSED :
                $search["person_license"][] = array( "field" => 'end_date',
                                              'values' => array( array( 'value' => I2CE_Date::now()->dbFormat(), 'method' => '>=' ) ),
                                              );
                break;
            }
            $max_per_page = 100;
            if ( $this->get_exists('page') ) {
                $page = $this->get('page');
            } else {
                $page = 1;
            }
            $results = $factory->callStatic( "person", "search", array( $search, $andor, false, 
                array( (($page-1)*$max_per_page), $max_per_page ) ) );
            if ( array_key_exists( "count", $results ) ) {
                $result_count = $results["count"];
                unset( $results["count"] );
                $max_page = ceil( $result_count / $max_per_page );
                if ( $page < 1 || $page > $max_page ) {
                    $page = 1;
                }
            } else {
                $result_count = count($results);
            }
           
            if ( count( $results ) > 0 ) {
                $result_msg = $result_count . " records found.";
                if ( $result_count > count($results) ) {
                    $result_msg .= " " . count($results) . " displayed.";
                    $query = $this->search->getQueryFields();
                    $query['do_search'] = $this->get('do_search');
                    $this->template->appendElementById( "search_pager_display", "span", array(), "Go to page: ");
                    $this->makeJumper( "search", $page, $max_page, "search", $query );
                }
                $this->template->addText( '<div id="error">' . $result_msg . '</div>' );
                foreach( $results as $id => $name ) {
                    $this->template->appendFileById( "search_row.html", "li", "list" );
                    $this->template->setDisplayData( "id", array("id" => $id) );
                    $this->template->setDisplayData( "name", $name );
                }
            } else {
                $this->template->addText( '<div id="error">No results found.</div>' );
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
