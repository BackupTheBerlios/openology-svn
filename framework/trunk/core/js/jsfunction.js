/**
 * Javascript to select all checkboxes.
 * Used by core/form/elements/FormAllcheckbox.php
 * 
 * $Id
 */
function selectAll(btnSender)
{     
    var bChk = btnSender.checked;
    var bOK = false;    
    var e=btnSender.form.elements;
    for (var i=0;i<e.length;i++)
    {
        if (!bOK && e[i] == btnSender)
        {
            bOK = true;       
        }
        else if (bOK && e[i].type == "checkbox")
        {
            e[i].checked = bChk;
        }
    }
}