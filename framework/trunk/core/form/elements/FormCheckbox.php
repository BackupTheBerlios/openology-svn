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
// Created on 2004-12-30 13:54:50
// $Id$ 

/**
 * The checkbox form element.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (C) 2004 Openology Pte Ltd
 */
include_once OOO_CORE.'/form/elements/FormElement.php';
/**
 * The checkbox form element.
 *
 * @package openology.form.elements
 */
class FormCheckbox extends FormElement
{    
    /**
     * Type of data to return.
     * Valid values: "string", "array".
     * Use String when the checkboxes are directly inserted into the template.
     * Use Array when more processing is require to display the checkboxes.
     * @var String  
     */
    var $return_type = 'string';
    
    /**
     * @var String
     */
    var $type = 'checkbox';   
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function FormCheckbox()
    {
        parent::FormElement();
        $this->setAttribute('separator', ' ');
        $this->setAttribute('class', 'checkbox');
        
        $this->return_type = strtolower($this->return_type);
        if (!($this->return_type == 'string' || $this->return_type == 'array'))
        {
            echo 'Checkbox return type ('.$this->return_type.') is not supported';
            exit;
        }
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
                $this->arr_attr['name'] = $value.'[]';
            }
        }
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
        $arr_return         = parent::toHtml();
        $arr_return['html'] = '';      
        $arr_checkboxes     = array();
        $arr_checkboxes     = $this->getAttribute('checkboxes');
        $arr_checked        = array();
        $arr_checked        = $this->getAttribute('checked');
        $string             = '';
        $id                 = $this->getAttribute('id');

        if (is_array($arr_checkboxes))
        {
            foreach ($arr_checkboxes as $key => $value)
            {
                $encode_key = str_replace(' ', '_', $key);
                $string = '<input {attr_name=attr_value} {extra_attr} id="'
                              ."${id}_$encode_key".'" value="'.$key.'" ';
                if (is_array($arr_checked))
                {
                    $string .= (in_array($key, $arr_checked))? 'checked ' : '';
                }
                $string .= '%id|checked|checkboxes|separator% />';
                $string .= ($value != '')? 
                               '<label for="{attr_id}_'.$encode_key.'">'.$value.'</label>' : '';
                $string .= $this->arr_attr['separator']."\n";

                if ($this->return_type == 'string')
                {
                    $arr_return['html'] .= $string; 
                }
                else 
                {                        
                    $arr_return['html'][] = $string; 
                } 
            }
        } 
        return $arr_return;
    }
    
}
?>
