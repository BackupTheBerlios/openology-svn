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
// Created on 2004-11-19 14:43:06
// $Id:$ 
     
/**
 * Database information
 *
 * @package Openology
 * @subpackage core.gen
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (C) 2004 Openology Pte Ltd
 */

Class DBinfo
{
    var $arr_table;
    
    /**
    * Constructor
    * 
    * @param   Object & $DBconn
    * @return  void
    * 
    **/
    
    function DBinfo(& $DBconn)
    {
        $this->DB = & $DBconn;
    }
    
    /**
    * get the field name and type of a table
    * 
    * @param   String $tablename
    * @return  array  $arr_result
    * 
    **/
    
    function getField($tablename)
    {
        $arr_result = array();
        $sqlString = "select * from ".$tablename;
        $rs = $this->DB->Execute($sqlString);
        
        if ($rs)
        {
            $count = $rs->FieldCount();
            for ($i=0;$i<$count;$i++)
            {
                $field = $rs->FetchField($i);
                
                $arr_result[$i]['name'] = $field->name;
                $arr_result[$i]['type'] = $field->type;                
            }
        }   
        return $arr_result;    
    }
    
    /**
    * get all the tables of a database
    * 
    * @param   
    * @return  array  $arr_result
    * 
    **/
    
    function getAllTables()
    {
        $arr_result = $this->DB->MetaTables();        
        
        return $arr_result;
    }
}
?>