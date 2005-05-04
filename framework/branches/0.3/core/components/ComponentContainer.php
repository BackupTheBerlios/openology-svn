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
// Created on 2005-1-26 15:52:44
// $Id: ComponentContainer.php 551 2005-05-04 04:27:25Z ken $
/**
 * Component Container. 
 *
 * @package openology
 * @subpackage components
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */

/**
 * Component Container. 
 *
 * @package openology.orgponents
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