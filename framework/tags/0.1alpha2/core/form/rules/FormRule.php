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
// Created on 2004-12-27 15:36:47
// $Id$ 

/**
 * Base class for form rules.
 *
 * @package openology
 * @subpackage form.rules
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
/**
 * Base class for form rules.
 *
 * @package openology.form.rules
 */

class FormRule
{
    /**
     * @var array
     */
    var $arr_args = array();    
    
    /**
    * Validates a value at server side
    * 
    * @return true
    */
    function validate()
    {
        return true;
    }    

    /**
     * Returns the javascript test
     *
     * @return  array first element is code to setup validation, second is the
     * check itself
     */
    function getValidationScript()
    {
        return array ('', '');
    }
}
?>