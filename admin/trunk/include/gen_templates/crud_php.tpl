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

include_once OOO_APP_CLASSES.'/<{$class_name}>.php';

$<{$table_name}> = new <{$class_name}>($DB);

if ($op == 'delete<{$table_name}>')
{
    $arr_id = $_POST['delete'];

    for ($i = 0; $i < count($arr_id); $i ++)
    {
        $<{$table_name}>->id = $arr_id[$i];
        $<{$table_name}>->delete();       
    }
}
else
{   
    <{section name=rows loop=$data start=1}>
    $<{$table_name}>-><{$data[rows].name}> = $<{$data[rows].name}>;
    <{/section}>
	
    if ($op == 'create<{$table_name}>')
    {
        $<{$table_name}>->insert();
    }
    elseif ($op == 'update<{$table_name}>')
    {        
        $<{$table_name}>-><{$data[0]}> = $_POST['<{$table_name}>_<{$data[0].name}>'];
        $<{$table_name}>->update(); 
    }        
}

header("Location: index.php?op=<{$table_name}>list");
?>