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
// Created on 2004-12-14 9:54:51
// $Id: Action.php 146 2005-01-11 08:24:42Z ken $ 
     
/**
 * Main action director.
 *
 * @package openology
 * @subpackage core
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
include_once OOO_LIB.'/domit/xml_domit_include.php';
/**
 * Main action director.
 *
 * @package openology
 */ 
class Action
{
    /**
     * @var String
     */
    var $op = 'default'; 
    
    /**
     * @var object
     */
    var $_doc;      
    
    /**
     * @var String
     */
    var $config_filename = 'config.xml';   
    
    /**
     * @var String
     */
    var $model; 
    
    /**
     * @var String
     */
    var $view; 
       
    /**
     * Constructor
     * 
     * @param   string op
     * @return  void
     */
    function Action($op)
    {       
        if ($op != "")
        {
            $this->op = $op;
        }
        else
        {
            $this->op = "default";
        }
        $this->_doc = new DOMIT_Document(); 
        $this->getMV();
    }
    
    /**
     * Open a file
     * 
     * @param   void
     * @return  String $filename
     * 
     */    
    function getMV()
    {
        $this->_doc->loadXML($this->config_filename);
        $action_node =& $this->_doc->getElementsByAttribute('op', $this->op, true); 
        
        $this->model = OOO_APP_MODULES.'/'.$action_node->getAttribute('model');        
        $this->view = $action_node->getAttribute('view');        
    }    
}
?>