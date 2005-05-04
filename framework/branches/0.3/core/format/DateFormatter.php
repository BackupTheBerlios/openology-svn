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
// Created on 2005-1-19 15:24:05
// $Id: DateFormatter.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * Date Formatter
 *
 * @package openology
 * @subpackage format
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
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
    function format($Date, $newformat = null, $oldformat = 'Y-m-d')
    {
        if ($Date != null && $Date != '0000-00-00')
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
        }
        else
        {
            $Date = '';    
        }        

        return $Date;
    }
}
?>