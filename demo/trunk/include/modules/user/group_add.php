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
                            
$gacl_api = new gacl_api($gacl_options);

$arr_data = $gacl_api->get_objects('',1,'aco');

$arr_aco = array();
$arr_tmp = $arr_data['system'];
for($i=0;$i<count($arr_tmp);$i++)
{
    $arr_aco[$arr_tmp[$i]] = $arr_tmp[$i];
   
}

//print_r($arr_aco);

$form = new Form('form1', 'index.php', 'post');

$text1 = & $form->addElement('text');
$text1->setAttribute('id', 'name');

$text2 = & $form->addElement('textarea');
$text2->setAttribute('id', 'description');

$text3 = & $form->addElement('checkbox');
$text3->setAttribute('id', 'permission');
$text3->setAttribute('name', 'permission[]');
$text3->setAttribute('checkboxes', $arr_aco);
$text3->setAttribute('checked', '');

$button1 = & $form->addElement('reset');
$button1->setAttribute('id', 'resetbutton');
$button1->setAttribute('value', 'Reset');

$button2 = & $form->addElement('submit');
$button2->setAttribute('id', 'submitbutton');
$button2->setAttribute('value', 'Submit');

$button3 = & $form->addElement('backbutton');

$op = & $form->addElement('hidden');
$op->setAttribute('id', 'op');
$op->setAttribute('value', 'creategroup');


$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();

//print_r($arr_form);

$smarty->assign("form",$arr_form);

$smarty->assign('current_tab', $op);
$smarty->assign('page_title', 'Users Admin');

$smarty->assign('maincontent', 'group_add.html');
$smarty->display($view);
?>
