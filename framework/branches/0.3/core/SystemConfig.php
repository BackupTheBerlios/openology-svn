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
// Created on 2005-12-21 1:52:03
// $Id: SystemConfig.php 551 2005-05-04 04:27:25Z ken $ 
     
/**
 * System configuration.
 *
 * @package openology
 * @subpackage core
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
include_once OOO_CORE.'/Config.php';
include_once OOO_CORE.'/Themes.php'; 
include_once OOO_CORE.'/Language.php'; 
/**
 * System configuration.
 *
 * @package openology
 */
class SystemConfig
{   
    /**
     * get the System config information
     * 
     * @param   object &$DBconn
     * @return  array $arr_config
     * 
     */   
    function getConfigByDB(&$DBconn)
    {        
        $arr_data = array();
        $arr_data['Themes'] = _getThemesConfigByDB(&$DBconn);        
    }
    
    /**
     * get the Themes config information
     * 
     * @param   object &$DBconn
     * @return  array $arr_data
     * 
     */   
    function getThemesByDB(&$DBconn)
    {
        $config = new Config(&$DBconn);
        $config->config_name = 'themes';
        $themes_id = $config->getValuebyName();
        
        $themes = new Themes(&$DBconn);
        $themes->id = $themes_id;
        $arr_data = $themes->selectThemes(); 
        
        return $arr_data;      
    }
    
     /**
     * get the Language config information
     * 
     * @param   object &$DBconn
     * @param   int    $lang_id
     * @return  array  $arr_data
     * 
     */   
    function getLangByDB(&$DBconn, $lang_id)
    {
        $language = new Language(&$DBconn);
        $language->id = $lang_id;
        $arr_data = $language->selectLanguage();  
        
        return $arr_data;
    }
}
?>