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

class user
{
    var $id;
    var $name;
    var $did;
    var $fax;
    var $email;
    var $active;
    
    var $columnlist;
    
    function user(&$DBconn)
    {
        $this->DB = &$DBconn;
    }
    
    function insertuser()
    {
        $sqlString = "insert into user (id, name, did, fax, email,  active) values ('$this->id', '$this->name',  '$this->did', '$this->fax', '$this->email',  '$this->active')";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function updateuser()
    {
        $sqlString = "update user set name = '$this->name',  did = '$this->did', fax = '$this->fax', email = '$this->email', active = '$this->active' where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function updateuserbySelf()
    {
        $sqlString = "update user set name = '$this->name', did = '$this->did', fax = '$this->fax', email = '$this->email' where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function deleteuser()
    {
        $sqlString = "delete from user where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function selectuser()
    {
        $arr_result = array();
        $sqlString = "select * from user where id = '$this->id'";
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
    
    function selectAlluser($num_page, $curr_page)
    {
        $arr_result = array();
        $sqlString = "select * from user";
        $rs = $this->DB->PageExecute($sqlString, $num_page, $curr_page);
        if ($rs)
        {
            $this->rs = &$rs;
            for ($i=0;!$rs->EOF;$i++)
            {
                $arr_result[$i] = $rs->FetchRow();
            }
        }
        return $arr_result;
    }
    
    /**
     * get the id of ooo_aro table
     * 
     * @return  int $id
     */
    function getGaclID()
    {
        $sqlString = "select id from ooo_aro where value = '$this->id'";
        $rs = $this->DB->Execute($sqlString);
        if ($rs)
        {
            if (!$rs->EOF)
            {
                $id = $rs->fields['id'];
            }
        }
        return $id;
    }

    function selectcoluser_by_type()
    {
        $arr_result = array();
        $sqlString = "select ".$this->columnlist." from user where type = '$this->type' order by name";
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
    
    function isLastPage()
    {
        return $this->rs->AtLastPage();
    }
    
    function LastPageNo()
    {
        return $this->rs->LastPageNo();
    }
    
    function checkDuplicateEmail($type='new')
    {
        if ($type == 'new')
        {
            $sqlString = "select * from user where email = '$this->email'";
        }
        else
        {
            $sqlString = "select * from user where email = '$this->email' and id !='$this->id'";
        }
        
        $rs = $this->DB->Execute($sqlString);
        if ($rs)
        {
            if (!$rs->EOF)
            {
                return true;
            }
        }
        return false;        
    }
    
}
?>
