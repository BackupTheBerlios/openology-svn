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
// Created on 2004-12-29 19:21:09
// $Id: FormSelect.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * The select form element.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
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
     * Return html rendering for the element label
     * $arr_return['label'] - array or string of form element lable 
     * $arr_return['html'] -  array or string of form element 
     *
     * @return  Array  $arr_return
     * 
     */
    function toHtml()
    {
        $arr_return = parent::toHtml();
        $arr_return['html']  = "<select {attr_name=attr_value} {extra_attr} %type|selected|option%>\n";
        $arr_option = array();
        $arr_option = $this->arr_attr['option'];
        $selected = $this->arr_attr['selected'];
        foreach ($arr_option as $key => $value)
        {
            if ($key == $selected)
            {
                $arr_return['html'] .= '  <option value="'.$key.'" selected>'.$value."</option>\n";
            }
            else
            {
                $arr_return['html'] .= '  <option value="'.$key.'">'.$value."</option>\n";
            }
        }
        $arr_return['html'] .= "</select>\n";
        return $arr_return;
    
        //TODO: Add support for <optgroup label=""></optgroup>
    }    
}
?>
