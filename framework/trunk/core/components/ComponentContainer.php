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
// Created on 2005-1-26 15:52:44
// $Id$
/**
 * Component Container. 
 *
 * @package openology
 * @subpackage components
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */

/**
 * Component Container. 
 *
 * @package openology.components
 */
class ComponentContainer
{
    /**
     * @var array
     */
    var $arr_element = array ();

    /**
     * @var array
     */
    var $arr_attr = array ();

    /**
     * Constructor
     * 
     * @param   String $name
     * @param   String $action
     * @param   String $method
     * @return  void
     */
    function ComponentContainer()
    {

    }

    /**
     * set the attribute of the ComponentContainer
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
     * get the attribute of the ComponentContainer
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
        $obj_element = & $this->_loadElement($type);

        $this->arr_element[] = & $obj_element;

        return $obj_element;
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
        if (!file_exists(OOO_CORE.'/components/'.$type.'.php'))
        {
            echo 'This type of component ('.$type.') does not exist!';
            // TODO: Isolate message to language file.
            exit;
        }
        include_once OOO_CORE.'/components/'.$type.'.php';

        $classname = $type;

        $obj_element = & new $classname ();
        return $obj_element;
    }    
}
?>