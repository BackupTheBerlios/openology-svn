// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004-2005 Openology.org Team                                |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// $Id: tr.js 518 2005-03-17 06:45:17Z ken $ 

var startrow = null;
function addTR(objectname, arr_td)
{
    tableobject = document.getElementById(objectname);
    n = tableobject.rows.length;
    tr = tableobject.insertRow(n);
    trid = 'trid' +countrow;
    
    tr.setAttribute('id', trid);
    for (i = 0; i < arr_td.length; i++)
    {
        re = /trid/g;
        test = arr_td[i];
        test = test.replace(re, trid);  
        re = /checkboxid/g;
        test = arr_td[i];
        test = test.replace(re, countrow-2);      
        tr.insertCell(i).innerHTML = test;
    }
    if (startrow == null)
    {
        startrow = countrow;
    }
	
    countrow++;
}

function delTR(objectname, trid)
{
    tableobject = document.getElementById(objectname);
    trobject = document.getElementById(trid);   
    tableobject = trobject.parentNode;
    tableobject.removeChild(trobject);
}