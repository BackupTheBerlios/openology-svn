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
// Created on 2005-1-26 10:07:57
// $Id$ 

/**
 * Uri class . 
 *
 * @package openology
 * @subpackage core
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
/**
 * Uri class to process http Uri. 
 *
 * @package openology
 */

class Uri
{
    /**
     * request uri
     * @var String
     */
    var $request_uri;
    
    /**
     * request method post or get
     * @var String
     */
    var $method;
    
    /**
     * An associative array of post or get param.
     * @var array
     */
    var $arr_param = array();
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function Uri()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->_loadParam();
        $this->_loadRequest_URI();
    }
    
    /**
     * get the Uri
     * 
     * @param   array  $arr_param
     * @param   String $type  new or current
     * @param   String $uri_address
     * @return  String $uri
     */
    function getUri($arr_param=null, $type='new', $uri_address='index.php')
    {
        if ($type == 'new')
        {
            $uri = $uri_address.$this->_joinParam($arr_param);
        }
        else
        {
            $uri = $this->request_uri.$this->_joinParam($this->arr_param);
        }
        
        return $uri;
    }
    
    /**
     * load the param
     * 
     * @return  void
     */
    function _loadParam()
    {
        if ($this->method == 'POST')
        {
            foreach($_POST as $key => $value)
            {
               $this->arr_param[$key] = $this->_cleanUri($_POST[$key]);
            }
        }
        else
        {
            foreach($_GET as $key => $value)
            {
               $this->arr_param[$key] = $this->_cleanUri($_GET[$key]);
            }
        }
    }
    
    /**
     * join the  param
     * 
     * @return  String $string
     */
    function _joinParam($arr_param)
    {               
        $string = '';        
        $i = 0;
        
        foreach ($arr_param as $key => $value)
        {
            if ($i == 0)
            {
                $string = '?'.$key.'='.$arr_param[$key];
            }
            else
            {
                $string .= '&amp;'.$key.'='.$arr_param[$key];
            }
            
            $i++;
        }
        
        return $string;
    }
    
    /**
     * set the post or get param
     * 
     * @param   string $name
     * @param   string $value
     * @return  void
     */
    function setParam($name, $value)
    {
        $this->arr_param[$name] = $value;
    }

    /**
     * get the post or get param
     * 
     * @param   string $name
     * @return  void
     */
    function getParam($name)
    {
        return $this->arr_param[$name];
    }
    
    /**
     * clean the uri, remove html tags, php tags, javascript
     * 
     * @return  String $string
     */
    function _cleanUri($string)
    {
        $string = strip_tags($string);
        
        $search = "/<script[^>]*?>.*?<\/script>/i";
        $replace = '';
        $string = preg_replace($search, $replace, $string);
        
        return $string;
    }
    
    /**
     * load request_uri
     * 
     * @return  void
     */
    function _loadRequest_URI()
    {
        $arr_uri = split('/', $_SERVER['PHP_SELF']);
        $i = count($arr_uri) - 1;
        $this->request_uri = $arr_uri[$i];
    }
}
?>