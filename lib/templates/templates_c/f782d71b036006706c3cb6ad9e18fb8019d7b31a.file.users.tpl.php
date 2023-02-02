<?php /* Smarty version Smarty-3.0.7, created on 2011-05-30 16:30:11
         compiled from "/home/teabreak/public_html/lib/templates/admin/users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6913133714de39be3713028-77085157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f782d71b036006706c3cb6ad9e18fb8019d7b31a' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/users.tpl',
      1 => 1306738766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6913133714de39be3713028-77085157',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="rightColumn only">
		<h1>Пользователи</h1>
		<table class="adminOrdersTable">
				<tr class="tableHead">
					<td>Логин</td>
					<td>ФИО</td>
					<td>Телефон</td>
					<td>Адрес</td>
					<td>Email</td>
					<td>Всего&nbsp;заказов</td>
					<td>Общая&nbsp;сумма</td>
					<td></td>
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
					<td><a href="/admin/user.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['login'];?>
</a></td>
					<td><a href="/admin/user.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['lastname'];?>
</a></td>
					<td><a href="/admin/user.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
</a></td>
					<td><a href="/admin/user.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['address'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['address2']){?>, <?php echo $_smarty_tpl->tpl_vars['item']->value['address2'];?>
<?php }?></a></td>
					<td><a href="/admin/user.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</a></td>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['count'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['sum'];?>
</td>
					<td><input type="image" src="/i/delete.png" width="17" height="17" alt="Delete" onclick="confirmDeleteUser(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"/></td>
				</tr>
				<?php }} ?>
				<?php }?>
			</table>
	</div>
</div>
