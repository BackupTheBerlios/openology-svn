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
// Created on 2004-11-19 11:09:38
// $Id$ 
     
/**
 * Common file operations.
 *
 * @package openology
 * @subpackage io
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
/**
 * Common file operations.
 *
 * @package openology.io
 */ 
class File
{

	/**
     * @var string
     */
    var $file_name = '';

	/**
     * @var string
     */
    var $file_path = '';
    
	/**
     * unused
     */
    var $file_size;
    
    /**
     * @var int
     */
    var $file_perm = 0755;    

	/**
     * @var string
     */
    var $mode = '';
            
	/**
     * @var resource
     */
    var $_file_handle;
        
    /**
     * Constructor
     * 
     * @param   string file_name
     * @return  void
     */
    function File($file_name)
    {
        $this->file_name = $file_name;
    }
    
    /**
     * Open a file
     * 
     * @param   String $mode
     * @return  boolean
     * 
     */    
    function open($mode)
    {
        $this->mode = $mode;        
        $this->_file_handle = fopen($this->file_name, $this->mode);
        
        if ($this->_file_handle == false)
        {            
            return false;
        }
        else
        {
            return true;
        }
    }
    
    /**
     * Close a file
     * 
     * @return  boolean $result
     * 
     */    
    function close()
    {
        $result = fclose($this->_file_handle);
        if($result == true)
        {
            $this->_file_handle = '';           
        }
        
        return $result;
    }
    
    /**
     * Write a  file
     * 
     * @param   String  $string
     * @return  boolean $result
     * 
     */
    function write($string)
    {
        $result= fwrite($this->_file_handle, $string);        
        return $result;
    }
    
    /**
     * Write a line and append a LF character
     *
     * @param   string  $string
     * @param 	string 	$lf
     * @return  boolean $result
     * 
     */
    function writeLine($string, $lf = '\n')
    {
        $result= fwrite($this->_file_handle, $string.$lf);
     
        return $result;
    }
}
?>