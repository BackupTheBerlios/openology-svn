// +---------------------------------------------------------------------------+
// | This file is part of the Openology FrameWork                              |
// | Copyright (c) 2004-2005 Openology.org Team                                |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit Openology homepage: http://www.openology.org/       |
// +---------------------------------------------------------------------------+ 
//
// $Id: togglemenu.js 518 2005-03-17 06:45:17Z ken $ 

var enabled = false;
var menuVisible = true;

window.onload = function()
{
	var e = xGetElementById('sidemenu');
	var c = document.cookie;
	var r =/hidemenu=(\d+)/;
	var h = r.exec(c);
	if (e && xDef(e.style) && document.getElementsByTagName) {
		enabled = true;
		if (h[1] == '1' && menuVisible) {
			toggleMenu();
		}
	}
}

function toggleMenu()
{
	if (!enabled) return;

	var c, d, m, m1, e, a, i, t, v;
    var expiry = new Date();
    expiry.setFullYear(expiry.getFullYear()+1);
    if (menuVisible) {
		d = 'none';
		m = '0';
		m1 = '-15px';
		i = 'url(themes/default/images/arrow_right.png)';
		t = 'Click to show menu';
		c = "hidemenu=1; expires= " + expiry.toGMTString() + "; path=/";
	}
	else {
		d = 'block';
		m = '148px';
		m1 = '0';
		i = 'url(themes/default/images/arrow_left.png)';
		t = 'Click to close menu';
		c = "hidemenu=0; expires= " + expiry.toGMTString() + "; path=/";
	}

	  e = xGetElementById('sidemenu');
	  e.style.display = d;

	  v = xGetElementById('divider');
	  v.style.marginLeft = m1;
	  v.style.backgroundImage = i;
	  v.setAttribute('title', t);
	  
	  a = xGetElementById('mainbody');
	  a.style.marginLeft = m;

	  document.cookie = c;
	  menuVisible = !menuVisible;
}
