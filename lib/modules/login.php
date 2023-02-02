<?PHP
$full_user_name="";

if (isset($_SESSION['logged_in'])) {
	redirect('catalog.php');
}

$settings = getSettings();
$smarty->assign('mainmenu','login');
$smarty->assign('title', "Чайная пауза - Вход");
if(count($_POST)>0){
		if (!loginUser($_POST['login'], $_POST['password'])) {
			$smarty->assign('error_message','Неверное имя или пароль.');
		} else {
			redirect('/profile.php');
		}
}

$smarty->assign('register_prompt', $settings['register_prompt']);
?>

