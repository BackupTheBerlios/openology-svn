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
// Created on 2004-12-29 19:06:51
// $Id: FormPassword.php 146 2005-01-11 08:24:42Z ken $ 

/**
 * The password input form element.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
include_once OOO_CORE.'/form/elements/FormElement.php';
/**
 * The password input form element.
 *
 * @package openology.form.elements
 */
class FormPassword extends FormElement
{    
    /**
     * @var String
     */
    var $type = 'password';   
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function FormPassword()
    {
         parent::FormElement();
    }
    
}

?>