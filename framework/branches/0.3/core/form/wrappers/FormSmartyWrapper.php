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
// Created on 2004-12-29 12:03:58
// $Id: FormSmartyWrapper.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * SmartyWrapper, wrapper the form, to display in a smarty template.
 *
 * @package openology
 * @subpackage form.wrappers
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */

include_once OOO_CORE.'/form/wrappers/FormWrapper.php';
/**
 * SmartyWrapper, wrapper the form, to display in a smarty template.
 *
 * @package openology.form.wrappers
 */
class FormSmartyWrapper extends FormWrapper
{
    /**
    * Constructor
    * 
    * @param   object $form
    * @return  void
    */
    function FormSmartyWrapper(& $form)
    {
        $this->form = & $form;
        $this->format = new FormatCode;
    }

    /**
     * put all the information of a form into an array, for smarty template
     * 
     * @return  array  $arr_form
     */
    function toArray()
    {
        $arr_form = array();
        $arr_form['attributes'] = $this->genForm();

        //generate elements
        $arr_element = $this->form->arr_element;
        for ($i = 0; $i < count($this->form->arr_element); $i ++)
        {
            $obj_element = $arr_element[$i];
            $arr_form[$obj_element->getAttribute('id')] = array();
          
            $arr_html = $this->genElement($obj_element);
            
            $arr_form[$obj_element->getAttribute('id')]['label'] = $arr_html['label'];
            $arr_form[$obj_element->getAttribute('id')]['html'] = $arr_html['html'];
        }
        
        //generate groups
        $arr_group = $this->form->arr_group;
        if (count($this->form->arr_group))
        {
            $arr_form['group'] = array();
        }
        for ($i = 0; $i < count($this->form->arr_group); $i ++)
        {
            $obj_group = $arr_group[$i];
            $arr_form['group'][$obj_group->getAttribute('id')] = array();
            
            $arr_element = array();
            $arr_element = $obj_group->arr_element;
            for ($n=0;$n<count($obj_group->arr_element);$n++)
            {
                $obj_element = $arr_element[$n];
                $arr_html = $this->genElement($obj_element);
                $arr_form['group'][$obj_group->getAttribute('id')][$obj_element->getAttribute('id')]['label'] 
                    = $arr_html['label'];
                $arr_form['group'][$obj_group->getAttribute('id')][$obj_element->getAttribute('id')]['html']  
                    = $arr_html['html'];
            }
        }       
        
        return $arr_form;
    }

    /**
     * generate html  string for Form
     * 
     * @param   String  $type
     * @return  String  $string
     * 
     */
    function genForm()
    {
        $string = '';

        $arr_attr = $this->form->arr_attr;
        while (list ($key, $value) = each($arr_attr))
        {
            $string .= " $key=\"$value\" ";
        }

        $string .= ' onsubmit="return '.$this->form->arr_attr['name'].'_validation(this);"';

        return $string;
    }

    /**
     * generate html  string for an element
     * 
     * @param   Object  $element
     * @return  String  $string
     * 
     */
    function genElement($element)
    {
        $attr_string = '';
        $extra_string = '';

        $arr_attr = $element->arr_attr;
        $arr_html = $element->toHtml();
        $html_string = $arr_html['html'];
        
        if (!is_array($html_string))
        {
            $string = $html_string;
            $arr_tmp = explode('%', $string);
            $arr_new = array();

            $count_arr_tmp = count($arr_tmp);
            for ($i = 0; $i < $count_arr_tmp; $i ++)
            {
                if ($i % 2 == 0)
                {
                    $arr_new[] = $arr_tmp[$i];
                }
            }
            $string = join('', $arr_new);

            $arr_tmp = explode('|', $arr_tmp[1]);                

            foreach ($arr_attr as $key => $value) 
            {
                if ($value == '') continue;
                if ($key == 'id') 
                {
                    $arr_html['label'] = str_replace('{attr_id}', $value, $arr_html['label']);
                    $string = str_replace('{attr_id}', $value, $string);
                }
                if ($key != 'label' && $key != 'extra')
                {
                    $display = (in_array($key, $arr_tmp))? false : true;
                    
                    if ($display)
                    {
                        $attr_string .= "$key=\"$value\" ";
                    }
                }
                elseif ($key == 'extra')
                {
                    $extra_string .= "$value";
                }

           }

            $string = str_replace('{attr_name=attr_value}', $attr_string, $string);
            $string = str_replace('{extra_attr}', $extra_string, $string);

            $arr_return['html'] = $string;
            $arr_return['label'] = $arr_html['label'];
        }
        else
        {
            $arr_return = array();
            $count_html_string = count($html_string);
            for ($n = 0; $n < $count_html_string; $n++)
            {
                $string  = $html_string[$n];
                $arr_tmp = explode('%', $string);
                $arr_new = array();
                $attr_string = '';
                
                $count_arr_tmp = count($arr_tmp);
                for ($i = 0; $i < $count_arr_tmp; $i++)
                {
                    if ($i % 2 == 0)
                    {
                        $arr_new[] = $arr_tmp[$i];
                    }
                }
                $string = join('', $arr_new);

                $arr_tmp = explode('|', $arr_tmp[1]);

                foreach ($arr_attr as $key => $value)
                {                    
                    if ($value == '') continue;
                    if ($key != 'label' && $key != 'extra')
                    {
                        $display = (in_array($key, $arr_tmp))? false : true;
 
                        if ($display)
                        {
                            $attr_string .= "$key=\"$value\" ";
                        }
                    }
                    elseif ($key == 'extra')
                    {
                        $extra_string .= "$value ";
                    }
                }

                $string = str_replace('{attr_name=attr_value}', $attr_string, $string);
                $string = str_replace('{extra_attr}', $extra_string, $string);

                $arr_return['html'][] = $string;
            }
        }
        
        return $arr_return;
    }
}

?>
