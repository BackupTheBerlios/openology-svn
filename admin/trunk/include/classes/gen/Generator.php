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
// Created on 2004-11-22 10:52:19
// $Id:$ 

/**
 * Code generator
 *
 * @package Openology
 * @subpackage core.gen
 * @author ken <ken.chew@openology.com>
 * @copyright (C) 2004 Openology Pte Ltd
 */

include_once OOO_CORE."/io/File.php";
include_once OOO_CORE."/io/Folder.php";

class Generator
{
    var $db_name = "";
    var $table_name = "";
    var $arr_field = array ();
    var $_file;
    var $_folder;
    var $gen_dir = "";
    var $seperator = "\n";
    var $indentation = "    ";
    var $file_head = "<?php";
    var $need_prefix = false;
    var $class_name = "";
    var $smarty_name = "smarty";
    var $smarty;

    /**
    * Constructor
    * 
    * @param   String $gen_dir
    * @return  void
    * 
    **/
    function Generator()
    {
        $this->_file = new File("");
        $this->_folder = new Folder("");
    }

    /**
    * create a dir structure for a db
    * 
    * @param   
    * @return  boolean
    * 
    **/
    function createDirStructure()
    {
        $this->_createRootDir();
        $this->_createClasssDir();
        $this->_createModuleDir();
        $this->_createTemplateDir();
    }

    /**
    * create a dir for a db, if the dir already exists, delete it first
    * 
    * @param   
    * @return  boolean
    * 
    **/
    function _createRootDir()
    {
        $this->gen_dir = GEN_DIR."/".$this->db_name;
        $this->_folder->dir_name = $this->gen_dir;
        $this->_folder->delete();
        $this->_folder->dir_perm = 0777;

        return $this->_folder->create();
    }

    /**
    * create a dir for classes, if the dir already exists, delete it first
    * 
    * @param   
    * @return  boolean
    * 
    **/
    function _createClasssDir()
    {
        $this->gen_dir = GEN_DIR."/".$this->db_name."/classes";
        $this->_folder->dir_name = $this->gen_dir;
        $this->_folder->delete();
        $this->_folder->dir_perm = 0777;

        return $this->_folder->create();
    }

    /**
    * create a dir for classes, if the dir already exists, delete it first
    * 
    * @param   
    * @return  boolean
    * 
    **/
    function _createModuleDir()
    {
        $this->gen_dir = GEN_DIR."/".$this->db_name."/modules";
        $this->_folder->dir_name = $this->gen_dir;
        $this->_folder->delete();
        $this->_folder->dir_perm = 0777;

        return $this->_folder->create();
    }

    /**
    * create a dir for classes, if the dir already exists, delete it first
    * 
    * @param   
    * @return  boolean
    * 
    **/
    function _createTemplateDir()
    {
        $this->gen_dir = GEN_DIR."/".$this->db_name."/templates";
        $this->_folder->dir_name = $this->gen_dir;
        $this->_folder->delete();
        $this->_folder->dir_perm = 0777;

        return $this->_folder->create();
    }

    /**
    * auto generate class file
    * 
    * @param   
    * @return  void
    * 
    **/
    function genClass()
    {
        $this->_file->file_name = GEN_DIR."/".$this->db_name."/classes/".$this->class_name.".php";
        $this->_file->open("w");

        $this->smarty->assign("table_name", $this->table_name);
        $this->smarty->assign("class_name", $this->class_name);
        $this->smarty->assign("data", $this->arr_field);

        $output = $this->smarty->fetch("class.tpl");

        $this->_file->write($output);
    }

    /**
    * auto generate crud file
    * 
    * @param   
    * @return  void
    * 
    **/
    function genCrud()
    {
        $this->_file->file_name = GEN_DIR."/".$this->db_name."/modules/".$this->table_name."_crud.php";
        $this->_file->open("w");

        $this->smarty->assign("table_name", $this->table_name);
        $this->smarty->assign("class_name", $this->class_name);
        $this->smarty->assign("data", $this->arr_field);

        $output = $this->smarty->fetch("crud_php.tpl");

        $this->_file->write($output);
    }

    /**
    * auto generate list php file and template
    * 
    * @param   
    * @return  void
    * 
    **/
    function genList()
    {
        $this->_file->file_name = GEN_DIR."/".$this->db_name."/modules/".$this->table_name."_list.php";
        $this->_file->open("w");

        $this->smarty->assign("table_name", $this->table_name);
        $this->smarty->assign("class_name", $this->class_name);

        $output = $this->smarty->fetch("list_php.tpl");

        $this->_file->write($output);

        $this->_file->file_name = GEN_DIR."/".$this->db_name."/templates/".$this->table_name."_list.html";
        $this->_file->open("w");

        $this->smarty->assign("table_name", $this->table_name);
        $this->smarty->assign("class_name", $this->class_name);

        $arr_listfield = array ();
        for ($i = 0, $n = 0; $i < count($this->arr_field); $i ++)
        {
            if ($this->arr_field[$i]['is_list'] == 1)
            {
                $arr_listfield[$n] = $this->arr_field[$i];
                $n ++;
            }
        }

        $this->smarty->assign("data", $arr_listfield);

        $output = $this->smarty->fetch("list_html.tpl");

        $this->_file->write($output);
    }

    /**
    * auto generate form php file and template
    * 
    * @param   
    * @return  void
    * 
    **/
    function genForm()
    {
        $this->_file->file_name = GEN_DIR."/".$this->db_name."/modules/".$this->table_name."_form.php";
        $this->_file->open("w");

        $this->smarty->assign("table_name", $this->table_name);
        $this->smarty->assign("class_name", $this->class_name);
        $this->smarty->assign("data", $this->arr_field);

        $output = $this->smarty->fetch("form_php.tpl");

        $this->_file->write($output);

        $this->_file->file_name = GEN_DIR."/".$this->db_name."/templates/".$this->table_name."_form.html";
        $this->_file->open("w");
        
        $this->smarty->assign("table_name", $this->table_name);
        $this->smarty->assign("class_name", $this->class_name);
        $this->smarty->assign("data", $this->arr_field);
             
        $output = $this->smarty->fetch("form_html.tpl");
                                                                                                                    
        $this->_file->write($output);
    }
    
    /**
    * auto generate detail php file and template
    * 
    * @param   
    * @return  void
    * 
    **/
    function genDetail()
    {
        $this->_file->file_name = GEN_DIR."/".$this->db_name."/modules/".$this->table_name."_detail.php";
        $this->_file->open("w");

        $this->smarty->assign("table_name", $this->table_name);
        $this->smarty->assign("class_name", $this->class_name);
        $this->smarty->assign("data", $this->arr_field);

        $output = $this->smarty->fetch("detail_php.tpl");

        $this->_file->write($output);

        $this->_file->file_name = GEN_DIR."/".$this->db_name."/templates/".$this->table_name."_detail.html";
        $this->_file->open("w");
        
        $this->smarty->assign("table_name", $this->table_name);
        $this->smarty->assign("class_name", $this->class_name);
        $this->smarty->assign("data", $this->arr_field);
             
        $output = $this->smarty->fetch("detail_html.tpl");
                                                                                                                    
        $this->_file->write($output);
    }

    /**
    * add a prefix for a table in the sqlString
    * 
    * @param   String $string
    * @return  String $string
    * 
    **/
    function _prefix($string)
    {
        if ($this->need_prefix != false)
        {
            $string = "\".DB_PREFIX.\"".$string;
        }
        return $string;
    }

}
?>