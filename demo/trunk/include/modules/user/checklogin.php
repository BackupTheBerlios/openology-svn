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

$base_user = new base_users($DB);
$base_user->username = $_POST['username'];
$base_user->password = $_POST['md5password'];

$arr_result = $base_user->checkLogin();
if($arr_result != 0)
{ 
    $ID = $arr_result['id'];
    session_register("session_User");
    $_SESSION["session_User"] = $ID;    
}

header("Location: index.php");

?>
