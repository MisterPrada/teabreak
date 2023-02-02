<?php
	$items = array();
	$id = 0;
		
	$op="";
	
	if(isset($_GET['op'])){
		$op=$_GET['op'];
	}
	
	
	switch($op){
		case 'save': // save the item
			foreach($_POST as $key=>$value){
				$setting_id = substr($key,6);
				$SQL = sprintf("UPDATE settings SET value=%s WHERE id=%s",quote_smart($value),quote_smart($setting_id)); 
				$result = mysql_query($SQL);
			}
			$smarty->assign('message','Настройки сохранены успешно.');
			break;
		default:
			break;
	}
	
	// get item details
	$SQL = "SELECT id,parameter,value,description FROM settings ORDER BY id";				
	$result = mysql_query($SQL);
	if(mysql_num_rows($result) > 0){
		while ($db_fields = mysql_fetch_assoc($result)) {
			$items[]=$db_fields;
		}
	}

	// fill catalog tree 
	$smarty->assign('ID',$id);
	$smarty->assign('ITEMS',$items);
	
	$smarty->assign('SETTINGS_MENU',true);
	$smarty->assign('CONTENT',$smarty->fetch("admin/settings.tpl"));
	
?>