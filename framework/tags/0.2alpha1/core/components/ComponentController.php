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
// Created on 2005-1-26 16:09:13
// $Id$ 

/**
 * Component controller.
 *
 * @package openology
 * @subpackage components
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
 
/**
 * Component controller.
 *
 * @package openology.components
 */
class ComponentController
{
    /**
     * @var String
     */
    var $template_name;
    
    /**
     * Constructor
     * 
     * @param   object $container
     * @param   String $template_name
     * @return  void
     */
    function ComponentController(&$container, $template_name = 'Smarty')
    {
        $this->container = &$container;
        $this->template_name = $template_name;        
    }
    
    /**
     * put the html string  for a template to display
     * 
     * @return  array  $arr_comoponent
     */    
    function toTemplate()
    {
        $WrapperObject = $this->_loadWrapper($this->template_name);
        $arr_comoponent = array();
        $arr_comoponent = $WrapperObject->toArray();        
        
        return $arr_comoponent;
    }
    
    /**
    * load the wrapper object
    * 
    * @param   String $type
    * @return  object $ruleObject
    * 
    **/
    function _loadWrapper($type)
    {               
        if(!file_exists(OOO_CORE.'/components/wrappers/Component'.$type.'Wrapper.php'))
        {           
            echo 'This type of form element ('.$type.') does not exist!';
            exit;
        }
        
        include_once OOO_CORE.'/components/wrappers/Component'.$type.'Wrapper.php';
        
        $classname = 'Component'.$type.'Wrapper';       
       
        $WrapperObject = & new $classname($this->container);  
              
        return $WrapperObject;
    }       
}
?>