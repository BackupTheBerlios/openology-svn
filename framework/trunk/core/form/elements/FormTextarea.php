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
// Created on 2004-12-29 17:54:04
// $Id$ 

/**
 * The textarea form element.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
include_once OOO_CORE.'/form/elements/FormElement.php';
/**
 * The textarea form element.
 *
 * @package openology.form.elements
 */
class FormTextarea extends FormElement
{    
    /**
     * @var String
     */
    var $type = 'textarea';    
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function FormTextarea()
    {
         parent::FormElement(); 
     
    }
    
    /**
     * Return html rendering for the element label
     * $arr_return['label'] - array or string of form element lable 
     * $arr_return['html'] -  array or string of form element 
     *
     * @return  Array  $arr_return
     * html  string for an element
     * 
     * @return  String  $string
     * 
     */
    function toHtml()
    {
        $arr_return = parent::toHTML();
        $arr_return['html'] = '<textarea {attr_name=attr_value} %value|type% {extra_attr}>'.$this->getAttribute('value').'</textarea>';
        
        return $arr_return;
    }
}

?>
