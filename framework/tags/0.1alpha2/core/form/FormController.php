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
// Created on 2004-12-24 13:49:24
// $Id: FormController.php 146 2005-01-11 08:24:42Z ken $ 

/**
 * Form controller.
 *
 * @package openology
 * @subpackage form
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
include_once OOO_CORE.'/form/rules/RuleController.php'; 
/**
 * Form controller.
 *
 * @package openology.form
 */
class FormController
{
    /**
     * @var String
     */
    var $template_name;
    
    /**
     * Constructor
     * 
     * @param   object $form
     * @param   String $template_name
     * @return  void
     */
    function FormController(&$form, $template_name = 'Smarty')
    {
        $this->form = &$form;
        $this->template_name = $template_name;
        $this->rulecontroller = new RuleController(&$form);
//        echo $this->rulecontroller->getClientValidation();
        
    }
    
    /**
     * put the html string and javascript validation into an array for smarty to
     * display
     * 
     * @return  array  $arr_form
     */    
    function toTemplate()
    {
        $WrapperObject = $this->_loadWrapper($this->template_name);
        $arr_form = array();
        $arr_form = $WrapperObject->toArray();
        $arr_form['javascript'] = $this->rulecontroller->getClientValidation();
        
        return $arr_form;
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
        if(!file_exists(OOO_CORE.'/form/wrappers/Form'.$type.'Wrapper.php'))
        {           
            echo 'This type of form element ('.$type.') does not exist!';
            exit;
        }
        
        include_once OOO_CORE.'/form/wrappers/Form'.$type.'Wrapper.php';
        
        $classname = 'Form'.$type.'Wrapper';       
       
        $WrapperObject = & new $classname($this->form);  
              
        return $WrapperObject;
    }       
}
?>