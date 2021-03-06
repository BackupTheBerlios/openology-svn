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
// Created on 2004-12-3 13:49:23
// $Id: HtmlUtil.php 551 2005-05-04 04:27:25Z ken $ 
     
/**
 * HTML utilities.
 *
 * @package openology
 * @subpackage html
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
/**
 * HTML utilities.
 *
 * @package openology.html
 */ 
 
class HtmlUtil
{
    var $select_arr_str = '';
    var $_select_arr_name = '';
    
    /**
     * convert an php array to a js array
     *
     * @param   string  $parent_value
     * @param   array   $arr_data
     * @param   string  $name
     * @param   string  $value
     * @return  string  $string
     * 
     */    
    function addSelectJSArray($parent_value, $arr_data, $name, $value)
    {
        $this->select_arr_str .= $this->_select_arr_name."[".$parent_value."] = new Array();";
        for($i=0;$i<count($arr_data);$i++)
        {
            $this->select_arr_str .= "$this->_select_arr_name[$parent_value][$i] = new Array('".$arr_data[$i][$value]."', '".$arr_data[$i][$name]."');";
        }
    }
    
    function newSelectArray($name)
    {
        $this->_select_arr_name = $name;
        $this->select_arr_str .= "var ".$name." = new Array();";
    }
}

?>