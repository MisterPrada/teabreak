<div class="twoColumn">
	<div class="leftMenu">
		<div class="ordersMenuItem"><a href="/admin/orders.php?op=today" {if $OP == 'today'}class="sel"{/if}>СЕГОДНЯ</a></div>
		<div class="ordersMenuItem"><a href="/admin/orders.php?op=yesterday" {if $OP == 'yesterday'}class="sel"{/if}>ВЧЕРА</a></div>
		<div class="ordersMenuItem"><a href="/admin/orders.php?op=week" {if $OP == 'week'}class="sel"{/if}>НЕДЕЛЯ</a></div>
		<div class="ordersMenuItem"><a href="/admin/orders.php?op=month" {if $OP == 'month'}class="sel"{/if}>МЕСЯЦ</a></div>
		<div class="ordersMenuItem">
			<form method="get" action="/admin/orders.php?op=between">
			<a {if $OP == 'between'}class="sel"{/if}>УКАЖИТЕ ДАТЫ</a><br />
			<table>
				<tr>
					<td>c: </td>
					<td><input class="date date_toggled" type="text" style="display: inline; width:100px;" id="from" name="from" value="{$FROM}"/><img class="date_toggler" style="position: relative; top: 3px; margin-left: 4px; cursor: pointer;" src="/i/calendar.gif"/></td>
				</tr>
				<tr>
					<td>по: </td>
					<td><input class="date date_toggled" type="text" style="display: inline; width:100px;" id="to" name="to" value="{$TO}"/><img class="date_toggler" style="position: relative; top: 3px; margin-left: 4px; cursor: pointer;" src="/i/calendar.gif"/></td>
				</tr>
			</table><br />
			<input type="hidden" id="op" name="op" value="between" />
			<input type="image" src="/i/buttonSearch.png" width="64" height="25" onClick="submit()"; />
			</form>
		</div>
	</div>
	<div class="rightColumn">
		<div>ОБЩЕЕ КОЛИЧЕСТВО ЗАКАЗОВ ЗА ПЕРИОД : <B>{$COUNT}</B>, НА СУММУ: <b>{$SUM}<b> руб. </div>
		<table class="adminOrdersTable">
				<tr class="tableHead">
					<td>№&nbsp;заказа</td>
					<td>Дата</td>
					<td>Общая сумма</td>
					<td>Телефон</td>
					<td>Email</td>
					<td>Пользователь</td>
					<td>Адрес доставки</td>
				</tr>
				{if ($ITEMS|@count==0)}
					<tr>
						<td colspan="7">Нет данных</td>
					</tr>
				{else}
				{foreach item=item from=$ITEMS}
				<tr {if $item.notes}class='no_border'{/if}>
					<td><h2>{$item.id}</h2></td>
					<td><h2>{$item.orderdate|date_format:"%d.%m.%Y"}</h2></td>
					<td><h2>{$item.sum|number_format:2:",":""}</h2></td>
					<td><h2>{$item.phone}</h2></td>
					<td><h2>{$item.email}</h2></td>
					<td><h2>{$item.firstname} {$item.lastname}</h2></td>
					<td><h2>{$item.shipping_adr}{if $item.shipping_adr2}, {$item.shipping_adr2}{/if}</h2></td>
				</tr>
					{if $item.notes}
						<tr>
							<td></td>
							<td>Примечания:</td>
							<td colspan="5">{$item.notes}</td>
						</tr>
					{/if}
					{if $item.time_ud}
						<tr>
							<td></td>
							<td>Выбранное клиентом время:</td>
							<td colspan="5">{$item.time_ud}</td>
						</tr>
					{/if}
					{if $item.dostavka}
						<tr>
							<td></td>
							<td>Выбранная клиентом доставка:</td>
							<td colspan="5">{$item.dostavka}</td>
						</tr>
					{/if}
				<tr>
					<td colspan="7" class="last">
						<table class="orderDetails"> 
							<tr class="tableHead">
								<td>Товар</td>
								<td>Характеристика</td>
								<td>Количество</td>
								<td>Цена</td>
								<td>Стоимость</td>

							</tr>
							{foreach item=good from=$item.goods}
							<tr>
								<td><a href="/catalog.php?cat_id={$good.cat}&item_id={$good.id}">{$good.title}</a></td>
								<td>{$good.property} {if $good.grinding_rus}({$good.grinding_rus}){/if}</td>
								<td>{$good.count} {$good.unit}</td>
								<td>{$good.price|number_format:2:",":""}</td>
								<td>{$good.cost|number_format:2:",":""}</td>

							</tr>
							{/foreach}
						</table>
					</td>
				</tr>
				{/foreach}
			{/if}
			</table>
	</div>
	<div class="clear"></div>
</div>
{literal}
<script>
window.addEvent('load', function() {
	new DatePicker('.date_toggled', {
		allowEmpty: true,
		toggleElements: '.date_toggler'
	});
	//new DatePicker('.demo', { positionOffset: { x: 0, y: 5 }}); 
});

</script>
{/literal}