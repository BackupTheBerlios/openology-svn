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
// Created on 2004-12-13 11:20:20
// $Id: Html_header.php 146 2005-01-11 08:24:42Z ken $ 
     
/**
 * Send HTML header.
 *
 * TODO: This should be a generic class for setting any http header not just 
 * the content type.
 *
 * @package openology
 * @subpackage gui
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
/**
 * Send HTML header.
 *
 * @package openology.gui
 */ 

class HtmlHeader
{
    /**
     * @var string
     */
    var $charset = 'iso-8859-1';
    
     /**
     * Constructor
     * 
     * @return  void
     */
    function HtmlHeader()
    {
        
    }
    
    /**
     * set the Charset
     * 
     * @return  void
     * 
     */    
    function setCharset()
    {
        header('Content-Type: text/html; charset='.$this->charset);
    }
}
?>