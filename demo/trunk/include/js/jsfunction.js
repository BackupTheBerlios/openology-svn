// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004-2005 Openology.org Team                                |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// $Id: jsfunction.js 518 2005-03-17 06:45:17Z ken $ 

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
