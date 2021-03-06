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
// Created on 2005-1-10 14:44:40
// $Id: ElementGroup.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * Element group, form elements can be grouped with it.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */

/**
 * Element group, form elements can be grouped with it.
 *
 * @package openology.form.elements
 */
class ElementGroup
{
    /**
     * @var array
     */
    var $arr_element = array();
    
    /**
     * @var array
     */
    var $arr_rule = array();
    
    /**
     * @var array
     */
    var $arr_attr = array ();
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function ElementGroup()
    {        
    }
    
    /**
     * set the attribute of the form
     * 
     * @param   string $name
     * @param   string $value
     * @return  void
     */
    function setAttribute($name, $value)
    {
        $this->arr_attr[$name] = $value;
    }

    /**
     * get the attribute of the form
     * 
     * @param   string $name
     * @return  void
     */
    function getAttribute($name)
    {
        return $this->arr_attr[$name];
    }
    
    /**
    * Adds an element into the group
    *
    * @param    String      $type       
    * @return   object     reference to element
    */
    function & addElement($type)
    {         
        $obj_element = & $this->_loadElement($type);
        $this->arr_element[] = & $obj_element;
        return $obj_element;
    }

    /**
     * Returns a form element of the given type
     *
     * @param     string   $type    element type
     * @return    object    a new element
     * 
     */
    function & _loadElement($type)
    {
        $type = ucfirst(strtolower($type));        
        if(!file_exists(OOO_CORE.'/form/elements/Form'.$type.'.php'))
        {           
            echo 'This type of form element ('.$type.') does not exist!';
            // TODO: Isolate message to language file.
            exit;
        }
        include_once OOO_CORE.'/form/elements/Form'.$type.'.php';
       
        $classname = 'Form'.$type;       
       
        $obj_element = & new $classname();              
        return $obj_element;
    }
    
    /**
     * Adds a validation rule for the given field
     *
     * @param    string     $message       Message to display for invalid data
     * @param    string     $validation    Where to perform validation: "server", "client"
     * @param    string     $type          Rule type, use getRegisteredRules() to get types
     * @param    array      $arr_args      Required for extra ruledata
     * @return   void
     * 
     */
    function addRule($type, $validation = 'client', $message, $arr_args = null)
    {    
        $i = count($this->arr_rule);
        $this->arr_rule[$i]['type']       = $type; 
        $this->arr_rule[$i]['validation'] = $validation;
        $this->arr_rule[$i]['message']    = $message;          
        $this->arr_rule[$i]['args']       = array();
        $this->arr_rule[$i]['args']       = $arr_args;      
    }
}
?>
