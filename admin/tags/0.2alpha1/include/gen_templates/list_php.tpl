<?php
/**
 * @Project : 
 * @package 
 * @copyright (C) 2004 Openology Pte Ltd
 * @link http://www.openology.com/
 * @author Andy Ma  <andy.ma@openology.com>
 * @Created on 
 * @$Id: $ 
 **/

include_once OOO_APP_MODULES.'/page.php';
include_once OOO_APP_CLASSES.'/<{$class_name}>.php';
include_once OOO_CORE.'/form/Form.php';
include_once OOO_CORE.'/form/FormController.php';
include_once OOO_CORE.'/components/ComponentContainer.php';
include_once OOO_CORE.'/components/ComponentController.php';

if (isset ($_GET['p']))
{
    $curr_page = $_GET['p'];
}
else
{
    $curr_page = 1;
}

$<{$table_name}> = new <{$class_name}>($DB);
$arr_<{$table_name}> = $<{$table_name}>->selectPage();
$islast     = $<{$table_name}>->isLastPage();
$lastpageno = $<{$table_name}>->getLastPageNo();

$arr_checkbox = array();
for ($i=0;$i<count($arr_data);$i++)
{
    $arr_checkbox[$arr_<{$table_name}>[$i]['id']] = '';    
}

$form = new Form('form1', 'index.php', 'post');

$checkbox1 = & $form->addElement('allcheckbox');

$checkbox2 = & $form->addElement('checkbox');
$checkbox2->setAttribute('id', 'delete');
$checkbox2->setAttribute('name', 'delete[]');
$checkbox2->setAttribute('checkboxes', $arr_checkbox);
$checkbox2->return_type = 'array';
$checkbox2->addRule('checkboxrequired');

$button1 = & $form->addElement('button');
$button1->setAttribute('id', 'newbutton');
$button1->setAttribute('value', 'New');
$button1->setAttribute('onclick',"javascript:window.location.href='index.php?op=add<{$table_name}>'");

$button2 = & $form->addElement('submit');
$button2->setAttribute('id', 'deletebutton');
$button2->setAttribute('value', 'Delete');
$button2->setAttribute('class', 'warn');

$button3 = & $form->addElement('backbutton');

$form_op = & $form->addElement('hidden');
$form_op->setAttribute('id', 'op');
$form_op->setAttribute('value', 'delete<{$table_name}>');


$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();

$smarty->assign("data",$arr_<{$table_name}>);
$smarty->assign("form",$arr_form);

$container          = new ComponentContainer();

$pager              = & $container->addElement('pager');
$pager->id          = 'pager';
$pager->uri         = &$uri;
$pager->current_page= $curr_page;
$pager->total_pages = $lastpageno;

$controller         = new ComponentController($container);
$arr_component      = $controller->toTemplate();
$smarty->assign("component", $arr_component);

$smarty->assign('OOO_APP_WEB_JS', OOO_APP_WEB_JS);
$smarty->assign('maincontent', '<{$table_name}>_list.html');
$smarty->display($view);
?>