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

include_once OOO_APP_CLASSES.'/user.php';
include_once OOO_APP_CLASSES.'/base_users.php';

include_once OOO_LIB.'/phpgacl/gacl.class.php';
include_once OOO_LIB.'/phpgacl/gacl_api.class.php';

$gacl_api = new gacl_api($gacl_options);
$base_user = new base_users($DB);
$user = new user($DB);

if ($op == 'deleteuser')
{
    $arr_id = $_POST['delete'];

    for ($i = 0; $i < count($arr_id); $i ++)
    {
        $user->id = $arr_id[$i];
        $user->deleteuser();

        $base_user->id = $user->id;
        $base_user->deletebase_users();

        $id = $gacl_api->get_object_id('users', $user->id, 'ARO');
        $gacl_api->del_object($id, 'ARO', true);
    }
}
else
{
    $base_user->username = $_POST['email'];
    $base_user->password = md5($_POST['password']);
    
    if ($op == 'createuser')
    {
        $base_user->insertbase_users();
        $id = $base_user->getInsert_ID();
    }
    elseif ($op == 'updateuser')
    {        
        $id = $_POST['user_id'];
        $base_user->id = $id;
        $base_user->updatebase_users();
    }
    else
    {
        $id = $_SESSION["session_User"];
        $base_user->id = $id;
        if ($_POST['password'] == '')
        {
            $base_user->updatebase_users();
        }
        else
        {
            $base_user->updatebase_usersbySelf();
        }
    }    

    $user->id = $id;
    $user->name = $_POST['name'];
    $user->did = $_POST['did'];
    $user->fax = $_POST['fax'];
    $user->email = $_POST['email'];
    $user->active = $_POST['active'];
    
    
    if ($op == 'createuser')
    {
        $check_value = $user->checkDuplicateEmail();
        if ($check_value)
        {
            header("Location: index.php?op=adduser&err=002");
            exit();
        }
        
        $user->insertuser();
        $gacl_api->add_object('users', $id, $id, 0, 0, 'ARO');
        
    }
    elseif ($op == 'updateuser')
    {        
        $check_value = $user->checkDuplicateEmail('edit');
        if ($check_value)
        {
            header("Location: index.php?op=edituser&id=$id&err=002");
            exit();
        }
        $user->updateuser(); 
    }      
    else
    {
        $check_value = $user->checkDuplicateEmail('edit');
        if ($check_value)
        {
            header("Location: index.php?op=account&id=$id&err=002");
            exit();
        }
        $user->updateuserbySelf(); 
        header("Location: index.php?op=account");
        exit();
    }
}

header("Location: index.php?op=userlist");
?>