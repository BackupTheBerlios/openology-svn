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

$form = new Form('login_form', 'index.php', 'post');
$form->setAttribute('id', 'login_form');

$text1 = & $form->addElement('text');
$text1->setAttribute('id', 'username');
$text1->setAttribute('tabindex', '1');
$text1->setAttribute('title', 'Enter your User name');
$text1->addRule('required', 'client', 'Please input username!');

$text5 = & $form->addElement('password');
$text5->setAttribute('id', 'password');
$text5->setAttribute('tabindex', '2');
$text5->setAttribute('title', 'Enter your Password');
$text5->addRule('required', 'client', 'Please input password!');
$text5->addRule('MD5', 'client', '');

$button1 = & $form->addElement('reset');
$button1->setAttribute('id', 'resetbutton');
$button1->setAttribute('value', 'Cancel');
$button1->setAttribute('title', 'Click to clear info');

$button2 = & $form->addElement('submit');
$button2->setAttribute('id', 'submitbutton');
$button2->setAttribute('value', '&nbsp; OK &nbsp; ');
$button2->setAttribute('tabindex', '3');
$button2->setAttribute('title', 'Click to Login');

$op = & $form->addElement('hidden');
$op->setAttribute('id', 'op');
$op->setAttribute('value', 'checklogin');

$op = & $form->addElement('hidden');
$op->setAttribute('id', 'md5password');


$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();

$smarty->assign("form", $arr_form);
$smarty->assign('OOO_APP_WEB_JS', OOO_APP_WEB_JS);
$smarty->assign('title', 'Demo Login');

$smarty->display($view);
?>
