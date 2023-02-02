<?php /* Smarty version Smarty-3.0.7, created on 2011-07-06 14:40:29
         compiled from "/home/teabreak/public_html/lib/templates/admin/catalogue.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1815638924e1449ad994e68-98553010%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8520c14aa4e8a0c7b4473ab11094b7f427c149fb' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/catalogue.tpl',
      1 => 1309948305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1815638924e1449ad994e68-98553010',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="twoColumn wide" style="vertical-align:top;">
	<div class="leftMenu wide">
		<?php echo $_smarty_tpl->getVariable('TREE')->value;?>

	</div>
	<div class="rightColumn thin">
	<h1><?php echo $_smarty_tpl->getVariable('CATALOGUE_ITEM')->value;?>
</h1>
	<?php if (count($_smarty_tpl->getVariable('GOODS')->value)==0){?>
		<input type="image" src="/i/buttonAddItem.png" width="190" height="31" alt="Add" onclick="window.location='/admin/item.php?pid=<?php echo $_smarty_tpl->getVariable('ID')->value;?>
'" />
			<?php if ((count($_smarty_tpl->getVariable('ITEMS')->value)==0)){?>
			<input type="image" src="/i/buttonAddGood.png" width="135" height="31" alt="Add" onclick="window.location='/admin/good.php?pid=<?php echo $_smarty_tpl->getVariable('ID')->value;?>
'" />
		<?php }?>
		<table class="adminTable">
			<tr class='tableHead'>
				<td colspan="3">&nbsp;</td>
			</tr>
			<?php if ((count($_smarty_tpl->getVariable('ITEMS')->value)==0)){?>
				<tr>
					<td colspan="3">Нет данных</td>
				</tr>
			<?php }else{ ?>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ITEMS')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<tr>
					<td width="100%"><h2 class='folder'><a href="/admin/catalogue.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></h2></td>
					<td><a href="/admin/item.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&amp;op=edit"><img src="/i/edit.png" width="15" height="14" alt="Edit" /></a></td>
					<?php if (count($_smarty_tpl->tpl_vars['item']->value['subItems'])>0||$_smarty_tpl->tpl_vars['item']->value['has_goods']!=0){?>
						<td><img src="/i/delete_gray.png" width="17" height="17"></td>
					<?php }else{ ?>
						<td><input type="image" src="/i/delete.png" width="17" height="17" alt="Delete" onclick="confirmDeleteItem('cdel',<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"/></td>
					<?php }?>
				</tr>
				<?php }} ?>
			<?php }?>
			</table>
	<?php }else{ ?>
		<input type="image" src="/i/buttonAddGood.png" width="135" height="31" alt="Add" onclick="window.location='/admin/good.php?pid=<?php echo $_smarty_tpl->getVariable('ID')->value;?>
'" />
		<table class="adminTable">
				<tr class="tableHead">
					<td>Товар</td>
					<td>Цена</td>
					<td>Скидка</td>
					<td>Ед.измерения</td>
					<td colspan="2"></td>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('GOODS')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<tr>
					<td width="100%"><h2 class="goods"><a href="/admin/good.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></h2></td>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['discount'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['min_qtty'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>
</td>
					<td><a href="/admin/good.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&amp;op=edit"><img src="/i/edit.png" width="15" height="14" alt="Edit" /></a></td>
					<td><input type="image" src="/i/delete.png" width="17" height="17" alt="Delete" onclick="confirmDeleteItem('gdel',<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"/></td>
				</tr>
				<?php }} ?>
			</table>
	<?php }?>
	</div>
<div class="clear"></div>
</div>

<script type="text/javascript">
//ddtreemenu.createTree(treeid, enablepersist, opt_persist_in_days (default is 1))
ddtreemenu.createTree("tree", true); //create tree
</script>