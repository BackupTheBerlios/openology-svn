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
// $Id: Language.php 146 2005-01-11 08:24:42Z ken $ 
     
/**
 * Languages configuration.
 *
 * @package openology
 * @subpackage core
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
/**
 * Languages configuration.
 *
 * @package openology
 */ 
class Language
{
    var $id;
    var $name;
    var $dir;
    
    function Language(&$DBconn)
    {
        $this->DB = &$DBconn;
    }
    
    function insertLanguage()
    {
        $sqlString = "insert into ooo_language (id, name, dir) values ('$this->id', '$this->name', '$this->dir')";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function updateLanguage()
    {
        $sqlString = "update ooo_language set name = '$this->name', dir = '$this->dir' where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function deleteLanguage()
    {
        $sqlString = "delete from ooo_language where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function selectLanguage()
    {
        $arr_result = array();
        $sqlString = "select * from ooo_language where id = '$this->id'";
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
    
    function selectAllLanguage()
    {
        $arr_result = array();
        $sqlString = "select * from ooo_language";
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
