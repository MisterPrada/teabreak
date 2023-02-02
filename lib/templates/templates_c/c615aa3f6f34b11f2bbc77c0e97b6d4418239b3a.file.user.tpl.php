<?php /* Smarty version Smarty-3.0.7, created on 2011-05-18 17:52:25
         compiled from "/home/teabreak/public_html/lib/templates/admin/user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12385336494dd3dd2901faa0-65564876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c615aa3f6f34b11f2bbc77c0e97b6d4418239b3a' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/user.tpl',
      1 => 1305709852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12385336494dd3dd2901faa0-65564876',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/teabreak/public_html/lib/smarty/plugins/modifier.date_format.php';
?><div class="rightColumn only">
	<div align="center">
		<div align="left">
		<input type="image" src="/i/buttonBack.png" width="95" height="31" alt="Back" onclick="window.location='/admin/users.php'" /><br /><br /></div>
	<table class="itemTable" style="width:500px;">
		<tr>
			<td colspan="2"><b>ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ</b></td>
		</tr>
		<tr>
			<th>Логин:</th>
			<td><?php echo $_smarty_tpl->getVariable('LOGIN')->value;?>
</td>
		</tr>
		<tr>
			<th>Имя:</th>
			<td><?php echo $_smarty_tpl->getVariable('FIRSTNAME')->value;?>
</td>
		</tr>
		<tr>
			<th>Фамилия:</th>
			<td><?php echo $_smarty_tpl->getVariable('LASTNAME')->value;?>
</td>
		</tr>
		<tr>
			<th>Адрес:</th>
			<td><?php echo $_smarty_tpl->getVariable('ADDRESS')->value;?>
</td>
		</tr>
		<tr>
			<th>Доп. адрес:</th>
			<td><?php echo $_smarty_tpl->getVariable('ADDRESS2')->value;?>
</td>
		</tr>
		<tr>
			<th>Телефон:</th>
			<td><?php echo $_smarty_tpl->getVariable('PHONE')->value;?>
</td>
		</tr>
		<tr>
			<th>E-mail:</th>
			<td ><?php echo $_smarty_tpl->getVariable('EMAIL')->value;?>
</td>
		</tr>	
		<tr>
			<th>Получать новости</th>
			<td><input class="auto" type="checkbox" id='receive_emails' name='receive_emails' <?php if ($_smarty_tpl->getVariable('receive_email')->value){?> checked="checked"<?php }?> disabled="disabled"/></td>
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
				<?php if ((count($_smarty_tpl->getVariable('ORDERS')->value)==0)){?>
					<tr>
						<td colspan="4">Нет данных</td>
					</tr>
				<?php }else{ ?>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ORDERS')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
				<tr <?php if ($_smarty_tpl->tpl_vars['item']->value['notes']){?>class='no_border'<?php }?>>
					<td><h2><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</h2></td>
					<td><h2><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['orderdate'],"%d %B %Y");?>
</h2></td>
					<td><h2><?php echo $_smarty_tpl->tpl_vars['item']->value['sum'];?>
</h2></td>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['notes'];?>
</td>
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
							<?php  $_smarty_tpl->tpl_vars['good'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['good']->key => $_smarty_tpl->tpl_vars['good']->value){
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['good']->value['title'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['good']->value['property'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['good']->value['count'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['good']->value['price'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['good']->value['price_discount'];?>
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
