<?php
include_once OOO_CORE.'/db/DataObject.php';

class <{$class_name}> extends DataObject
{
    <{section name=rows loop=$data }> 
    var $<{$data[rows].name}>;<{/section}> 
    
    function <{$class_name}>($DB)
    {
        parent::DataObject($DB);
    }
    
    function insert()
    {
    	$this->_quoteString();
        $sqlString = "insert into <{$table_name}> (<{$data[0].name}><{section name=rows loop=$data start=1}>, <{$data[rows].name}><{/section}>) values ('$this-><{$data[0].name}>'<{section name=rows loop=$data start=1}>, '$this-><{$data[rows].name}>'<{/section}>)";
        return $this->execute($sqlString);
    }
    
    function update()
    {
        $this->_quoteString();
        $sqlString = "update <{$table_name}> set <{$data[1].name}> = '$this-><{$data[1].name}>'<{section name=rows loop=$data start=2}>, <{$data[rows].name}> = '$this-><{$data[rows].name}>'<{/section}> where <{$data[0].name}> = '$this-><{$data[0].name}>'";
        return $this->execute($sqlString);
    }
    
    function delete()
    {
    	$sqlString = "delete from <{$table_name}> where <{$data[0].name}> = '$this-><{$data[0].name}>'";
    	return $this->execute($sqlString);
    }
    
    function select()
    {
    	$sqlString = "select * from <{$table_name}> where <{$data[0].name}> = '$this-><{$data[0].name}>'";
        return $this->select($sqlString);
    }
    
    function selectAll()
    {
    	$sqlString = "select * from <{$table_name}>";
    	return $this->selectAll($sqlString);
    }
    
    function selectPage($num_page, $curr_page)
    {
    	$sqlString = "select * from <{$table_name}>";
    	return $this->selectPage($sqlString, $num_page, $curr_page);
    }
    
    function _quoteString()
    {
        <{section name=rows loop=$data }> 
        $this-><{$data[rows].name}> = $this->DB->qstr($this-><{$data[rows].name}>, false);<{/section}>        
    }
}
?>