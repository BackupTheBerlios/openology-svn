<?php
/**
* @Project : Openology FrameWork
* @package admin/gen
* @copyright (C) 2004 Openology Pte Ltd
* @All  rights reserved
* @link http://www.openology.com/
* @link http://www.openology.org/
* @author Ken.Chew <Ken.Chew@openology.com>
* @author Andy.Ma  <andy.ma@openology.com>
* @Created on 2004-11-26 11:43:56
* @$Id:$ 
**/

include_once OOO_APP_CLASSES."/gen/DBinfo.php";
include_once OOO_APP_CLASSES."/gen/Generator.php";
include_once OOO_APP_THEMES.$config['theme']['dir']
             .'/languages'.$config['lang']['dir'].'/gen/main.php';

session_register("session_dbtype");
session_register("session_dbhostname");
session_register("session_dbusername");
session_register("session_dbpassword");
session_register("session_dbname");
$_SESSION["session_dbtype"]     = $_POST["dbtype"];
$_SESSION["session_dbhostname"] = $_POST["dbhostname"];
$_SESSION["session_dbusername"] = $_POST["dbusername"];
$_SESSION["session_dbpassword"] = $_POST["dbpassword"];
$_SESSION["session_dbname"]     = $_POST["dbname"];

$DB = &ADONewConnection($_SESSION["session_dbtype"]);
$result = $DB->Connect($_SESSION["session_dbhostname"], $_SESSION["session_dbusername"], $_SESSION["session_dbpassword"], $_SESSION["session_dbname"]);
if(!$result)
{
    echo "can not connect db";
    exit;
}

$dbinfo = new DBinfo($DB);
$arr_table = $dbinfo->getAllTables();

for ($i=0;$i< count($arr_table);$i++)
{    
    $arr_data[$i] = $dbinfo->getField($arr_table[$i]);
   
//    $generator->arr_field = $dbinfo->getField($arr_table[$i]);
//    $generator->table_name = $arr_table[$i]; 
//    $generator->class_name = strtolower($arr_table[$i]); 
//    $generator->createTableDir();  
//    $generator->genClass();
//    $generator->genGetValueofForm();
}

$smarty->assign('table', $arr_table);
$smarty->assign('field', $arr_data);

$smarty->assign('gentype_options', $arr_gentype);
$smarty->assign('gentype', '2');

$smarty->assign('INPUT_TITLE', INPUT_TITLE);
$smarty->assign('TABLE', TABLE);
$smarty->assign('FIELD', FIELD);

$smarty->assign('maincontent', 'gen_main.html');
$smarty->display($view);
?>
