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
// Created on 2004-12-29 17:42:58
// $Id$ 

/**
 * The input button form element.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
include_once OOO_CORE.'/form/elements/FormElement.php';
/**
 * The input button form element.
 *
 * @package openology.form.elements
 */
class FormButton extends FormElement
{
    /**
     * @var String
     */
    var $type = 'button';   
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function FormButton()
    {
        parent::FormElement();  
        $this->setAttribute('class', 'button');       
    }
}
?>