<?php
// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004-2005 Openology Pte Ltd                                 |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// $Id: config.php 214 2005-01-19 03:32:49Z ken $ 
/**
 * Configuration settings 
 *
 * Settings requiring attention and editing should be here.
 *
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
 
// Define path info
// This setup assumes the application folder is under the framework folder.
// You need to change this if the framework is in a different location.

// Define the application root (this folder).
// You probably do not need to change this.
// The str_replace() changes back-slashes (\) on windows system to slashes(/)
define('OOO_APP_ROOT', str_replace( '\\', '/', dirname( __FILE__ )));

// Define the framework root.
//
define('OOO_ROOT', realpath(OOO_APP_ROOT.'/..'));
// Same level as the application index.php:
// define('OOO_ROOT', OOO_APP_ROOT);
// In a totally different location: 
// define('OOO_ROOT', '/full/path/to/framework/folder');

// Define the path as viewed from the web browser. 
// Use '' for server root, other wise start with /
define('OOO_WEB_ROOT', '');

// Assuming application folder is under server root and no URL rewrite rules.
define('OOO_APP_WEB_ROOT', OOO_WEB_ROOT.'/'.basename(OOO_APP_ROOT));
// Application is same level as server root:
// define('OOO_APP_WEB_ROOT', OOO_WEB_ROOT);
// Application is in some other server path:
// define('OOO_APP_WEB_ROOT', '/full/path/to/application/folder');

// define const of db
// Application that need to use database set it to true
define('OOO_USEDB', false);
if (OOO_USEDB) 
{
    define('DB_SERVER', 'localhost');
    define('DB_TYPE', 'mysql');
    define('DB_USERNAME', '');
    define('DB_PASSWORD', '');
    define('DB_NAME', '');    
}

// Application that need to use phpgacl set it to true
define('OOO_USEGACL', false);

// define some default values
// these are not full path but just the folder names (with leading /)
$config['theme']['dir'] = '/default';
$config['lang']['dir'] = '/en';
$config['header']['charset'] = 'utf-8';

?>
