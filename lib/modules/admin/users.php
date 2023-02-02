<?php
	$items = array();
	$id = 0;
	$op='none';
	
	if(isset($_GET['id'])){
		$id=$_GET['id'];	
	}
	
	if(isset($_GET['op'])){
		$op=$_GET['op'];
	}
	
	
	switch($op){
		case 'del': // delete the news
			if($id>0) {
				$id=0;
				
				// delete item
				$SQL = sprintf("DELETE FROM users WHERE id=%s", quote_smart($_GET['id']));
				$result = mysql_query($SQL);
			}				
			break;
		default:
			break;
	}
	
	// refresh the page
	$SQL = sprintf("SELECT u.id,u.login, u.firstname, u.lastname, u.email, u.phone,u.address, u.address2, count(o.id) as count, sum(o.sum) as sum
					FROM users u
					JOIN orders o ON o.user_id=u.id
					GROUP BY u.id
					ORDER BY lastname, firstname"); 
	$result = mysql_query($SQL);
	if(mysql_num_rows($result) > 0){
		while ($db_field = mysql_fetch_assoc($result)) {
			$items[] = $db_field;
		}
	}
	
	$smarty->assign('ID',$id);
	$smarty->assign('ITEMS',$items);
	$smarty->assign('USERS_MENU',true);
	$smarty->assign('CONTENT',$smarty->fetch("admin/users.tpl"));

?>