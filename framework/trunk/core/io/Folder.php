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
// Created on 2004-11-22 11:06:08
// $Id$ 

/**
 * Common folder operations.
 *
 * @package openology
 * @subpackage io
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */
 /**
 * Common folder operations.
 *
 * @package openology.io
 */ 
class Folder
{
    /**
     * @var string
     */
    var $dir_name;

    /**
     * @var int
     */
    var $dir_perm = 0755;
    
    /**
     * @var resource
     */
    var $_dir_handle;

    /**
     * Constructor
     * 
     * @param   String $dir_name
     * @return  void
     */
    function Folder($dir_name)
    {
        $this->dir_name = $dir_name;
    }

    /**
     * Create a folder
     * 
     * @return  boolean
     * 
     */
    function create()
    {
        if (is_dir($this->dir_name))
        {
            return true;
        }
       
        return mkdir($this->dir_name, $this->dir_perm);
    }

    /**
     * Delete a folder
     * 
     * @return  boolean
     * 
     */
    function delete($dirname = '')
    {
        if ($dirname == '')
        {
            $dirname = $this->dir_name;
        }
        if (is_dir($dirname))
        {
            chmod($dirname,0777);
            $handle = opendir($dirname);
            while ($sub = readdir($handle))
            {
                if ($sub != '.' && $sub != '..')
                {
                    $this->delete($dirname.'/'.$sub);
                }
            }
            closedir($handle);
            $result = rmdir($dirname);
            if ($result && $dirname == $this->dir_name)
            {
                return true;
            }
        }
        else
        {
            if($dirname == $this->dir_name)
            {
                return false;
            }
            else
            {
                unlink($dirname);
                $this->dir_name = '';
            }
        }
    }
}
?>