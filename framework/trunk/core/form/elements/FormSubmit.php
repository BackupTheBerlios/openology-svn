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
// Created on 2004-12-30 18:30:48
// $Id: FormSubmit.php 146 2005-01-11 08:24:42Z ken $ 

/**
 * The submit button form element.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
include_once OOO_CORE.'/form/elements/FormElement.php';
/**
 * The submit button form element.
 *
 * @package openology.form.elements
 */
class FormSubmit extends FormElement
{
    /**
     * @var String
     */
    var $type = 'submit';    
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function FormSubmit()
    {
        parent::FormElement();  
        $this->setAttribute('class', 'submit');       
    }
}
?>