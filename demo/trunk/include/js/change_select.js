// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004-2005 Openology.org Team                                |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// Created on 2004-11-19 11:09:38
// $Id: change_select.js 518 2005-03-17 06:45:17Z ken $ 

//Used to unselect all items in a combo box
function unselect_all(form_element) 
{
	for (i=0; i < form_element.options.length; i++) 
	{
		form_element.options[i].selected = false;
	}
}

function select_all(select_box) 
{
	for (i=0; i < select_box.options.length; i++) 
	{
		select_box.options[i].selected = true;
	}
}

function moveSelected(from, to, bMove)
{
    if (from.selectedIndex == -1)
        return;
    if (from.options.length > 0)
    {
        for (var i = 0; i < from.options.length; i++)
        {
            while (i < from.options.length && from.options[i].selected == true)
            {
                var o = new Option();
                o.value = from.options[i].value;
                o.text = from.options[i].text;
                to.options[to.options.length] = o;
                from.options[i] = null;
            }
        }
    }
}

function moveAll(from, to)
{
    if (from.options.length < 1)
        return;
    if (from.options.length > 0)
    {
        while (from.options.length > 0)
        {
            var o = new Option();
            o.value = from.options[0].value;
            o.text = from.options[0].text;
            to.options[to.options.length] = o;
            from.options[0] = null;
        }
    }
}

function moveUp(c)
{
    var idx = c.selectedIndex;
    if (idx == -1 || idx == 0) // Can't move up or nothing selected...
        return;

    // There can be only one!
    if (idx < c.options.length - 1)
    {
        var cnt = 1;
        var testidx = idx + 1;
        while (cnt == 1 && testidx < c.options.length)
        {
            if (c.options[testidx].selected == true)
            {
                cnt++;
            }
            testidx++;
        }
        if (cnt > 1)
        {
            alert("You can move only one item at a time!");
            return;
        }
    }

    var arrNew = new Array ();
    for (var i = 0; i < c.options.length; i++)
    {
        if (i < idx - 1 || i > idx)
        {
            arrNew[arrNew.length] = new Option();
            arrNew[arrNew.length - 1].value = c.options[i].value;
            arrNew[arrNew.length - 1].text = c.options[i].text;
        }
        else if (i == idx - 1)
            {
                arrNew[arrNew.length] = new Option();
                arrNew[arrNew.length - 1].value = c.options[idx].value;
                arrNew[arrNew.length - 1].text = c.options[idx].text;
                arrNew[arrNew.length] = new Option();
                arrNew[arrNew.length - 1].value = c.options[i].value;
                arrNew[arrNew.length - 1].text = c.options[i].text;
                i++; // Skip the selected one
            }
    }
    c.options.length = 0;
    for (i = 0; i < arrNew.length; i++)
    {
        c.options[i] = arrNew[i];
        if (i == idx - 1)
        {
            c.options[i].selected = true;
        }
    }
}

function moveDown(c)
{
    var idx = c.selectedIndex;
    if (idx == -1 || idx == (c.options.length - 1)) // Can't move down or nothing selected
        return;

    // There can be only one!
    if (idx < c.options.length - 1)
    {
        var cnt = 1;
        var testidx = idx + 1;
        while (cnt == 1 && testidx < c.options.length)
        {
            if (c.options[testidx].selected == true)
            {
                cnt++;
            }
            testidx++;
        }
        if (cnt > 1)
        {
            alert("You can move only one item at a time!");
            return;
        }
    }

    var arrNew = new Array ();
    for (var i = 0; i < c.options.length; i++)
    {
        if (i < idx || i > idx + 1)
        {
            arrNew[arrNew.length] = new Option();
            arrNew[arrNew.length - 1].value = c.options[i].value;
            arrNew[arrNew.length - 1].text = c.options[i].text;
        }
        else if (i == idx)
            {
                arrNew[arrNew.length] = new Option();
                arrNew[arrNew.length - 1].value = c.options[i + 1].value;
                arrNew[arrNew.length - 1].text = c.options[i + 1].text;
                arrNew[arrNew.length] = new Option();
                arrNew[arrNew.length - 1].value = c.options[i].value;
                arrNew[arrNew.length - 1].text = c.options[i].text;
                i++; // Skip the selected one
            }
    }
    c.options.length = 0;
    for (i = 0; i < arrNew.length; i++)
    {
        c.options[i] = arrNew[i];
        if (i == idx + 1)
        {
            c.options[i].selected = true;
        }
    }
}

