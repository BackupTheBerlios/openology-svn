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
// Created on 2006-2-16 11:18:42
// $Id:$ 
     
/**
 * generate class file.
 *
 * @package openology
 * @subpackage core
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */

/**
 * generate class file.
 *
 * @package admin
 */ 

class GenClass extends Gen
{
    /**
    * auto generate class file
    * 
    * @param   
    * @return  void
    * 
    **/
    function genClass()
    {
        $this->_file->file_name = GEN_DIR."/".$this->db_name."/".$this->table_name."/".$this->table_name.".php";
        $this->_file->open("w");

        $string = $this->_genClassHead();
        $string .= $this->_genConstructor();
        $string .= $this->_genInsert();
        $string .= $this->_genUpdate();        
        $string .= $this->_genDelete();
        $string .= $this->_genSelect();
        $string .= $this->_genSelectAll();
        $string .= $this->_genClassFoot();
        $this->_file->write($string);
    }
}
 
?>