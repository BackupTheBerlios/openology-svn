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
// Created on 2005-1-3 15:35:39
// $Id: FormBackbutton.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * Implements a back button form element.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
include_once OOO_CORE.'/form/elements/FormButton.php';
/**
 * Implements a back button form element.
 *
 * @package openology.form.elements
 */

class FormBackbutton extends FormButton
{     
    /**
     * Constructor
     * 
     * @return  void
     */
    function FormBackbutton()
    {
        parent::FormButton();          
        
        $this->setAttribute('id', 'backbutton'); 
        $this->setAttribute('value', 'Back');     
        $this->setAttribute('onclick',"javascript:window.history.back();");           
    }
}
?>