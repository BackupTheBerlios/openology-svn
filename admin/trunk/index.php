<?php
// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004 Openology Pte Ltd                                      |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// Created on 2004-12-13 16:23:45
// $Id:$ 
     
/**
 * Common file operations
 *
 * @package Openology
 * @subpackage core.io
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (C) 2004 Openology Pte Ltd
 */

if(!file_exists('config.php'))
{
    header('Location: install/index.php');
    exit;
}

include_once 'config.php';
include_once OOO_ROOT.'/init.php';
include_once OOO_CORE.'/Action.php';

if(isset($_POST['op']))
{
    $op = $_POST['op'];
}
elseif(isset($_GET['op']))
{
    $op = $_GET['op'];
}
else
{
    $op = 'default';
}

$action = new Action($op);
$model = $action->model;
$view = $action->view;

include_once $model;

?>