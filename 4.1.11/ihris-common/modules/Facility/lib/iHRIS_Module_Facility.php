<?php 
/**
 * © Copyright 2008, 2009 IntraHealth International, Inc.
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
 */
/**
 *  I2CE_Module_Facility
 * @package iHRIS
 * @subpackage Common
 * @author Luke Duncan <lduncan@intrahealth.org>
 * @version 3.2.3
 * @since 3.2.3
 * @access public
 */


class iHRIS_Module_Facility extends I2CE_Module {

    /**
     * Run the pre upgrade for this module.  This can use the old config data before it
     * has been changed from the config.
     * @param string $old_vers
     * @param string $new_vers
     * @param I2CE_MagicDataNode $new_storage
     * @return boolean
     */
    public function pre_upgrade( $old_vers, $new_vers, $new_storage ) {
        if ( I2CE_Validate::checkVersion( $old_vers, '<', '3.2.3' ) ) {
            /**
             * In 3.2.3 some lists were moved to magicdata storage so we need to save
             * any old record ids for the old lists for later reference before any field
             * types get changed in magic data.
             */
            $migrate_path = "/I2CE/formsData/migrate_data/3.2.3";
            I2CE_FormStorage::storeMigrateData( array( "facility" => 
                        array( "facility_type", "country", "district", "county" ) ), 
                    $migrate_path );
        }   
        return parent::pre_upgrade( $old_vers, $new_vers, $new_storage );
    }   


    /**
     * Upgrade this module if necessary
     * @param string $old_vers
     * @param string $new_vers
     * @return boolean
     */
    public function upgrade( $old_vers, $new_vers ) {
        /*
         * In 3.2.3 we moved some lists from entry to magicdata storage so we need to get the
         * old data from entry and save them to the new form storage.
         */
        if ( I2CE_Validate::checkVersion( $old_vers, '<', '3.2.3' ) ) {
            $user = new I2CE_User( 1, false, false, false );
            $class_config = I2CE::getConfig()->modules->forms->formClasses;
            $migrate_path = "/I2CE/formsData/migrate_data/3.2.3";

            if ( !I2CE_FormStorage::migrateForm( "facility_type", "entry", $user, $migrate_path, 
                        false, array( "type" ) ) ) {
                return false;
            }

            if ( I2CE_FormStorage::migrateForm( "facility", "entry", $user, $migrate_path,
                        false, array( "type" ), 
                        array( "facility_type" => "facility_type",
                            "location" => array( "county" => "county", 
                                "district" => "district", "country" => "country" ) ) ) ) {
                unset( $class_config->iHRIS_Facility->fields->country );
                unset( $class_config->iHRIS_Facility->fields->district );
                unset( $class_config->iHRIS_Facility->fields->county );
                unset( $class_config->iHRIS_Facility->fields->type );
            } else {
                return false;
            }

        } elseif ( I2CE_Validate::checkVersion( $old_vers, '<', '3.2.4' ) ) {
            $user = new I2CE_User( 1, false, false, false );
            $class_config = I2CE::getConfig()->modules->forms->formClasses;
            $migrate_path = "/I2CE/formsData/migrate_data/3.2.3";

            if ( !I2CE_FormStorage::migrateForm( "facility", "entry", $user, $migrate_path, false, array( "type" ) ) ) {
                return false;
            }
            unset( $class_config->iHRIS_Facility->fields->type );

        }
        return parent::upgrade( $old_vers, $new_vers );
    }


}

# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
