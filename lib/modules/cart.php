<?php
	define('NO_ERROR', false);
	define('NO_ITEM', 1);
	define('SMALL_QTTY', 2);
	define('NO_GRINDING', 3);
	$smarty->assign('mainmenu', 'catalog');
	$smarty->assign('page_type', 'default');
	
	$order_id = getOrderId($_COOKIE['order_id']);
	
	if(isset($_POST['code'])) {
				$promo_code = mysql_real_escape_string($_POST['code']);
				$SQL = "SELECT * FROM promo where code = '$promo_code' and (used = '0' or used = 8)" ; //поиск промокода
				$rest = mysql_query($SQL);
				While($art=mysql_fetch_assoc($rest))
				{
					$promo_out = $art; //array
				}
			
			$responce_promo = array('handle' => 1, 'promo' => $promo_out['percent']); // prepare responce for ajax request
			if(mysql_affected_rows() < 1)
			{$responce_promo['handle'] = 0;}
			prepareAjaxResponce($responce_promo); // send the responce
	}
	
	if (isset($_POST['recalculate'])) {
		recalculateCartItems($order_id);
	}
	
	if (isset($_GET['remove'])) {
		removeCartItem($order_id, $_GET['remove']);
	}
	
	if (isset($_POST['item_add'])) {
		$error = validateItem($_POST['item_id'], $_POST['item_qtty'], $_POST['item_grinding']);
		
		if (!$error) {
			if (!$order_id) {
				$order_id = createOrderId($_SESSION['user_id']);
			}
			
			addToCart($order_id, $_POST['item_id'], $_POST['item_qtty'], $_POST['item_grinding']);
			
			$info = getCartInfo($order_id);
			$responce = array('itemAdded' => 1, 'orderId' => $order_id, 'totalItems' => $info['total_items'], 'totalPrice' => $info['total_price']); // prepare responce for ajax request

			prepareAjaxResponce($responce); // send the responce
		}
	}
	
	$smarty->assign('cartItems', $cartItems = getCartItems($order_id)); //список товаров в корзине
	
	if ($cartItems) {
		if(isset($_POST['login'])){
			if (!loginUser($_POST['login'], $_POST['password'])) {
				$smarty->assign('error_message','Неверное имя или пароль.');
			} else {
				if ($_SESSION['logged_in']) {
					mysql_query("UPDATE orders SET user_id = " . quote_smart($_SESSION['user_id']). " WHERE id = ". quote_smart($order_id));
				}
			}
		}
		
		if (isset($_POST['order_type'])) {
			if ($_SESSION['logged_in']) {
				$_POST['order'] = 1;
			} else {
				$smarty->assign('page_type', 'order_type');
			}
		}
		
		if (isset($_POST['order'])) {
			$smarty->assign('page_type', 'submit_order');
			if (isset($_POST['submitOrder'])) {
				$order_error_message=check_field_order();
				if($order_error_message == ''){
					if (saveOrder($order_id)) {
						sendCreateOrderEmail($order_id);
						$smarty->assign('page_type', 'order_saved');
					}
				}else{
					$smarty->assign('page_type', 'submit_order');
					$smarty->assign('order_error_message', $order_error_message);
				}
			}
		}
	}
	
	$settings = getSettings();
	
	$smarty->assign('start_shipping_time',$settings['start_shipping_time']);
	$smarty->assign('stop_shipping_time',$settings['stop_shipping_time']);
	$smarty->assign('free_shipping_summ',$settings['free_shipping_summ']);
	$smarty->assign('shipping_cost',$settings['shipping_cost']);
	$smarty->assign('min_weight',$settings['min_weight']);
	$smarty->assign('today_last_time',$settings['today_last_time']);
	
	$smarty->assign('title', 'Чайная пауза - оформление заказа');
?>