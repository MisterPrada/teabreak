<?php
	$items = array();
	$treeItems = array();
	$id = 0;
	$op='none';
	$pid=0;
	$title = "";
	$sort = 0;
	$error = "";

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
	
	
	switch($op){
		case 'save': // save the item
			if($id>0){ //save current good into database
				$SQL = sprintf("UPDATE goods SET title=%s,property=%s,description=%s, sort=%s,price=%s, price_discount=%s,min_qtty=%s, unit=%s,advertise=%s, grinding = %s, available=%s, hidden=%s, new = %s WHERE id=%s", quote_smart($_POST['title']),quote_smart($_POST['property']),quote_smart($_POST['description']),quote_smart($_POST['sort']),quote_smart($_POST['price']),quote_smart($_POST['discount']),quote_smart($_POST['min_count']),quote_smart($_POST['unit']),quote_smart($_POST['advertise']),quote_smart($_POST['grinding']),quote_smart($_POST['available']),quote_smart($_POST['hidden']=='on' ? 0:1),quote_smart($_POST['new_good']),quote_smart($id)); 
			} else {// insert new good
				$SQL = sprintf("INSERT INTO goods(catalog_id,title,property,description,sort,price,price_discount,min_qtty, unit, new, advertise ,grinding, available, hidden ) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",quote_smart($_POST['pid']),quote_smart($_POST['title']),quote_smart($_POST['property']),quote_smart($_POST['description']),quote_smart($_POST['sort']),quote_smart($_POST['price']),quote_smart($_POST['discount']),quote_smart($_POST['min_count']),quote_smart($_POST['unit']),quote_smart($_POST['new_good']),quote_smart($_POST['advertise']),quote_smart($_POST['grinding']),quote_smart($_POST['available']),quote_smart($_POST['hidden']=='on' ? 0:1)); 
			}
			$result = mysql_query($SQL);
			
			if($id==0){ // if insert new good - get its id
				$id = mysql_insert_id();
			}
			// save uploaded file
			$filename='';
			if (isset($_FILES["userfile"])) {
				if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
					$filename = $_FILES['userfile']['tmp_name'];
					$ext = substr($_FILES['userfile']['name'], 1 + strrpos($_FILES['userfile']['name'], "."));
					// check if we can save the file
					if (filesize($filename) > $MAX_IMAGE_SIZE) {
						$error = 'Размер файла больше '.$MAX_IMAGE_SIZE;
					} elseif (!in_array($ext, $VALID_IMAGE_TYPES)) {
						$error =  'Неверный тип файла. Допустимы типы: gif, jpg, png';
					} else {
						$size = GetImageSize($filename); 
						if (($size) && ($size[0] <= $MAX_IMAGE_WIDTH) 
							&& ($size[1] <= $MAX_IMAGE_HEIGHT)) {
							if (move_uploaded_file($filename, $GOOD_IMAGES_PATH.$id.'.'.$ext)) {
								// File successful uploaded.
							} else {
								$error = 'Невозможно записать файл. Обратитесь к  администратору.';
							}
						} else {
							$error = 'Некорректный файл. Пожалуйста, проверьте файл.';
						}
					}
				} else {
					//  file was not uploaded
				}
			}
			if($error =='' && $filename!=''){
				// set image type into database
				$SQL = sprintf("UPDATE goods SET image=%s WHERE id=%s",quote_smart($ext),quote_smart($id));
				$result = mysql_query($SQL);
	
				redirect("/admin/catalogue.php?id=".$pid);
			}
			break;
		case 'del_img':
				// get file type
				$SQL = sprintf("SELECT image FROM goods WHERE id=%s",quote_smart($id) );
				$result = mysql_query($SQL);
				if(mysql_num_rows($result) > 0){
					while ($db_field = mysql_fetch_assoc($result)) {
						$image = $db_field['image'];
					}
				}
				// remove file
				if(file_exists($GOOD_IMAGES_PATH.$id.'.'.$image)){
					unlink($GOOD_IMAGES_PATH.$id.'.'.$image);
				}
				// remove from database
				$SQL = sprintf("UPDATE goods SET image=NULL WHERE id=%s",quote_smart($id)); 
				$result = mysql_query($SQL);
			break;
		default:
			break;
	}
	
	//get item details
	if($id>0){
		$SQL = sprintf("SELECT id,catalog_id,title,sort,price,price_discount,weight,min_qtty,description,unit, new, advertise, grinding, available, hidden,property,image FROM goods WHERE id=%s",quote_smart($id) );
		$result = mysql_query($SQL);
		if(mysql_num_rows($result) > 0){
			while ($db_field = mysql_fetch_assoc($result)) {
				$id=$db_field['id'];
				$pid=$db_field['catalog_id'];
				$title = $db_field["title"];
				$property = $db_field['property'];
				$description = $db_field['description'];
				$sort = $db_field["sort"];
				$price = $db_field["price"];
				$discount = $db_field["price_discount"];
				$min_count = $db_field["min_qtty"];
				$unit = $db_field['unit'];
				$new = $db_field['new'];
				$advertise = $db_field['advertise'];
				$grinding = $db_field['grinding'];
				$available = $db_field['available'];
				$hidden = $db_field['hidden'];
				$image = $db_field['image'];
			}
		}
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
	$smarty->assign('DESCRIPTION',$description);
	$smarty->assign('SORT',$sort);
	$smarty->assign('PRICE',$price);
	$smarty->assign('DISCOUNT',$discount);
	$smarty->assign('HIDDEN',$hidden);
	$smarty->assign('MIN_COUNT',$min_count);
	$smarty->assign('PROPERTY',$property);
	$smarty->assign('UNIT',$unit);
	$smarty->assign('ADVERTISE',$advertise);
	$smarty->assign('GRINDING',$grinding);
	$smarty->assign('AVAILABLE',$available);
	$smarty->assign('IMAGE',$image);
	$smarty->assign('NEW_GOOD',$new);
	$smarty->assign('ERROR',$error);

	$smarty->assign('CATALOGUE_ITEM',$page_title);
	$smarty->assign('CATALOGUE_MENU',true);
	$smarty->assign('TREE',printCatalogTree($treeItems,$pid));
	$smarty->assign('CONTENT',$smarty->fetch("admin/good.tpl"));
	
?>