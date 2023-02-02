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
				$SQL = sprintf("DELETE FROM articles WHERE id=%s", quote_smart($_GET['id']));
				$result = mysql_query($SQL);
				// delete related items from links table
				$SQL = sprintf("DELETE FROM articleCatalogueLink WHERE art_id=%s", quote_smart($_GET['id']));
				$result = mysql_query($SQL);			
			}				
			break;
		default:
			break;
	}
	
	// refresh the page
	$SQL = sprintf("SELECT id,type,date,title,short_descr,content FROM articles WHERE type='news' ORDER BY date DESC"); 
	$result = mysql_query($SQL);
	if(mysql_num_rows($result) > 0){
		while ($db_field = mysql_fetch_assoc($result)) {
			$items[] = $db_field;
		}
	}
	
	$smarty->assign('ID',$id);
	$smarty->assign('NEWS',$items);
	$smarty->assign('NEWS_MENU',true);
	$smarty->assign('CONTENT',$smarty->fetch("admin/news.tpl"));

?>