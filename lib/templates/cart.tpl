{if $page_type == 'default'}
	<h1>КОРЗИНА</h1>
	<p>Проверьте содержимое корзины. При необходимости Вы можете изменить количество заказанного товара и пересчитать сумму заказа. Далее переходите к оформлению заказа.</p>

	<h1 class="none">Условия заказа:</h1>
	<p>Доставка заказов производится по Минску в пределах МКАД, в рабочие дни с {$start_shipping_time} до {$stop_shipping_time} часов. Доставка  бесплатна для заказов на сумму свыше <b>{$free_shipping_summ}</b>  рублей, для заказов на меньшую сумму стоимость доставки составляет: <b>{$shipping_cost}</b> рублей. Минимальный заказ по весу — от {$min_weight} гр любого сорта кофе или чая.<br>
	Гарантированный срок доставки «СЕГОДНЯ НА СЕГОДНЯ» в случае подачи заказа до {$today_last_time}.</p>
	<br><p><b>ВНИМАНИЕ! Уважаемые покупатели, заказывая развесной чай или кофе, не забывайте, пожалуйста, заказывать упаковку (см. раздел <a href="/catalog.php?cat_id=64"><u>Упаковка</u></a>).</b></p>
	<form method="post" action="/cart.php">
		<div class="orderForm">
			<table>
				<tr class="tableHead">
					<th>№</th>
					<th>Товар</th>
					<th>Цена</th>
					<th class="w100">Количество</th>
					<th class="w100">Сумма</th>
					<th class="remove"></th>
				</tr>
				{if $cartItems}
					{foreach name=lastlevel item=cartItem from=$cartItems}
						<tr>
							<td></td>
							<th>{$cartItem.title} {$cartItem.property} {if $cartItem.grinding_rus}( {$cartItem.grinding_rus} ){/if} {if $cartItem.weight}({$cartItem.weight}){/if}</th>
							<td>
								{if $cartItem.price_discount}
									<span class="lineThrough colorGrey">{$cartItem.price|number_format:2:",":""} <span>руб.
									</span></span>  {$cartItem.price_discount|number_format:2:",":""}
									<span>руб.
									</span>
								{else}
									{$cartItem.price|number_format:2:",":""}
									<span>руб.
									</span>
								{/if} за {$cartItem.min_qtty} {$cartItem.unit}</td>
							<td><input type="text" name="qtty_{$cartItem.id}_{$cartItem.grinding}" value="{$cartItem.count}"> {$cartItem.unit}</td>
							<th>{$cartItem.total_price|number_format:2:",":""} <span class="price_new_d">руб.</span></th>
							<td><a class="remove" href="/cart.php?remove={$cartItem.id}-{$cartItem.grinding}" title="удалить">&nbsp;</a></td>
						</tr>
					{/foreach}
				{/if}
			</table>
			<div class="totalLine">
				<input type="submit" name="recalculate" class="contactSubm2 floatLeft" value="ПЕРЕСЧИТАТЬ">
				<table class="orderTotal">
					<tr>
						<td>Всего товаров на сумму: </td>
						<td> <span>{$total_price|number_format:2:",":""}</span> <span>руб.
									</span>
						</td>
					</tr>
					<tr>
						<td>Стоимость доставки: </td>
						<td> <span>{if $total_price>$free_shipping_summ}бесплатно</span> {else} {$shipping_cost}</span>  <span>
									</span> {/if}</td>
					</tr>
					<tr>
						<td>Итого: </td>
						<td> <span>{if $total_price<$free_shipping_summ}{($total_price+$shipping_cost)|number_format:2:",":""}</span>  <span>руб.
									</span> {else} {$total_price|number_format:2:",":""} <span>руб.
									</span>{/if}  </td>
					</tr>	
				</table>
			</div>
			<input type="button" name="toCatalog" class="contactSubm floatRight" value="ПРОДОЛЖИТЬ ПОКУПКИ" onclick="window.location = '/catalog.php'">
			<input type="submit" name="order_type" class="contactSubm2 floatRight mr13px" value="ОФОРМИТЬ ЗАКАЗ">
		</div>
	</form>
{/if}

{if $page_type == 'order_type'}
	<h1>ОФОРМЛЕНИЕ ЗАКАЗА</h1>
	<div class="orderBlock orderType">
		<span class="topLeft"></span><span class="topRight"></span><span class="bottomLeft"></span><span class="bottomRight"></span>
		<h1 class="title">БЫСТРОЕ ОФОРМЛЕНИЕ ЗАКАЗА</h1>
		<div class="orderContent">
			<p>Если Вы желаете максимально быстро оформить заказ на товар, нажимайте кнопку "Продолжить".</p>
			<p>Быстрое оформление заказа не требует регистрации, однако Вы не сможете получать новости о последних новинках в нашем магазине, участвовать в дисконтной программе, отслеживать историю своих заказов.</p>
			<form method="post" action="/cart.php">
				<div class="buttons"><input type="submit" name="order" class="contactSubm2" value="ПРОДОЛЖИТЬ"></div>
			</form>
		</div>
	</div>
	<div class="orderBlock orderType login">
		<span class="topLeft"></span><span class="topRight"></span><span class="bottomLeft"></span><span class="bottomRight"></span>
		<h1 class="title">ЗАРЕГИСТРИРОВАННЫЙ ПОЛЬЗОВАТЕЛЬ</h1>
		<div class="orderContent">
			<p>Если Вы являетесь зарегистрированным пользователем и помните свои логин и пароль, то введите их в соответствующие поля.</p>
			<form method="post" action="/cart.php">
				<div class="inputs">
					<p><label>Логин:</label> <input type="text" name="login"></p>
					<p><label>Пароль:</label> <input type="password" name="password"></p>
				</div>
				<div class="buttons">
					<input type="submit" name="order_type" class="orderSubm" value="ВОЙТИ">
					<a href="/restore.php">Забыли пароль?</a>
					<a href="/register.php">Регистрация</a>
					{if $error_message}<div class="red">{$error_message}</div>{/if}
				</div>
			</form>
		</div>
	</div>
	<div class="clear"></div>
{/if}

{if $page_type == 'submit_order'}
	<h1>ОФОРМЛЕНИЕ ЗАКАЗА</h1>
	<p>Пожалуйста укажите свои контактные данные и адрес доставки</p>
	<h1 class="none">Контактные данные:</h1>
	<form name="forma_f" class="contactForm order" method="post" action="/cart.php" onsubmit="return validateContactInfo(this);">
		<table>
			{if $order_error_message}
				<tr>
					<td colspan=4>
						<span class="red">{$order_error_message}<span>
					</td>
				</tr>
			{/if}
			<tr>
				<td style="width:1%">Имя:<span class="asterix">*</span></td>
				<td><input tabindex="1" class="contactInp" type="text" name="firstname" name="firstname" value="{if isset($smarty.session.firstname)}{$smarty.session.firstname}{else}{$smarty.post.firstname}{/if}"></td>
				<td class="w60px">Телефон:<span class="asterix">*</span></td>
				<td><input tabindex="3" class="contactInp" type="text" name="phone" value="{if isset($smarty.session.phone)}{$smarty.session.phone}{else}{$smarty.post.phone}{/if}"></td>
			</tr>
			<tr>
				<td>Фамилия:</td>
				<td><input tabindex="2" class="contactInp" type="text" name="lastname" value="{if isset($smarty.session.lastname)}{$smarty.session.lastname}{else}{$smarty.post.lastname}{/if}"></td>
				<td class="w60px">E-mail:<span class="asterix">*</span></td>
				<td><input tabindex="4" class="contactInp" type="text" name="email" value="{if isset($smarty.session.email)}{$smarty.session.email}{else}{$smarty.post.firstname}{/if}"></td>
			</tr>
			<tr>
				<td>Адрес:<span class="asterix">*</span></td>
				<td colspan="3">
					<input tabindex="5" class="contactInp wide" type="text" name="shipping_adr" value="{if isset($smarty.session.address) || isset($smarty.session.sddress2)}{$smarty.session.address}{$smarty.session.sddress2}{else}{$smarty.post.shipping_adr}{/if}">
				</td>
			</tr>
			<tr>
				<td>Удобное время:<span class="asterix">*</span></td>
				<td colspan="3">
					<input class="time_ud" type="radio" name="time_ud" value="1">
					<span>9<sup>00</sup>- 13<sup>00</sup></span>
					<input class="time_ud"  type="radio" name="time_ud" value="2">
					<span>13<sup>00</sup>- 17<sup>00</sup></span>
					<input class="time_ud" type="radio" name="time_ud" value="3">
					<span>17<sup>00</sup>- 21<sup>00</sup></span>
				</td>
				

			</tr>
			
			<tr>
				<td>Выберите способ доставки:<span class="asterix">*</span></td>
				<td colspan="1">
					<div class="dostavka1">
						<span>Доставка курьером</span>
						<br>
						<input  type="radio" name="dostavka1" value="1" onclick="price_dd();">
						<br>
						<span class="dost1">Если товар не подошёл, вы можете сразу вернуть его курьеру.</span>
					<div>
				</td>
				
				<td colspan="3">
					<div class="dostavka1">
						<span>Самовывоз-выберите подходящий магазин для самовывоза:</span>
						<br>
						<ul>
						<li>г. Минск. Комаровский рынок, 2 этаж, 62 пав <input onclick="price_dd();" type="radio" name="dostavka1" value="2"></li>
						<li>г. Минск, пр Независимости,58 <input onclick="price_dd();" type="radio" name="dostavka1" value="3"></li>
						</ul>
						
					</div>

				</td>
				

			</tr>
			
			<tr>
				<td>Пожелания:</td>
				<td colspan="3"><textarea tabindex="6" class="contactTextarea wide" name="notes"></textarea></td>
			</tr>
			<tr>
				<td colspan="1" style="line-height: 35px;"><input placeholder="Промокод" oninput="this.value = this.value.toUpperCase();" name="promo" type="edit" /></td>
				<td colspan="1" style="text-align: center;" ><a href="Javascript: sendPromo('POST','code='+forma_f.promo.value,forma_f);" class="promo_button">Проверить</a></td>
				<td id="promo_out" colspan="2" style="line-height: 35px; font-size: 20px;"></td>
			</tr>
			<tr>
				<td colspan="4">
					<input type="hidden" name="order" value="1">
					<input tabindex="7" type="submit" name="submitOrder" value="Оформить заказ" class="contactSubm2 floatRight" tabindex="4">
					Поля со звездочкой <span class="asterix">*</span> обязательны к заполнению
				</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="4">Нажимая на кнопку "Отправить заказ", вы принимаете условия <a href="/info.php#ofert">Публичной оферты</a>
				</td>
			</tr>
			<tr>
				<td style="text-align: center; center;" colspan="4"><a style="color: red;" href="/rules.php">ПРАВИЛА ПРОДАЖИ ТОВАРОВ В ИНТЕРНЕТ-МАГАЗИНЕ TEABREAK.BY</a>
				</td>
			</tr>
		</table>
	</form>
{/if}

{if $page_type == 'submit_order' || $page_type == 'order_type'}
	<h1 class="none">Ваш заказ:</h1>
	<div class="orderForm">
		<table>
			{if $cartItems}
				{foreach name=lastlevel item=cartItem from=$cartItems}
					<tr>
						<th>{$cartItem.title} {$cartItem.property}  {if $cartItem.grinding_rus}( {$cartItem.grinding_rus} ) {/if}{if $cartItem.weight}({$cartItem.weight}){/if}</th>
						<td>
							{if $cartItem.price_discount}
								<span class="lineThrough colorGrey">{$cartItem.price|number_format:2:",":""} <span
								>руб.</span></span>  {$cartItem.price_discount|number_format:2:",":""}  <span
								>руб.</span>
							{else}
								{$cartItem.price|number_format:2:",":""} <span class="price_new_d"
								>руб.</span>
							{/if} за {$cartItem.min_qtty} {$cartItem.unit}</td>
						<td>{$cartItem.count} {$cartItem.unit}</td>
						<th>{$cartItem.total_price|number_format:2:",":""} <span class="price_new_d"
								>руб.</span></th>
					</tr>
				{/foreach}
			{/if}
		</table>
		<div class="totalLine">
				<table class="orderTotal">
					<tr>
						<td>Всего товаров на сумму: <span style="display: none;" id="price_first_do">{$total_price|number_format:2:",":""}</span></td>
						<td> <span id="price_first">{$total_price|number_format:2:",":""}</span>  <span id="price_1"  class="price_new_d"
								>руб.</span></td>
					</tr>
					<tr>
						<td>Стоимость доставки: </td>
						<td> <span id="prise_d">{if $total_price>$free_shipping_summ}бесплатно</span> {else} {$shipping_cost}</span>  <span id="price_2" class="price_new_d"
								></span>{/if}</td>
					</tr>
					<tr>
						<td>Итого: </td>
						<td> <span id="total_price_d">{if $total_price<$free_shipping_summ}{($total_price+$shipping_cost)|number_format:2:",":""}</span>  <span id="price_3" class="price_new_d"
								>руб.</span> {else} {$total_price|number_format:2:",":""} <span class="price_new_d"
								>руб.</span> {/if}  </td>
					</tr>	
				</table>
		</div>
	</div>
{/if}


<script>
price_costt = {$shipping_cost} {literal};{/literal}
total_price_costt = {$total_price} {literal};{/literal}
</script>


{if $page_type == 'order_saved'}
	<h1>ЗАКАЗ ПРИНЯТ</h1>
	<p>Ваш заказ принят. В ближайшее время с вами свяжется наш сотрудник для уточнения условий доставки. Спасибо за покупку!</p>
{/if}
<div class="clear"></div>