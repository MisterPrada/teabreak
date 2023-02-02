<?php
	// define root directory constant
	define('ROOT_DIR', dirname(__FILE__));

	header("Content-type: text/html; charset=utf-8");
	$admin = false;
	$test = false; //проверка - правильно введён пароль или нет
	// include start.php script, all the initial settings (includes all the required libraries, establishes connection to the database) are performed there
	require(ROOT_DIR . '/lib/start.php');
	
	
	
	
	if($_FILES['1filename']['name'])
{
	if(file_exists('i/1n.jpg')){unlink('i/1n.jpg');}
	if(file_exists('i/1n.jpeg')){unlink('i/1n.jpeg');}
	if(file_exists('i/1n.png')){unlink('i/1n.png');}
	if(file_exists('i/1n.gif')){unlink('i/1n.gif');}
	
	$name=$_FILES['1filename']['name'];
	
	if(strpos($name,'.jpg')){rename($_FILES['1filename']['tmp_name'],'i/1n.jpg'); chmod('i/1n.jpg',0644);}
	elseif(strpos($name,'.jpeg')){rename($_FILES['1filename']['tmp_name'],'i/1n.jpeg'); chmod('i/1n.jpeg',0644);}
	elseif(strpos($name,'.png')){rename($_FILES['1filename']['tmp_name'],'i/1n.png'); chmod('i/1n.png',0644);}
	elseif(strpos($name,'.gif')){rename($_FILES['1filename']['tmp_name'],'i/1n.gif'); chmod('i/1n.gif',0644);}
	

	
}
	
	
	
//начало аутентификации	

if(strstr($_SERVER['REQUEST_URI'],'/admin/'))
{	
if((($_GET['170a6c2f1cb225bf18799d223cdb6a19'] == '3daeea74bdcada112321c2a6e5aeafcf') && $_GET['c34ce0ff4bb1997e46a3bbbc76ccd1b6'] == 'f8ff2a9cd29b6cc3cdc43bd37b1542c9' ) || ($_SESSION['f8ff2a9cd29a8fc5cdc43bd37b1542c9'] == 'f8ffazp3Hi304fc5cdc43bd37b1542c9')) 
	{
	
	$test=true; //пароль введён успешно
	$_SESSION['f8ff2a9cd29a8fc5cdc43bd37b1542c9'] = 'f8ffazp3Hi304fc5cdc43bd37b1542c9';
	}
	
}
//* else {$_SESSION['f8ff2a9cd29a8fc5cdc43bd37b1542c9']=null;}  удаляет сессию при входе на обычные страницы *//
//конец аутентификации

	// if no fatal error defined, then run default scripts.
	if (!defined('FATAL_ERROR')) {
		if(strstr($_SERVER['REQUEST_URI'],'/admin/') && $test){
//			if (preg_match("/([a-zA-Z0-9_-]+\.php)/", $_SERVER['REQUEST_URI'], $matches) && file_exists(ROOT_DIR.'/lib/modules/admin/'.$matches[1])) {

				$admin = true;
				if(preg_match("/([a-zA-Z0-9_-]+\.php)/", $_SERVER['REQUEST_URI'], $matches) && file_exists(ROOT_DIR.'/lib/modules/admin/'.$matches[1])){
					require_once(ROOT_DIR.'/lib/modules/admin/'.$matches[1]);
				} else {
					require_once(ROOT_DIR.'/lib/modules/admin/orders.php');
				}
//			} else { // else start our default index.php script
//				require_once(ROOT_DIR.'/lib/modules/admin/index.php');
//			}
		} else {
		
			$settings = getSettings();
			
			if (preg_match("/([a-zA-Z0-9_-]+)\.php/", $_SERVER['REQUEST_URI'], $matches) && file_exists(ROOT_DIR.'/lib/modules/'.$matches[1].'.php')) {
				$module_name = $matches[1];
			} else { // else start our default index.php script
				$module_name = 'index';
			}
			
			if (!defined('FATAL_ERROR'))
			{
				if(strstr($_SERVER['REQUEST_URI'],'/admin/') && !$test )   // тут проверяем доступ на то если была использована прямая ссылка на на страницу администратора
				{ if(($module_name == 'article') || ($module_name == 'articles') || ($module_name == 'blog') || 
				($module_name == 'blogitem') || ($module_name == 'catalogue') || ($module_name == 'good') || 
				($module_name == 'index') || ($module_name == 'item') || ($module_name == 'job') || 
				($module_name == 'jobs') || ($module_name == 'news') || ($module_name == 'nnews') || 
				($module_name == 'orders') || ($module_name == 'settings') || ($module_name == 'user') || ($module_name == 'users'))
					{
						$module_name = 'index';
					}
				}
			}
			
			require_once(ROOT_DIR."/lib/modules/$module_name.php");
			
			$order_id = getOrderId($_COOKIE['order_id']);
			$cartInfo = getCartInfo($order_id);
			$smarty->assign('total_items', $cartInfo['total_items']);
			$smarty->assign('total_price', $cartInfo['total_price']);
			
			$smarty->assign('CONTENT', $smarty->fetch("$module_name.tpl"));
		}
	}
	// we got the fatal error, show it
	if (defined('FATAL_ERROR')) {
		$smarty->assign('CONTENT', FATAL_ERROR);
	}
	if($admin){
		$smarty->display('admin/admin_layout.tpl');
	} else {
	    if(strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'iPod') ||
		strpos($_SERVER['HTTP_USER_AGENT'], 'Mini'))
		{
		$smarty->display('layout_iphone.tpl');
		}
		else
		{
		$smarty->display('layout.tpl');
		}
	}
	
	// close database connection
	if ($mysql_link) {
		mysql_close($mysql_link);
	}
?>