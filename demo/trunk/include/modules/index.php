<?php
// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004-2005 Openology.org Team                                |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// $Id:

include_once OOO_APP_MODULES.'/page.php';

$op = ($op == '')? 'default' : $op; 
$smarty->assign('current_tab', $op);
$smarty->assign('page_title', 'Data Entry');

$smarty->assign('maincontent', 'index.html');
$smarty->display($view);
?>
