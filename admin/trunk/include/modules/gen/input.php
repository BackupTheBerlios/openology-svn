<?php
/**
* @Project : project_name
* @package project_name
* @copyright (C) 2004 Openology Pte Ltd
* @link http://www.openology.com/
* @author Andy.Ma  <andy.ma@openology.com>
* @Created on 2005-2-18 10:29:49
* @$Id:$ 
**/

include_once OOO_APP_CLASSES."/gen/DBinfo.php";
include_once OOO_APP_CLASSES."/gen/Generator.php";
include_once OOO_CORE.'/form/Form.php';
include_once OOO_CORE.'/form/FormController.php';
include_once OOO_APP_THEMES.$config['theme']['dir']
             .'/languages'.$config['lang']['dir'].'/gen/main.php';

$DB = &ADONewConnection($_SESSION["session_dbtype"]);
$result = $DB->Connect($_SESSION["session_dbhostname"], $_SESSION["session_dbusername"], $_SESSION["session_dbpassword"], $_SESSION["session_dbname"]);
if(!$result)
{
    echo "can not connect db";
    exit;
}
             
$dbinfo = new DBinfo($DB);

$arr_table = $_SESSION['session_Table'];
//print_r($arr_table);

$arr_field = array();
$current_table=0;
for (;$current_table< count($arr_table);$current_table++)
{    
    if($arr_table[$current_table]['is_gen'] == 0)
    {        
        $arr_field = $dbinfo->getField($arr_table[$current_table]['name']);
        break;
    }
}

$form = new Form('form1', 'index.php', 'post');

$element1 = & $form->addElement('select');
$element1->setAttribute('id', 'form_type');
$element1->setAttribute('name', 'form_type[]');
$element1->setAttribute('option', $arr_gentype);
$element1->setAttribute('selected', 'text');

$element2 = & $form->addElement('text');
$element2->setAttribute('id', 'form_label');
$element2->setAttribute('name', 'form_label[]');

for ($i=0;$i<count($arr_field);$i++)
{
    $arr_checkbox[$arr_field[$i]['name']] = '';
}

$checkbox2 = & $form->addElement('checkbox');
$checkbox2->setAttribute('id', 'is_list');
$checkbox2->setAttribute('checkboxes', $arr_checkbox);
$checkbox2->return_type = 'array';

$button1 = & $form->addElement('reset');
$button1->setAttribute('id', 'resetbutton');
$button1->setAttribute('value', 'Reset');

$button2 = & $form->addElement('submit');
$button2->setAttribute('id', 'submitbutton');
$button2->setAttribute('value', 'Submit');

$button3 = & $form->addElement('backbutton');

$form_op = & $form->addElement('hidden');
$form_op->setAttribute('id', 'op');
$form_op->setAttribute('value', 'gen_generate');

$hidden2 = & $form->addElement('hidden');
$hidden2->setAttribute('id', 'table_name');    
$hidden2->setAttribute('value', $arr_table[$current_table]['name']);

$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();

$smarty->assign("data",$arr_field);
$smarty->assign("form",$arr_form);

$smarty->assign('table_name', $arr_table[$current_table]['name']);
$smarty->assign('INPUT_TITLE', INPUT_TITLE);
$smarty->assign('TABLE', TABLE);
$smarty->assign('FIELD', FIELD);

$smarty->assign('maincontent', 'gen_input.html');
$smarty->display($view);
//print_r($arr_field);
?>