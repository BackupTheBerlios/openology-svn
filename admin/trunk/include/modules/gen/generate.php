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

$DB = & ADONewConnection($_SESSION["session_dbtype"]);
$result = $DB->Connect($_SESSION["session_dbhostname"], $_SESSION["session_dbusername"], $_SESSION["session_dbpassword"], $_SESSION["session_dbname"]);
if (!$result)
{
    echo "can not connect db";
    exit;
}

$gen_smarty = new Smarty;
$gen_smarty->compile_check = true;
$gen_smarty->debugging = false;   

// note trailing / in dir name : Smarty syntax
$gen_smarty->config_dir   = OOO_ROOT.'/lib/smarty/config/'; 
$gen_smarty->template_dir = OOO_APP_GEN_TEMPLATES;
$gen_smarty->compile_dir  = OOO_APP_CACHE.'/templates_c/';
$gen_smarty->cache_dir    = OOO_APP_CACHE.'/cache/'; 

$gen_smarty->left_delimiter = '<{';
$gen_smarty->right_delimiter = '}>';

$table_name     = $_POST['table_name'];
$arr_formtype   = $_POST['form_type'];
$arr_formlabel  = $_POST['form_label'];
$arr_islist     = $_POST['is_list'];

$dbinfo = new DBinfo($DB);
$arr_field = $dbinfo->getField($table_name);

for ($i = 0; $i < count($arr_field); $i ++)
{
    $arr_field[$i]['form_type'] = $arr_formtype[$i];
    $arr_field[$i]['form_label'] = $arr_formlabel[$i];

    if(is_array($arr_islist))
    {
        if (in_array($arr_field[$i]['name'], $arr_islist))
        {
            $arr_field[$i]['is_list'] = 1;
        }
        else
        {
            $arr_field[$i]['is_list'] = 0;
        }
    }
}

$generator = new Generator();

$generator->smarty      = & $gen_smarty;
$generator->db_name     = $_SESSION["session_dbname"];
$generator->table_name  = $table_name;
$generator->class_name  = ucfirst($table_name);
$generator->arr_field   = $arr_field;

$generator->genClass();
$generator->genList();
$generator->genForm();
$generator->genCrud();
$generator->genDetail();

for ($i=0;$i< count($_SESSION["session_Table"]);$i++)
{
    if ($_SESSION["session_Table"][$i]['name'] == $table_name)
    {
        $_SESSION["session_Table"][$i]['is_gen'] = 1;
    }
}

header("Location: index.php?op=gen_input");
?>
