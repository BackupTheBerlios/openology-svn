<?php 
// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004-05 openology.org Team                                  |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// Created on 2005-4-26 10:31:28
// $Id: Action.php 364 2005-02-14 06:31:41Z andy $ 

/**
 * Page class.
 *
 * @package openology
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 openology.org Team
 */
include_once OOO_CORE.'/form/Form.php';
include_once OOO_CORE.'/form/FormController.php';
include_once OOO_CORE.'/components/ComponentContainer.php';
include_once OOO_CORE.'/components/ComponentController.php';

/**
 * Page class.
 *
 * @package openology
 */

class Page
{
    var $_arr_form = array ();
    var $_container;
    var $_arr_request = array ();
    var $_arr_output = array ();
    var $uri;
    var $template;
    var $arr_config;

    /**
     * Constructor
     * 
     * @param   object $DBconn
     * @return  void
     */
    function Page(& $DBconn, $uri, $arr_config)
    {        
        $this->DB = & $DBconn;
        $this->uri = $uri;
        $this->arr_config = $arr_config;
        $this->_container = new ComponentContainer();
        $this->_initRequest();
                      
        $this->Process();       
    }

    function Process()
    {

    } 

    /**
     * create form
     * 
     * @param   string $formname
     * @return  form
     */
    function & createForm($formname)
    {
        $form = new Form($formname);
        
        $this->_arr_form[] = & $form;
       
        return $form;
    }

    /**
     * create component
     * 
     * @param   string $componentname
     * @return  form
     */
    function & createComponent($componentname)
    {
        return $this->_container->addElement($componentname);
    }

    function _initRequest()
    {
        $this->_arr_request = $_REQUEST;
    }

    /**
     * get the value of the http request
     * 
     * @param   string $name
     * @return  value
     */
    function getRequest($name)
    {
        return $this->_arr_request[$name];
    }

    /**
     * set the attribute of the form
     * 
     * @param   string $name
     * @param   mixed $value
     * @return  void
     */
    function setOutput($name, $value)
    {
        $this->_arr_output[$name] = nl2br(htmlspecialchars($value));
    }
}
?>