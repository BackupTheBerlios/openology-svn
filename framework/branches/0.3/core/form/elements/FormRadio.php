<?php
// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004-05 Openology.org Team                                |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// Created on 2004-12-29 19:09:02
// $Id: FormRadio.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * The radio button input form element.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
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
        $arr_radios         = array();
        $arr_radios         = $this->getAttribute('radios');
        $checked            = $this->getAttribute('checked');
        $id                 = $this->getAttribute('id');
        if (is_array($arr_radios))
        {
            foreach ($arr_radios as $key => $value)
            {
                $encode_key = str_replace(' ', '_', $key);
                
                $arr_return['html'] .= '<input {attr_name=attr_value} {extra_attr} id="'
                                           ."${id}_$encode_key".'" value="'.$key.'"';
                $arr_return['html'] .= ($key == $checked)? ' checked' : '';
                $arr_return['html'] .= '%id|checked|radios|separator% />';
                $arr_return['html'] .= ($value != '')? 
                                           '<label for="{attr_id}_'.$encode_key.'">'.$value.'</label>' : '';
                $arr_return['html'] .= $this->arr_attr['separator']."\n";
            }
        }
        return $arr_return;
    }
    
}
?>
