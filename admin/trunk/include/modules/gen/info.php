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
* @Created on 2004-11-29 15:16:29
* @$Id:$ 
**/

include_once $config['lang']['dir'].'/gen/info.php';

$smarty->assign('MESSAGE', MESSAGE);
$smarty->assign('BACK', BACK);

$smarty->assign('maincontent', 'gen_info.html');
$smarty->display($view);
?>