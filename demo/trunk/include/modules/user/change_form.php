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
include_once OOO_CORE.'/form/Form.php';
include_once OOO_CORE.'/form/FormController.php';

$id = $_GET['id'];

$form = new Form('form1', 'index.php', 'post');
$form->setAttribute('id', 'login_form');

$group = & $form->addElement('group');
$group->setAttribute('id', 'group1');
$arr_data = array ('==', 'document.form1.password.value', 'document.form1.confirmpassword.value');
$group->addRule('compare', 'client', 'The passwords you input are not the same.', $arr_data);

$text5 = & $group->addElement('password');
$text5->setAttribute('id', 'password');
$text5->setAttribute('label', 'Password');
$text5->addRule('required', 'client', 'Please input password.');

$arr_data = array ('min', '6');
$text5->addRule('range', 'client', 'The min length of password is 6.', $arr_data);

$text6 = & $group->addElement('password');
$text6->setAttribute('id', 'confirmpassword');
$text6->setAttribute('label', 'Confirm Password');

$button1 = & $form->addElement('reset');
$button1->setAttribute('id', 'resetbutton');
$button1->setAttribute('value', 'Cancel');

$button2 = & $form->addElement('submit');
$button2->setAttribute('id', 'submitbutton');
$button2->setAttribute('value', '&nbsp; OK &nbsp; ');
$button2->setAttribute('tabindex', '3');

$form_op = & $form->addElement('hidden');
$form_op->setAttribute('id', 'op');
$form_op->setAttribute('value', 'savepassword');

$hidden1 = & $form->addElement('hidden');
$hidden1->setAttribute('id', 'id');
$hidden1->setAttribute('value', $id);

$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();

$smarty->assign("form", $arr_form);

$smarty->assign('OOO_APP_WEB_JS', OOO_APP_WEB_JS);

$smarty->display('change_form.html');
?>