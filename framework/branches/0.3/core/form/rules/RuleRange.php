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
// Created on 2004-12-28 14:44:13
// $Id: RuleRange.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * The range of the input value form rule.
 *
 * @package openology
 * @subpackage form.rules
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
include_once OOO_CORE.'/form/rules/FormRule.php';
/**
 * The range of the input value form rule.
 *
 * @package openology.form.rules
 */
class RuleRange extends FormRule
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
     * @param   array $arr_args
     * @return  array first element is code to setup validation, second is the
     * check itself
     */
    function getValidationScript()
    {
        $first_args = $this->arr_args[0];
        switch ($first_args) 
        {
            case 'min': 
                $test = 'testString.length < '.$this->arr_args[1];
                break;
            case 'max': 
                $test = 'testString.length > '.$this->arr_args[1];
                break;
            default: 
                $test = '(testString.length < '.$this->arr_args[0].' || testString.length > '.$this->arr_args[1].')';
        }
        return array('var testString = {jsObj}.value', "testString != '' && {$test}");
    }
}
?>