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
// Created on 2004-12-29 12:03:58
// $Id: ComponentSmartyWrapper.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * SmartyWrapper, wrapper the form, to display in a smarty template.
 *
 * @package openology
 * @subpackage components.wrappers
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */

include_once OOO_CORE.'/components/wrappers/ComponentWrapper.php';
/**
 * SmartyWrapper, wrapper the components, to display in a smarty template.
 *
 * @package openology.orgponents.wrappers
 */
class ComponentSmartyWrapper extends ComponentWrapper
{
    /**
    * Constructor
    * 
    * @param   object $container
    * @return  void
    */
    function ComponentSmartyWrapper(& $container)
    {
       $this->container = & $container;        
    }

    /**
     * put all the information of a form into an array, for smarty template
     * 
     * @return  array  $arr_component
     */
    function toArray()
    {
        $arr_component = array();        

        //generate elements
        $arr_element = $this->container->arr_element;
        for ($i = 0; $i < count($this->container->arr_element); $i ++)
        {
            $obj_element = $arr_element[$i];
            $arr_component[$obj_element->id] = array();
                                 
            $arr_component[$obj_element->id]['html'] = $obj_element->toHtml();
        }     
        
        return $arr_component;
    }    
}

?>
