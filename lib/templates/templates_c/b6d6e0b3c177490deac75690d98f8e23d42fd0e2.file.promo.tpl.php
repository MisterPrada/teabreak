<?php /* Smarty version Smarty-3.0.7, created on 2016-03-23 16:44:46
         compiled from "/home/teabreak/public_html/lib/templates/admin/promo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42128638056f29dce99ba93-95237198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6d6e0b3c177490deac75690d98f8e23d42fd0e2' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/promo.tpl',
      1 => 1458740652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42128638056f29dce99ba93-95237198',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
		<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('PROMO')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['i']->value['percent'];?>
</td>	<td><?php echo $_smarty_tpl->tpl_vars['i']->value['code'];?>
</td> <td><?php echo $_smarty_tpl->tpl_vars['i']->value['used'];?>
</td> <td><?php echo $_smarty_tpl->tpl_vars['i']->value['date'];?>
</td> <td><a href="?delete=<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
">Удалить</a></td>
			</tr>
		<?php }} ?>
		</table>
		
	</fieldset>
</table>
