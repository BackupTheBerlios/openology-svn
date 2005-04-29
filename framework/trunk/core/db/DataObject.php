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
// Created on 2006-2-16 12:29:14
// $Id:$
/**
 * DB class. 
 *
 * @package openology
 * @subpackage db
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */

/**
 * DB class.
 *
 * @package openology.db
 */

class DataObject
{
    /**
     * Constructor
     * 
     * @param   object $DBconn
     * @return  void
     */
    function DataObject(&$DBconn)
    {
        $this->DB = &$DBconn;
    }
    
    /**
     * excute sqlString, insert, update, delete
     * 
     * @param   string $sqlString
     * @return  boolean
     */
    function execute($sqlString)
    {
        $result = $this->DB->Execute($sqlString);
        if ($result == false)
        {
            return false;
        }
        return true;
    }
    
    /**
     * select  one record
     * 
     * @param   string $sqlString
     * @return  array  $arr_result
     */
    function select($sqlString)
    {
        $arr_result = array();
                
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
    
    /**
     * select all records
     * 
     * @param   string $sqlString
     * @return  array  $arr_result
     */
    function selectAll($sqlString)
    {
        $arr_result = array();
                
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
    
    /**
     * select all records for split page
     * 
     * @param   string $sqlString
     * @param   int    $num_page
     * @param   int    $curr_page
     * @return  array  $arr_result
     */
    function selectPage($sqlString, $num_page, $curr_page)
    {
        $arr_result = array();
                
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
     * used for page split, check if current page is last page
     * 
     * @param   string $name
     * @param   string $value
     * @return  void
     */
    function isLastPage()
    {
        return $this->rs->AtLastPage();
    }
    
    /**
     * used for page split, get last page number
     * 
     * @param   string $name
     * @param   string $value
     * @return  void
     */
    function getLastPageNo()
    {
        return $this->rs->LastPageNo();
    }
    
    function getInsert_ID()
    {
        return $this->DB->Insert_ID();
    }
}

?>