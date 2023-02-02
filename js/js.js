// cut the text in the element untill element's height is less then or equal to the specified height
function cutText(id, height) {
	var e = document.getElementById(id);
	if (e && e.offsetHeight > height) {
		while (e.offsetHeight > height) {
			e.innerHTML = e.innerHTML.substring(0, e.innerHTML.lastIndexOf(" ")) + "&nbsp;...";
		}
	}
}

function showPasswordBlock() {
		document.getElementById('pwd').style.display = 'table-row';
		document.getElementById('cnf').style.display = 'table-row';
		document.getElementById('link').style.display = 'none';
}

function showHidePopup(el, display) {
	if (display) {
		el.className += ' hovered';
	} else {
		el.className = el.className.replace(/ hovered/g, '');
	}
}


function number_format( number, decimals, dec_point, thousands_sep ) {	// Format a number with grouped thousands
	// 
	// +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
	// +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	// +	 bugfix by: Michael White (http://crestidg.com)

	var i, j, kw, kd, km;

	// input sanitation & defaults
	if( isNaN(decimals = Math.abs(decimals)) ){
		decimals = 2;
	}
	if( dec_point == undefined ){
		dec_point = ",";
	}
	if( thousands_sep == undefined ){
		thousands_sep = ".";
	}

	i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

	if( (j = i.length) > 3 ){
		j = j % 3;
	} else{
		j = 0;
	}

	km = (j ? i.substr(0, j) + thousands_sep : "");
	kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
	//kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
	kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");


	return km + kw + kd;
}



/* GOOGLE MAP*/
	var map;
	var places;

	function initialize() {
		map = new GMap2(document.getElementById("map_canvas"));
		map.setUIToDefault();
		map.setCenter(new GLatLng(53.903436, 27.560393), 11);

		for (var i = 0; i < places.length; i++)
			addToMap(places[i]);
	}

	function addToMap(place) {
		var lat_lng = place.coordinates.split(',');
		var point = new GLatLng(lat_lng[0], lat_lng[1]);
		var htmlText = "<b>" + place.name + "</b><br>" + place.address + "<br><i>" + place.openingHours + "</i>";
		
		var marker = new GMarker(point);
		GEvent.addListener(marker, "mouseover", function(){marker.openInfoWindowHtml(htmlText);});
		GEvent.addListener(marker, "mouseout", function(){marker.closeInfoWindow()});
		marker.onmap = true;
		map.addOverlay(marker);
		//map.setCenter(point, 16);
	}

	function createMarker(point, htmlText) {
		var marker = new GMarker(point);
		GEvent.addListener(marker, "mouseover", function(){marker.openInfoWindowHtml(htmlText);});
		GEvent.addListener(marker, "mouseout", function(){marker.closeInfoWindow()});
		marker.onmap = true;
		return marker;
	}

	function centerOnMarker(coordinates) {
		var lat_lng = coordinates.split(',');
		var point = new GLatLng(lat_lng[0], lat_lng[1]);
		map.setCenter(point, 16);
	}
	
/* SHOPPING CART */

	function addToCart(form) {
		var params = 'item_add=1' + '&item_id=' + form.itemId.value + '&item_qtty=' + form.itemQuantity.value + (form.itemGrinding ? '&item_grinding=' + form.itemGrinding.value : '');
		sendRequest('POST', params);
		
		return false;
	}
	
	function sendRequest(requestType, params) {
		var url = '/cart.php';
		var request;
		if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			request = new XMLHttpRequest();
		} else { // code for IE6, IE5
			request = new ActiveXObject('Microsoft.XMLHTTP');
		}
		
		if (requestType == 'POST') {
			request.open('POST', url, true);

			// Send the proper header information along with the request
			request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			request.setRequestHeader('Content-length', params.length);
			request.setRequestHeader('Connection', 'close');
			
			request.onreadystatechange = function() { // Call a function when the state changes.
				if (request.readyState == 4 && request.status == 200) {
					handleResponse(request.responseText);
				}
			}
			
			request.send(params);
		} else {
			request.open('GET', url + '?' + params, true);
			request.onreadystatechange = function() { // Call a function when the state changes.
				if (request.readyState == 4 && request.status == 200) {
					handleResponse(request.responseText);
				}
			}
			request.send();
		}
	}

	function handleResponse(responseText) {
		var response = eval("(" + responseText + ")");
		
		if (response.itemAdded) {
			document.getElementById('totalItems').innerHTML = response.totalItems;
			document.getElementById('totalPrice').innerHTML = number_format(response.totalPrice, 2, '.', '') + " руб.";
			setCookie('order_id', response.orderId);
		}
		
		showConfirm(true);
	}
	
	
	var timerId;
	function showConfirm() {
		clearTimeout(timerId);
		
		var popup = document.getElementById('popup');
		
		if (!popup)
			return;
		
		popup.style.display = 'block';
		if (getStyle(popup, 'position') == 'absolute') {
			var top = 0;
			
			if (window && window.pageYOffset)
				top = window.pageYOffset;
			
			if (document.documentElement && document.documentElement.scrollTop && (document.documentElement.scrollTop < top || top == 0))
				top = document.documentElement.scrollTop;
			
			if (document.body && document.body.scrollTop && (document.body.scrollTop < top || top == 0))
				top = document.body.scrollTop;
			
			popup.style.top = Math.round(top + (document.childNodes[1].clientHeight - popup.clientHeight) / 2) + 'px';
		} else {
			popup.style.top = Math.round((document.body.clientHeight - popup.clientHeight) / 2) + 'px';
		}
		popup.style.left = Math.round((document.body.clientWidth - popup.clientWidth) / 2) + 'px';
		timerId = setTimeout(hideConfirm, 5000);
	}
	
	function hideConfirm() {
		var popup = document.getElementById('popup');
		
		if (!popup)
			return;
		
		clearTimeout(timerId);
		popup.style.display = 'none';
	}

	function getCookie(name) {
		var cookie = " " + document.cookie;
		var search = " " + name + "=";
		var setStr = '';
		var offset = 0;
		var end = 0;
		if (cookie.length > 0) {
			offset = cookie.indexOf(search);
			if (offset != -1) {
				offset += search.length;
				end = cookie.indexOf(";", offset)
				if (end == -1) {
					end = cookie.length;
				}
				setStr = unescape(cookie.substring(offset, end));
			}
		}
		return (setStr);
	}

	function setCookie (name, value) {
		document.cookie = name + "=" + escape(value);
	}
	
   function price_dd(){
	/*if(document.forms.forma_f.dostavka1[0].checked)
	{
		//document.getElementById('prise_d').innerHTML = price_costt;
		document.getElementById('total_price_d').innerHTML = total_price_costt + price_costt;
	}
	if(document.forms.forma_f.dostavka1[1].checked || document.forms.forma_f.dostavka1[2].checked || document.forms.forma_f.dostavka1[3].checked)
	{
		//document.getElementById('prise_d').innerHTML = "бесплатно";
		document.getElementById('total_price_d').innerHTML = total_price_costt;
	}*/
	
	//alert(document.forms.forma_f.dostavka1[0].checked);
	}
	
	
	function validateContactInfo(form) {
		if (!form.firstname.value ) {
			alert("Пожалуйста, введите Ваше имя");
			form.firstname.focus();
			return false;
		}
		if (!form.phone.value ) {
			alert("Пожалуйста, введите Ваш номер телефона");
			form.phone.focus();
		return false;
		}
		if (!form.email.value ) {
			alert("Пожалуйста, введите Ваш Email адрес");
			form.phone.focus();
		return false;
		}
		if (!form.shipping_adr.value ) {
			alert("Пожалуйста, введите Ваш адрес");
			form.shipping_adr.focus();
		return false;
		}
		if (!form.time_ud[0].checked && !form.time_ud[1].checked && !form.time_ud[2].checked) {
			alert("Пожалуйста, выберите время");
		return false;
		}
		if (!form.dostavka1[0].checked && !form.dostavka1[1].checked && !form.dostavka1[2].checked && !form.dostavka1[3].checked) {
		alert("Пожалуйста, выберите способ доставки");
		return false;
		}
		return true;
	}
	function validateRegisterInfo(form){
		if (!form.login.value) {
			alert("Пожалуйста, введите Ваш логин");
			form.login.focus();
			return false;
		}
		if (!form.password.value ) {
			alert("Пожалуйста, введите Ваш пароль");
			form.password.focus();
			return false;
		}
		if (!form.confirm.value ) {
			alert("Пожалуйста, введите Ваш пароль повторно");
			form.confirm.focus();
			return false;
		}
		if (!form.firstname.value ) {
			alert("Пожалуйста, введите Ваше имя");
			form.firstname.focus();
			return false;
		}
		if (!form.address.value ) {
			alert("Пожалуйста, введите Ваш адрес");
			form.address.focus();
			return false;
		}
		if (!form.email.value ) {
			alert("Пожалуйста, введите Ваш e-mail адрес");
			form.email.focus();
			return false;
		}
		if (!form.answer_captcha.value ) {
			alert("Пожалуйста, введите сумму");
			form.answer_captcha.focus();
			return false;
		}
		form.submit();
	}

function getStyle(e, s) {
	if (e.style[s]) {
		return e.style[s];
	} else if (e.currentStyle) {
		return e.currentStyle[s];
	} else if (document.defaultView && document.defaultView.getComputedStyle) {
		s = s.replace(/([A-Z])/g, "-$1");
		s = s.toLowerCase();
		return document.defaultView.getComputedStyle(e, "").getPropertyValue(s);
	} else {
		return null;
	}
}


/* промо */

function sendPromo(requestType, params,forma) {
		if(!forma.promo.value)
			{
						var price = parseInt(document.getElementById('price_first_do').innerHTML, 10);
						var price_d = parseInt(document.getElementById('prise_d').innerHTML, 10);
						var price_total_d = parseInt(document.getElementById('total_price_d').innerHTML, 10);
						var out = 0;
						var out2 = 0;
				if( price_d > 0 )
				{
					out2 = price + price_d;
				}else{
					out2 = price;
				}
					document.getElementById('price_first').innerHTML = price;
					document.getElementById('price_first').style.color = "#ec7e25";
					document.getElementById('total_price_d').innerHTML = out2;
					document.getElementById('total_price_d').style.color = "#ec7e25";	
					document.getElementById('promo_out').innerHTML = "";
			return false;
			}
		var url = '/cart.php';
		var request;
		if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			request = new XMLHttpRequest();
		} else { // code for IE6, IE5
			request = new ActiveXObject('Microsoft.XMLHTTP');
		}
		
		if (requestType == 'POST') {
			request.open('POST', url, true);

			// Send the proper header information along with the request
			request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			//request.setRequestHeader('Content-length', params.length);
			//request.setRequestHeader('Connection', 'close');
			
			request.onreadystatechange = function() { // Call a function when the state changes.
				if (request.readyState == 4 && request.status == 200) {
					handlePromo(request.responseText);
				}
			}
			
			request.send(params);
		} 
	}
	
	
Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
	
function handlePromo(responseText) {
		var response = eval("(" + responseText + ")");
		var price = parseInt(document.getElementById('price_first_do').innerHTML, 10);
		var price_d = parseInt(document.getElementById('prise_d').innerHTML, 10);
		var price_total_d = parseInt(document.getElementById('total_price_d').innerHTML, 10);
		
		var price_1 = document.getElementById('price_1');
		var price_2 = document.getElementById('price_2');
		var price_3 = document.getElementById('price_3');
		
		var out = 0;
		var out2 = 0;
			if( price_d > 0 )
				{
					out2 = price + price_d;
				}else{
					out2 = price;
				}
		
		
		if (response.handle) {
			document.getElementById('promo_out').innerHTML = "Вы получаете скидку " + response.promo + "%";
			document.getElementById('promo_out').style.color = "green";
		out = (price) * (response.promo / 100);
		out = (price) - parseInt(out, 10);
			document.getElementById('price_first').innerHTML = out;
			document.getElementById('price_first').style.color = "red";
				if( !price_d ){ price_d = 0; }
			document.getElementById('total_price_d').innerHTML = out+price_d;
			document.getElementById('total_price_d').style.color = "red";
			//prINT = parseInt(prINT, 10);
			//document.getElementById('totalPrice').innerHTML = response.totalPrice;
			//setCookie('order_id', response.orderId);
		}else{
		document.getElementById('promo_out').innerHTML = "Такого промокода не существует!";
		document.getElementById('promo_out').style.color = "red";
		
		
			document.getElementById('price_first').innerHTML = price;
			document.getElementById('price_first').style.color = "#ec7e25";
		document.getElementById('total_price_d').innerHTML = out2;
		document.getElementById('total_price_d').style.color = "#ec7e25";
		
		}
		
		
		var tmp_1 = parseInt(document.getElementById('price_first').innerHTML, 10);
		var tmp_2 = parseInt(document.getElementById('prise_d').innerHTML, 10);
		var tmp_3 = parseInt(document.getElementById('total_price_d').innerHTML, 10);
		
		
		price_1.innerHTML = "("+(tmp_1/10000).formatMoney(2, ',', '.')+" руб.)";
		price_2.innerHTML = "("+(tmp_2/10000).formatMoney(2, ',', '.')+" руб.)";
		price_3.innerHTML = "("+(tmp_3/10000).formatMoney(2, ',', '.')+" руб.)";
		//alert('проверкка низ');
		
		
	}
/* промо конец */