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
// Created on 2004-12-30 13:54:50
// $Id: FormAllcheckbox.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * A subclass of checkbox, checking it will check all linked checkboxes.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
include_once OOO_CORE.'/form/elements/FormCheckbox.php';
/**
 * A subclass of checkbox, checking it will check all linked checkboxes.
 *
 * @package openology.form.elements
 */
class FormAllcheckbox extends FormCheckbox
{   
    /**
     * Constructor
     * 
     * @return  void
     */
    function FormAllcheckbox()
    {
         parent::FormCheckbox();         
         $this->setAttribute('id', 'allcheckbox');
         $arr_checkbox = array(1=>'');
         $this->setAttribute('checkboxes', $arr_checkbox);
         $this->setAttribute('onclick','selectAll(this);');
    }    
}
?>
