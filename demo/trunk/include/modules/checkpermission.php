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

include_once OOO_LIB.'/phpgacl/gacl.class.php';
include_once OOO_LIB.'/phpgacl/gacl_api.class.php';

if($action->module != '')
{
    if(!session_is_registered('session_User'))
    {
        $change_op = 'login';
    }
    else
    {
        if($action->module != 'login')
        {
            $gacl_api = new gacl_api($gacl_options);
            $ID = $_SESSION['session_User'];
            $result = $gacl_api->acl_check('system', $action->module, 'users', $ID);
            
            if(!$result)
            {
                $extra_html_head = '<script type="text/javascript">alert("You do not have the permission, please contact Administrator")</script>';
                $change_op = 'default';
            }            
        }
    }  
    
    if($change_op != '')
    {
        $op             = $change_op;
        $change_action  = new Action($op);
        $model          = $change_action->model;
        $view           = $change_action->view;
    }
}
?>
