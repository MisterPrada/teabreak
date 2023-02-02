<?php
	$smarty->assign('mainmenu', "home");
	$smarty->assign('show_banners',true);
	
	$smarty->assign('leftMenuTree', defaultTree()); // for left menu
	
	$smarty->assign('NewsArticle', getArticles('news', $num_rows = 1)); // get latest news article
	
	$smarty->assign('BlogArticle', getArticles('blog', $num_rows = 1)); // get latest blog article
	
	$smarty->assign('Articles', getArticles('article', $num_rows = 2)); // get 2 latest articles
	
	$smarty->assign('PopularItems', getPopularItems($settings)); // get popular items

	$smarty->assign('RedNews', getStaticItem(1)); // get RedNews
	
	$smarty->assign('title',"Кофе, чай. Купить кофе, чай в г. Минске| Чайная Пауза- оптовая и розничная торговля");
	
	$settings = getSettings();
	
	$smarty->assign('introduction_title', $settings['introduction_title']);
	$smarty->assign('introduction', $settings['introduction']);

	
	function defaultTree() {
		$Items = array();
		$result = mysql_query("
			SELECT cat.id, cat.title FROM catalogue cat 
			WHERE cat.parent_id IS NULL and cat.hidden = 0
			ORDER BY cat.sort
		"); // cat.hidden = 0 для того что бы не было видно главного каталога
		
		while ($row = mysql_fetch_assoc($result)) {
			$Items[] = $row;
		}
		// select children for the first item
		$Items[0][children] = getChildren($Items[0][id]);
		return $Items;
	}

	function getChildren($cat_id){
		$children = array();
		$result = mysql_query("
			SELECT cat.id, cat.title, cat.parent_id, COUNT(children.id) as has_children
			FROM catalogue cat 
			LEFT JOIN catalogue children ON (children.parent_id = cat.id)
			WHERE cat.parent_id = ".quote_smart($cat_id)." and cat.hidden = 0
			GROUP BY cat.id
			ORDER BY cat.sort
		");

		if (!mysql_num_rows($result)) {
			return '';
		}

		while ($row = mysql_fetch_assoc($result)){
			$children[] = $row;
		}
		return $children;
	}

	function getStaticItem($id){


		$SQL = sprintf("SELECT * FROM static_item WHERE id = %d;", quote_smart($id));
		$result = mysql_query($SQL);
		if(mysql_num_rows($result) > 0){
			$next = mysql_fetch_object($result);
			return $next->content;
		}
		
	}

?>