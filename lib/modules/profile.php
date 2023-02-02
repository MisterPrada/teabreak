<?PHP
$full_user_name="";

$smarty->assign('mainmenu','profile');
$smarty->assign('title', "Чайная пауза - Мой кабинет");

if (!isset($_SESSION['logged_in'])) {
	redirect('/login.php');	
}

if(count($_POST)>0){
	//user try to register
	$error_message = '';
	if(( $_POST['password'] !='' || $_POST['confirm']!='') && ($_POST['password'] !=$_POST['confirm'])){
		$error_message .= "Пароль не совпадает.<br>";
	}
	
	if((!isset($_POST['firstname']) || $_POST['firstname'] =='') && (!isset($_POST['lastname']) || $_POST['lastname'] =='')){
		$error_message .= "Не указано имя.<br>";
	}
	if(!isset($_POST['email']) || $_POST['email'] ==''){
		$error_message .= "Не указан email.<br>";
	}
	if(isset($_FILES['image']['name']))
	{
	if(file_exists('img/chat/'.$_SESSION['login'].'.jpg')){unlink('img/chat/'.$_SESSION['login'].'.jpg');}
	$name=$_FILES['image']['name'];
	if(strpos($name,'.jpg')){rename($_FILES['image']['tmp_name'],'img/chat/'.$_SESSION['login'].'.jpg'); chmod('img/chat/'.$_SESSION['login'].'.jpg',0644);}
	exit(header('Location:'.$_SERVER['REQUEST_URI'].''));
	}

	if($error_message==''){
		$SQL = sprintf("UPDATE  users SET email=%s, firstname=%s, lastname=%s,phone=%s, address=%s, address2=%s, receive_email=%s WHERE login=%s",quote_smart($_POST['email']),quote_smart($_POST['firstname']),quote_smart($_POST['lastname']),quote_smart($_POST['phone']),quote_smart($_POST['address']),quote_smart($_POST['address2']),$_POST['receive_emails']=='on' ? 1:0, quote_smart($_SESSION['login']));
		$result = mysql_query($SQL);		
		
		if($_POST['password']!=''){
			$SQL = sprintf("UPDATE  users SET password=MD5(%s) WHERE login=%s",quote_smart($_POST['password']), quote_smart($_SESSION['login']));
			$result = mysql_query($SQL);		
		}
		$_SESSION['firstname'] = $_POST['firstname'];
		$_SESSION['lastname'] = $_POST['lastname'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['phone'] = $_POST['phone'];
		$_SESSION['address'] = $_POST['address'];
		$_SESSION['address2'] = $_POST['address2'];
		$_SESSION['receive_email'] = $_POST['receive_emails']=='on'? true:false;
	} else {
		foreach($_POST as $var=>$value){
			$smarty->assign($var,$value);
		}
		$smarty->assign('error_message', $error_message);
	}
	
}

// get user orders
$items=array();
$SQL=sprintf("
	SELECT o.id, o.orderdate, o.sum, o.notes, u.login 
	FROM orders o
	JOIN users u ON o.user_id=u.id
	WHERE u.login = %s",
	quote_smart($_SESSION['login'])
);
$result = mysql_query($SQL);
while ($db_fields = mysql_fetch_assoc($result)) {
	$goods = array();
	// get goods of current order
	$SQL = sprintf("
		SELECT og.order_id, og.good_id, og.grinding, og.count, g.title, IF(og.good_price > 0, og.good_price, IF(g.price_discount > 0, g.price_discount, g.price))as price, g.property, (og.count/g.min_qtty)*price as cost, g.unit
		FROM ordergoods og 
		JOIN goods g ON g.id=og.good_id 
		WHERE og.order_id=%s",
		$db_fields['id']
	);
	$result1 = mysql_query($SQL);
	if(mysql_num_rows($result) > 0){
		while ($db_field2 = mysql_fetch_assoc($result1)) {
			$db_field2['price'] = sprintf("%d", $db_field2['price']);
			$db_field2['cost'] = sprintf("%d", $db_field2['cost']);
			$db_field2['grinding_rus']=grinding_in_rus($db_field2['grinding']);
			$goods[] = $db_field2;
		}
	}
	// save order data
	$items[] = array('id' =>$db_fields['id'], 'orderdate' =>$db_fields['orderdate'], 'sum' =>$db_fields['sum'], 'firstname' =>$db_fields['firstname'], 'lastname' =>$db_fields['lastname'], 'phone' =>$db_fields['phone'], 'email' =>$db_fields['email'],'shipping_adr' =>$db_fields['shipping_adr2'],'notes'=>$db_fields['notes'], 'goods'=>$goods);
}

$smarty->assign('ORDERS', $items);
$smarty->assign('IMG_NAME',$_SESSION['login']);
$smarty->assign('IMG_DIR','img/chat/'.$_SESSION['login'].'.jpg');

?>

