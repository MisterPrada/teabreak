<?php
	$items = array();
	$treeItems = array();
	$id = 0;
	$op='none';
	$pid=0;
	$title = "";
	$sort = 0;

	if(isset($_GET['id'])){
		$id=$_GET['id'];	
	}
	if(isset($_GET['pid'])){
		$pid=$_GET['pid'];	
	} else {
		if(isset($_POST['pid'])){
			$pid=$_POST['pid'];
		}
	}
	
	if(isset($_POST['sort'])){
		$sort=$_POST['sort'];
	}
	
	
	if(isset($_GET['op'])){
		$op=$_GET['op'];
	}
	
	if(isset($_POST['hidden']))
	{$hidden_set = '1';}
	else{$hidden_set = '0';}
	
	
	switch($op){
		case 'save': // delete the item
			if($id>0){
				$SQL = sprintf("UPDATE catalogue SET title=%s, sort=%s, hidden=$hidden_set WHERE id=%s",quote_smart($_POST['title']),quote_smart($_POST['sort']),quote_smart($id)); 
			} else {
				// get first id
				$SQL = sprintf("INSERT INTO catalogue(title,sort,parent_id) VALUES(%s,%s,%s)",quote_smart($_POST['title']),quote_smart($_POST['sort']),quote_smart($_POST['pid'])); 
			}

			$result = mysql_query($SQL);
			redirect("/admin/catalogue.php?id=".$pid);
			break;
		default:
			if($id>0){
				$SQL = sprintf("SELECT * FROM catalogue WHERE id=%s",quote_smart($id) );
				$result = mysql_query($SQL);
				if(mysql_num_rows($result) > 0){
					while ($db_field = mysql_fetch_assoc($result)) {
						$pid=$db_field['parent_id'];
						$title = $db_field["title"];
						$sort = $db_field["sort"];
						$hidden = $db_field["hidden"];
					}
				}
			}
			break;
	}
	
	
	// get the page title
	$SQL = sprintf("SELECT id,title FROM catalogue WHERE id=%s",$pid); 
	$result = mysql_query($SQL);
	if(mysql_num_rows($result) > 0){
		while ($db_field = mysql_fetch_assoc($result)) {
			$page_title = $db_field['title'];
		}
	}
	
	// fill catalog tree 
	$treeItems = getCatalogueTree();
	$smarty->assign('ID',$id);
	$smarty->assign('PID',$pid);
	$smarty->assign('TITLE',$title);
	$smarty->assign('SORT',$sort);
	$smarty->assign('HIDDEN',$hidden);
	$smarty->assign('TREE',printCatalogTree($treeItems,$pid));
	$smarty->assign('CATALOGUE_MENU',true);
	$smarty->assign('CATALOGUE_ITEM',$page_title);
	$smarty->assign('CONTENT',$smarty->fetch("admin/item.tpl"));
	
?>