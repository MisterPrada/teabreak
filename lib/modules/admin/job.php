<?php
	$items = array();
	$id = 0;
	$title = "";
	$short_descr = "";
	$content = "";
	$date = time.NOW;
	
	$op="";


	if(isset($_GET['id'])){
		$id=$_GET['id'];	
	}
	
	if(isset($_GET['op'])){
		$op=$_GET['op'];
	}
	
	
	switch($op){
		case 'save': // save the item
			if($id>0){
				$SQL = sprintf("UPDATE jobs SET title=%s,date=FROM_UNIXTIME(%s),description=%s, requests=%s, closed=%s WHERE id=%s",quote_smart($_POST['title']),quote_smart($_POST['date']),quote_smart($_POST['description']),quote_smart($_POST['requests']),($_POST['closed']=='on'? 1:0),quote_smart($id)); 
			} else {
				// insert new items
				$SQL = sprintf("INSERT INTO jobs(title,date,description,requests,closed) VALUES(%s,FROM_UNIXTIME(%s),%s,%s,%s)",quote_smart($_POST['title']),quote_smart($_POST['date']),quote_smart($_POST['description']),quote_smart($_POST['requests']), ($_POST['closed']=='on' ? 1:0)); 
			}
			$result = mysql_query($SQL);
			
			if($id==0){ $id=mysql_insert_id();}
			
			break;
		default:
			break;
	}
	
	// get item details
	$SQL = sprintf("SELECT id,date,title,description,requests,closed FROM jobs WHERE id=%s",quote_smart($id) );				
	$result = mysql_query($SQL);
	if(mysql_num_rows($result) > 0){
		while ($db_field = mysql_fetch_assoc($result)) {
			$id=$db_field['id'];
			$title = $db_field["title"];
			$description = $db_field['description'];
			$requests = $db_field['requests'];
			$date = $db_field["date"];
			$closed = $db_field['closed'];
		}
	}
	
	$smarty->assign('ID',$id);
	$smarty->assign('TITLE',$title);
	$smarty->assign('DATE',strtotime($date));
	$smarty->assign('DESCRIPTION',$description);
	$smarty->assign('REQUESTS',$requests);
	$smarty->assign('CLOSED',$closed);

	$smarty->assign('JOBS_MENU',true);
	$smarty->assign('CONTENT',$smarty->fetch("admin/job.tpl"));
	
?>