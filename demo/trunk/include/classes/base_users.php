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

class base_users
{
    var $id;
    var $username;
    var $password;
    var $change_id;
    var $over_time;
    
    function base_users(&$DBconn)
    {
        $this->DB = &$DBconn;
    }
    
    function insertbase_users()
    {
        $sqlString = "insert into base_users (id, username, password) values ('$this->id', '$this->username', '$this->password')";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function updatebase_users()
    {
        $sqlString = "update base_users set username = '$this->username' where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function updatebase_usersbySelf()
    {
        $sqlString = "update base_users set username = '$this->username', password = '$this->password' where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function deletebase_users()
    {
        $sqlString = "delete from base_users where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function selectbase_users()
    {
        $arr_result = array();
        $sqlString = "select * from base_users where id = '$this->id'";
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
    
    function selectAllbase_users()
    {
        $arr_result = array();
        $sqlString = "select * from base_users";
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
    
    function checkLogin()    
    {       
        $sqlString    = "select * from base_users where username ='$this->username' and password = '$this->password'";
        $rs = $this->DB->Execute($sqlString);
        if ($rs) 
        {
            if(!$rs->EOF)
            {
                $array = $rs->FetchRow();
                return $array;              
            }
            else
            {
                return 0;
            }   
        }
        else
        {
            return 0;
        }
    }   
    
    function getInsert_ID()
    {
        return $this->DB->Insert_ID();
    }
    
    function selectbase_userbyUsername()
    {
        $arr_result = array();
        $sqlString = "select * from base_users where username = '$this->username'";
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
    
    function selectbase_userbyChange_id()
    {
        $arr_result = array();
        $sqlString = "select * from base_users where change_id = '$this->change_id'";
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
    
    function setChange()
    {
        $sqlString = "update base_users set change_id = '$this->change_id', over_time = '$this->over_time' where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function clearChange()
    {
        $sqlString = "update base_users set change_id = '', over_time = '' where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function changePassword()
    {
        $sqlString = "update base_users set password = '$this->password' where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
}
?>
