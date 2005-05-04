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
// Created on 2005-1-18 10:38:16
// $Id: RuleCheckboxrequired.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * The 'required' form rule.
 *
 * @package openology
 * @subpackage form.rules
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
include_once OOO_CORE.'/form/rules/FormRule.php';
/**
 * @package openology.form.rules
 */
class RuleCheckboxrequired extends FormRule
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
     * Returns the javascript code
     *
     * @return  array first element is code to setup validation, second is the
     * check itself
     */
    function getValidationScript()
    {
        return array ("var e=formobject.elements;\n" .
                "var checkresult = false;\n" .
                "for (var i=0;i<e.length;i++)\n" .
                "{\n" .
                "   if (e[i].type == 'checkbox' && e[i].checked && e[i].name == '{jsObjname}')\n" .
                "   {\n" .
                "      checkresult = true;\n" .
                "   }\n" .
                "}\n", "checkresult == false");
    }
}
?>