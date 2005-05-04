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
// Created on 2004-12-13 11:20:20
// $Id: Html_header.php 551 2005-05-04 04:27:25Z ken $ 
     
/**
 * Send HTML header.
 *
 * TODO: This should be a generic class for setting any http header not just 
 * the content type.
 *
 * @package openology
 * @subpackage gui
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
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