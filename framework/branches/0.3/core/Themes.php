<?php
// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004-05 Openology.org Team                                  |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// Created on 2005-12-21 1:52:03
// $Id: Themes.php 551 2005-05-04 04:27:25Z ken $ 
     
/**
 * Themes configuration.
 *
 * @package openology
 * @subpackage core
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
/**
 * Themes configuration.
 *
 * @package openology
 */
class Themes
{
    var $id;
    var $name;
    var $dir;
    
    function Themes(&$DBconn)
    {
        $this->DB = &$DBconn;
    }
    
    function insertThemes()
    {
        $sqlString = "insert into ooo_themes (id, name, dir) values ('$this->id', '$this->name', '$this->dir')";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function updateThemes()
    {
        $sqlString = "update ooo_themes set name = '$this->name', dir = '$this->dir' where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function deleteThemes()
    {
        $sqlString = "delete from ooo_themes where id = '$this->id'";
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    function selectThemes()
    {
        $arr_result = array();
        $sqlString = "select * from ooo_themes where id = '$this->id'";
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
    
    function selectAllThemes()
    {
        $arr_result = array();
        $sqlString = "select * from ooo_themes";
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
