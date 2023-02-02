<?php
	require_once('config.php');
	require_once('constants.php');
	require_once('functions.php');
	require_once(ROOT_DIR.'/lib/PHPMailer/class.phpmailer.php');
/* START THE SESSION */
	session_start();
	
/* SETUP SMARTY ENGINE */
	require(ROOT_DIR.'/lib/smarty/Smarty.class.php'); // include smarty

	$smarty = new Smarty (); // create smarty object

	//set paths for smarty engine
	$smarty->template_dir = ROOT_DIR.'/lib/templates/'; // all the HTML templates are here
	$smarty->compile_dir = ROOT_DIR.'/lib/templates/templates_c/'; // compiled HTML templates are here
	
/* ESTABLISH CONNECTION TO DATABASE */
	
	// catch fatal errors
	try {
		// connect to mysql server OR show fatal error
		if (!$mysql_link = @mysql_connect($db_host, $db_user, $db_pass)) {
			throw new Exception($FE_DB_SERVER_ERROR . mysql_error());
		}
		
		// connect to database OR show fatal error
		if (!$db_found = @mysql_select_db($db_name)) {
			throw new Exception($FE_DB_DATABASE_ERROR . mysql_error());
		}
		mysql_set_charset("utf8");
	}
	catch(Exception $e){
		//fatalError($e->getMessage());
		fatalError('Could not connect to MySQL server: Access denied');
	}
?>