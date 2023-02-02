<?PHP
$full_user_name="";

$smarty->assign('mainmenu','login');
$smarty->assign('title', "Чайная пауза - Регистрация");

if (isset($_SESSION['logged_in'])) {
	redirect('/catalog.php');	
}


if(count($_POST)>0){
	//user try to register
	$error_message = '';
	
	// check kaptcha
	if(intval($_POST['answer_captcha']) !== $_SESSION['captcha']){
		$error_message = 'Сумма не верна.<br>';
	}
	
	if(!isset($_POST['login']) || $_POST['login'] ==''){
		$error_message .= "Не указан логин.<br>";
	}
	if(!isset($_POST['password']) || $_POST['password'] ==''){
		$error_message .= "Не указан пароль.<br>";
	} else if(!isset($_POST['confirm']) || $_POST['password'] !=$_POST['confirm']){
		$error_message .= "Пароль не совпадает.<br>";
	}
	
	if((!isset($_POST['firstname']) || $_POST['firstname'] =='') && (!isset($_POST['lastname']) || $_POST['lastname'] =='')){
		$error_message .= "Не указано имя.<br>";
	}
	if(!isset($_POST['email']) || $_POST['email'] ==''){
		$error_message .= "Не указан email.<br>";
	}
	
	if($error_message==''){
		$SQL = sprintf("INSERT INTO users(login, password, email, firstname, lastname,phone, address, address2, receive_email) VALUES (%s,MD5(%s),%s,%s,%s,%s,%s,%s,%s)",quote_smart($_POST['login']), quote_smart($_POST['password']),quote_smart($_POST['email']),quote_smart($_POST['firstname']),quote_smart($_POST['lastname']),quote_smart($_POST['phone']),quote_smart($_POST['address']),quote_smart($_POST['address2']), $_POST['receive_emails']=='on' ? 1:0);
		$result = mysql_query($SQL);		
		$_SESSION['logged_in'] = true;
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['firstname'] = $_POST['firstname'];
		$_SESSION['lastname'] = $_POST['lastname'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['phone'] = $_POST['phone'];
		$_SESSION['address'] = $_POST['address'];
		$_SESSION['address2'] = $_POST['address2'];
		$_SESSION['receive_email'] = $_POST['receive_email']=='on'? true:false;
			
		$smarty->assign('registered', true);
	} else {
		foreach($_POST as $var=>$value){
			$smarty->assign($var,$value);
		}
		$smarty->assign('error_message', $error_message);
	}
	
}
// setup captcha
$smarty->assign("random1", $random[] = getIntRandom(1,4)); // в шаблоне потом в нужном месте вывожу {$random1}
$smarty->assign("random2", $random[] = getIntRandom(1,4)); // в шаблоне потом в нужном месте вывожу {$random2}
$_SESSION['captcha'] = getSumElements($random);


function loginExist($login){
	$SQL = sprintf("SELECT login FROM users WHERE login=%s",quote_smart($login));
	$result	= mysql_query($SQL);

	if(mysql_num_rows($result)>0){
		return true;
	} else {
		return false;
	}
}
function emailExist($email){
	$SQL = sprintf("SELECT login FROM users WHERE login=%s",quote_smart($email));
	$result	= mysql_query($SQL);

	if(mysql_num_rows($result)>0){
		return true;
	} else {
		return false;
	}
}

function getIntRandom($min = 1,$max = 5)
{
    return rand($min, $max);
}

function getSumElements($array)
{
    $sum = 0;
    foreach($array as $value)
        $sum += $value;
    return $sum;
}

?>

