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
include_once OOO_APP_CLASSES.'/usergroup.php';
include_once OOO_CORE.'/form/Form.php';
include_once OOO_CORE.'/form/FormController.php';

include_once OOO_LIB.'/phpgacl/gacl.class.php';
include_once OOO_LIB.'/phpgacl/gacl_api.class.php';

$gacl_api = new gacl_api($gacl_options);
$usergroup = new usergroup($DB);

if ($op == 'deletegroup')
{
    $arr_id = $_POST['delete'];

    for ($i = 0; $i < count($arr_id); $i ++)
    {
        $usergroup->id = $arr_id[$i];
        $usergroup->deleteusergroup();

        $id = $gacl_api->get_group_id($group->id, $group->id, 'ARO');
        $gacl_api->del_group($id, true, 'ARO');
    }
}
else
{
    $usergroup->name = $_POST['name'];
    $usergroup->description = $_POST['description'];
   
    $aco_array = array ();
    $aco_array['system'] = array ();
    $aco_array['system'] = $_POST['permission'];

    if ($op == 'creategroup')
    {
        $usergroup->insertusergroup();
        $id = $usergroup->getInsert_ID();
        
        $group_id = $gacl_api->add_group($id, $id, 10, 'aro');
        
        
        $arr_group = array ();
        $arr_group[] = $group_id;
        $gacl_api->add_acl($aco_array, NULL, $arr_group, NULL, NULL, true, true, NULL, NULL);
    }
    else
    {
        $usergroup->id  = $_POST['group_id'];
        $usergroup->updateusergroup();
        $group_id = $gacl_api->get_group_id($usergroup->id, $usergroup->id, 'aro');
        $arr_group[]    = $group_id;
        $arr_acl        = $gacl_api->search_acl('system', false, false, false, $usergroup->id, false, false, false, false); 
//        print_r($arr_acl);
        if (count($arr_acl))
        {
            $gacl_api->edit_acl($arr_acl[0], $aco_array, NULL, $arr_group);
        }
        else
        {
            $gacl_api->add_acl($aco_array, NULL, $arr_group);
        }
    }

}
header("Location: index.php?op=grouplist");
?>
