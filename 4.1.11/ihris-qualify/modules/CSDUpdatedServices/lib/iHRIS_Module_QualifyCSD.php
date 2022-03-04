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
 *  iHRIS_Module_QualifyCSD
 * @package iHRIS
 * @subpackage Qualify
 * @author Carl Leitner <litlfred@ibibilio.org>
 * @version 4.2.0.9
 * @since 4.2.0
 * @access public
 */


class iHRIS_Module_QualifyCSD extends I2CE_Module {


    public function post_update( $old_vers, $new_vers ) {
        if ( I2CE_Validate::checkVersion( $old_vers, '<', '4.2.0.35' ) ) {
            if ( !$this->intialize_csd_cache_metadata()) {
                return false;
            }
        }
        if ( I2CE_Validate::checkVersion( $old_vers, '<', '4.2.0.35' ) ) {
            if ( !$this->intialize_csd_cache_metadata_health_facility()) {
                return false;
            }
        }
        return true;
    }



    public function intialize_csd_cache_metadata() {
        $lists = array('cadre','id_type'); 
        $csd_cache = 'csd_qualify_default';
	$csd_cache_obj = new iHRIS_CSDCache($csd_cache);
	$csd_cache_obj->clearCache();
        return iHRIS_CSDCache::intialize_csd_cache_metadata($csd_cache,$lists);
    }

    public function intialize_csd_cache_metadata_health_facility() {
        $lists = array('facility_type');
        $csd_cache = 'csd_health_facility_default';
        return iHRIS_CSDCache::intialize_csd_cache_metadata($csd_cache,$lists);
    }



}

# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
