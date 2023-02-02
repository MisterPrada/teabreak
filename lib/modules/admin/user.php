<?PHP

$SQL = sprintf("SELECT login, email, firstname, lastname,phone, address, address2, receive_email FROM users WHERE id=%s",quote_smart($_GET['id']));
$result = mysql_query($SQL);	
while ($db_fields = mysql_fetch_assoc($result)) {	
	$smarty->assign('LOGIN',$db_fields['login']);
	$smarty->assign('FIRSTNAME',$db_fields['firstname']);
	$smarty->assign('LASTNAME',$db_fields['lastname']);
	$smarty->assign('PHONE',$db_fields['phone']);
	$smarty->assign('ADDRESS',$db_fields['address']);
	$smarty->assign('ADDRESS2',$db_fields['address2']);
	$smarty->assign('EMAIL',$db_fields['email']);
	$smarty->assign('RECEIVE_EMAIL',$db_fields['receive_email']);

}
// get user orders
$items=array();
$SQL=sprintf(" SELECT o.id, o.orderdate, o.sum, o.notes
			 			FROM orders o
						WHERE user_id = %s", quote_smart($_GET['id']));
$result = mysql_query($SQL);

while ($db_fields = mysql_fetch_assoc($result)) {	
	$goods = array();
	// get goods of current order
	$SQL = sprintf("SELECT og.order_id, og.good_id, og.count, g.title, g.price, g.property, g.price_discount 
					FROM ordergoods og 
					JOIN goods g ON g.id=og.good_id 
					WHERE og.order_id=%s",$db_fields['id']);
	$result1 = mysql_query($SQL);
	if(mysql_num_rows($result) > 0){
		while ($db_field2 = mysql_fetch_assoc($result1)) {	
			$goods[] = $db_field2;
		}
	}
	// save order data
	$items[] = array('id' =>$db_fields['id'], 'orderdate' =>$db_fields['orderdate'], 'sum' =>$db_fields['sum'], 'firstname' =>$db_fields['firstname'], 'lastname' =>$db_fields['lastname'], 'phone' =>$db_fields['phone'], 'email' =>$db_fields['email'],'shipping_adr' =>$db_fields['shipping_adr2'],'notes'=>$db_fields['notes'], 'goods'=>$goods);
}

$smarty->assign('ORDERS', $items);
$smarty->assign('USERS_MENU',true);
$smarty->assign('CONTENT',$smarty->fetch("admin/user.tpl"));

?>

