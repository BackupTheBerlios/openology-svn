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
// Created on 2004-12-29 19:09:02
// $Id: FormRadio.php 146 2005-01-11 08:24:42Z ken $ 

/**
 * The radio button input form element.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
include_once OOO_CORE.'/form/elements/FormElement.php';
/**
 * The radio button input form element.
 *
 * @package openology.form.elements
 */
class FormRadio extends FormElement
{    
    /**
     * @var String
     */
    var $type = 'radio';   
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function FormRadio()
    {
         parent::FormElement();
         $this->setAttribute('separator', " ");
         $this->setAttribute('class', 'radio');
    }
    
    /**
     * html  string for an element
     * 
     * @return  String  $string
     * 
     */
    function toHtml()
    {
        $string = "";      
        $arr_radios = array();
        $arr_radios = $this->arr_attr['radios'];
        $checked = $this->arr_attr['checked'];
        if (is_array($arr_radios))
        {
            while (list ($key, $value) = each($arr_radios))
            {
                if ($key == $checked)
                {
                    $string .= '<input {attr_name=attr_value} {extra_attr} value="'.$key.'" checked %checked|radios|separator%>'.$value.$separator."\n";
                }
                else
                {
                    $string .= '<input {attr_name=attr_value} {extra_attr} value="'.$key.'" %checked|radios|separator%>'.$value.$separator."\n";
                }
            }
        }       
    
        return $string;
    }
    
}

?>