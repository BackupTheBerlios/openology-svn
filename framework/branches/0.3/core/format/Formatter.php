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
// Created on 2005-1-18 17:53:54
// $Id: Formatter.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * Format auto generated code.
 *
 * @package openology
 * @subpackage format
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
/**
 * Base class for Formatter.All formatter extends from this class.
 *
 * @package openology.format
 */

class Formatter
{
    /**
     * @var array
     */
    var $arr_config = array();     
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function Formatter($arr_config)
    {
        $this->arr_config = $arr_config;        
    }
    
    
    /**
     * format the code
     * 
     * @return  void
     */
    function format()
    {
        
    }
    
    /**
     * set the attribute of the formatter
     * 
     * @param   string $name
     * @param   string $value
     * @return  void
     */
    function setAttribute($name, $value)
    {
        $this->arr_config[$name] = $value;
    }
}
?>