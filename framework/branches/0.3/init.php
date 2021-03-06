<?php
// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004-05 Openology.org Team                                |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// $Id: init.php 551 2005-05-04 04:27:25Z ken $ 
/**
 * Initialise the framework, including defining paths, including libraries, 
 * setting up variables.
 * 
 * In most cases, you will not need to edit this file.
 * Any editables are be in config.php.
 *
 * @package openology 
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */

define('OOO_VERSION', '0.3alpha1');

// Set some sensible defaults
if (!defined(OOO_DEBUG)) define('OOO_DEBUG', false);
if (!defined(OOO_ROOT))  define('OOO_ROOT', 
                                str_replace( '\\', '/', dirname( __FILE__ )));

// These path constants should be based off those defined in config.php.
// Framework file system paths
define('OOO_CORE', OOO_ROOT.'/core');
define('OOO_LIB',  OOO_ROOT.'/lib');

// Application file system paths
define('OOO_APP_CACHE',   OOO_APP_ROOT.'/cache');
define('OOO_APP_CLASSES', OOO_APP_ROOT.'/include/classes');
define('OOO_APP_LIB',     OOO_APP_ROOT.'/include/lib');
define('OOO_APP_MODULES', OOO_APP_ROOT.'/include/modules');
define('OOO_APP_THEMES',  OOO_APP_ROOT.'/themes');

// Application web server paths
define('OOO_APP_WEB_JS',     OOO_APP_WEB_ROOT.'/include/js');
define('OOO_APP_WEB_THEMES', OOO_APP_WEB_ROOT.'/themes');

$op = (isset($_POST['op']))? $_POST['op'] : $_GET['op'];

session_name('OOOSESSID');
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

// Database initialisation
if (OOO_USEDB) 
{
    include_once OOO_LIB.'/adodb/adodb.inc.php';
    $DB = &ADONewConnection(DB_TYPE);
    $result = $DB->Connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if(!$result)
    {
        echo 'Initialise: Cannot connect to database. Check database configuration. Application stopped.';    
        // TODO: isolate message to language file    
        exit;
    }
    
    $DB->debug = (OOO_DEBUG)? true : false;
	
	// get system configuration from db
    include_once OOO_CORE.'/SystemConfig.php';
    $systemconfig = new SystemConfig;
    $config['theme'] = $systemconfig->getThemesByDB($DB);
    $config['lang']  = $systemconfig->getLangByDB($DB, $_SESSION["session_lang"]);
    
	include_once OOO_CORE.'/Config.php';
    include_once OOO_CORE.'/gui/SmartyUtil.php';
    
    $smartyutil   = new SmartyUtil;
    $configobject = new Config($DB);
    $arr_data   = $configobject->selectAllConfig();
    $arr_config = $smartyutil->toSmartyArray($arr_data, 'config_value', 'config_name');
}

// configuration of phpgacl
if (OOO_USEGACL)
{
    $gacl_options = array(
                          'items_per_page'          => 100,
                          'max_select_box_items'    => 100,
                          'max_search_return_items' => 200,
                          'db_type'                 => DB_TYPE,
                          'db_host'                 => DB_SERVER,
                          'db_user'                 => DB_USERNAME,
                          'db_password'             => DB_PASSWORD,
                          'db_name'                 => DB_NAME,
                          'db_table_prefix'         => 'ooo_',
                          'caching'                 => FALSE,
                          'force_cache_expire'      => TRUE,
                          'cache_dir'               => '/tmp/phpgacl_cache',
                          'cache_expire_time'       => 600
                         );
    $gacl_options['debug'] = (OOO_DEBUG)? true : false;                     
}

// Language data file
include_once OOO_APP_THEMES.$config['theme']['dir']
             .'/languages'.$config['lang']['dir'].'/data.php';            

// URI manager
include_once OOO_CORE.'/Uri.php';
$uri = new Uri();

// Set document content type
header('Content-type: text/html; charset=' . $conf['header']['charset'] . ';');

?>
