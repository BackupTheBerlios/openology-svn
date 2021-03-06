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
// Created on 2004-12-29 12:33:35
// $Id: FormatCode.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * Format auto generated code.
 *
 * @package openology
 * @subpackage format
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
/**
 * Format auto generated code.
 *
 * @package openology.format
 */

class FormatCode
{
    /**
     * @var array
     */
    var $seperator = "\n";
    
    /**
     * @var array
     */
    var $indentation = '    ';
    
    /**
    * format the code, add indentation and line seperator
    * 
    * @param   String $string
    * @param   int    $count
    * @return  String $string
    * 
    **/
    function formatCodeLine($string, $count = 1)
    {
        for ($i = 1; $i <= $count; $i ++)
        {
            $string = $this->indentation.$string;
        }

        $string = $string.$this->seperator;

        return $string;
    }
}
?>
