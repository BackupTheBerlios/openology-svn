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
// Created on 2004-12-24 15:02:27
// $Id: FormElement.php 146 2005-01-11 08:24:42Z ken $ 

/**
 * Base class for form elements. All form elements extends from this class. 
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
/**
 * Base class for form elements. All form elements extends from this class. 
 *
 * @package openology.form.elements
 */
class FormElement
{
    /**
     * @var array
     */
    var $arr_attr = array();

    /**
     * @var array
     */
    var $arr_rule = array();
    
    /**
     * @var String
     */
    var $type = '';

    /**
     * Constructor
     * 
     * @return  void
     */
    function FormElement()
    {
        $this->arr_attr = array('type' => '', 'id' => '', 'name' => '', 'class' => '');
        $this->setAttribute('type', $this->type);
    }

    /**
     * set the attribute of the element
     * 
     * @param   string $name
     * @param   string $value
     * @return  void
     */
    function setAttribute($name, $value)
    {
        $this->arr_attr[$name] = $value;
        
        if ($name == 'id')
        {
            if($this->getAttribute('name') == '')
            {
                $this->arr_attr['name'] = $value;
            }
        }
    }

    /**
     * get the attribute of the element
     * 
     * @param   string $name
     * @return  void
     */
    function getAttribute($name)
    {
        return $this->arr_attr[$name];
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
    
    /**
     * html  string for an element
     * 
     * @return  String  $string
     * 
     */
    function toHtml()
    {
        $string = '<input {attr_name=attr_value} {extra_attr}>';
        
        return $string;
    }
}

?>