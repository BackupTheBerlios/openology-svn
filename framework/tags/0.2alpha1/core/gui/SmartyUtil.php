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
// Created on 2004-12-3 14:46:01
// $Id$ 
     
/**
 * Smarty utilities.
 *
 * @package openology
 * @subpackage gui
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
/**
 * Smarty utilities.
 *
 * @package openology.gui
 */ 
 
class SmartyUtil
{    
    /**
     * convert an array to the type which can be displayed by smarty for select,
     * radio, checkbox
     *
     * @param   array   $arr_data
     * @param   string  $name
     * @param   string  $value
     * @return  array   $arr_result
     * 
     */
    function toSmartyArray($arr_data, $name, $value)
    {
        $arr_result = array();
        for ($i=0;$i<count($arr_data);$i++)
        {
            $arr_result[$arr_data[$i][$value]] = $arr_data[$i][$name];
        }
        return $arr_result;
    }
    
}

?>