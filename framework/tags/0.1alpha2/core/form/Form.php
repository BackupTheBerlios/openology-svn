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
// Created on 2004-12-24 13:49:24
// $Id: Form.php 146 2005-01-11 08:24:42Z ken $
/**
 * Form class. 
 *
 * @package openology
 * @subpackage form
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
include_once OOO_CORE.'/form/elements/FormElement.php';
/**
 * Form class. 
 *
 * @package openology.form
 */
class Form
{
    /**
     * @var array
     */
    var $arr_element = array ();

    /**
     * @var array
     */
    var $arr_group = array ();

    /**
     * @var array
     */
    var $arr_attr = array ();

    /**
     * @var array
     */
    var $arr_rule = array ();
    
    /**
     * @var String
     */
    var $onsubmit;

    /**
     * Constructor
     * 
     * @param   String $name
     * @param   String $action
     * @param   String $method
     * @return  void
     */
    function Form($name, $action = 'index.php', $method = 'post')
    {
        $this->arr_attr['name'] = $name;
        $this->arr_attr['action'] = $action;
        $this->arr_attr['method'] = $method;
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
    * Adds an element into the form
    *
    * @param    String      $type       
    * @return   object     reference to element
    */
    function & addElement($type)
    {
        $elementObject = & $this->_loadElement($type);
        
        if ($type != "group")
        {
            $this->arr_element[] = & $elementObject;
        }
        else
        {
            $this->arr_group[] = & $elementObject;
        }
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
        if ($type != 'group')
        {
            $type = ucfirst(strtolower($type));
            if (!file_exists(OOO_CORE.'/form/elements/Form'.$type.'.php'))
            {
                echo 'This type of form element ('.$type.') does not exist!';
                // TODO: Isolate message to language file.
                exit;
            }
            include_once OOO_CORE.'/form/elements/Form'.$type.'.php';

            $classname = 'Form'.$type;
        }
        else
        {
            include_once OOO_CORE.'/form/elements/ElementGroup.php';
            $classname = 'ElementGroup';
        }

        $elementObject = & new $classname ();
        return $elementObject;
    }
    
    /**
     * Adds a javascript code to call a js function when form submit
     *
     * @param    String     $code      
     * @return   void
     * 
     */
    function addRule($code)
    {    
        $i = count($this->arr_rule);
        $this->arr_rule[$i]['code']       = $code;       
    }
}
?>
