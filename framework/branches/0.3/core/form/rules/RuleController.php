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
// Created on 2004-12-27 17:31:17
// $Id: RuleController.php 551 2005-05-04 04:27:25Z ken $ 

/**
 * Form rule controller.
 *
 * @package openology
 * @subpackage form.rules
 * @author Ken Chew <ken.chew@openology.org>
 * @author Andy Ma  <andy.ma@openology.org>
 * @copyright (c) 2004-05 Openology.org Team
 */
include_once OOO_CORE.'/format/FormatCode.php';
/**
 * Form rule controller.
 *
 * @package openology.form.rules
 */
class RuleController
{

    /**
     * Constructor
     * 
     * @param   object $form
     * @return  void
     */
    function RuleController(& $form)
    {
        $this->form = & $form;
        $this->format = new FormatCode;
    }

    function getClientValidation()
    {
        $validation = $this->_genJsHead();
        $validation .= $this->_genAddCode();
        $validation .= $this->_genJsBody();
        $validation .= $this->_genJsFoot();

        return $validation;
    }

    function getServerValidation()
    {

    }

    /**
    * generate the head of javascript validation function
    * 
    * @return  String $js_head
    * 
    **/
    function _genJsHead()
    {
        $js_head = $this->format->formatCodeLine('<script type="text/javascript">', 0);
        $js_head .= $this->format->formatCodeLine('function '.$this->form->arr_attr['name'].'_validation(formobject)', 0);
        $js_head .= $this->format->formatCodeLine('{', 0);
        $js_head .= $this->format->formatCodeLine("var value = '';");
        $js_head .= $this->format->formatCodeLine('var errFlag = new Array();');
        $js_head .= $this->format->formatCodeLine("errMsg = '';");

        return $js_head;
    }

    /**
    * generate the head of javascript validation function
    * 
    * @return  String $js_head
    * 
    **/
    function _genJsBody()
    {
        $js_body = '';
        for ($i = 0; $i < count($this->form->arr_element); $i ++)
        {
            $element = $this->form->arr_element[$i];
            $arr_rule = array ();
            $arr_rule = $element->arr_rule;

            for ($n = 0; $n < count($arr_rule); $n ++)
            {
                if ($arr_rule[$n]['validation'] == 'client' || $arr_rule[$n][1] == 'both')
                {
                    $js_body .= $this->_getRuleScript($arr_rule[$n], $element->arr_attr['name']);
                }
            }

        }

        for ($i = 0; $i < count($this->form->arr_group); $i ++)
        {
            $group = $this->form->arr_group[$i];
            $arr_rule = array ();
            $arr_rule = $group->arr_rule;

            for ($n = 0; $n < count($arr_rule); $n ++)
            {
                if ($arr_rule[$n]['validation'] == 'client' || $arr_rule[$n][1] == 'both')
                {
                    $js_body .= $this->_getRuleScript($arr_rule[$n], $element->arr_attr['name']);
                }
            }

            for ($m = 0; $m < count($group->arr_element); $m ++)
            {
                $element = $group->arr_element[$i];
                $arr_rule = array ();
                $arr_rule = $element->arr_rule;

                for ($n = 0; $n < count($arr_rule); $n ++)
                {
                    if ($arr_rule[$n]['validation'] == 'client' || $arr_rule[$n][1] == 'both')
                    {
                        $js_body .= $this->_getRuleScript($arr_rule[$n], $element->arr_attr['name']);
                    }
                }

            }

        }
        return $js_body;
    }

    /**
    * generate the foot of javascript validation function
    * 
    * @return  String $js_head
    * 
    **/
    function _genJsFoot()
    {
        $js_Foot = $this->format->formatCodeLine("if (errMsg != '')");
        $js_Foot .= $this->format->formatCodeLine('{');
        $js_Foot .= $this->format->formatCodeLine('alert(errMsg);', 2);
        $js_Foot .= $this->format->formatCodeLine('return false;', 2);
        $js_Foot .= $this->format->formatCodeLine('}', 1);
        $js_Foot .= $this->format->formatCodeLine('return true;');
        $js_Foot .= $this->format->formatCodeLine('}', 0);
        $js_Foot .= $this->format->formatCodeLine('</script>', 0);

        return $js_Foot;
    }

    /**
    * load the rule object
    * 
    * @param   String $type
    * @return  object $ruleObject
    * 
    **/
    function _loadRule($type)
    {
        if (!file_exists(OOO_CORE.'/form/rules/Rule'.$type.'.php'))
        {
            echo 'This type of rule ('.$type.') does not exist!';
            exit;
        }
        include_once OOO_CORE.'/form/rules/Rule'.$type.'.php';

        $classname = 'Rule'.$type;

        $ruleObject = & new $classname ();

        return $ruleObject;
    }

    /**
    * get the rule script
    * 
    * @param   array  $arr_rule
    * @param   String $name
    * @return  String $js_string
    * 
    **/
    function _getRuleScript($arr_rule, $name)
    {
        $js_string = '';
        $type = ucfirst(strtolower($arr_rule['type']));
        $message = $arr_rule['message'];
        $rule = $this->_loadRule($type);
        $rule->arr_args = $arr_rule['args'];

        list ($js_prefix, $js_check) = $rule->getValidationScript();
        $js_prefix = str_replace('{jsObj}', "formobject.elements['$name']", $js_prefix);
        $js_prefix = str_replace('{jsObjname}', $name, $js_prefix);

        $js_string .= $this->format->formatCodeLine($js_prefix, $count = 1);
        if ($js_check != "")
        {
            $tmp = str_replace('{jsObj}', "formobject.elements['$name']", $js_check);
            $js_string .= $this->format->formatCodeLine("if ($tmp)", $count = 1);
            $js_string .= $this->format->formatCodeLine('{', $count = 1);
            $js_string .= $this->format->formatCodeLine("errMsg = errMsg + '$message\\n';", $count = 2);
            $js_string .= $this->format->formatCodeLine('}', $count = 1);
        }
        return $js_string;
    }

    /**
    * generate additional javascript code for form
    * 
    * @param   array  $arr_rule
    * @param   String $name
    * @return  String $js_string
    * 
    **/
    function _genAddCode()
    {
        $js_add = $this->format->formatCodeLine('', 1);

        $arr_rule = $this->form->arr_rule;
        for ($i = 0; $i < count($this->form->arr_rule); $i ++)
        {
            $rule = $arr_rule[$i]['code'];
            $js_add .= $this->format->formatCodeLine($rule, 1);
        }

        return $js_add;
    }
}
?>