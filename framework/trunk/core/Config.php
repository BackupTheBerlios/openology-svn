<?php
// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004 Openology Pte Ltd                                      |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// Created on 2005-12-21 1:52:03
// $Id$ 
     
/**
 * Configurations.
 *
 * @package openology 
 * @subpackage core
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
/**
 * Configurations.
 *
 * @package openology
 */
class Config
{
    var $id;
    var $config_name;
    var $config_value;
    var $modified_time;
    
    function Config(&$DBconn)
    {
        $this->DB = &$DBconn;
    }
    
    function insertConfig()
    {
        $sqlString = "insert into ooo_config (id, config_name, config_value, modified_time) values ('$this->id', '$this->config_name', '$this->config_value', '$this->modified_time')";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function updateConfig()
    {
        $sqlString = "update ooo_config set config_name = '$this->config_name', config_value = '$this->config_value', modified_time = '$this->modified_time' where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function deleteConfig()
    {
        $sqlString = "delete from ooo_config where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function selectConfig()
    {
        $arr_result = array();
        $sqlString = "select * from ooo_config where id = '$this->id'";
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
    
    function selectAllConfig()
    {
        $arr_result = array();
        $sqlString = "select * from ooo_config";
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
    
    function getValuebyName()
    {
        $arr_result = array();
        $sqlString = "select config_value from ooo_config where config_name = '$this->config_name'";
        $rs = $this->DB->Execute($sqlString);
        if ($rs)
        {
            if (!$rs->EOF)
            {
                $arr_result = $rs->fields[0];
            }
        }
        return $arr_result;
    }
}
?>
