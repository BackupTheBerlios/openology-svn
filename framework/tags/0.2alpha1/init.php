<?php
// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004 Openology Pte Ltd                                      |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// $Id$ 
/**
 * Initialise the framework, including defining paths, including libraries, 
 * setting up variables.
 * 
 * In most cases, you will not need to edit this file.
 * Any editables are be in config.php.
 *
 * @package openology 
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */

define('OOO_VERSION', '0.1alpha2');

// These path constants should be based off those defined in config.php.
define('OOO_CORE', OOO_ROOT.'/core');
define('OOO_LIB', OOO_ROOT.'/lib');
define('OOO_APP_THEMES', OOO_APP_ROOT.'/themes');
define('OOO_APP_CLASSES', OOO_APP_ROOT.'/include/classes');
define('OOO_APP_MODULES', OOO_APP_ROOT.'/include/modules');
define('OOO_APP_LIB', OOO_APP_ROOT.'/include/lib');
define('OOO_APP_CACHE', OOO_APP_ROOT.'/cache');
define('OOO_APP_WEB_THEMES', OOO_APP_WEB_ROOT.'/themes');
define('OOO_APP_WEB_JS', OOO_APP_WEB_ROOT.'/include/js');


session_start();
if (!session_is_registered('session_lang'))
{
    session_register('session_lang');
    $_SESSION['session_lang'] = '1';
}

if (isset($_GET['lang']))
{
    $_SESSION["session_lang"] = $_GET['lang'];
}

// configuration of db
if (OOO_USEDB) 
{
    include_once OOO_LIB.'/adodb/adodb.inc.php';
    $DB = &ADONewConnection(DB_TYPE);
    $result = $DB->Connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if(!$result)
    {
        echo 'Database error. Application stopped.';    
        // TODO: isolate message to language file    
        exit;
    }
	
	// get system configuration from db
    include_once OOO_CORE.'/SystemConfig.php';
    $systemconfig = new SystemConfig;
    $config['theme'] = $systemconfig->getThemesByDB($DB);
    $config['lang']  = $systemconfig->getLangByDB($DB, $_SESSION["session_lang"]);
    
	include_once OOO_CORE.'/Config.php';
    include_once(OOO_CORE.'/gui/SmartyUtil.php');
    
    $smartyutil = new SmartyUtil;
    $configobject = new Config($DB);
    $arr_data = $configobject->selectAllConfig();
    $arr_config = $smartyutil->toSmartyArray($arr_data, 'config_name', 'config_value');
}

// configuration of phpgacl
if (OOO_USEGACL)
{
    $gacl_options = array(
                          'debug' => FALSE,
                          'items_per_page' => 100,
                          'max_select_box_items' => 100,
                          'max_search_return_items' => 200,
                          'db_type' => DB_TYPE,
                          'db_host' => DB_SERVER,
                          'db_user' => DB_USERNAME,
                          'db_password' => DB_PASSWORD,
                          'db_name' => DB_NAME,
                          'db_table_prefix' => 'ooo_',
                          'caching' => FALSE,
                          'force_cache_expire' => TRUE,
                          'cache_dir' => '/tmp/phpgacl_cache',
                          'cache_expire_time' => 600
                         );
}

//config of smarty
include_once(OOO_LIB.'/smarty/libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->debugging = false;   

// note trailing / in dir name : Smarty syntax
$smarty->config_dir   = OOO_ROOT.'/lib/smarty/config/'; 
$smarty->template_dir = OOO_APP_THEMES.$config['theme']['dir'].'/templates/';
$smarty->compile_dir  = OOO_APP_CACHE.'/templates_c/';
$smarty->cache_dir    = OOO_APP_CACHE.'/cache/'; 

include_once OOO_APP_THEMES.$config['theme']['dir']
             .'/languages'.$config['lang']['dir'].'/data.php';
        
header('Content-type: text/html; charset=' . $conf['header']['charset'] . ';');

?>
