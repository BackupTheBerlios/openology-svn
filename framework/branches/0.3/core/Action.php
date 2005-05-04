<?php
// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004-05 openology.org Team                                  |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// Created on 2004-12-14 9:54:51
// $Id: Action.php 551 2005-05-04 04:27:25Z ken $ 
     
/**
 * Main action director.
 *
 * @package openology
 * @subpackage core
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 openology.org Team
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
     * @var String
     */
    var $dir = ''; 
    
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
    var $model_filename; 
    
    /**
     * @var String
     */
    var $template; 
    
     /**
     * @var string
     */
    var $aco = '';  
       
    /**
     * Constructor
     * 
     * @param   string param
     * @return  void
     */
    function Action($param)
    {   
        if ($param != "")
        {
            $arr_op = split('-', $param); 
            
            if(count($arr_op) == 1)
            {
                $this->op = $arr_op[0];
            }
            else
            {
                $this->dir = $arr_op[0];
                $this->op = $arr_op[1];
            }          
            
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
        $filename = OOO_APP_MODULES.'/'.$this->dir.'/'.$this->config_filename;
        $this->_doc->loadXML($filename);
        $action_node =& $this->_doc->getElementsByAttribute('op', $this->op, true); 
        
        if (!$action_node)
        {
            $action_node =& $this->_doc->getElementsByAttribute('op', 'notfound', true);
        }
        
        $this->model    = $action_node->getAttribute('model');        
        $this->template     = $action_node->getAttribute('template');
        $this->aco   = $action_node->getAttribute('aco');    
        $this->model_filename = OOO_APP_MODULES.'/'.$this->dir.'/'.strtolower($this->model).'.php';    
    }    
}
?>