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
// Created on 2004-12-30 14:08:20
// $Id$ 

/**
 * The file upload select form element.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
include_once OOO_CORE.'/form/elements/FormElement.php';
/**
 * The file upload select form element.
 *
 * @package openology.form.elements
 */
class FormFile extends FormElement
{    
    /**
     * @var String
     */
    var $type = 'file';   
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function FormFile()
    {
         parent::FormElement();
         $this->setAttribute('class', 'file');
    }
    
}

?>