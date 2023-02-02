<?php
	$smarty->assign('mainmenu', 'jobs');
	
	$smarty->assign('Jobs', getJobs());
	
	$smarty->assign('title', ($article ? $article['title'] : "Вакансии")." | Чайная пауза- оптовая и розничная торговля" );
	
	// user sent message
	if(count($_POST)>0){
		$subject="Вакансии";
		$body = sprintf("<b>Ф.И.О</b>: %s <br><b>E-mail</b>:%s<br><b>Сообщение</b>:%s",$_POST['name'],$_POST['email'],$_POST['message']);
		$settings = getSettings();
		$email = $settings['admin_email'];
		sendEmail($email,$subject,$body);
	}
?>