<?php
	$smarty->assign('mainmenu', 'articles');
	
	if (isset($_GET['art_id'])) {
		$article = getArticle('article', $_GET['art_id']);
		$smarty->assign('Article', $article);
	}
	
	if (!$article) {
		$smarty->assign('Articles', getArticles('article'));
	}
	
	$smarty->assign('title', ($article ? $article['title'] : "Статьи")." | Чайная пауза - оптовая и розничная торговля");
?>