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

class usergroup
{
    var $id;
    var $name;
    var $description;
    
    function usergroup(&$DBconn)
    {
        $this->DB = &$DBconn;
    }
    
    function insertusergroup()
    {
        $sqlString = "insert into usergroup (name, description) values ('$this->name', '$this->description')";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function updateusergroup()
    {
        $sqlString = "update usergroup set name = '$this->name', description = '$this->description' where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function deleteusergroup()
    {
        $sqlString = "delete from usergroup where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function selectusergroup()
    {
        $arr_result = array();
        $sqlString = "select * from usergroup where id = '$this->id'";
        $rs = $this->DB->Execute($sqlString);
        if ($rs)
        {
            if (!$rs->EOF)
            {
                $arr_result = $rs->FetchRow();
            }
        }
        return $arr_result;
    }
    
    function selectAllusergroup()
    {
        $arr_result = array();
        $sqlString = "select * from usergroup";
        $rs = $this->DB->Execute($sqlString);
        if ($rs)
        {
            for ($i=0;!$rs->EOF;$i++)
            {
                $arr_result[$i] = $rs->FetchRow();
            }
        }
        return $arr_result;
    }
    
    function getInsert_ID()
    {
        return $this->DB->Insert_ID();
    }
    
    function selectInUser($arr_id, $type)
    {
        $arr_result = array();
        
        if ($type == 1)
        {
            $sqlString = 'in (';
        }
        else
        {
            $sqlString = 'not in (';
        }
        
        for ($i=0;$i<count($arr_id);$i++)
        {
            if ($i == 0)
            {
                $sqlString .= $arr_id[$i];
            }
            else
            {
                $sqlString .= ', '.$arr_id[$i];
            }
        }
        $sqlString .= ')';
        
        $sqlString = "select * from user where id ".$sqlString;
        $rs = $this->DB->Execute($sqlString);
        if ($rs)
        {
            for ($i=0;!$rs->EOF;$i++)
            {
                $arr_result[$i] = $rs->FetchRow();
            }
        }
        return $arr_result;
    }
}
?>
