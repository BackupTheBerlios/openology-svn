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
// Created on 2004-12-30 18:33:01
// $Id: FormReset.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * The reset button form element.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
include_once OOO_CORE.'/form/elements/FormElement.php';
/**
 * The reset button form element.
 *
 * @package openology.form.elements
 */
class FormReset extends FormElement
{
    /**
     * @var String
     */
    var $type = 'reset';   
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function FormReset()
    {
        parent::FormElement();  
        $this->setAttribute('class', 'button');       
    }
}

?>