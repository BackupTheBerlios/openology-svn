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
// Created on 2004-12-24 15:02:27
// $Id: FormElement.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * Base class for form elements. All form elements extends from this class. 
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
/**
 * Base class for form elements. All form elements extends from this class. 
 *
 * @package openology.form.elements
 */
class FormElement
{
    /**
     * An associative array of form label and attributes.
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
     * Return html rendering for the element label
     * $arr_return['label'] - array or string of form element lable 
     * $arr_return['html'] -  array or string of form element 
     *
     * @return  Array  $arr_return
     * 
     */
    function toHtml()
    {
        if ($this->getAttribute('label') != '') 
        {
            $arr_return['label'] = '<label for="{attr_id}">'.$this->getAttribute('label').'</label>';
        }
        $arr_return['html']  = '<input {attr_name=attr_value} {extra_attr} />';
        
        return $arr_return;
    }
}

?>
