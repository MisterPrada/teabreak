<?php
	$smarty->assign('title', "Контакты  | Чайная пауза");
	$smarty->assign('mainmenu', "about");
	unset($_SESSION['complete_capcha']);



	// user sent message
	if(count($_POST)>0){

		if( $curl = curl_init() ) {
		    curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
		    curl_setopt($curl, CURLOPT_POST, true);
		    curl_setopt($curl, CURLOPT_POSTFIELDS, sprintf("secret=6LcwbRMUAAAAAEmIDxxuGIR3rLYmnbrtuSilJSHx&response=%s&remoteip=%s",$_POST['g-recaptcha-response'],$_SERVER["REMOTE_ADDR"]));
		    $out = curl_exec($curl);
		    $out = json_decode($out,true);
		    //echo $out['success'];
		    curl_close($curl);
	  	}

	  	if($out['success'] && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){
			$subject="Контакты, сообщение";
			$body = sprintf("<b>Ф.И.О</b>: %s <br><b>E-mail</b>:%s<br><b>Сообщение</b>:%s",quote_smart($_POST['name']),quote_smart($_POST['email']),quote_smart($_POST['message']));
			$settings = getSettings();
			$email = $settings['admin_email'];
			sendEmail($email,$subject,$body);
		}
	} 

	if(count($_POST)>0){
		if(!$out['success']){
			$_SESSION['complete_capcha'] = true;
		}
	}

	


	//Ловушка
	/*$fp = fopen(ROOT_DIR."/lib/lock_user.txt", "a"); // Открываем файл в режиме записи 
	$mytext = $_SERVER["REMOTE_ADDR"]." ".date("Y-m-d H:i:s")."\r\n"; // Исходная строка
	$test = fwrite($fp, $mytext); // Запись в файл
	fclose($fp); //Закрытие файла*/

?>