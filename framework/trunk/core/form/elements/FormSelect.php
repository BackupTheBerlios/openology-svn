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
// Created on 2004-12-29 19:21:09
// $Id: FormSelect.php 146 2005-01-11 08:24:42Z ken $ 

/**
 * The select form element.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
include_once OOO_CORE.'/form/elements/FormElement.php';
/**
 * The select form element.
 *
 * @package openology.form.elements
 */
class FormSelect extends FormElement
{    
    /**
     * @var String
     */
    var $type = 'select';    
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function FormSelect()
    {
         parent::FormElement(); 
     
    }
    
    /**
     * html  string for an element
     * 
     * @return  String  $string
     * 
     */
    function toHtml()
    {
        $string  = "<select {attr_name=attr_value} {extra_attr} %selected|option%>\n";
        $arr_option = array();
        $arr_option = $this->arr_attr['option'];
        $selected = $this->arr_attr['selected'];
        while (list ($key, $value) = each($arr_option))
        {
            if ($key == $selected)
            {
                $string .= '  <option value="'.$key.'" selected>'.$value."</option>\n";
            }
            else
            {
                $string .= '  <option value="'.$key.'">'.$value."</option>\n";
            }
        }
        $string .= "</select>\n";
        return $string;
    }
}
?>