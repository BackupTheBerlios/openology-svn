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
// Created on 2005-1-19 11:44:23
// $Id: NumberFormatter.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * Number Formatter
 *
 * @package openology
 * @subpackage format
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
 
include_once OOO_CORE.'/format/Formatter.php';
/**
 * Number Formatter
 *
 * @package openology.format
 */

class NumberFormatter extends Formatter
{   
    /**
     * Constructor
     * 
     * @return  void
     */
    function NumberFormatter($arr_config)
    {
        parent::Formatter($arr_config);  
        
        if ($this->arr_config['decimals'] == '')
        {
            $this->arr_config['decimals'] = 2;
        }       
        
        if ($this->arr_config['dec_point'] == '')
        {
            $this->arr_config['dec_point'] = '.';
        }        
        
        if ($this->arr_config['thousands_sep'] == '')
        {
            $this->arr_config['thousands_sep'] = ',';
        }          
    }
    
    /**
     * format the code
     * 
     * @param   float $number
     * @return  float $number
     */
    function format($number)
    {        
        $number = number_format($number, $this->arr_config['decimals'], $this->arr_config['dec_point'], $this->arr_config['thousands_sep']);
        
        return $number;
    }
}
?>