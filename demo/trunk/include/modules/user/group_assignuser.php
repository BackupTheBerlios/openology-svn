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
include_once OOO_APP_CLASSES.'/user.php';
include_once OOO_CORE.'/form/Form.php';
include_once OOO_CORE.'/form/FormController.php';
include_once OOO_CORE.'/gui/SmartyUtil.php';
include_once OOO_LIB.'/phpgacl/gacl.class.php';
include_once OOO_LIB.'/phpgacl/gacl_api.class.php';

$group_id = $_GET['id'];   //group_id

$gacl_api   = new gacl_api($gacl_options);
$id         = $gacl_api->get_group_id($group_id, $group_id, 'ARO');  //aro group_id
$arr_user   = $gacl_api->get_group_objects($id, 'aro'); //aro object value

$group = new usergroup($DB);

if (is_array($arr_user))
{
    if (count($arr_user))
    {
        $arr_in  = $group->selectInUser($arr_user['users'], 1);
        $arr_out = $group->selectInUser($arr_user['users'], 0);
    }
    else
    {
        $user = new user($DB);
        $arr_out = $user->selectAlluser(1000,1);
    }
}



$smartyutil = new SmartyUtil;
$arr_newin  = $smartyutil->toSmartyArray($arr_in, 'name', 'id');
$arr_newout = $smartyutil->toSmartyArray($arr_out, 'name', 'id');


$form = new Form('form1', 'index.php', 'post');
$form->addRule('select_all(document.form1.select2);');

$select1 = & $form->addElement('select');
$select1->setAttribute('id', 'select1');
$select1->setAttribute('name', 'newuser[]');
$select1->setAttribute('option', $arr_newout);
$select1->setAttribute('extra', 'multiple');

$select2 = & $form->addElement('select');
$select2->setAttribute('id', 'select2');
$select2->setAttribute('name', 'user[]');
$select2->setAttribute('option', $arr_newin);
$select2->setAttribute('extra', 'multiple');

$allleft = & $form->addElement('button');
$allleft->setAttribute('id', 'button1');
$allleft->setAttribute('value', '   ALL&gt;&gt;   ');
$allleft->setAttribute('onclick', "moveAll(this.form.elements['newuser[]'], this.form.elements['user[]'])");

$left = & $form->addElement('button');
$left->setAttribute('id', 'button2');
$left->setAttribute('value', '   &gt;&gt;   ');
$left->setAttribute('onclick', "moveSelected(this.form.elements['newuser[]'], this.form.elements['user[]'])");

$right = & $form->addElement('button');
$right->setAttribute('id', 'button3');
$right->setAttribute('value', '   &lt;&lt;   ');
$right->setAttribute('onclick', "moveSelected(this.form.elements['user[]'], this.form.elements['newuser[]'])");

$allright = & $form->addElement('button');
$allright->setAttribute('id', 'button4');
$allright->setAttribute('value', '   ALL&lt;&lt;   ');
$allright->setAttribute('onclick', "moveAll(this.form.elements['user[]'], this.form.elements['newuser[]'])");

$button2 = & $form->addElement('submit');
$button2->setAttribute('id', 'submitbutton');
$button2->setAttribute('value', 'Submit');

$button3 = & $form->addElement('backbutton');

$op = & $form->addElement('hidden');
$op->setAttribute('id', 'op');
$op->setAttribute('value', 'groupassign');

$op = & $form->addElement('hidden');
$op->setAttribute('id', 'aro_group_id');
$op->setAttribute('value', $id);

$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();

$smarty->assign("form",$arr_form);

$smarty->assign('OOO_APP_WEB_JS', OOO_APP_WEB_JS);

$smarty->assign('current_tab', $op);
$smarty->assign('page_title', 'Users Admin');

$smarty->assign('maincontent', 'group_assignuser.html');
$smarty->display($view);

?>
