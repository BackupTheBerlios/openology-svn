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

include_once OOO_LIB.'/phpmailer/class.phpmailer.php';
include_once OOO_APP_CLASSES.'/base_users.php';
include_once OOO_APP_CLASSES.'/user.php';

$email = $_POST['email'];

$base_user = new base_users($DB);
$base_user->username = $email;
$arr_data = $base_user->selectbase_userbyUsername();

if (!count($arr_data))
{
    header("Location: index.php?op=forgotresult&result=0");
    exit();
}

$user       = new user($DB);
$user->id   = $arr_data['id'];
$arr_user   = $user->selectuser();

$change_id = rand(100000, 999999);

$url = 'http://'.HTTP_SERVER.$_SERVER['REQUEST_URI'].'?op=changepassword&id='.$change_id;
$arr_email['body'] = str_replace('{url}', $url, $arr_email['body']);

$base_user->id        = $arr_data['id'];
$base_user->change_id = $change_id;
$base_user->over_time = time();
$base_user->setChange();

$mail = new PHPMailer();
$mail->From     = $arr_email['From'];
$mail->FromName = $arr_email['FromName'];
$mail->Subject  = $arr_email['Subject'];
$mail->Body     = $arr_email['body'] ;
$mail->AddAddress($email, $arr_user['name']);
$mail->Send();

header("Location: index.php?op=forgotresult&result=1");
?>