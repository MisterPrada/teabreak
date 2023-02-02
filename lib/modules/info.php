<?php

	$settings = getSettings();
	
	$smarty->assign('start_shipping_time',$settings['start_shipping_time']);
	$smarty->assign('stop_shipping_time',$settings['stop_shipping_time']);
	$smarty->assign('free_shipping_summ',$settings['free_shipping_summ']);
	$smarty->assign('shipping_cost',$settings['shipping_cost']);
	$smarty->assign('min_weight',$settings['min_weight']);
	$smarty->assign('today_last_time',$settings['today_last_time']);

	$smarty->assign('title', "Чайная пауза - доставка и оплата");
	$smarty->assign('mainmenu', "info");
?>