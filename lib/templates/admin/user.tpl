<div class="rightColumn only">
	<div align="center">
		<div align="left">
		<input type="image" src="/i/buttonBack.png" width="95" height="31" alt="Back" onclick="window.location='/admin/users.php'" /><br /><br /></div>
	<table class="itemTable" style="width:500px;">
		<tr>
			<td colspan="2"><b>ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ</b></td>
		</tr>
		<tr>
			<th>Логин:</th>
			<td>{$LOGIN}</td>
		</tr>
		<tr>
			<th>Имя:</th>
			<td>{$FIRSTNAME}</td>
		</tr>
		<tr>
			<th>Фамилия:</th>
			<td>{$LASTNAME}</td>
		</tr>
		<tr>
			<th>Адрес:</th>
			<td>{$ADDRESS}</td>
		</tr>
		<tr>
			<th>Доп. адрес:</th>
			<td>{$ADDRESS2}</td>
		</tr>
		<tr>
			<th>Телефон:</th>
			<td>{$PHONE}</td>
		</tr>
		<tr>
			<th>E-mail:</th>
			<td >{$EMAIL}</td>
		</tr>	
		<tr>
			<th>Получать новости</th>
			<td><input class="auto" type="checkbox" id='receive_emails' name='receive_emails' {if $receive_email} checked="checked"{/if} disabled="disabled"/></td>
		</tr>	
	</table>
	</div>


<h1>Заказы пользователя:</h1>
<table class="adminOrdersTable">
				<tr class="tableHead">
					<th>№&nbsp;заказа</th>
					<th>Дата</th>
					<th>Общая сумма</th>
					<th>Примечания</th>
				</tr>
				{if ($ORDERS|@count==0)}
					<tr>
						<td colspan="4">Нет данных</td>
					</tr>
				{else}
				{foreach item=item from=$ORDERS}
				<tr {if $item.notes}class='no_border'{/if}>
					<td><h2>{$item.id}</h2></td>
					<td><h2>{$item.orderdate|date_format:"%d %B %Y"}</h2></td>
					<td><h2>{$item.sum}</h2></td>
					<td>{$item.notes}</td>
				</tr>
				<tr>
					<td colspan="4" class="last">
						<table class="orderDetails"> 
							<tr class="tableHead">
								<td>Товар</td>
								<td>Характеристика</td>
								<td>Количество</td>
								<td>Цена</td>
								<td>Скидка</td>
							</tr>
							{foreach item=good from=$item.goods}
							<tr>
								<td>{$good.title}</td>
								<td>{$good.property}</td>
								<td>{$good.count}</td>
								<td>{$good.price}</td>
								<td>{$good.price_discount}</td>
							</tr>
							{/foreach}
						</table>
					</td>
				</tr>
				{/foreach}
			{/if}
</table>
	

</div>
