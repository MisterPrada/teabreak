<h1>Создание и информация о промокодах</h1>
<br>


	<fieldset class="promo_block">
	<legend>Создание промокода</legend>
	<form id="promo_form" action="/admin/promo.php" method="post" name="promo_form">
		<table border="1">
			<tr>
				<td>Какой % скидки:</td><td><input required placeholder="1-100" id="promo_percent" name="percent" type="edit" /></td>
				<td style="line-heigt: 26px;"><input style="margin: 3px;" type="checkbox" name="promo_inf" value="1">Многоразовое использование</td>
			</tr>
		</table>
		</form>
	</fieldset>



<div id="promo_submit"><button onClick="promoCode();">Cоздать промокод</button></div>

	<fieldset class="promo_block">
	<legend>Промокоды</legend>
		<table border="1">
		<tr><td>Процент</td>	<td>Промо код</td> <td>Использован 1-да 0-нет</td> <td>Дата создания</td></tr>
		{foreach item=i from=$PROMO}
			<tr>
				<td>{$i.percent}</td>	<td>{$i.code}</td> <td>{$i.used}</td> <td>{$i.date}</td> <td><a href="?delete={$i.id}">Удалить</a></td>
			</tr>
		{/foreach}
		</table>
		
	</fieldset>
</table>
