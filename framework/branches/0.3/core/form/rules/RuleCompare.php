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
// Created on 2005-1-18 14:13:06
// $Id: RuleCompare.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * The 'compare' form rule.
 *
 * @package openology
 * @subpackage form.rules
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
include_once OOO_CORE.'/form/rules/FormRule.php';
/**
 * The 'compare' form rule.
 * @package openology.form.rules
 */
class RuleCompare extends FormRule
{
    /**
     * Checks if an element is empty
     *
     * @param     string    $value      Value to check
     * @param     mixed     $options    Not used yet
     * @access    public
     * @return    boolean   true if value is not empty
     */
    function validate($value, $options = null)
    {
        if ($value == '')
        {
            return false;
        }
        return true;
    }

    /**
     * Returns the javascript test code
     *
     * @return  array first element is code to setup validation, second is the
     * check itself
     */
    function getValidationScript()
    {       
        if (count($this->arr_args) == 3)
        {
            return array ('', '! ('.$this->arr_args[1].' '.$this->arr_args[0].' '.$this->arr_args[2].')');
        }
        else
        {
            return array ('', '! ({jsObj}.value '.$this->arr_args[0].' '.$this->arr_args[1].')');
        }
    }
}
?>