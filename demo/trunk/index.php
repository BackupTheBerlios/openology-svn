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
     
include_once 'config.php';
include_once OOO_ROOT.'/init.php';
include_once OOO_CORE.'/Action.php';

$op = (isset($_POST['op']))? $_POST['op'] : $_GET['op'];

$action = new Action($op);
$model = $action->model;
$view = $action->view;

include_once OOO_APP_MODULES.'/checkpermission.php';

include_once $model;

 ?>