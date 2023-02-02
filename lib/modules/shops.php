<?php
	$smarty->assign('title', "Чайная пауза - Торговые Точки");
	$smarty->assign('mainmenu', "shops");

	$smarty->assign('shops', getAllShops());
	
	$smarty->assign('key_google_map', ($_SERVER['SERVER_NAME'] == 'teabreak' ? "ABQIAAAA_eBQuhpSnk-WpAaCqATW2xT2cxJLyjRmkPHAhKPoxW9mCjmnMRRyewPa5DSCurAqI8ELm-zrOrCMIg" : "ABQIAAAA_eBQuhpSnk-WpAaCqATW2xQtB-9Vd0ITJhoOXmj0uRLqHSIW7BTfXsJRaJxVo6Ee7Ov57t96y7tKLg"));
?>