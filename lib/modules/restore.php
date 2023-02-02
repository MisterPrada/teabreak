<?PHP
$full_user_name="";

if (isset($_SESSION['logged_in'])) {
	redirect('catalog.php');
}

if(count($_POST)>0){
		// check if login and email exists  into database
		$SQL = sprintf("SELECT * FROM users u WHERE u.email = %s AND u.login=%s",quote_smart($_POST['email']),quote_smart($_POST['login']));
		$result = mysql_query($SQL);
		if(mysql_num_rows($result) <=0){
			$smarty->assign("error_message","Неверный логин или email");	
		} else {
			//user with the login and email is exist - generate new password
			$new_ps = uniqid();
			$email = $_POST['email'];
			//get user first and last name - they will be sent into email
			while ($db_field = mysql_fetch_assoc($result)) {
					$firstname =  $db_field['firstname'];
					$lastname = $db_field['lastname'];
			}
			// save the new password into database
			$SQL = sprintf("UPDATE users SET password=MD5('%s') WHERE login=%s AND email=%s",$new_ps,quote_smart($_POST['login']),quote_smart($_POST['email']));
			print $SQL;
			$result=mysql_query($SQL);

			// send email with password 
			$body = "<br/>Уважаемый ". $firstname." ".$lastname.",<br> Ваш пароль был изменен по Вашему запросу!<br/>
					Новый пароль: ".$new_ps."<br/>
					<br/>С уважением,<br/>
					<a href='http://www.teabreak.by'>Чайная Пауза</a>
					<br/>";	
			$subject = "Чайная пауза - Изменение пароля";
			sendEmail($email,$subject,$body);

			$smarty->assign("ok",true);
	
		}
}
?>

