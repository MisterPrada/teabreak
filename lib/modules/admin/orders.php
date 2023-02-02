<?php
	$goods=array();
	$items=array();
	$op='none';
	// get date - 00.00 DD.MM.YYYY
	$today_arr=getdate(time());
	$today = mktime(0,0,0,$today_arr['mon'],$today_arr['mday'],$today_arr['year']);
	
	if(isset($_GET['op'])){
		$op=$_GET['op'];
	}
	
	
	switch($op){
		case 'today': // make dates FROM and TO
			$from = $today;
			$to = $today+86400;
			break;
		case 'yesterday': // make dates FROM and TO
			$from = $today-86400;
			$to = $today;
			break;
		case 'week': // make dates FROM and TO  
			$from = mktime(0,0,0,$today_arr['mon'],$today_arr['mday']-$today_arr['wday'],$today_arr['year']);
			$to = $from+86400*7;
			break;
		case 'month':// make dates FROM and TO  
			$from = mktime(0,0,0,$today_arr['mon'],1,$today_arr['year']);
			$to = $from+86400*date("t");//cal_days_in_month(CAL_GREGORIAN, $today_arr['mon'], $today_arr['year']);
			break;
		case 'between': // make dates FROM and TO  
			$from = $_GET['from']; 
			$to= $_GET['to'];
			break;
		default:
			$from = $today;
			$to = $today+86400;
			$op = 'today';
			break;
	}

	// get orders
	$sum = 0;
	$count = 0;
	$SQL=sprintf("SELECT id, orderdate, sum, firstname, lastname, phone, email, shipping_adr, shipping_adr2, notes, time_ud, dostavka FROM orders WHERE orderdate BETWEEN FROM_UNIXTIME(%s) AND FROM_UNIXTIME(%s) ORDER BY orderdate DESC", $from,$to);
	$result = mysql_query($SQL);

	while ($db_fields = mysql_fetch_assoc($result)) {
		$goods = array();
		// get goods of current order
		$SQL = sprintf("
			SELECT og.order_id, og.good_id, og.count,og.grinding, g.title, og.good_price as price, g.property, (og.count/g.min_qtty)*og.good_price as cost, g.unit
			FROM ordergoods og 
			JOIN goods g ON g.id=og.good_id 
			WHERE og.order_id=%s
			", $db_fields['id']
		);
		$result1 = mysql_query($SQL);
		if(mysql_num_rows($result) > 0){
			while ($db_field2 = mysql_fetch_assoc($result1)) {
				//$db_field2[price] = sprintf("%d", $db_field2[price]);
				//$db_field2[cost] = sprintf("%d", $db_field2[cost]);
				$db_field2['grinding_rus']=grinding_in_rus($db_field2['grinding']);
				$goods[] = $db_field2;
			}
		}
		
		$gd_cat = array();
		foreach($goods as $gd)
		{	
				$SQL = sprintf("SELECT * FROM goods WHERE id = %s",$gd['good_id']) ; //вывод созданных промокодов на экран
				$rest = mysql_query($SQL);
				$art=mysql_fetch_assoc($rest);
				$gd_cat[] = $art; 
		}
		$sch = 0;
		while(true){
			if(!$goods[$sch]['title']){break;}
			$goods[$sch]['cat'] = $gd_cat[$sch]['catalog_id'];
			$goods[$sch]['id'] = $gd_cat[$sch]['id'];
			$sch++;
		}


		// save order data
		$items[] = array('id' =>$db_fields['id'], 'orderdate' =>$db_fields['orderdate'], 'sum' =>$db_fields['sum'], 'firstname' =>$db_fields['firstname'], 'lastname' =>$db_fields['lastname'], 'phone' =>$db_fields['phone'], 'email' =>$db_fields['email'],'shipping_adr' =>$db_fields['shipping_adr'],'shipping_adr2' =>$db_fields['shipping_adr2'],'notes'=>$db_fields['notes'],'time_ud'=>$db_fields['time_ud'], 'dostavka'=>$db_fields['dostavka'], 'goods'=>$goods);
		$sum += $db_fields['sum'];
		$count++;
	}
	/*echo "<h style='color: red;'>";
	echo print_r($goods);
	echo "</h>";*/
	
	//необходимо доконца выполнить иерархию хлебных крошек
	/*$gd_cat = array();
	foreach($goods as $gd)
		{	
				$SQL = "SELECT ca.* FROM catalogue AS ca, (SELECT * FROM goods WHERE id = ".$gd['good_id'].") AS q WHERE
ca.id = q.catalog_id" ; //вывод созданных промокодов на экран
				$rest = mysql_query($SQL);
				While($art=mysql_fetch_assoc($rest))
				{
					$parent_id = $art['parent_id'];
							
							for($i = 0; $i < 10; $i++){
							$sql = "SELECT * FROM catalogue WHERE id = $parent_id;";
							$reqst = mysql_query($sql);
							$resp=mysql_fetch_assoc($reqst);
						if($resp['title']){$art['title'].=" ---> ".$resp['title']; $parent_id = $resp['parent_id'];}
						if(!$resp['parent_id']){ break; }	
						}
					$gd_cat[] = $art; //array
							
				}
			//echo $gd['good_id'];	
		}
		$sch = 0;
		while(true){
			if(!$goods[$sch]['title']){break;}
			$goods[$sch]['cat'] = $gd_cat[$sch]['title'];
			$sch++;
		}
		*/
	
	$smarty->assign('SUM', $sum);
	$smarty->assign('COUNT', $count);
	$smarty->assign('FROM',$from);
	$smarty->assign('TO',$to);
	$smarty->assign('OP',$op);
	$smarty->assign('ITEMS', $items);
	$smarty->assign('ORDERS_MENU',true);
	$smarty->assign('CONTENT',$smarty->fetch("admin/orders.tpl"));
?>