<h1>АДРЕСА МАГАЗИНОВ , ГДЕ МОЖНО КУПИТЬ ЭТОТ ЖЕ ТОВАР</h1>
<p>На сегодняшний день  торговая сеть наших партнеров  насчитывает <b>{$shops|@count} магазина</b> по г Минску. Приглашаем Вас посетить наши торговые точки по следуюшим адресам:</p>
<h1>Минск</h1>
<div id="map_canvas"></div>
<script type="text/javascript">
	{if $shops}
		places = [{foreach name = shopItem item = shop from = $shops}{ address:'{$shop.address}', coordinates:'{$shop.coordinates}', name:'{$shop.name}', openingHours:'{$shop.openingHours}'}{if !$smarty.foreach.shopItem.last},{/if}{/foreach}];
	{/if}
</script>
<div class="shopsList">
	{if $shops}
		{foreach name = shopItem item = shop from = $shops}
			<div>
				<b>{$shop.name}</b> - {$shop.address}
				<br>{$shop.openingHours}
				<div class="shopImage" onclick="centerOnMarker('{$shop.coordinates}')"><div class="shopImageMarker">на карте</div><img src="/i/img/shop_{$shop.id}.jpg"><div class="shopImageFrame"></div></div>
				<br>
			</div>
		{/foreach}
	{/if}
</div>
<div class="clear"></div>