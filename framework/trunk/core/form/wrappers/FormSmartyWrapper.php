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
// Created on 2004-12-29 12:03:58
// $Id: FormSmartyWrapper.php 146 2005-01-11 08:24:42Z ken $ 

/**
 * SmartyWrapper, wrapper the form, to display in a smarty template.
 *
 * @package openology
 * @subpackage form.wrappers
 * @author Ken Chew <ken.chew@openology.com>
 * @author Andy Ma  <andy.ma@openology.com>
 * @copyright (c) 2004 Openology Pte Ltd
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
        $arr_form = array ();
        $arr_form['attributes'] = $this->genForm();

        //generate elements
        $arr_element = $this->form->arr_element;
        for ($i = 0; $i < count($this->form->arr_element); $i ++)
        {
            $elementObject = $arr_element[$i];
            $arr_form[$elementObject->getAttribute('id')] = array ();
            $arr_form[$elementObject->getAttribute('id')]['label'] = $elementObject->getAttribute('label');
            $arr_form[$elementObject->getAttribute('id')]['html'] = $this->genElement($elementObject);
        }
        
        //generate groups
        $arr_group = $this->form->arr_group;
        if (count($this->form->arr_group))
        {
            $arr_form['group'] = array();
        }
        for ($i = 0; $i < count($this->form->arr_group); $i ++)
        {
            $groupObject = $arr_group[$i];
            $arr_form['group'][$groupObject->getAttribute('id')] = array ();
            
            $arr_element = array();
            $arr_element = $groupObject->arr_element;
            for ($n=0;$n<count($groupObject->arr_element);$n++)
            {
                $elementObject = $arr_element[$n];
                $arr_form['group'][$groupObject->getAttribute('id')][$elementObject->getAttribute('id')]['label'] = $elementObject->getAttribute('label');
                $arr_form['group'][$groupObject->getAttribute('id')][$elementObject->getAttribute('id')]['html']  = $this->genElement($elementObject);
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
        $Html_string = $element->toHtml();
        
        if (!is_array($Html_string))
        {
            $string = $Html_string;
            $arr_tmp = explode('%', $string);
            $arr_new = array ();
            for ($i = 0; $i < count($arr_tmp); $i ++)
            {
                if ($i % 2 == 0)
                {
                    $arr_new[] = $arr_tmp[$i];
                }
            }
            $string = join('', $arr_new);

            $arr_tmp = explode('|', $arr_tmp[1]);

            while (list ($key, $value) = each($arr_attr))
            {
                if ($key != 'label' && $key != 'extra')
                {
                    $nodisplay = 0;
                    for ($i = 0; $i < count($arr_tmp); $i ++)
                    {
                        if ($key == $arr_tmp[$i])
                        {
                            $nodisplay = 1;
                            break;
                        }
                    }

                    if ($nodisplay != 1)
                    {
                        $attr_string .= " $key=\"$value\" ";
                    }
                }
                elseif ($key == 'extra')
                {
                    $extra_string .= " $value ";
                }
            }

            $string = str_replace('{attr_name=attr_value}', $attr_string, $string);
            $string = str_replace('{extra_attr}', $extra_string, $string);

            return $string;
        }
        else
        {
            $arr_return = array ();
            for ($n = 0; $n < count($Html_string); $n ++)
            {
                $string = $Html_string[$n];
                $arr_tmp = explode('%', $string);
                $arr_new = array ();
                for ($i = 0; $i < count($arr_tmp); $i ++)
                {
                    if ($i % 2 == 0)
                    {
                        $arr_new[] = $arr_tmp[$i];
                    }
                }
                $string = join('', $arr_new);

                $arr_tmp = explode('|', $arr_tmp[1]);

                while (list ($key, $value) = each($arr_attr))
                {
                    if ($key != 'label' && $key != 'extra')
                    {
                        $nodisplay = 0;
                        for ($i = 0; $i < count($arr_tmp); $i ++)
                        {
                            if ($key == $arr_tmp[$i])
                            {
                                $nodisplay = 1;
                                break;
                            }
                        }

                        if ($nodisplay != 1)
                        {
                            $attr_string .= " $key=\"$value\" ";
                        }
                    }
                    elseif ($key == 'extra')
                    {
                        $extra_string .= " $value ";
                    }
                }

                $string = str_replace('{attr_name=attr_value}', $attr_string, $string);
                $string = str_replace('{extra_attr}', $extra_string, $string);

                $arr_return[] = $string;
            }
            
            return $arr_return;
        }
    }
}

?>