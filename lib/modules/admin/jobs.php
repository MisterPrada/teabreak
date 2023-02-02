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
				$SQL = sprintf("DELETE FROM jobs WHERE id=%s", quote_smart($_GET['id']));
				$result = mysql_query($SQL);
			}				
			break;
		default:
			break;
	}
	
	// refresh the page
	$SQL = sprintf("SELECT id,title,date,description,requests,closed FROM jobs ORDER BY date DESC"); 
	$result = mysql_query($SQL);
	if(mysql_num_rows($result) > 0){
		while ($db_field = mysql_fetch_assoc($result)) {
			$items[] = $db_field;
		}
	}
	
	$smarty->assign('ID',$id);
	$smarty->assign('JOBS',$items);
	$smarty->assign('JOBS_MENU',true);
	$smarty->assign('CONTENT',$smarty->fetch("admin/jobs.tpl"));

?>