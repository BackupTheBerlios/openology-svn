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

if (isset($_GET['err']))
{
    $err_msg = $Err_Msg[$_GET['err']];
    $smarty->assign("display_err", 'true');
    $smarty->assign("err_msg", $err_msg);
}

if ($op == 'edituser')
{
    $user       = new user($DB);
    $user->id   = $_GET['id'];
    $arr_data   = $user->selectuser();    
    $smarty->assign("function_title",'Edit User');
}
elseif ($op == 'adduser')
{
    $smarty->assign("function_title",'Add User');
}
else
{
    $user       = new user($DB);
    $user->id   = $_SESSION["session_User"];
    $arr_data   = $user->selectuser();    
    $smarty->assign("function_title",'Edit Account');
}

$form = new Form('form1', 'index.php', 'post');

$text1 = & $form->addElement('text');
$text1->setAttribute('id', 'name');
$text1->setAttribute('value', $arr_data['name']);
$text1->addRule('required', 'client', 'Please input Name.');


$text2 = & $form->addElement('text');
$text2->setAttribute('id', 'did');
$text2->setAttribute('value', $arr_data['did']);
$text2->addRule('required', 'client', 'Please input DID.');

$text3 = & $form->addElement('text');
$text3->setAttribute('id', 'fax');
$text3->setAttribute('value', $arr_data['fax']);
$text3->addRule('required', 'client', 'Please input Fax.');

$text4 = & $form->addElement('text');
$text4->setAttribute('id', 'email');
$text4->setAttribute('value', $arr_data['email']);
$text4->addRule('email', 'client', 'Please input Correct Email.');

if ($op != 'edituser')
{
    $group = & $form->addElement('group');
    $group->setAttribute('id', 'group1');
    $arr_tmp = array('==','document.form1.password.value','document.form1.confirmpassword.value');
    $group->addRule('compare', 'client', 'The passwords you input are not the same.', $arr_tmp);

    $text5 = & $group->addElement('password');
    $text5->setAttribute('id', 'password');  
    if ($op == 'adduser')
    {  
        $text5->addRule('required', 'client', 'Please input password.');
    }        
    $text5->addRule('MD5', 'client', '');
    $arr_tmp = array('min', '6');
    $text5->addRule('range', 'client', 'The min length of password is 6.', $arr_tmp);
    
    
    
    $text6 = & $group->addElement('password');
    $text6->setAttribute('id', 'confirmpassword');
}

if ($op != 'account')
{
    $radio2 = & $form->addElement('radio');
    $radio2->setAttribute('id', 'active');
    $radio2->setAttribute('radios', $arr_statustype);
    if ($op == 'edituser')
    {
        $radio2->setAttribute('checked', $arr_data['status']);
    }
    else
    {
        $radio2->setAttribute('checked', 1);
    }
}

$button1 = & $form->addElement('reset');
$button1->setAttribute('id', 'resetbutton');
$button1->setAttribute('value', 'Reset');

$button2 = & $form->addElement('submit');
$button2->setAttribute('id', 'submitbutton');
$button2->setAttribute('value', 'Submit');

$button3 = & $form->addElement('backbutton');

$form_op = & $form->addElement('hidden');
$form_op->setAttribute('id', 'op');
if ($op == 'adduser')
{
    $form_op->setAttribute('value', 'createuser');
}
elseif ($op == 'edituser')
{
    $form_op->setAttribute('value', 'updateuser');
}
else
{
    $form_op->setAttribute('value', 'updateaccount');
}

if ($op == 'adduser' || $op == 'account')
{
    $hidden1 = & $form->addElement('hidden');
    $hidden1->setAttribute('id', 'md5password');
}
elseif ($op == 'edituser')
{
    $hidden2 = & $form->addElement('hidden');
    $hidden2->setAttribute('id', 'user_id');    
    $hidden2->setAttribute('value', $arr_data['id']);
}

$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();

//print_r($arr_form);

$smarty->assign("form",$arr_form);

$smarty->assign("op_value",$op);
$smarty->assign('current_tab', $op);
$smarty->assign('page_title', 'Users Admin');
$smarty->assign('OOO_APP_WEB_JS', OOO_APP_WEB_JS);

$smarty->assign('maincontent', 'user_form.html');
$smarty->display($view);
?>
