<?php /* Smarty version Smarty-3.0.7, created on 2011-05-17 18:54:44
         compiled from "/home/teabreak/public_html/lib/templates/admin/articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20488888504dd29a44ce4a93-71616040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99fa2fcc1ac977351946af9461aeaf6b851a42a0' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/articles.tpl',
      1 => 1305565103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20488888504dd29a44ce4a93-71616040',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/home/teabreak/public_html/lib/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/teabreak/public_html/lib/smarty/plugins/modifier.date_format.php';
?>	<div class="rightColumn only">
		<h1>Статьи</h1>
		<input type="image" src="/i/buttonAdd.png" width="95" height="31" alt="Add" onclick="window.location='/admin/article.php'" />
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
					<td width="100%"><h2><a href="/admin/article.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></h2><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['short_descr'],500);?>
</td>
					<td><h2><a href="/admin/article.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date'],"%d.%m.%Y");?>
</a></h2></td>
					<td><a href="/admin/article.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><img src="/i/edit.png" width="15" height="14" alt="Edit" /></a></td>
					<td><input type="image" src="/i/delete.png" width="17" height="17" alt="Delete" onclick="confirmDeleteArticle('adel',<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"/></td>
				</tr>
				<?php }} ?>
			<?php }?>
			</table>
	</div>

<script type="text/javascript">
//ddtreemenu.createTree(treeid, enablepersist, opt_persist_in_days (default is 1))
ddtreemenu.createTree("tree", true); //create tree

</script>