<?php /* Smarty version Smarty-3.0.7, created on 2018-11-29 15:17:46
         compiled from "/home/teabreak/public_html/lib/templates/cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7815992855bffd8ea59c4b3-59749743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a88953eb987d78aee4e65a312164ead3621972f' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/cart.tpl',
      1 => 1543493851,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7815992855bffd8ea59c4b3-59749743',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('page_type')->value=='default'){?>
	<h1>КОРЗИНА</h1>
	<p>Проверьте содержимое корзины. При необходимости Вы можете изменить количество заказанного товара и пересчитать сумму заказа. Далее переходите к оформлению заказа.</p>

	<h1 class="none">Условия заказа:</h1>
	<p>Доставка заказов производится по Минску в пределах МКАД, в рабочие дни с <?php echo $_smarty_tpl->getVariable('start_shipping_time')->value;?>
 до <?php echo $_smarty_tpl->getVariable('stop_shipping_time')->value;?>
 часов. Доставка  бесплатна для заказов на сумму свыше <b><?php echo $_smarty_tpl->getVariable('free_shipping_summ')->value;?>
</b>  рублей, для заказов на меньшую сумму стоимость доставки составляет: <b><?php echo $_smarty_tpl->getVariable('shipping_cost')->value;?>
</b> рублей. Минимальный заказ по весу — от <?php echo $_smarty_tpl->getVariable('min_weight')->value;?>
 гр любого сорта кофе или чая.<br>
	Гарантированный срок доставки «СЕГОДНЯ НА СЕГОДНЯ» в случае подачи заказа до <?php echo $_smarty_tpl->getVariable('today_last_time')->value;?>
.</p>
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
				<?php if ($_smarty_tpl->getVariable('cartItems')->value){?>
					<?php  $_smarty_tpl->tpl_vars['cartItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cartItems')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cartItem']->key => $_smarty_tpl->tpl_vars['cartItem']->value){
?>
						<tr>
							<td></td>
							<th><?php echo $_smarty_tpl->tpl_vars['cartItem']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['cartItem']->value['property'];?>
 <?php if ($_smarty_tpl->tpl_vars['cartItem']->value['grinding_rus']){?>( <?php echo $_smarty_tpl->tpl_vars['cartItem']->value['grinding_rus'];?>
 )<?php }?> <?php if ($_smarty_tpl->tpl_vars['cartItem']->value['weight']){?>(<?php echo $_smarty_tpl->tpl_vars['cartItem']->value['weight'];?>
)<?php }?></th>
							<td>
								<?php if ($_smarty_tpl->tpl_vars['cartItem']->value['price_discount']){?>
									<span class="lineThrough colorGrey"><?php echo number_format($_smarty_tpl->tpl_vars['cartItem']->value['price'],2,",",'');?>
 <span>руб.
									</span></span>  <?php echo number_format($_smarty_tpl->tpl_vars['cartItem']->value['price_discount'],2,",",'');?>

									<span>руб.
									</span>
								<?php }else{ ?>
									<?php echo number_format($_smarty_tpl->tpl_vars['cartItem']->value['price'],2,",",'');?>

									<span>руб.
									</span>
								<?php }?> за <?php echo $_smarty_tpl->tpl_vars['cartItem']->value['min_qtty'];?>
 <?php echo $_smarty_tpl->tpl_vars['cartItem']->value['unit'];?>
</td>
							<td><input type="text" name="qtty_<?php echo $_smarty_tpl->tpl_vars['cartItem']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['cartItem']->value['grinding'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cartItem']->value['count'];?>
"> <?php echo $_smarty_tpl->tpl_vars['cartItem']->value['unit'];?>
</td>
							<th><?php echo number_format($_smarty_tpl->tpl_vars['cartItem']->value['total_price'],2,",",'');?>
 <span class="price_new_d">руб.</span></th>
							<td><a class="remove" href="/cart.php?remove=<?php echo $_smarty_tpl->tpl_vars['cartItem']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['cartItem']->value['grinding'];?>
" title="удалить">&nbsp;</a></td>
						</tr>
					<?php }} ?>
				<?php }?>
			</table>
			<div class="totalLine">
				<input type="submit" name="recalculate" class="contactSubm2 floatLeft" value="ПЕРЕСЧИТАТЬ">
				<table class="orderTotal">
					<tr>
						<td>Всего товаров на сумму: </td>
						<td> <span><?php echo number_format($_smarty_tpl->getVariable('total_price')->value,2,",",'');?>
</span> <span>руб.
									</span>
						</td>
					</tr>
					<tr>
						<td>Стоимость доставки: </td>
						<td> <span><?php if ($_smarty_tpl->getVariable('total_price')->value>$_smarty_tpl->getVariable('free_shipping_summ')->value){?>бесплатно</span> <?php }else{ ?> <?php echo $_smarty_tpl->getVariable('shipping_cost')->value;?>
</span>  <span>
									</span> <?php }?></td>
					</tr>
					<tr>
						<td>Итого: </td>
						<td> <span><?php if ($_smarty_tpl->getVariable('total_price')->value<$_smarty_tpl->getVariable('free_shipping_summ')->value){?><?php echo number_format(($_smarty_tpl->getVariable('total_price')->value+$_smarty_tpl->getVariable('shipping_cost')->value),2,",",'');?>
</span>  <span>руб.
									</span> <?php }else{ ?> <?php echo number_format($_smarty_tpl->getVariable('total_price')->value,2,",",'');?>
 <span>руб.
									</span><?php }?>  </td>
					</tr>	
				</table>
			</div>
			<input type="button" name="toCatalog" class="contactSubm floatRight" value="ПРОДОЛЖИТЬ ПОКУПКИ" onclick="window.location = '/catalog.php'">
			<input type="submit" name="order_type" class="contactSubm2 floatRight mr13px" value="ОФОРМИТЬ ЗАКАЗ">
		</div>
	</form>
<?php }?>

<?php if ($_smarty_tpl->getVariable('page_type')->value=='order_type'){?>
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
					<?php if ($_smarty_tpl->getVariable('error_message')->value){?><div class="red"><?php echo $_smarty_tpl->getVariable('error_message')->value;?>
</div><?php }?>
				</div>
			</form>
		</div>
	</div>
	<div class="clear"></div>
<?php }?>

<?php if ($_smarty_tpl->getVariable('page_type')->value=='submit_order'){?>
	<h1>ОФОРМЛЕНИЕ ЗАКАЗА</h1>
	<p>Пожалуйста укажите свои контактные данные и адрес доставки</p>
	<h1 class="none">Контактные данные:</h1>
	<form name="forma_f" class="contactForm order" method="post" action="/cart.php" onsubmit="return validateContactInfo(this);">
		<table>
			<?php if ($_smarty_tpl->getVariable('order_error_message')->value){?>
				<tr>
					<td colspan=4>
						<span class="red"><?php echo $_smarty_tpl->getVariable('order_error_message')->value;?>
<span>
					</td>
				</tr>
			<?php }?>
			<tr>
				<td style="width:1%">Имя:<span class="asterix">*</span></td>
				<td><input tabindex="1" class="contactInp" type="text" name="firstname" name="firstname" value="<?php if (isset($_SESSION['firstname'])){?><?php echo $_SESSION['firstname'];?>
<?php }else{ ?><?php echo $_POST['firstname'];?>
<?php }?>"></td>
				<td class="w60px">Телефон:<span class="asterix">*</span></td>
				<td><input tabindex="3" class="contactInp" type="text" name="phone" value="<?php if (isset($_SESSION['phone'])){?><?php echo $_SESSION['phone'];?>
<?php }else{ ?><?php echo $_POST['phone'];?>
<?php }?>"></td>
			</tr>
			<tr>
				<td>Фамилия:</td>
				<td><input tabindex="2" class="contactInp" type="text" name="lastname" value="<?php if (isset($_SESSION['lastname'])){?><?php echo $_SESSION['lastname'];?>
<?php }else{ ?><?php echo $_POST['lastname'];?>
<?php }?>"></td>
				<td class="w60px">E-mail:<span class="asterix">*</span></td>
				<td><input tabindex="4" class="contactInp" type="text" name="email" value="<?php if (isset($_SESSION['email'])){?><?php echo $_SESSION['email'];?>
<?php }else{ ?><?php echo $_POST['firstname'];?>
<?php }?>"></td>
			</tr>
			<tr>
				<td>Адрес:<span class="asterix">*</span></td>
				<td colspan="3">
					<input tabindex="5" class="contactInp wide" type="text" name="shipping_adr" value="<?php if (isset($_SESSION['address'])||isset($_SESSION['sddress2'])){?><?php echo $_SESSION['address'];?>
<?php echo $_SESSION['sddress2'];?>
<?php }else{ ?><?php echo $_POST['shipping_adr'];?>
<?php }?>">
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
<?php }?>

<?php if ($_smarty_tpl->getVariable('page_type')->value=='submit_order'||$_smarty_tpl->getVariable('page_type')->value=='order_type'){?>
	<h1 class="none">Ваш заказ:</h1>
	<div class="orderForm">
		<table>
			<?php if ($_smarty_tpl->getVariable('cartItems')->value){?>
				<?php  $_smarty_tpl->tpl_vars['cartItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cartItems')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cartItem']->key => $_smarty_tpl->tpl_vars['cartItem']->value){
?>
					<tr>
						<th><?php echo $_smarty_tpl->tpl_vars['cartItem']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['cartItem']->value['property'];?>
  <?php if ($_smarty_tpl->tpl_vars['cartItem']->value['grinding_rus']){?>( <?php echo $_smarty_tpl->tpl_vars['cartItem']->value['grinding_rus'];?>
 ) <?php }?><?php if ($_smarty_tpl->tpl_vars['cartItem']->value['weight']){?>(<?php echo $_smarty_tpl->tpl_vars['cartItem']->value['weight'];?>
)<?php }?></th>
						<td>
							<?php if ($_smarty_tpl->tpl_vars['cartItem']->value['price_discount']){?>
								<span class="lineThrough colorGrey"><?php echo number_format($_smarty_tpl->tpl_vars['cartItem']->value['price'],2,",",'');?>
 <span
								>руб.</span></span>  <?php echo number_format($_smarty_tpl->tpl_vars['cartItem']->value['price_discount'],2,",",'');?>
  <span
								>руб.</span>
							<?php }else{ ?>
								<?php echo number_format($_smarty_tpl->tpl_vars['cartItem']->value['price'],2,",",'');?>
 <span class="price_new_d"
								>руб.</span>
							<?php }?> за <?php echo $_smarty_tpl->tpl_vars['cartItem']->value['min_qtty'];?>
 <?php echo $_smarty_tpl->tpl_vars['cartItem']->value['unit'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['cartItem']->value['count'];?>
 <?php echo $_smarty_tpl->tpl_vars['cartItem']->value['unit'];?>
</td>
						<th><?php echo number_format($_smarty_tpl->tpl_vars['cartItem']->value['total_price'],2,",",'');?>
 <span class="price_new_d"
								>руб.</span></th>
					</tr>
				<?php }} ?>
			<?php }?>
		</table>
		<div class="totalLine">
				<table class="orderTotal">
					<tr>
						<td>Всего товаров на сумму: <span style="display: none;" id="price_first_do"><?php echo number_format($_smarty_tpl->getVariable('total_price')->value,2,",",'');?>
</span></td>
						<td> <span id="price_first"><?php echo number_format($_smarty_tpl->getVariable('total_price')->value,2,",",'');?>
</span>  <span id="price_1"  class="price_new_d"
								>руб.</span></td>
					</tr>
					<tr>
						<td>Стоимость доставки: </td>
						<td> <span id="prise_d"><?php if ($_smarty_tpl->getVariable('total_price')->value>$_smarty_tpl->getVariable('free_shipping_summ')->value){?>бесплатно</span> <?php }else{ ?> <?php echo $_smarty_tpl->getVariable('shipping_cost')->value;?>
</span>  <span id="price_2" class="price_new_d"
								></span><?php }?></td>
					</tr>
					<tr>
						<td>Итого: </td>
						<td> <span id="total_price_d"><?php if ($_smarty_tpl->getVariable('total_price')->value<$_smarty_tpl->getVariable('free_shipping_summ')->value){?><?php echo number_format(($_smarty_tpl->getVariable('total_price')->value+$_smarty_tpl->getVariable('shipping_cost')->value),2,",",'');?>
</span>  <span id="price_3" class="price_new_d"
								>руб.</span> <?php }else{ ?> <?php echo number_format($_smarty_tpl->getVariable('total_price')->value,2,",",'');?>
 <span class="price_new_d"
								>руб.</span> <?php }?>  </td>
					</tr>	
				</table>
		</div>
	</div>
<?php }?>


<script>
price_costt = <?php echo $_smarty_tpl->getVariable('shipping_cost')->value;?>
 ;
total_price_costt = <?php echo $_smarty_tpl->getVariable('total_price')->value;?>
 ;
</script>


<?php if ($_smarty_tpl->getVariable('page_type')->value=='order_saved'){?>
	<h1>ЗАКАЗ ПРИНЯТ</h1>
	<p>Ваш заказ принят. В ближайшее время с вами свяжется наш сотрудник для уточнения условий доставки. Спасибо за покупку!</p>
<?php }?>
<div class="clear"></div>