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
include_once OOO_APP_CLASSES.'/user.php';
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

$user       = new user($DB);
$arr_data   = $user->selectAlluser($arr_config['NUM_PAGE'], $curr_page);
$islast     = $user->isLastPage();
$lastpageno = $user->LastPageNo();

$arr_checkbox = array();
for ($i=0;$i<count($arr_data);$i++)
{
    $arr_checkbox[$arr_data[$i]['id']] = '';
    $arr_data[$i]['type'] = $arr_usertype[$arr_data[$i]['type']];
    $arr_data[$i]['active'] = $arr_statustype[$arr_data[$i]['active']];
}

$form = new Form('form1', 'index.php', 'post');

$checkbox1 = & $form->addElement('allcheckbox');

$checkbox2 = & $form->addElement('checkbox');
$checkbox2->setAttribute('id', 'delete');
$checkbox2->setAttribute('name', 'delete[]');
$checkbox2->setAttribute('checkboxes', $arr_checkbox);
$checkbox2->return_type = 'array';

$button1 = & $form->addElement('button');
$button1->setAttribute('id', 'newbutton');
$button1->setAttribute('value', 'New');
$button1->setAttribute('onclick',"javascript:window.location.href='index.php?op=adduser'");

$button2 = & $form->addElement('submit');
$button2->setAttribute('id', 'deletebutton');
$button2->setAttribute('value', 'Delete');
$button2->setAttribute('class', 'warn');

$button3 = & $form->addElement('backbutton');

$form_op = & $form->addElement('hidden');
$form_op->setAttribute('id', 'op');
$form_op->setAttribute('value', 'deleteuser');


$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();
//print_r($arr_form);

$smarty->assign("data",$arr_data);
$smarty->assign("form",$arr_form);


$container          = new ComponentContainer();

$pager              = & $container->addElement('pager');
$pager->id          = 'pager';
$pager->uri         = &$uri;
$pager->current_page= $curr_page;
$pager->total_pages = $lastpageno;

$controller         = new ComponentController($container);
$arr_component      = $controller->toTemplate();
//print_r($arr_component);
$smarty->assign("component", $arr_component);

$smarty->assign('OOO_APP_WEB_JS', OOO_APP_WEB_JS);

$smarty->assign('current_tab', $op);
$smarty->assign('page_title', 'Users Admin');

$smarty->assign('maincontent', 'user_list.html');
$smarty->display($view);
?>
