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

include_once OOO_APP_CLASSES.'/base_users.php';

$user_id = $_SESSION["session_User"];

$user = new base_users($DB);
$user->id = $user_id;
$arr_data = $user->selectbase_users();

$smarty->assign('login_username',   $arr_data['username']);
$smarty->assign('config_theme_dir', OOO_APP_WEB_THEMES.$config['theme']['dir']);
$smarty->assign('charset',          $conf['header']['charset']);
$smarty->assign('extra_html_head', $extra_html_head);
$smarty->assign('OOO_APP_WEB_JS',   OOO_APP_WEB_JS);
?>