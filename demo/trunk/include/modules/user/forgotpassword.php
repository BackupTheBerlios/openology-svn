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
$text1->setAttribute('id', 'email');
$text1->setAttribute('tabindex', '1');
$text1->setAttribute('title', 'Enter your email');
$text1->setAttribute('label', 'Email');
$text1->addRule('required', 'client', 'Please input email!');
$text1->addRule('email', 'client', 'Please input Correct Email.');

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
$op->setAttribute('value', 'sendpassword');

$op = & $form->addElement('hidden');
$op->setAttribute('id', 'md5password');


$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();

$smarty->assign("form", $arr_form);

$smarty->assign('OOO_APP_WEB_JS', OOO_APP_WEB_JS);

$smarty->display('forgotpassword.html');
?>