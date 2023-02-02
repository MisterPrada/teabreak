<?php /* Smarty version Smarty-3.0.7, created on 2014-03-26 18:07:17
         compiled from "/home/teabreak/public_html/lib/templates/admin/blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16378699195332ed25b350b0-85420258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5a383b625d70ddc4aaee301576416f0540a423b' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/blog.tpl',
      1 => 1395846404,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16378699195332ed25b350b0-85420258',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/home/teabreak/public_html/lib/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/teabreak/public_html/lib/smarty/plugins/modifier.date_format.php';
?>	<div class="rightColumn only">
		<h1>Вопросы и ответы</h1>
		<input type="image" src="/i/buttonAdd.png" width="95" height="31" alt="Add" onclick="window.location='/admin/blogitem.php'" />
		<table class="adminTable">
			<tr class='tableHead'>
				<td colspan="4">&nbsp;</td>
			</tr>
			<?php if ((count($_smarty_tpl->getVariable('ARTICLES')->value)==0)){?>
				<tr>
					<td colspan="4">Нет данных</td>
				</tr>
			<?php }else{ ?>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ARTICLES')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<tr>
					<td width="100%"><h2><a href="/admin/blogitem.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></h2><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['short_descr'],500);?>
</td>
					<td><h2><a href="/admin/blogitem.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date'],"%d.%m.%Y");?>
</a></h2></td>
					<td><a href="/admin/blogitem.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><img src="/i/edit.png" width="15" height="14" alt="Edit" /></a></td>
					<td><input type="image" src="/i/delete.png" width="17" height="17" alt="Delete" onclick="confirmDeleteArticle('bdel',<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"/></td>
				</tr>
				<?php }} ?>
			<?php }?>
			</table>
	</div>
