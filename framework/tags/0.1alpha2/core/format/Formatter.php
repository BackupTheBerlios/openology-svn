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
// Created on 2005-1-18 17:53:54
// $Id$ 

/**
 * Format auto generated code.
 *
 * @package openology
 * @subpackage format
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
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
}
?>