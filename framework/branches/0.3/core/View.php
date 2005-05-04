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
// Created on 2005-4-26 10:31:28
// $Id: Action.php 364 2005-02-14 06:31:41Z andy $ 

/**
 * View class.
 *
 * @package openology
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 openology.org Team
 */
include_once OOO_CORE.'/form/Form.php';
include_once OOO_CORE.'/form/FormController.php';
include_once OOO_CORE.'/components/ComponentContainer.php';
include_once OOO_CORE.'/components/ComponentController.php';
include_once OOO_LIB.'/smarty/libs/Smarty.class.php';

/**
 * View class.
 *
 * @package openology
 */

class View
{
    var $_arr_form = array ();
    var $_container;
    var $_arr_output = array();
    var $arr_config;

    /**
    * Constructor
    * 
    * @return  void
    */
    function View($template, $arr_config)
    {
        $this->template = $template;
        $this->arr_config = $arr_config;
    }
    
    function _initTemplate()
    {
        $this->smarty = new Smarty;
        $this->smarty->compile_check = true;
        $this->smarty->debugging = false;   
        
        // note trailing / in dir name : Smarty syntax
        $this->smarty->config_dir   = OOO_ROOT.'/lib/smarty/config/'; 
        $this->smarty->template_dir = OOO_APP_THEMES.$this->arr_config['theme']['dir'].'/templates/';
        $this->smarty->compile_dir  = OOO_APP_CACHE.'/templates_c/';
        $this->smarty->cache_dir    = OOO_APP_CACHE.'/cache/'; 
    }
    
    function toHtml()
    {
        $this->_initTemplate();
        
        $formcontroller = new FormController();
        for ($i=0;$i<count($this->_arr_form);$i++)
        {
            $formcontroller->form = & $this->_arr_form[$i];            
            $arr_form = $formcontroller->toTemplate();
            
            $name = $this->_arr_form[$i]->getAttribute('name');
            $this->smarty->assign($name, $arr_form);
        }
        
        $controller         = new ComponentController($this->_container);
        $arr_component      = $controller->toTemplate();       
        $this->smarty->assign("component", $arr_component);
        
        foreach ($this->_arr_output as $key => $value)
        {
             $this->smarty->assign($key, $value);
        }
        
        $this->smarty->display($this->template);
    }
}

?>