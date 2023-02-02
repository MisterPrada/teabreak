<?php
	$smarty->assign('mainmenu', 'blog');
	
	if (isset($_GET['art_id'])) {
		$article = getArticle('blog', $_GET['art_id']);
		$smarty->assign('Article', $article);
	}
	
	if (!$article) {
		$smarty->assign('Articles', getArticles('blog'));
	}
	
	$smarty->assign('title',($article ? $article['title'] : "Блог")." | Чайная пауза- оптовая и розничная торговля");
?>