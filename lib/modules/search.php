<?PHP
$full_user_name="";

$smarty->assign('title', "Чайная пауза - Поиск");

// get search list
$items=array();
$SQL="SELECT g.id as good_id, g.catalog_id, g.title, g.description, c.title as cat_title 
			FROM goods g
			JOIN catalogue c ON g.catalog_id = c.id
			WHERE g.title like '%".$_POST['search_text']."%' or g.description LIKE '%".$_POST['search_text']."%' or c.title like '%".$_POST['search_text']."%'";
$result = mysql_query($SQL);
$count = mysql_num_rows($result);

while ($db_fields = mysql_fetch_assoc($result)) {	
	// save founded data
	$items[] = $db_fields;
}

$smarty->assign('count',$count);
$smarty->assign('string',$_POST['search_text']);
$smarty->assign('items', $items);

?>

