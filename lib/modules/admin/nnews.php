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
			$new_art=true;
			if($id>0){
				$SQL = sprintf("UPDATE articles SET title=%s,date=FROM_UNIXTIME(%s),short_descr=%s, content=%s WHERE id=%s",quote_smart($_POST['title']),quote_smart($_POST['date']),quote_smart($_POST['short_descr']),quote_smart($_POST['text']),quote_smart($id)); 
				$new_art=false;
			} else {
				// insert new items
				$SQL = sprintf("INSERT INTO articles(title,date,short_descr,content,type) VALUES(%s,FROM_UNIXTIME(%s),%s,%s,'news')",quote_smart($_POST['title']),quote_smart($_POST['date']),quote_smart($_POST['short_descr']),quote_smart($_POST['text'])); 
			}
			$result = mysql_query($SQL);
			
			if($id==0){ $id=mysql_insert_id();}
			
			// save linked categories
			$SQL = "DELETE FROM articleCatalogueLink WHERE art_id=".quote_smart($id);
			$result = mysql_query($SQL);
			foreach ($_POST as $var => $value) {
				if(strstr($var,"chb_") && $value=='on'){
					$cat_id = substr($var,4);
					$SQL = sprintf("INSERT INTO articleCatalogueLink(art_id,cat_id) VALUES(%s,%s)",$id,$cat_id);
					$result=mysql_query($SQL);
				}
			}
			
			if($new_art){ // send notifications
				$SQL = "SELECT DISTINCT email FROM users WHERE receive_email=1";
				$result = mysql_query($SQL);
				while ($db_field = mysql_fetch_assoc($result)) {
					$email=$db_field['email'];
					$body = 'На сайте <a href="http://www.teabreak.by">"Чайная пауза"</a> - обновление. <br>'.$_POST['title'].'<br>'.substr($_POST['text'],0,400)."... <a href='http://www.teabreak.by/news.php?art_id=".$id."'>Читать далее...</a>";
					$subject = 'Новости Teabreak.By'; 
					if(email!=''){sendEmail($email,$subject,$body);}
				}
			}
			
			break;
		default:
			break;
	}
	
	// get item details
	$SQL = sprintf("SELECT id,date,title,short_descr,content FROM articles WHERE id=%s",quote_smart($id) );				
	$result = mysql_query($SQL);
	if(mysql_num_rows($result) > 0){
		while ($db_field = mysql_fetch_assoc($result)) {
			$id=$db_field['id'];
			$title = $db_field["title"];
			$short_descr = $db_field['short_descr'];
			$content = $db_field['content'];
			$date = $db_field["date"];
		}
	}
	
	// get linked categories
	$checkedItems=array();
	$rel_cat = array();
	$SQL = sprintf("SELECT ac.cat_id,ac.art_id, c.title FROM articleCatalogueLink ac JOIN catalogue c ON c.id=ac.cat_id WHERE art_id=%s",quote_smart($id) );				
	$result = mysql_query($SQL);
	if(mysql_num_rows($result) > 0){
		while ($db_field = mysql_fetch_assoc($result)) {
			$checkedItems[]=$db_field['cat_id'];
			$rel_cat[]=$db_field['title'];
		}
	}
	
	$treeItems = getCatalogueTree();
	list($selectTree,$opened) = printCatalogBranchs($treeItems, 0,true, $checkedItems);
	
	// fill catalog tree 
	$treeItems = getCatalogueTree();
	$smarty->assign('ID',$id);
	$smarty->assign('TITLE',$title);
	$smarty->assign('DATE',strtotime($date));
	$smarty->assign('SHORT_DESCR',$short_descr);
	$smarty->assign('TEXT',$content);
	$smarty->assign('LINKS',$selectTree);
	$smarty->assign('RELATED_CATEGORIES',$rel_cat);

	$smarty->assign('NEWS_MENU',true);
	$smarty->assign('CONTENT',$smarty->fetch("admin/nnews.tpl"));
	
?>