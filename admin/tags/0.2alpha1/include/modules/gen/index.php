<?php
/**
* @Project : Openology FrameWork
* @package admin/gen
* @copyright (C) 2004 Openology Pte Ltd
* @All  rights reserved
* @link http://www.openology.com/
* @link http://www.openology.org/
* @author Ken.Chew <Ken.Chew@openology.com>
* @author Andy.Ma  <andy.ma@openology.com>
* @Created on 2004-11-26 11:43:56
* @$Id:$ 
**/

include_once OOO_APP_THEMES.$config['theme']['dir']
             .'/languages'.$config['lang']['dir'].'/gen/index.php';

$smarty->assign('INPUT_TITLE', INPUT_TITLE);
$smarty->assign('DB_TYPE', DB_TYPE);
$smarty->assign('HOST_NAME', HOST_NAME);
$smarty->assign('USERNAME', USERNAME);
$smarty->assign('PASSWORD', PASSWORD);
$smarty->assign('DB_NAME', DB_NAME);

$smarty->assign('maincontent', 'genindex.html');
$smarty->display($view);
?>