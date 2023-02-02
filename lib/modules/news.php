<?php
	$smarty->assign('mainmenu', 'news');
	
	if (isset($_GET['art_id'])) {
		$article = getArticle('news', $_GET['art_id']);
		$smarty->assign('Article', $article);
	}
	
	if (!$article) {
		$smarty->assign('Articles', getArticles('news'));
	}
	
	$smarty->assign('title', ($article ? $article['title'] : "Новости")." | Чайная пауза- оптовая и розничная торговля" );
?>