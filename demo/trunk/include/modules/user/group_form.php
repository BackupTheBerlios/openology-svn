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

if ($op == 'editgroup')
{
    $group      = new usergroup($DB);
    $group->id   = $_GET['group_id'];
    $arr_group   = $group->selectusergroup();
    $smarty->assign("function_title",'Edit Group');
}
else
{
    $smarty->assign("function_title",'Add Group');
}

$arr_data = $gacl_api->get_objects('',1,'aco');
$arr_aco = array();
$arr_tmp = $arr_data['system'];

$arr_checked = array();
for($i=0;$i<count($arr_tmp);$i++)
{
    $obj_value              = $arr_tmp[$i];
    $obj_id                 = $gacl_api->get_object_id('system', $obj_value, 'aco');
    $arr_obj                = $gacl_api->get_object_data($obj_id, 'aco');    
    $arr_aco[$obj_value]    = $arr_obj[0][3];
    if ($op == 'editgroup')
    {
       $aro_group_id        = $gacl_api->get_group_id($group->id, $group->id, 'aco');
       $sqlString           = "SELECT a.id, a.allow, a.return_value FROM ooo_acl a LEFT JOIN ooo_aco_map ac ON ac.acl_id=a.id LEFT JOIN ooo_axo_map ax ON ax.acl_id=a.id LEFT JOIN ooo_aro_groups_map arg ON arg.acl_id=a.id LEFT JOIN ooo_aro_groups rg ON rg.id=arg.group_id LEFT JOIN ooo_axo_groups_map axg ON axg.acl_id=a.id WHERE a.enabled=1 AND (ac.section_value='system' AND ac.value='$obj_value') AND (rg.id = $aro_group_id) AND ((ax.section_value IS NULL AND ax.value IS NULL) AND axg.group_id IS NULL) ORDER BY (rg.rgt-rg.lft) ASC, a.updated_date DESC LIMIT 1";
       $rs = $DB->Execute($sqlString);
       if ($rs)
       {
           if (!$rs->EOF)
           {
               $arr_result = $rs->FetchRow();
               
               if ($arr_result['allow'] == 1)
               {
                   $arr_checked[] =  $obj_value;
               }
           }
       }
    }
}


$form = new Form('form1', 'index.php', 'post');

$text1 = & $form->addElement('text');
$text1->setAttribute('id', 'name');
$text1->setAttribute('label', 'Name');
$text1->setAttribute('value', $arr_group['name']);
$text1->addRule('required', 'client', 'Please input Name.');

$text2 = & $form->addElement('textarea');
$text2->setAttribute('id', 'description');
$text2->setAttribute('value', $arr_group['description']);

$text3 = & $form->addElement('checkbox');
$text3->setAttribute('id', 'permission');
$text3->setAttribute('name', 'permission[]');
$text3->setAttribute('checkboxes', $arr_aco);
$text3->setAttribute('checked', $arr_checked);

$button1 = & $form->addElement('reset');
$button1->setAttribute('id', 'resetbutton');
$button1->setAttribute('value', 'Reset');

$button2 = & $form->addElement('submit');
$button2->setAttribute('id', 'submitbutton');
$button2->setAttribute('value', 'Submit');

$button3 = & $form->addElement('backbutton');

$form_op = & $form->addElement('hidden');
$form_op->setAttribute('id', 'op');
$form_op->setAttribute('value', 'creategroup');
if ($op == 'editgroup')
{
    $form_op->setAttribute('value', 'updategroup');
    
    $hidden2 = & $form->addElement('hidden');
    $hidden2->setAttribute('id', 'group_id');    
    $hidden2->setAttribute('value', $arr_group['id']);
}
else
{
    $form_op->setAttribute('value', 'creategroup');
}


$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();

$smarty->assign("form",$arr_form);

$smarty->assign('current_tab', $op);
$smarty->assign('page_title', 'Users Admin');

$smarty->assign('maincontent', 'group_form.html');
$smarty->display($view);
?>
