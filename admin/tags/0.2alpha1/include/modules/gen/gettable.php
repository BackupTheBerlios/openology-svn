<?php
/**
* @Project : project_name
* @package project_name
* @copyright (C) 2004 Openology Pte Ltd
* @link http://www.openology.com/
* @author Andy.Ma  <andy.ma@openology.com>
* @Created on 2005-2-18 10:11:31
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

$generator = new Generator();
$generator->db_name = $_SESSION["session_dbname"];
$generator->createDirStructure();
//echo $generator->gen_dir;

$dbinfo = new DBinfo($DB);
$arr_table = $dbinfo->getAllTables();

//print_r($arr_table);

for ($i=0;$i<count($arr_table);$i++)
{
    $arr_session[$i]['name'] = $arr_table[$i];
    $arr_session[$i]['is_gen'] = 0;
}

session_register("session_Table");
$_SESSION['session_Table'] = $arr_session;
//print_r($_SESSION['session_Table']);
header("Location: index.php?op=gen_input");
?>