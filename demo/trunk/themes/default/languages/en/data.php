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
/**
 * Define language related data.
 * 
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 */

//$charset = 'utf-8';
$conf['header']['charset'] = 'utf-8';

$arr_statustype         = array(0=> 'inactive',1 => 'active');

$Err_Msg['002'] = 'The email has already been used.';

$arr_email['From']      = 'admin@openology.org';
$arr_email['FromName']  = 'admin';
$arr_email['Subject']   = 'Change Password';
$arr_email['body']      = "Please click this url {url} to change your password in half an hour.";

?>
