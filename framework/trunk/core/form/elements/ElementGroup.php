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
// Created on 2005-1-10 14:44:40
// $Id: ElementGroup.php 146 2005-01-11 08:24:42Z ken $ 

/**
 * Element group, form elements can be grouped with it.
 *
 * @package openology
 * @subpackage form.elements
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */

/**
 * Element group, form elements can be grouped with it.
 *
 * @package openology.form.elements
 */
class ElementGroup
{
    /**
     * @var array
     */
    var $arr_element = array();
    
    /**
     * @var array
     */
    var $arr_rule = array();
    
    /**
     * @var array
     */
    var $arr_attr = array ();
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function ElementGroup()
    {        
    }
    
    /**
     * set the attribute of the form
     * 
     * @param   string $name
     * @param   string $value
     * @return  void
     */
    function setAttribute($name, $value)
    {
        $this->arr_attr[$name] = $value;
    }

    /**
     * get the attribute of the form
     * 
     * @param   string $name
     * @return  void
     */
    function getAttribute($name)
    {
        return $this->arr_attr[$name];
    }
    
    /**
    * Adds an element into the group
    *
    * @param    String      $type       
    * @return   object     reference to element
    */
    function & addElement($type)
    {         
        $elementObject = & $this->_loadElement($type);
        $this->arr_element[] = & $elementObject;
        return $elementObject;
    }

    /**
     * Returns a form element of the given type
     *
     * @param     string   $type    element type
     * @return    object    a new element
     * 
     */
    function & _loadElement($type)
    {
        $type = ucfirst(strtolower($type));        
        if(!file_exists(OOO_CORE.'/form/elements/Form'.$type.'.php'))
        {           
            echo 'This type of form element ('.$type.') does not exist!';
            // TODO: Isolate message to language file.
            exit;
        }
        include_once OOO_CORE.'/form/elements/Form'.$type.'.php';
       
        $classname = 'Form'.$type;       
       
        $elementObject = & new $classname();              
        return $elementObject;
    }
}
?>