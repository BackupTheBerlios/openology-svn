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