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
// Created on 2005-1-19 15:24:05
// $Id$ 

/**
 * Date Formatter
 *
 * @package openology
 * @subpackage format
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
 */

include_once OOO_CORE.'/format/Formatter.php';
/**
 * Date Formatter
 *
 * @package openology.format
 */

class DateFormatter extends Formatter
{
    /**
     * Constructor
     * 
     * @return  void
     */
    function DateFormatter($arr_config)
    {
        parent :: Formatter($arr_config);
    }

    /**
     * format the code
     * 
     * @param   String $Date
     * @param   String $oldformat
     * @return  String $Date
     */
    function format($Date, $newformat=null, $oldformat='Y-m-d')
    {
        if ($newformat == null)
        {
            $new_date_format = $this->arr_config['new_date_format'];
        }
        else
        {
            $new_date_format = $newformat;
        }

        if ($this->arr_config['old_date_format'] != '')
        {
            $old_date_format = $this->arr_config['old_date_format'];
        }
        else
        {
            $old_date_format = $oldformat;
        }

        $arr_data = split('-', $Date);        
        
        $Date = date($new_date_format, mktime(0, 0, 0, $arr_data[1], $arr_data[2], $arr_data[0]));

        return $Date;
    }
}
?>