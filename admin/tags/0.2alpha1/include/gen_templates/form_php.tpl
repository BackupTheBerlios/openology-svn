<?php
/**
* @Project : 
* @package 
* @copyright (C) 2004 Openology Pte Ltd
* @link http://www.openology.com/
* @author Andy.Ma  <andy.ma@openology.com>
* @Created on 
* @$Id:$ 
**/

include_once OOO_APP_MODULES.'/page.php';
include_once OOO_APP_CLASSES.'/<{$class_name}>.php';
include_once OOO_CORE.'/form/Form.php';
include_once OOO_CORE.'/form/FormController.php';
                
if ($op == 'edit<{$table_name}>')
{
    $<{$table_name}> = new <{$class_name}>($DB);
    $<{$table_name}>->id   = $_GET['<{$table_name}>_id'];
    $arr_<{$table_name}>   = $<{$table_name}>->select();
    $smarty->assign("function_title",'Edit <{$class_name}>');
}
else
{
    $smarty->assign("function_title",'Add <{$class_name}>');
}

$form = new Form('form1', 'index.php', 'post');

<{section name=rows loop=$data start=1}>
	$element[$smarty.section.rows.index] = & $form->addElement('<{$data[rows].form_type}>');
	$element[$smarty.section.rows.index]->setAttribute('label', '');
	$element[$smarty.section.rows.index]->setAttribute('id', '<{$data[rows].name}>');	    
	<{if $data[rows].form_type eq "text" or $data[rows].form_type eq "textarea"}>
	$element[$smarty.section.rows.index]->setAttribute('value', $arr_data['email']);
	<{elseif $data[rows].form_type eq "checkbox"}>
	$element[$smarty.section.rows.index]->setAttribute('checkboxes', $arr_<{$data[rows].name}>);
    $arr_checked = array();
    $arr_checked = split(';', $arr_<{$table_name}>['<{$data[rows].name}>'];
    $element[$smarty.section.rows.index]->setAttribute('checked', $arr_checked);
    <{elseif $data[rows].form_type eq "radio"}>
    $element[$smarty.section.rows.index]->setAttribute('radios', $arr_<{$data[rows].name}>);
	if ($op == 'edit<{$table_name}>')
    {
        $element[$smarty.section.rows.index]->setAttribute('checked', $arr_<{$table_name}>['<{$data[rows].name}>']);
    }
    else
    {
        $element[$smarty.section.rows.index]->setAttribute('checked', 1);
    }
    <{elseif $data[rows].form_type eq "select"}>
    $element[$smarty.section.rows.index]->setAttribute('option', $arr_[$smarty.section.rows.index]);
    $element[$smarty.section.rows.index]->setAttribute('selected', $arr_<{$table_name}>['<{$data[rows].name}>']);
	<{/if}>
<{/section}>

$button1 = & $form->addElement('reset');
$button1->setAttribute('id', 'resetbutton');
$button1->setAttribute('value', 'Reset');

$button2 = & $form->addElement('submit');
$button2->setAttribute('id', 'submitbutton');
$button2->setAttribute('value', 'Submit');

$button3 = & $form->addElement('backbutton');

$form_op = & $form->addElement('hidden');
$form_op->setAttribute('id', 'op');
if ($op == 'edit<{$table_name}>')
{
    $form_op->setAttribute('value', 'update<{$table_name}>');
    
    $hidden2 = & $form->addElement('hidden');
    $hidden2->setAttribute('id', '$<{$table_name}>_id');    
    $hidden2->setAttribute('value', $arr_<{$table_name}>['id']);
}
else
{
    $form_op->setAttribute('value', 'create<{$table_name}>');
}


$formcontroller = new FormController($form);
$arr_form = $formcontroller->toTemplate();

$smarty->assign("form",$arr_form);

$smarty->assign('maincontent', '<{$table_name}>_form.html');
$smarty->display($view);
?>
