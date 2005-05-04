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
// Created on 2005-1-25 17:21:38
// $Id: Pager.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * Split pages of database query.
 *
 * @package openology
 * @subpackage components
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
include_once OOO_CORE.'/components/Component.php';
/**
 * Split pages of database query.
 *
 * @package openology.orgponents
 */
 
class Pager extends Component
{    
    /**
     * current page number
     * @var int
     */
    var $current_page;
    
    /**
     * total pages number
     * @var int
     */
    var $total_pages;
    
    /**
     * number of items per page
     * @var int
     */
    var $per_item = 10;
    
    /**
     * number of items
     * @var int
     */
    var $total_items;    
    
    /**
     * name of the get param
     * @var String
     */
    var $param_name = 'p';
    
    /**
     * uri object
     * @var object
     */
    var $uri;
    
    /**
     * return a String or an array
     * @var String
     */
    var $return_type = 'String';
    
    /**
     * the display string of first page
     * @var int
     */
    var $first_value = 'First';
    
    /**
     * the display string of first page
     * @var int
     */
    var $prev_value = 'Prev';
    
    /**
     * the display string of first page
     * @var int
     */
    var $next_value = 'Next';
    
    /**
     * the display string of first page
     * @var int
     */
    var $last_value = 'Last';
    
    /**
     * the display string of first page
     * @var int
     */
    var $page_value = 'Pages';
    
    /**
     * display page num or not
     * @var boolean
     */
    var $display_page_num = true;
    
    /**
     * Constructor
     * 
     * @return  void
     */
    function Pager()
    {
        parent::Component();         
    }
    
    /**
     * Return html rendering for the pager
     * 
     * @return  mixed  array or string
     * 
     */
    function toHtml()
    {
        if($this->total_pages == -1)
        {
            $this->total_pages = 1;
        }
        
        if ($this->return_type == 'String')
        {
            $string = ' ';
            
            if ($this->display_page_num)
            {
                $string .= ' '.$this->_genPageNum();
            }
            $string .= ' '.$this->_genFirst();
            $string .= ' '.$this->_genPrev();
            $string .= ' '.$this->_genNext();
            $string .= ' '.$this->_genLast().' ';
            
            return $string;
        }
    }
    
    /**
     * generate the first html string
     * 
     * @return  String  $string
     * 
     */
    function _genFirst()
    {
        if ($this->current_page != 1)
        {
            $this->uri->setParam($this->param_name, 1);
            $uri = $this->uri->getUri(null, 'current');
            $string = '<a href=\''.$uri.'\'>'.$this->first_value.'</a>';
        }
        else
        {
            $string = $this->first_value;
        }
        
        return $string;
    }
    
    /**
     * generate the prev html string
     * 
     * @return  String  $string
     * 
     */
    function _genPrev()
    {
        if ($this->current_page != 1)
        {
            $this->uri->setParam($this->param_name, $this->current_page-1);
            $uri = $this->uri->getUri(null, 'current');
            $string = '<a href=\''.$uri.'\'>'.$this->prev_value.'</a>';
        }
        else
        {
            $string = $this->prev_value;
        }
        
        return $string;
    }    
    
    /**
     * generate the next html string
     * 
     * @return  String  $string
     * 
     */ 
    function _genNext()
    {
        if ($this->current_page != $this->total_pages)
        {
            $this->uri->setParam($this->param_name, $this->current_page+1);
            $uri = $this->uri->getUri(null, 'current');
            $string = '<a href=\''.$uri.'\'>'.$this->next_value.'</a>';
        }
        else
        {
            $string = $this->next_value;
        }
        
        return $string;
    }
    
    /**
     * generate the last html string
     * 
     * @return  String  $string
     * 
     */
    function _genLast()
    {
        if ($this->current_page != $this->total_pages)
        {
            $this->uri->setParam($this->param_name, $this->total_pages);
            $uri = $this->uri->getUri(null, 'current');
            $string = '<a href=\''.$uri.'\'>'.$this->last_value.'</a>';
        }
        else
        {
            $string = $this->last_value;
        }
        
        return $string;
    }
    
    /**
     * generate the page string
     * 
     * @return  String  $string
     * 
     */
    function _genPageNum()
    {
        $string = $this->current_page.'/'.$this->total_pages.' '.$this->page_value;
        
        return $string;
    }
}
?>