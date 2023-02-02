<?php
	$items = array();
	$treeItems = array();
	$goods=array();
	$id = 0;
	$op='none';
	
	if(isset($_GET['id'])){
		$id=$_GET['id'];	
	}
	
	if(isset($_GET['op'])){
		$op=$_GET['op'];
	}
	
	
	switch($op){
		case 'cdel': // delete the item of catalogue 
			if($id>0) {
				$id=0;
				//get parent id - it is need for page refresh 
				$SQL=sprintf("SELECT id,parent_id FROM catalogue WHERE id=%s",quote_smart($_GET['id']));
				$result = mysql_query($SQL);
				if(mysql_num_rows($result) > 0){
					while ($db_field = mysql_fetch_assoc($result)) {
						$id=$db_field['parent_id'];
					}
				}
				
				// delete item
				$SQL = sprintf("DELETE FROM catalogue WHERE id=%s", quote_smart($_GET['id']));
				$result = mysql_query($SQL);
				// delete related items from links table
				$SQL = sprintf("DELETE FROM articleCatalogueLink WHERE cat_id=%s", quote_smart($_GET['id']));
				$result = mysql_query($SQL);
				
				// refresh the page
				$SQL = sprintf("SELECT id,parent_id,title FROM catalogue WHERE parent_id=%s",$id); 
				$result = mysql_query($SQL);
				if(mysql_num_rows($result) > 0){
					while ($db_field = mysql_fetch_assoc($result)) {
						$items[] = $db_field;
					}
				}
			}				
			break;
		case 'gdel': // delete the goods item  
			if($id>0) {
				$id=0;
				//get parent id - it is need for page refresh 
				$SQL=sprintf("SELECT id,catalog_id FROM goods WHERE id=%s",quote_smart($_GET['id']));
				$result = mysql_query($SQL);
				if(mysql_num_rows($result) > 0){
					while ($db_field = mysql_fetch_assoc($result)) {
						$id=$db_field['catalog_id'];
					}
				}
				
				// delete item
				$SQL = sprintf("DELETE FROM goods WHERE id=%s", quote_smart($_GET['id']));
				$result = mysql_query($SQL);
				
				// refresh the page
				$SQL = sprintf("SELECT id,parent_id,title FROM catalogue WHERE parent_id=%s",$id); 
				$result = mysql_query($SQL);
				if(mysql_num_rows($result) > 0){
					while ($db_field = mysql_fetch_assoc($result)) {
						$items[] = $db_field;
					}
				}
			}				
			break;
		case 'edit': // go to the edit page
			break;
		default:
			break;
	}
	
	//check if item has goods
	$SQL = sprintf('SELECT id,catalog_id,title,price,price_discount,min_qtty,unit FROM goods WHERE catalog_id=%s',quote_smart($id));
	$result = mysql_query($SQL);
	if(mysql_num_rows($result)>0) {
		while ($db_field = mysql_fetch_assoc($result)) {
			$goods[] = $db_field;
		}		
	}
	
	
	// get the page title
	if($id>0){
		$SQL = sprintf("SELECT id,title FROM catalogue WHERE id=%s",$id); 
	} else { // it branch - for select when user open catalogue first time
		$SQL = sprintf("SELECT id,title FROM catalogue WHERE parent_id IS NULL ORDER BY id",$id); 
	}
	$result = mysql_query($SQL);
	if(mysql_num_rows($result) > 0){
		while ($db_field = mysql_fetch_assoc($result)) {
			$page_title = $db_field['title'];
			$id = $db_field['id'];
			break;
		}
	}

	// fill catalog tree 
	$treeItems = getCatalogueTree();
	//get selected branch
	$items=getPageItems($treeItems,$id);
	
	
	$smarty->assign('GOODS',$goods);
	$smarty->assign('ID',$id);
	$smarty->assign('TREE_ITEMS',$treeItems);
	$smarty->assign('ITEMS',$items);
	$smarty->assign('TREE',printCatalogTree($treeItems,$id));
	$smarty->assign('CATALOGUE_ITEM',$page_title);
	$smarty->assign('CATALOGUE_MENU',true);
	$smarty->assign('CONTENT',$smarty->fetch("admin/catalogue.tpl"));

?>