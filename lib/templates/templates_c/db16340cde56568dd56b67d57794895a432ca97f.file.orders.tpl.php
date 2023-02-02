<?php /* Smarty version Smarty-3.0.7, created on 2017-01-06 01:53:35
         compiled from "/home/teabreak/public_html/lib/templates/admin/orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1601184747586ece6f3dfa59-08731073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db16340cde56568dd56b67d57794895a432ca97f' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/orders.tpl',
      1 => 1483656785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1601184747586ece6f3dfa59-08731073',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/teabreak/public_html/lib/smarty/plugins/modifier.date_format.php';
?><div class="twoColumn">
	<div class="leftMenu">
		<div class="ordersMenuItem"><a href="/admin/orders.php?op=today" <?php if ($_smarty_tpl->getVariable('OP')->value=='today'){?>class="sel"<?php }?>>СЕГОДНЯ</a></div>
		<div class="ordersMenuItem"><a href="/admin/orders.php?op=yesterday" <?php if ($_smarty_tpl->getVariable('OP')->value=='yesterday'){?>class="sel"<?php }?>>ВЧЕРА</a></div>
		<div class="ordersMenuItem"><a href="/admin/orders.php?op=week" <?php if ($_smarty_tpl->getVariable('OP')->value=='week'){?>class="sel"<?php }?>>НЕДЕЛЯ</a></div>
		<div class="ordersMenuItem"><a href="/admin/orders.php?op=month" <?php if ($_smarty_tpl->getVariable('OP')->value=='month'){?>class="sel"<?php }?>>МЕСЯЦ</a></div>
		<div class="ordersMenuItem">
			<form method="get" action="/admin/orders.php?op=between">
			<a <?php if ($_smarty_tpl->getVariable('OP')->value=='between'){?>class="sel"<?php }?>>УКАЖИТЕ ДАТЫ</a><br />
			<table>
				<tr>
					<td>c: </td>
					<td><input class="date date_toggled" type="text" style="display: inline; width:100px;" id="from" name="from" value="<?php echo $_smarty_tpl->getVariable('FROM')->value;?>
"/><img class="date_toggler" style="position: relative; top: 3px; margin-left: 4px; cursor: pointer;" src="/i/calendar.gif"/></td>
				</tr>
				<tr>
					<td>по: </td>
					<td><input class="date date_toggled" type="text" style="display: inline; width:100px;" id="to" name="to" value="<?php echo $_smarty_tpl->getVariable('TO')->value;?>
"/><img class="date_toggler" style="position: relative; top: 3px; margin-left: 4px; cursor: pointer;" src="/i/calendar.gif"/></td>
				</tr>
			</table><br />
			<input type="hidden" id="op" name="op" value="between" />
			<input type="image" src="/i/buttonSearch.png" width="64" height="25" onClick="submit()"; />
			</form>
		</div>
	</div>
	<div class="rightColumn">
		<div>ОБЩЕЕ КОЛИЧЕСТВО ЗАКАЗОВ ЗА ПЕРИОД : <B><?php echo $_smarty_tpl->getVariable('COUNT')->value;?>
</B>, НА СУММУ: <b><?php echo $_smarty_tpl->getVariable('SUM')->value;?>
<b> руб. </div>
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
				<?php if ((count($_smarty_tpl->getVariable('ITEMS')->value)==0)){?>
					<tr>
						<td colspan="7">Нет данных</td>
					</tr>
				<?php }else{ ?>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ITEMS')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
				<tr <?php if ($_smarty_tpl->tpl_vars['item']->value['notes']){?>class='no_border'<?php }?>>
					<td><h2><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</h2></td>
					<td><h2><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['orderdate'],"%d.%m.%Y");?>
</h2></td>
					<td><h2><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['sum'],2,",",'');?>
</h2></td>
					<td><h2><?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
</h2></td>
					<td><h2><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</h2></td>
					<td><h2><?php echo $_smarty_tpl->tpl_vars['item']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['lastname'];?>
</h2></td>
					<td><h2><?php echo $_smarty_tpl->tpl_vars['item']->value['shipping_adr'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['shipping_adr2']){?>, <?php echo $_smarty_tpl->tpl_vars['item']->value['shipping_adr2'];?>
<?php }?></h2></td>
				</tr>
					<?php if ($_smarty_tpl->tpl_vars['item']->value['notes']){?>
						<tr>
							<td></td>
							<td>Примечания:</td>
							<td colspan="5"><?php echo $_smarty_tpl->tpl_vars['item']->value['notes'];?>
</td>
						</tr>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['item']->value['time_ud']){?>
						<tr>
							<td></td>
							<td>Выбранное клиентом время:</td>
							<td colspan="5"><?php echo $_smarty_tpl->tpl_vars['item']->value['time_ud'];?>
</td>
						</tr>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['item']->value['dostavka']){?>
						<tr>
							<td></td>
							<td>Выбранная клиентом доставка:</td>
							<td colspan="5"><?php echo $_smarty_tpl->tpl_vars['item']->value['dostavka'];?>
</td>
						</tr>
					<?php }?>
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
							<?php  $_smarty_tpl->tpl_vars['good'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['good']->key => $_smarty_tpl->tpl_vars['good']->value){
?>
							<tr>
								<td><a href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['good']->value['cat'];?>
&item_id=<?php echo $_smarty_tpl->tpl_vars['good']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['good']->value['title'];?>
</a></td>
								<td><?php echo $_smarty_tpl->tpl_vars['good']->value['property'];?>
 <?php if ($_smarty_tpl->tpl_vars['good']->value['grinding_rus']){?>(<?php echo $_smarty_tpl->tpl_vars['good']->value['grinding_rus'];?>
)<?php }?></td>
								<td><?php echo $_smarty_tpl->tpl_vars['good']->value['count'];?>
 <?php echo $_smarty_tpl->tpl_vars['good']->value['unit'];?>
</td>
								<td><?php echo number_format($_smarty_tpl->tpl_vars['good']->value['price'],2,",",'');?>
</td>
								<td><?php echo number_format($_smarty_tpl->tpl_vars['good']->value['cost'],2,",",'');?>
</td>

							</tr>
							<?php }} ?>
						</table>
					</td>
				</tr>
				<?php }} ?>
			<?php }?>
			</table>
	</div>
	<div class="clear"></div>
</div>

<script>
window.addEvent('load', function() {
	new DatePicker('.date_toggled', {
		allowEmpty: true,
		toggleElements: '.date_toggler'
	});
	//new DatePicker('.demo', { positionOffset: { x: 0, y: 5 }}); 
});

</script>
