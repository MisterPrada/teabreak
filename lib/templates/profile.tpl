<div align="center" >
<form action="/profile.php" method="post" enctype="multipart/form-data" class="loginForm">
	<table>
		<tr>
			<td><b>ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ 
			{if file_exists($IMG_DIR)}
			<img width="100" height="100" src="/img/chat/{$IMG_NAME}.jpg"></img>
			{else}
			<img width="100" height="100" src="/img/chat.jpg"></img>
			{/if}
			</b></td>
			<td colspan="2"></td>
		</tr>
		{if $error_message}
		<tr>
			<td colspan="2" align="center"><span class="red">{$error_message}</span></td>
		</tr>
		{/if}
		<tr id='link'>
			<td colspan="2" style=" text-align:right"><span style="text-decoration:underline; cursor:pointer;" onclick="showPasswordBlock();">Сменить пароль</span></td>
		<tr>
		<tr id='pwd'>
			<td>Пароль<span class="red">*</span>:</td>
			<td><input type="password" id="password" name="password" /></td>
		</tr>
		<tr id='cnf'>
			<td>Повторно пароль<span class="red">*</span>:</td>
			<td><input type="password" id="confirm" name="confirm" /></td>
		</tr>
		<tr>
			<td>Имя<span class="red">*</span>:</td>
			<td><input type="text" id="firstname" name="firstname" value="{$smarty.session.firstname}" /></td>
		</tr>
		<tr>
			<td>Фамилия<span class="red"></span>:</td>
			<td><input type="text" id="lastname" name="lastname"  value="{$smarty.session.lastname}"/></td>
		</tr>
		<tr>
			<td>Адрес<span class="red">*</span>:</td>
			<td><input type="text" id="address" name="address" value="{$smarty.session.address}" /></td>
		</tr>
		<tr>
			<td>Доп. адрес:</td>
			<td><input type="text" id="address2" name="address2"  value="{$smarty.session.address2}"/></td>
		</tr>
		<tr>
			<td>Телефон:</td>
			<td><input type="text" id="phone" name="phone"  value="{$smarty.session.phone}"/></td>
		</tr>
		<tr>
			<td>E-mail<span class="red">*</span>:</td>
			<td ><input type="text" id="email" name="email"  value="{$smarty.session.email}"/></td>
		</tr>
		<tr>
			<td>Image:</td>
			<td ><input type="file" id="image" name="image"/> (только .jpg формат)
			</td>
		</tr>		
		<tr>
			<td>Я&nbsp;хочу&nbsp;получать&nbsp;новости</td>
			<td><input class="auto" type="checkbox" id='receive_emails' name='receive_emails' {if $smarty.session.receive_email} checked="checked"{/if}/></td>
		</tr>	
		<tr>
			<td colspan="2" align="right"><input type="image" src="/i/buttonSave.png" width="95" height="31"  onclick="submit();" class="button"/></td>
		</tr>
	</table>
</form>

<br><br><br>
<div class="orderForm">
		<table>
				<tr class="tableHead">
					<th>Заказы</th>
				</tr>
				{if ($ORDERS|@count==0)}
					<tr>
						<td>Нет данных</td>
					</tr>
				{else}
				{foreach item=item from=$ORDERS}
				<tr {if $item.notes}class='no_border'{/if}>
					<td><h2>Заказ №{$item.id} от {$item.orderdate|date_format:"%d.%m.%Y"} на сумму {$item.sum}</h2></td>
				</tr>
				<tr>
					<td class="last">
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
								<td>{$good.title}</td>
								<td>{$good.property} {if $good.grinding_rus}({$good.grinding_rus}){/if}</td>
								<td>{$good.count}</td>
								<td>{$good.price}</td>
								<td>{$good.cost}</td>
							</tr>
							{/foreach}
						</table>
					</td>
				</tr>
				{/foreach}
			{/if}
			</table>
</div>
</div>
