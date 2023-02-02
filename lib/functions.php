<?php

	// called when fatal error is occured
	function fatalError($error) {
		define('FATAL_ERROR', $error);
	}

	function quote_smart($value) {
		// if magic_quotes_gpc set ON - use stripslashes
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		// if value is number - skip it
		// else - change it
		if (!is_numeric($value)) {
			$value = "'" . mysql_real_escape_string($value) . "'";
		}
		return $value;
	}

	function redirect($location, $message=NULL) {
		if(isset($message)){
			if(!isset($_SESSION)){
				session_start();
			}
			$_SESSION['error_message'] = $message;
		}
		
		header("Location: ".$location); 
		exit;
	}
	
	function sendEmail($to, $subject, $body,$to_koi8r=false){
		
		$mail = new PHPMailer();

		$mail->IsSMTP();// set mailer to use SMTP
		$mail->Host = "mail.teabreak.by;";  // specify main and backup server
		$mail->SMTPAuth = true;// turn on SMTP authentication
		$mail->Username = "info@teabreak.by";  // SMTP username
		$mail->Password = "coffeeBreak"; //coffeeBreak SMTP password
		
		$mail->From = "info@teabreak.by";
		$mail->FromName = "Tea Break";
		//$mail->AddAddress("josh@example.net", "Josh Adams");
		$mail->AddAddress($to);// name is optional
		//$mail->AddReplyTo("info@example.com", "Information");
		
		$mail->WordWrap = 50;// set word wrap to 50 characters
		//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
		//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
		$mail->IsHTML(true);// set email format to HTML

		// convert email subject and body to koi8r - it is need for send sms to mobile phone 
		if($to_koi8r){
			$subject =  iconv( "UTF-8","KOI8-R",$subject);
			$body =  iconv( "UTF-8","KOI8-R",$body);
			$mail->CharSet = "koi8-r";
		} else {
			// decode subject - if it not do, the subject in the UTF-8 is krakoziably
			$subject = "=?UTF-8?B?".base64_encode($subject)."?=\r\n";
			$mail->CharSet = "utf-8";
		}
		

		$mail->Subject = $subject;

		$mail->Body = $body;
		//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
		
		if(!$mail->Send())
		{
			$error_message= "Message could not be sent. <br/>"."Mailer Error: " . $mail->ErrorInfo;
			redirect('error.php', $error_message);
		}
		
	}
	
	// the function fill items tree 
	function getCatalogueTree(){
		$items = array();
		$SQL = "SELECT id, title FROM catalogue WHERE parent_id IS NULL ORDER BY sort";
		$result = mysql_query($SQL);
		if(mysql_num_rows($result) > 0){
			while ($db_field = mysql_fetch_assoc($result)) {
				$subItems = getSubItems($db_field['id']);
				$items[] = array('id'=>$db_field['id'], 'title'=>$db_field['title'], 'subItems'=>$subItems);
			}
		}
		return $items;
	}
	
	function getSubItems($parent_id){
		$items = array();
		$SQL = sprintf("
			SELECT c.id, c.title,c.parent_id, COUNT(g.id) as has_goods
			FROM catalogue c
			LEFT JOIN goods g ON (g.catalog_id = c.id)
			WHERE c.parent_id=%s  
			GROUP BY c.id
			ORDER BY c.sort"
			,$parent_id
		);
		$result = mysql_query($SQL);
		if(mysql_num_rows($result) > 0){
			while ($db_field = mysql_fetch_assoc($result)) {
				$subItems = getSubItems($db_field['id']);
				$items[] = array(
					'id'        => $db_field['id'],
					'title'     => $db_field['title'],
					'parent_id' => $db_field['parent_id'],
					'subItems'  => $subItems,
					'has_goods' => $db_field['has_goods']
				);
			}
		}
		return $items;
	}

	function getPageItems($tree,$id){
		$items = array();
		foreach ($tree as $item){
			if($item['id']==$id){
				return $item['subItems'];
			}
			if(count($item['subItems']) >0){
				$items = getPageItems($item['subItems'],$id);
				if(count($items)>0){
					return $items;
				}
			}
		}
		
		return $items;
	}
	
	function printCatalogTree($tree, $sel_id){
		list($html, $opened) = printCatalogBranchs($tree,$sel_id);
		return $html;
	}
	function printCatalogBranchs($tree, $sel_id,$chb=false, $checkedItems=array()){
		$opened = false; // show if the branch should be opened
		$html_sub = '';	   // will contain sub-branch html
		$html = '';
		$bold = '';
		foreach ($tree as $item){
			$class = "";
			if($item['parent_id'] > 0){
				$class = 'level2';
			} else {
				$class = 'level1';
			}
			$class .= ' admin';

			$html_sub2='';
			if(count($item['subItems'])>0){
				list($html_sub2,$opened)=printCatalogBranchs($item['subItems'],$sel_id,$chb,$checkedItems);
			}
			// check if branch should be opened
			if($item['id'] ==$sel_id){
				$opened = true;
				$html_sub.= "<li><a class='".$class."' href='/admin/catalogue.php?id=".$item['id']."'><b>".$item['title']."</b></a>".$html_sub2."</li>\n";
			} else {
				if($chb){
					$html_sub.= "<li><input type='checkbox'";
					if (in_array($item['id'],$checkedItems)){
						$html_sub.=" checked='checked'";
					}
					$html_sub .= " name='chb_".$item['id']."' id='chb_".$item['id']."'><label for='chb_".$item['id']."'>".$item['title']."</label>".$html_sub2."</li>\n";
				} else {
					$html_sub.= "<li><a class='".$class."' href='/admin/catalogue.php?id=".$item['id']."'>".$item['title']."</a>".$html_sub2."</li>\n";
				}
			}
		}
		
		if($tree[0]['parent_id'] >0 ){
			$html = "\n<ul";
			// insert tag for opened branch
			if($opened){
				$html .= " rel='open'";
			} 
			$html.=">\n";
		} else {
			$html = "<ul id='tree' class='treeview'>\n";
		}
		
		$html .=$html_sub."</ul>\n";
		return array($html, $opened);
	}

	function getJobs() {
		$jobs = array();
		$SQL = "SELECT id, title, description,requests, DATE_FORMAT(date, '%e') AS day, DATE_FORMAT(date, '%M') AS month, DATE_FORMAT(date, '%Y') AS year_time
			FROM jobs
			WHERE closed=0
			ORDER BY date DESC";
		
		if ($res = mysql_query($SQL))
			while ($job = mysql_fetch_assoc($res)) {
				$job['month'] = translateMonth($job['month']); // translate month to russian
				$job['date'] = $job['day'] . ' ' . $job['month'] . ' ' . $job['year_time']; // prepare date string
				$jobs[] =  $job;
			}
		
		return $jobs;
	}

	// get all the articles of the selected type, if limit param equals 1, then return the latest article, if another value is specified, then returns a limited number of rows
	function getArticles($type, $limit = false) {
		$articles = array();
		$SQL = "
			SELECT id, title, short_descr, DATE_FORMAT(date, '%e') AS day, DATE_FORMAT(date, '%M') AS month, DATE_FORMAT(date, '%Y %H:%i') AS year_time
			FROM articles
			WHERE type= '$type'
			ORDER BY date DESC"
			. ($limit ? " LIMIT $limit" : "");
		
		if ($res = mysql_query($SQL))
			while ($article = mysql_fetch_assoc($res)) {
				$article['month'] = translateMonth($article['month']); // translate month to russian
				$article['date'] = $article['day'] . ' ' . $article['month'] . ' ' . $article['year_time']; // prepare date string
				$articles[] =  $article;
				if ($limit == 1) // return the latest article
					return $article;
			}
		
		return $articles;
	}
	
	// get all the articles of the selected type
	function getArticle($type, $art_id) {
		$articles = array();
		$SQL = "
			SELECT id, title, content, DATE_FORMAT(date, '%e') AS day, DATE_FORMAT(date, '%M') AS month, DATE_FORMAT(date, '%Y %H:%i') AS year_time
			FROM articles
			WHERE type = '$type' AND id = " . quote_smart($art_id)
		;
		if ($res = mysql_query($SQL))
			while ($article = mysql_fetch_assoc($res)) {
				$article['month'] = translateMonth($article['month']); // translate month to russian
				$article['date'] = $article['day'] . ' ' . $article['month'] . ' ' . $article['year_time']; // prepare date string
				return $article;
			}
		
		return false;
	}
	
	// translate month from english to russian
	function translateMonth($month) {
		$months = array(
			'January'	=> 'Января',
			'February'	=> 'Февраля',
			'March'		=> 'Марта',
			'April'		=> 'Апреля',
			'May'		=> 'Мая',
			'June'		=> 'Июня',
			'July'		=> 'Июля',
			'August'	=> 'Августа',
			'September'	=> 'Сентября',
			'October'	=> 'Октября',
			'November'	=> 'Ноября',
			'December'	=> 'Декабря'
		);
		
		return $months[$month];
	}
	
	// get the list of all the available shops
	function getAllShops() {
		$shops = array();
		
		if ($res = mysql_query("SELECT * FROM shops WHERE visible=1"))
			while ($shop = mysql_fetch_assoc($res))
				$shops[] =  $shop;
		
		return $shops;
	}
	
	// checks if the specified order id exists in our database
	function getOrderId($order_id) {
		if ($res = mysql_query("SELECT id FROM orders WHERE orderdate IS NULL AND id = " . quote_smart($order_id)))
			while ($order = mysql_fetch_assoc($res))
				return $order['id'];
		
		return false;
	}
	
	// create new order id
	function createOrderId($user_id) {
		if($user_id>0){
			mysql_query("INSERT INTO orders SET user_id = ".$user_id);
		} else {
			mysql_query("INSERT INTO orders SET user_id = NULL");
		}
		return mysql_insert_id();
	}
	
	// validate order data, check if item exists, if ordered quantity is greate then min value, if grinding is specified for the item
	function validateItem($item_id, $item_qtty, $item_grinding = false) {
		$settings = getSettings(); // вытащить мниминальное кол. грамм помола
		$milling = (int)$settings['min_weight'];

		if ($res = mysql_query("SELECT id, min_qtty FROM goods WHERE id = " . quote_smart($item_id)))
			while ($item = mysql_fetch_assoc($res)) {
				if((int)$item['min_qtty'] <= 1){
					$milling = (int)$item['min_qtty'];
				} 
				if ((int)$item_qtty < $milling)
					return SMALL_QTTY;
				
				if (!$item_grinding && $grinding == 1)
					return NO_GRINDING;
				
				return NO_ERROR;
			}
		
		return NO_ITEM;
	}
	
	// add a new record into the ordergoods table
	function addToCart($order_id, $item_id, $item_qtty, $item_grinding = '') {
		$count = 0;
		if ($res = mysql_query("SELECT min_qtty FROM goods WHERE id = " . quote_smart($item_id)))
			while ($item = mysql_fetch_assoc($res))
				$count = $item_qtty / $item['min_qtty'] * $item['min_qtty'];
				//$count = round($item_qtty / $item['min_qtty']) * $item['min_qtty'];
		
		mysql_query("REPLACE ordergoods SET order_id = " . quote_smart($order_id) . ", good_id = " . quote_smart($item_id) . ", count = " . quote_smart($count) . ", grinding = " . quote_smart($item_grinding));
	}
	
	// sends ajax responce
	function prepareAjaxResponce($responce) {
		header('Content-type: application/json'); // st content type to json object
		echo json_encode($responce);
		exit;
	}
	
	// get overall info about the order, total number of items and their total price
	function getCartInfo($order_id) {
		if ($order_id)
			if ($res = mysql_query("
				SELECT COUNT(og.good_id) AS total_items, SUM(IF(g.price_discount > 0, g.price_discount, g.price) * og.count / g.min_qtty) AS total_price
				FROM ordergoods og
				INNER JOIN goods g ON (og.good_id = g.id)
				WHERE og.order_id = " . quote_smart($order_id)
			))
				while ($info = mysql_fetch_assoc($res)) {
					// remove all zeroes
					if ($info['total_price']) {
						//$info['total_price'] = sprintf("%d", $info['total_price']); // remove '.00' tail
							if(isset($_POST['promo']))
								{
									$promo_code = mysql_real_escape_string($_POST['promo']);
									$SQL = "SELECT * FROM promo where code = '$promo_code' and used = '0'" ; //поиск промокода
									$rest = mysql_query($SQL);
									While($art=mysql_fetch_assoc($rest))
									{
										$promo_out = $art; //array
									}
									if(mysql_affected_rows() > 0)
									{
										$info['total_price'] = $info['total_price'] - ($info['total_price'] * ($promo_out['percent'] / 100));
										//$info['total_price'] = sprintf("%d", $info['total_price']); // remove '.00' tail
										//mysql_query("update promo set used = 1 where code = '$promo_code'"); // отметка использования промокода
									}
								}
					} else {
						$info['total_price'] = 0;
					}
					
					return $info;
				}
		
		return array('total_items' => 0, 'total_price' => 0);
	}
	
	// get overall info about the order, total number of items and their total price
	function getCartItems($order_id) {
		$items = array();
		
		if ($order_id)
			if ($res = mysql_query("
				SELECT g.id, g.title, g.price, g.price_discount, g.weight, g.property, g.min_qtty, g.unit, og.grinding, og.count, (IF(g.price_discount > 0, g.price_discount, g.price) * og.count / g.min_qtty) AS total_price
				FROM ordergoods og
				INNER JOIN goods g ON (og.good_id = g.id)
				WHERE og.order_id = " . quote_smart($order_id)
			))
				while ($item = mysql_fetch_assoc($res)) {
					// remove '.00' tail
					$item['grinding_rus']=grinding_in_rus($item['grinding']);
					$item['total_price'] = $item['total_price'];
					//$item['price'] = sprintf("%d", $item['price']);
					if($item['price_discount'] == 0.00) {$item['price_discount'] = 0; }
					
					$items[] = $item;
				}
		
		return (count($items) > 0 ? $items : false);
	}
	
	function removeCartItem($order_id, $id_grinding) {
		$tmp = preg_split('/-/', $id_grinding);
		
		mysql_query("DELETE FROM ordergoods WHERE order_id = " . quote_smart($order_id) . " AND good_id = " . quote_smart($tmp[0]) . " AND grinding = " . quote_smart($tmp[1]));
	}
	
	function recalculateCartItems($order_id) {
		if ($items = getCartItems($order_id))
			foreach ($items as $item)
				if (!validateItem($item['id'], $_POST['qtty_'.$item['id'].'_'.$item['grinding']], $item['grinding']))
					addToCart($order_id, $item['id'], $_POST['qtty_'.$item['id'].'_'.$item['grinding']], $item['grinding']);
	}
	function grinding_in_rus($grinding){
		if($grinding=='bean') $grinding_rus='зерно';
		if($grinding=='coarse') $grinding_rus='крупный помол';
		if($grinding=='аverage') $grinding_rus='средний помол';
		if($grinding=='fine') $grinding_rus='мелкий помол';
	return $grinding_rus;
	}
	function saveOrder($order_id) {
		$info = getCartInfo($order_id);
		if( $_POST['time_ud'] == 1 ||  $_POST['time_ud'] == 2 || $_POST['time_ud'] == 3)
			{	
				if($_POST['time_ud'] == 1)
				{$time_udv = "<span>9<sup>00</sup>- 13<sup>00</sup></span>";}
				if($_POST['time_ud'] == 2)
				{$time_udv = "<span>13<sup>00</sup>- 17<sup>00</sup></span>";}
				if($_POST['time_ud'] == 3)
				{$time_udv = "<span>17<sup>00</sup>- 21<sup>00</sup></span>";}
				//$time_udv=$_POST['time_ud'];
			}
		else 
			{
				$time_udv="Неопределено";
			}
			
	if( $_POST['dostavka1'] == 1 ||  $_POST['dostavka1'] == 2 || $_POST['dostavka1'] == 3 || $_POST['dostavka1'] == 4)
			{	
				if($_POST['dostavka1'] == 1)
				{$dostavka = "<span>Доставка курьером</span>";}
				if($_POST['dostavka1'] == 2)
				{$dostavka = "<span>г. Минск. Комаровский рынок, 2 этаж, 62 пав</span>";}
				if($_POST['dostavka1'] == 3)
				{$dostavka = "<span>г. Минск, пр Независимости,58</span>";}
				if($_POST['dostavka1'] == 4)
				{$dostavka = "<span>г. Минск,  ул. Якуба Коласа, 31-16</span>";}
				
			}
		else 
			{
				$dostavka="Неопределено";
			}
			
			if(isset($_POST['promo']))
								{
									$promo_code = mysql_real_escape_string($_POST['promo']);
									$SQL = "SELECT * FROM promo where code = '$promo_code' and (used = '0' or used = 8)" ; //поиск промокода
									$rest = mysql_query($SQL);
									While($art=mysql_fetch_assoc($rest))
									{
										$promo_out = $art; //array
									}
									if(mysql_affected_rows() > 0)
									{
										$_POST['notes'] = $_POST['notes']." (Был введён промокод на скидку ".$promo_out['percent']."%)";
										mysql_query("update promo set used = 1 where code = '$promo_code' and used = '0'"); // отметка использования промокода
									}
													
								}
		mysql_query("
			UPDATE orders
			SET
				orderdate = NOW(),
				sum = " . quote_smart($info['total_price']) . ",
				firstname = " . quote_smart($_POST['firstname']) . ",
				lastname = " . quote_smart($_POST['lastname']) . ",
				email = " . quote_smart($_POST['email']) . ",
				phone = " . quote_smart($_POST['phone']) . ",
				shipping_adr = " . quote_smart($_POST['shipping_adr']) . ",
				notes = " . quote_smart($_POST['notes']) . ",
				time_ud = " . quote_smart($time_udv) . ",
				dostavka = " . quote_smart($dostavka) . "
			WHERE id = " . quote_smart($order_id)
		);
		#save prices because they can be changed in the future
		mysql_query("
			UPDATE ordergoods, goods 
			SET ordergoods.good_price = IF(goods.price_discount > 0, goods.price_discount, goods.price)
			WHERE ordergoods.good_id = goods.id AND ordergoods.order_id = " . quote_smart($order_id)
		);
		if ($_SESSION['logged_in']) {
			mysql_query("UPDATE orders SET user_id = " . quote_smart($_SESSION['user_id']). " WHERE id = ". quote_smart($order_id));
		}

		return true;
	}
	
	function sendCreateOrderEmail($order_id){
		$settings = getSettings();
		$email = $settings['admin_email'];
		$sms_email = $settings['admin_sms_email'];
		$subject = "Чайная пауза - новый заказ";
		$body = "";
		
		// get order details
		$SQL=sprintf("SELECT id, orderdate, sum, firstname, lastname, phone, email, shipping_adr, shipping_adr2, notes, time_ud, dostavka FROM orders WHERE id=%s", $order_id);
		$result = mysql_query($SQL); 
		while ($db_fields = mysql_fetch_assoc($result)) {
			$body.=sprintf("Номер заказа: <b>%s</b><br>Всего товаров на сумму: <b>%s</b><br>Заказчик: <b>%s %s</b><br>Телефон: <b>%s</b><br>Email: <b>%s</b><br>Адрес: <b>%s %s</b><br>Примечания: <b>%s</b><br>Удобное время: <b>%s</b><br>Выбранная клиентом доставка: <b>%s</b><br>Дата: <b>%s</b><br>",$db_fields['id'],$db_fields['sum'],$db_fields['firstname'], $db_fields['lastname'],$db_fields['phone'],$db_fields['email'],$db_fields['shipping_adr'], $db_fields['shipping_adr2'],$db_fields['notes'],$db_fields['time_ud'],$db_fields['dostavka'],$db_fields['orderdate']);

			$body.='<br><table style="background-color:#fff; margin:20px;"><tr style="background-color:#f4f4f4; border-bottom:1px solid #c7c5bb; color:#ec7e25; font-weight:bold;"><td style="padding:5px; border-bottom:solid 1px #c7c5bb;">Товар</td><td style="padding:5px; border-bottom:solid 1px #c7c5bb;">Характеристика</td><td style="padding:5px; border-bottom:solid 1px #c7c5bb;">Количество</td><td style="padding:5px; border-bottom:solid 1px #c7c5bb;">Цена</td><td style="padding:5px; border-bottom:solid 1px #c7c5bb;">Стоимость</td></tr>';

			// get goods of current order
			$SQL = sprintf("
				SELECT og.order_id, og.good_id, og.count, og.grinding, g.title, og.good_price as price, g.property, (og.count/g.min_qtty)*og.good_price as cost, g.unit
				FROM ordergoods og 
				JOIN goods g ON g.id=og.good_id 
				WHERE og.order_id=%s",
				$db_fields['id']
			);
			$result1 = mysql_query($SQL);
			if(mysql_num_rows($result) > 0){
				while ($db_field2 = mysql_fetch_assoc($result1)) {
					$grinding=grinding_in_rus($db_field2['grinding']);
					if($grinding) $grinding='('.$grinding.')';
					$body.=sprintf("<tr><td style='padding:5px; border-bottom:solid 1px #c7c5bb;'>%s</td><td style='padding:5px; border-bottom:solid 1px #c7c5bb;'>%s  %s </td><td style='padding:5px; border-bottom:solid 1px #c7c5bb;'>%s</td><td style='padding:5px; border-bottom:solid 1px #c7c5bb;'>%s</td><td style='padding:5px; border-bottom:solid 1px #c7c5bb;'>%s</td></tr>",$db_field2['title'],$db_field2['property'],$grinding,$db_field2['count'],$db_field2['price'],$db_field2['cost']);
				}
			}
			$body.="</table>";
		}
		
		// send email to admnistratior
		sendEmail($email,$subject,$body);
		//if admin setted sms -email, send the letter to this email too.
		if(strlen($sms_email)>5){
			sendEmail($sms_email,$subject,$body,true);
		}
		
	}
	
	function getSettings() {
		$settings = array();
		
		if ($res = mysql_query("SELECT parameter, value FROM settings"))
			while ($setting = mysql_fetch_assoc($res))
				$settings[$setting['parameter']] = $setting['value'];
		
		return $settings;
	}
	
	function getPopularItems($settings) {
		$categories = array();
		if ($res = mysql_query("
			SELECT p.id, p.title, p.parent_id, GROUP_CONCAT(DISTINCT c.id) as children, GROUP_CONCAT(DISTINCT g.id) as items
			FROM catalogue p
			LEFT JOIN catalogue c ON (p.id = c.parent_id)
			LEFT JOIN goods g ON (p.id = g.catalog_id)
			GROUP BY p.id
			ORDER BY p.id
		"))
			while ($category = mysql_fetch_assoc($res))
				$categories[$category['id']] = $category;
		
		$items = array();
		if ($res = mysql_query("SELECT * FROM goods WHERE advertise = 1 AND hidden = 0"))
			while ($item = mysql_fetch_assoc($res)) {
				// remove '.00' tail
				//$item[price] = sprintf("%d", $item[price]);
				if($item[price_discount] == 0.00){ $item[price_discount] = 0; };
				$items[$item['id']] = $item;
			}
		
		findPopularItems($settings, $categories, $items, $pop_cof, $cat_id = 1);
		findPopularItems($settings, $categories, $items, $pop_tea, $cat_id = 2);
		
		return array('pop_cof' => $pop_cof, 'pop_tea' => $pop_tea);
	}
	
	function findPopularItems($settings, $categories, $items, &$pop_items, $cat_id) {
		if ($categories[$cat_id]) {
			
			if ($categories[$cat_id]['items']) {
				$tmp_ids = preg_split('/,/', $categories[$cat_id]['items']);
				
				foreach($tmp_ids as $tmp_id)
					if ($items[$tmp_id]) {
						$pop_items[] = $items[$tmp_id];
						
						if (count($pop_items) >= $settings['max_adv_items'])
							return true;
					}
			}
			
			if ($categories[$cat_id]['children']) {
				$child_ids = preg_split('/,/', $categories[$cat_id]['children']);
				
				foreach($child_ids as $child_id)
					if (findPopularItems($settings, $categories, $items, $pop_items, $child_id))
						return true;
			}
		}
		
		return false;
	}
		
	function loginUser($login, $password){
		$SQL = sprintf("SELECT id, login, email, firstname, lastname,phone, address, address2 FROM users WHERE login=%s AND password=MD5(%s)",quote_smart($login),quote_smart($password));
		$result	= mysql_query($SQL);

		if ($result && mysql_num_rows($result) > 0) {
			while($db_fields=mysql_fetch_assoc($result)){
				$_SESSION['logged_in'] = true;
				$_SESSION['user_id'] = $db_fields['id'];
				$_SESSION['login'] = $db_fields['login'];
				$_SESSION['firstname'] = $db_fields['firstname'];
				$_SESSION['lastname'] = $db_fields['lastname'];
				$_SESSION['email'] = $db_fields['email'];
				$_SESSION['phone'] = $db_fields['phone'];
				$_SESSION['address'] = $db_fields['address'];
				$_SESSION['address2'] = $db_fields['address2'];
				$_SESSION['receive_email'] = $db_fields['receive_email']=='on'? true:false;
			}
			return true;
		} else {
			return false;
		}
	}
	function check_field_order(){
		$error_message='';
		if(!isset($_POST['firstname']) || trim($_POST['firstname'])=='') {$error_message='Введите Ваше имя <BR>';}
		if(!isset($_POST['phone']) || trim($_POST['phone'] )=='') {$error_message.=' Введите Ваш номер телефона <BR>';}
		if(!isset($_POST['shipping_adr']) || trim($_POST['shipping_adr'])=='') {$error_message.=' Введите Ваш адрес <BR>';}
		return $error_message;
	}
?>