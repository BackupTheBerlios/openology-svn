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

$result = $_GET['result'];

if ($result == 1)
{
    $result_message = 'A mail has been send to you.';
}
elseif ($result == 0)
{
    $result_message = 'The email address you input does not exist.';
}
elseif ($result == 2)
{
    $result_message = 'Password has been changed.';
}
elseif ($result == 3)
{
    $result_message = 'Error.';
}
elseif ($result == 4)
{
    $result_message = 'Error.';
}

$smarty->assign("result_message", $result_message);

$smarty->assign('OOO_APP_WEB_JS', OOO_APP_WEB_JS);

$smarty->display('forgotresult.html');
?>