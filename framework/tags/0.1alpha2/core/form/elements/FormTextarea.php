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
// $Id: FormTextarea.php 146 2005-01-11 08:24:42Z ken $ 

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
     * html  string for an element
     * 
     * @return  String  $string
     * 
     */
    function toHtml()
    {
        $string = '<textarea {attr_name=attr_value} %value% {extra_attr}>'.$this->getAttribute('value').'</textarea>';
        
        return $string;
    }
}

?>