<?php
/**
 * @Project : Openology Framework
 * @package frontend
 * @copyright (C) 2004 Openology Pte Ltd
 * @link http://www.openology.org/
 * @author Andy Ma  <andy.ma@openology.org>
 * @Created on 2004-12-30 17:36:40
 * @$Id: group_list.php 518 2005-03-17 06:45:17Z ken $ 
 **/

include_once OOO_APP_MODULES.'/page.php';
include_once OOO_APP_CLASSES.'/usergroup.php';
include_once OOO_CORE.'/form/Form.php';
include_once OOO_CORE.'/form/FormController.php';

$group = new usergroup($DB);
$arr_data = $group->selectAllusergroup();

$arr_checkbox = array();
for ($i=0;$i<count($arr_data);$i++)
{
    $arr_checkbox[$arr_data[$i]['id']] = '';
}

$form = new Form('form1', 'index.php', 'post');

$checkbox1 = & $form->addElement('allcheckbox');

$checkbox2 = & $form->addElement('checkbox');
$checkbox2->setAttribute('id', 'delete');
$checkbox2->setAttribute('name', 'delete[]');
//$arr_checkbox = array(1=>'', 2=>'');
$checkbox2->setAttribute('checkboxes', $arr_checkbox);
$checkbox2->return_type = 'array';

$button1 = & $form->addElement('button');
$button1->setAttribute('id', 'newbutton');
$button1->setAttribute('value', 'New');
$button1->setAttribute('onclick',"javascript:window.location.href='index.php?op=addgroup'");

$button2 = & $form->addElement('submit');
$button2->setAttribute('id', 'deletebutton');
$button2->setAttribute('value', 'Delete');
$button2->setAttribute('class', 'warn');

$button3 = & $form->addElement('backbutton');

$op = & $form->addElement('hidden');
$op->setAttribute('id', 'op');
$op->setAttribute('value', 'deletegroup');


$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();
//print_r($arr_form);


$smarty->assign("data",$arr_data);
$smarty->assign("form",$arr_form);


$smarty->assign('OOO_APP_WEB_JS', OOO_APP_WEB_JS);

$smarty->assign('current_tab', $op);
$smarty->assign('page_title', 'Users Admin');

$smarty->assign('maincontent', 'group_list.html');
$smarty->display($view);
?>
