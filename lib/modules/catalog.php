<?php
	define('OK', true);
	define('ERROR', false);
	define('RECURSION_ON', 1);
	define('RECURSION_OFF', 0);

	$smarty->assign('show_banners',true);

	$catalog_id = isset($_GET['cat_id']) && isValidId('catalogue', $_GET['cat_id']) ? $_GET['cat_id'] : 1; // first element selected by default
	$item_id = isset($_GET['item_id']) && isValidId('goods', $_GET['item_id'])? $_GET['item_id'] : 0;
	
	$smarty->assign('Tree', getTree($catalog_id)); // for left menu
	$smarty->assign('current_cat_id', $catalog_id);
	
	if ($item_id) {
		$smarty->assign('selected_item', getItem($item_id));
	} else {
		// if the item af the catalogue has goods - show them. Otherwise, show all sublevels with items
		if (itemHasGoods($catalog_id)) {
			$smarty->assign('items', getItems($catalog_id));
		} else {
			$smarty->assign('subtree', getSubTree($catalog_id));
		}
	}
	
	$smarty->assign('linked_articles',getLinkedArticles($catalog_id));
	
	$title = getPageTitle($catalog_id, $item_id);
	$smarty->assign('title', $title ? $title." | Чайная пауза" : "Чайная пауза - каталог продукции");
	
	$smarty->assign('PopularItems', getPopularItems($settings)); // get popular items
	
	$smarty->assign('mainmenu', "catalog");
	
	
	function getTree($cat_id, $children=0){
		$siblings = array();
		$parent_id = 0;
		if ($cat_id) {
			// get siblings
			$siblings = getSiblings($cat_id);

			// go through the siblings and select children for a current item
			// go upstairs if the selected item has parents

			foreach ($siblings as &$s) {
				if ($s[id] == $cat_id) {
					if ($children){
						$s[children] = $children;
					} else {
						$s[children] = getChildren($s[id], RECURSION_OFF); #without recursion
					}
					$parent_id = $s[parent_id];
				}
			}

			if ($parent_id) {
				return getTree($parent_id, $siblings);
			} else {
				return $siblings;
			}
		} else {
			return defaultTree();
		}
	}

	function defaultTree() {
		$Items = array();
		$result = mysql_query("
			SELECT cat.id, cat.title FROM catalogue cat 
			WHERE cat.parent_id IS NULL
			ORDER BY cat.sort
		");
		
		while ($row = mysql_fetch_assoc($result)) {
			$Items[] = $row;
		}
		// select children for the first item
		$Items[0][children] = getChildren($Items[0][id], RECURSION_OFF); // show only one sub level
		return $Items;
	}

	function getSubTree($catalog_id){
		$Items = array();
		$Items = getChildren($catalog_id, RECURSION_ON); // show the whole subtree
		return $Items;
	}

	function isValidId ($table, $id){
		$result = mysql_query("
			SELECT id
			FROM ".$table."
			WHERE id = ".quote_smart($id)."
		");
		while ($row = mysql_fetch_assoc($result)) {
			return OK;
		}
		return ERROR;
	}
	
	function itemHasGoods($cat_id) {
		$result = mysql_query("
			SELECT id
			FROM goods
			WHERE catalog_id = ".quote_smart($cat_id)."
			LIMIT 0,1
		");
		while ($row = mysql_fetch_assoc($result)) {
			return OK;
		}
		return ERROR;
	}

	function getChildren($cat_id, $recursion){
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
			if ($recursion && $row[has_children] > 0){
				$row[children] = getChildren($row[id], $recursion);
			}
			$children[] = $row;
		}
		return $children;
	}

	function hasChildren($id){
		$result = mysql_query("
			SELECT children.id
			FROM catalogue cat 
			LEFT JOIN catalogue children ON(children.parent_id = cat.id)
			WHERE cat.id = ".quote_smart($id)."
			LIMIT 0,1
		");
		while ($row = mysql_fetch_assoc($result)) {
			return OK;
		}
		return ERROR;
	}

	function hasParent($id){
		$result = mysql_query("
			SELECT cat.parent_id
			FROM catalogue cat
			WHERE cat.id = ".quote_smart($id)."
		");
		while ($row = mysql_fetch_assoc($result)) {
			if ($row[parent_id]) {
				return OK;
			} else {
				return ERROR;
			}
		}
	}

	function getSiblings($id){
		$siblings = array();
		if (hasParent($id)) {
			$result = mysql_query("
				SELECT cat.id, cat.title, cat.parent_id, cat.sort
				FROM catalogue sibl 
				INNER JOIN catalogue cat ON(sibl.parent_id = cat.parent_id)
				WHERE sibl.id = ".quote_smart($id)."
				ORDER BY cat.sort
			");
		} else {
			$result = mysql_query("
				SELECT cat.id, cat.title, cat.parent_id, cat.sort
				FROM catalogue cat
				WHERE cat.parent_id IS NULL and cat.hidden = 0
				ORDER BY cat.sort
			"); // cat.hidden = 0 для того что бы не было видно главного каталога
		}
		while ($row = mysql_fetch_assoc($result)){
			$siblings[] = $row;
		}
		return $siblings;
	}

	function getItems($catalog_id){
		$goods = array();
		$result = mysql_query("
			SELECT g.id, g.catalog_id, g.title, g.description, g.price, g.price_discount, g.weight, g.property, g.unit,
			       g.grinding, g.min_qtty, g.image, g.new, g.available, cat.title as catalogue_title
			FROM goods g
			INNER JOIN catalogue cat ON(g.catalog_id = cat.id)
			WHERE g.catalog_id = ".quote_smart($catalog_id)." AND g.hidden=0
			ORDER BY g.sort, g.id
		");# or die ("Invalid query: " . mysql_error());
		while ($row = mysql_fetch_assoc($result)){
			// remove '.00' tail
			//$row[price] = sprintf("%d", $row[price]);
			if($row[price_discount] == 0.00) { $row[price_discount] = 0;}
			$goods[] = $row;
		}
		return $goods;
	}
	
	function getLinkedArticles($catalog_id){
		$articles = array();
		$result = mysql_query("
			SELECT a.title, a.date, a.type, a.content, a.id 
			FROM articleCatalogueLink ac 
			JOIN articles a ON ac.art_id=a.id
			WHERE ac.cat_id=".quote_smart($catalog_id)
		);
		while ($row = mysql_fetch_assoc($result)){
			$articles[] = $row;
		}
		return $articles;
	}

	function getItem($item_id){
		$res=array();
		$result = mysql_query("
			SELECT g.id, g.catalog_id, g.title, g.description, g.price, g.price_discount, g.weight, g.property, g.unit,
			       g.grinding, g.min_qtty, g.image, g.new, g.available, cat.title as catalogue_title
			FROM goods g
			INNER JOIN catalogue cat ON(g.catalog_id = cat.id)
			WHERE g.id = ".quote_smart($item_id)." AND g.hidden=0
		");# or die ("Invalid query: " . mysql_error());
		while ($row = mysql_fetch_assoc($result)){
			// remove '.00' tail
			//$row[price] = sprintf("%d", $row[price]);
			if($row[price_discount] == 0.00) { $row[price_discount] = 0;}
			$res[] = $row;
		}
		return $res;
	}

	function getPageTitle($cat_id, $item_id){
		if ($item_id){
			$result = mysql_query("SELECT title, catalog_id as parent_id FROM goods WHERE id = ".quote_smart($item_id));
		} elseif ($cat_id) {
			$result = mysql_query("SELECT title, parent_id FROM catalogue WHERE id = ".quote_smart($cat_id));
		} else {
			return '';
		}
		while ($res = mysql_fetch_row ($result)){
			$parent_title = '';
			if($res[1] !=''){
				$result = mysql_query("SELECT title FROM catalogue WHERE id = ".quote_smart($res[1]));
				while ($res2 = mysql_fetch_row ($result)){
					$parent_title =  " > ".$res2[0];
				}
			}
			return $res[0].$parent_title;
		}
		return '';
	}
	
?>





