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

include_once OOO_LIB.'/phpgacl/gacl.class.php';
include_once OOO_LIB.'/phpgacl/gacl_api.class.php';

if(isset($_POST['user']))
{
    $arr_newuser = $_POST['user'];
}
else
{
    $arr_newuser = 0;
}

$id = $_POST['aro_group_id'];

$gacl_api       = new gacl_api($gacl_options);
$arr_olduser    = $gacl_api->get_group_objects($id, 'aro'); //aro object value

if (count($arr_olduser) && is_array($arr_newuser))
{
    $arr_add = array_diff($arr_newuser, $arr_olduser['users']);
    $arr_del = array_diff($arr_olduser['users'], $arr_newuser);
    
    foreach ($arr_add as $value)
    {    
        $gacl_api->add_group_object($id, 'users', $value, 'aro');
    }

    foreach ($arr_del as $value)
    { 
        $gacl_api->del_group_object($id, 'users', $value, 'aro');
    }
}
elseif (count($arr_olduser)&& !is_array($arr_newuser))
{    
    $arr_del = $arr_olduser['users'];
    
    foreach ($arr_del as $value)
    { 
        $gacl_api->del_group_object($id, 'users', $value, 'aro');
    }
}
elseif (!count($arr_olduser) && is_array($arr_newuser))
{
    $arr_add = $arr_newuser;
    
    foreach ($arr_add as $value)
    {    
        $gacl_api->add_group_object($id, 'users', $value, 'aro');
    }
}

header("Location: index.php?op=grouplist");

?>
