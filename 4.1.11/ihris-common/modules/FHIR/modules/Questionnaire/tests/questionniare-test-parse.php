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
 * The page wrangler
 * 
 * This page loads the main HTML template for the home page of the site.
 * @package iHRIS
 * @subpackage DemoManage
 * @access public
 * @author Carl Leitner <litlfred@ibiblio.org>
 * @copyright Copyright &copy; 2007, 2008 IntraHealth International, Inc. 
 * @since Demo-v2.a
 * @version Demo-v2.a
 */


$i2ce_site_user_access_init = null;
require_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.values.php');

$local_config = dirname(__FILE__) . DIRECTORY_SEPARATOR .
'local' . DIRECTORY_SEPARATOR . 'config.values.php';
if (file_exists($local_config)) {
    require_once($local_config);
}

if(!isset($i2ce_site_i2ce_path) || !is_dir($i2ce_site_i2ce_path)) {
    echo "Please set the \$i2ce_site_i2ce_path in $local_config";
    exit(55);
}

require_once ($i2ce_site_i2ce_path . DIRECTORY_SEPARATOR . 'I2CE_config.inc.php');
@I2CE::initializeDSN($i2ce_site_dsn,   $i2ce_site_user_access_init,    $i2ce_site_module_config);         


unset($i2ce_site_user_access_init);
unset($i2ce_site_dsn);
unset($i2ce_site_i2ce_path);
unset($i2ce_site_module_config);

$flow_uuids = array('74b73680-ace3-4010-a96f-05d6f0138881','ef188a2d-fc8d-4aa2-ac5c-6f2d04dff431','bad');
$q = new I2CE_FHIR_Questionnaire();
$qr = new I2CE_FHIR_QuestionnaireResponse();

foreach ($flow_uuids as $flow_uuid ) {
    echo "===================================================================\n\n\n\nDOING       $flow_uuid\n\n\===================================================================\n";
    $url = "http://localhost:3001/fhir/DSTU2/Questionnaire/$flow_uuid";
    $q->load_resource($url);

    $url = "http://localhost:3001/fhir/DSTU2/QuestionnaireResponse/_search?questionnaire=$flow_uuid";
    $qr->load_resource($url);
}

# Local Variables:
# mode: php
# c-default-style: "bsd"
# indent-tabs-mode: nil
# c-basic-offset: 4
# End:
