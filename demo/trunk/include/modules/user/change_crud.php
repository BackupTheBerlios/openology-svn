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
  
$base_user              = new base_users($DB);
$base_user->change_id   = $_POST['id'];
$arr_data               = $base_user->selectbase_userbyChange_id();

if (count($arr_data))
{
    $second = time() - $arr_data['over_time'];
    
    if ($second <= 1800)
    {
        $base_user->id          = $arr_data['id'];
        $base_user->password    = md5($_POST['password']);
        $base_user->changePassword();
        $base_user->clearChange();
        header("Location: index.php?op=forgotresult&result=2");
        exit();
    }
    else
    {
        header("Location: index.php?op=forgotresult&result=3");
        exit();
    }
}
header("Location: index.php?op=forgotresult&result=4");        

?>