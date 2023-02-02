<?php /* Smarty version Smarty-3.0.7, created on 2014-04-13 16:58:55
         compiled from "/home/teabreak/public_html/lib/templates/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2044144193534a981f007836-41675830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6c8ca53ca2814b0a9a6f323fd846e738c798ccd' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/profile.tpl',
      1 => 1397397423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2044144193534a981f007836-41675830',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/teabreak/public_html/lib/smarty/plugins/modifier.date_format.php';
?><div align="center" >
<form action="/profile.php" method="post" enctype="multipart/form-data" class="loginForm">
	<table>
		<tr>
			<td><b>ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ 
			<?php if (file_exists($_smarty_tpl->getVariable('IMG_DIR')->value)){?>
			<img width="100" height="100" src="/img/chat/<?php echo $_smarty_tpl->getVariable('IMG_NAME')->value;?>
.jpg"></img>
			<?php }else{ ?>
			<img width="100" height="100" src="/img/chat.jpg"></img>
			<?php }?>
			</b></td>
			<td colspan="2"></td>
		</tr>
		<?php if ($_smarty_tpl->getVariable('error_message')->value){?>
		<tr>
			<td colspan="2" align="center"><span class="red"><?php echo $_smarty_tpl->getVariable('error_message')->value;?>
</span></td>
		</tr>
		<?php }?>
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
			<td><input type="text" id="firstname" name="firstname" value="<?php echo $_SESSION['firstname'];?>
" /></td>
		</tr>
		<tr>
			<td>Фамилия<span class="red"></span>:</td>
			<td><input type="text" id="lastname" name="lastname"  value="<?php echo $_SESSION['lastname'];?>
"/></td>
		</tr>
		<tr>
			<td>Адрес<span class="red">*</span>:</td>
			<td><input type="text" id="address" name="address" value="<?php echo $_SESSION['address'];?>
" /></td>
		</tr>
		<tr>
			<td>Доп. адрес:</td>
			<td><input type="text" id="address2" name="address2"  value="<?php echo $_SESSION['address2'];?>
"/></td>
		</tr>
		<tr>
			<td>Телефон:</td>
			<td><input type="text" id="phone" name="phone"  value="<?php echo $_SESSION['phone'];?>
"/></td>
		</tr>
		<tr>
			<td>E-mail<span class="red">*</span>:</td>
			<td ><input type="text" id="email" name="email"  value="<?php echo $_SESSION['email'];?>
"/></td>
		</tr>
		<tr>
			<td>Image:</td>
			<td ><input type="file" id="image" name="image"/> (только .jpg формат)
			</td>
		</tr>		
		<tr>
			<td>Я&nbsp;хочу&nbsp;получать&nbsp;новости</td>
			<td><input class="auto" type="checkbox" id='receive_emails' name='receive_emails' <?php if ($_SESSION['receive_email']){?> checked="checked"<?php }?>/></td>
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
				<?php if ((count($_smarty_tpl->getVariable('ORDERS')->value)==0)){?>
					<tr>
						<td>Нет данных</td>
					</tr>
				<?php }else{ ?>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ORDERS')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
				<tr <?php if ($_smarty_tpl->tpl_vars['item']->value['notes']){?>class='no_border'<?php }?>>
					<td><h2>Заказ №<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
 от <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['orderdate'],"%d.%m.%Y");?>
 на сумму <?php echo $_smarty_tpl->tpl_vars['item']->value['sum'];?>
</h2></td>
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
							<?php  $_smarty_tpl->tpl_vars['good'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['good']->key => $_smarty_tpl->tpl_vars['good']->value){
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['good']->value['title'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['good']->value['property'];?>
 <?php if ($_smarty_tpl->tpl_vars['good']->value['grinding_rus']){?>(<?php echo $_smarty_tpl->tpl_vars['good']->value['grinding_rus'];?>
)<?php }?></td>
								<td><?php echo $_smarty_tpl->tpl_vars['good']->value['count'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['good']->value['price'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['good']->value['cost'];?>
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
</div>
