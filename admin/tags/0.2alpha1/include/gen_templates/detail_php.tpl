<?php
/**
* @Project : 
* @package 
* @copyright (C) 2004 Openology Pte Ltd
* @link http://www.openology.com/
* @author Andy.Ma  <andy.ma@openology.com>
* @Created on 
* @$Id:$ 
**/

include_once OOO_APP_MODULES.'/page.php';
include_once OOO_APP_CLASSES.'/<{$class_name}>.php';
include_once OOO_CORE.'/form/Form.php';
include_once OOO_CORE.'/form/FormController.php';
                
$<{$table_name}> = new <{$class_name}>($DB);
$<{$table_name}>->id   = $_GET['<{$table_name}>_id'];
$arr_<{$table_name}>   = $<{$table_name}>->select();

$form = new Form('form1', 'index.php', 'post');
$button3 = & $form->addElement('backbutton');

$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();

$smarty->assign("form",$arr_form);
$smarty->assign("data",$arr_<{$table_name}>);

$smarty->assign('maincontent', '<{$table_name}>_detail.html');
$smarty->display($view);
?>
