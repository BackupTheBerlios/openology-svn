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
// $Id: FormCheckbox.php 146 2005-01-11 08:24:42Z ken $ 

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
     * @var String
     */
    var $return_type = 'String';
    
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
    }
    
    /**
     * html  string for an element
     * 
     * @return  String  $string
     * 
     */
    function toHtml()
    {
        $string = '';      
        $arr_checkboxs = array();
        $arr_checkboxs = $this->arr_attr['checkboxs'];
        $arr_checked = array();
        $arr_checked = $this->arr_attr['checked'];
        $arr_return = array();
        
        if (is_array($arr_checkboxs))
        {
            while (list ($key, $value) = each($arr_checkboxs))
            {
                if ($key == $checked)
                {                    
                    $string .= '<input {attr_name=attr_value} {extra_attr} value="'.$key.'" checked %checked|checkboxs|separator%>'.$value.$separator."\n";
                }
                else
                {
                    if ($this->return_type == 'String')
                    {
                        $string .= '<input {attr_name=attr_value} {extra_attr} value="'.$key.'" %checked|checkboxs|separator%>'.$value.$separator."\n";
                    }
                    else
                    {                        
                        $arr_return[] = '<input {attr_name=attr_value} {extra_attr} value="'.$key.'" %checked|checkboxs|separator%>'.$value.$separator."\n";; 
                    }
                }
            }
        }       
        
        if ($this->return_type == 'String')
        { 
            return $string;
        }
        else
        {
            return $arr_return;
        }
    }
    
}
?>
