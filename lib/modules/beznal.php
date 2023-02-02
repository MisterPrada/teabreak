<?php

$SQL = "SELECT * FROM nova WHERE id='beznal' " ;
$rest = mysql_query($SQL);
$beznal=mysql_fetch_assoc($rest);
$smarty->assign('BEZNAL', $beznal);

	$smarty->assign('title', "Чайная пауза - Оплата по безналичному расчёту");
	$smarty->assign('mainmenu', "info");
	$smarty->assign('mainmenu', "beznal");
?>