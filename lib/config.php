<?php
	// database settings
	if ($_SERVER['SERVER_NAME'] == 'teabreak'){ // local dev site
		$db_user = "root";
		$db_pass = "";
		$db_name = "teabreak";
		$db_host = "192.168.0.166";
		$GOOD_IMAGES_PATH = "/Users/sergey/Sites/teabreak/www/i/img/";
	}

	if ($_SERVER['SERVER_NAME'] == "www.teabreak.by" || $_SERVER['SERVER_NAME'] == "teabreak.by") { // prod site
		$db_user = "";
		$db_pass = "";
		$db_name = "";
		$db_host = "localhost";
		$GOOD_IMAGES_PATH = "/home/teabreak/public_html/i/img/";
	}
?>
