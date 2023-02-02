<?php /* Smarty version Smarty-3.0.7, created on 2015-01-14 17:20:59
         compiled from "/home/teabreak/public_html/lib/templates/admin/item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135813705754b67b4b4202b0-47018412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ed3ce749b788b7123f2427e686a707587f09ae0' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/item.tpl',
      1 => 1421245180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135813705754b67b4b4202b0-47018412',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="twoColumn wide">
	<div class="leftMenu wide">
		<?php echo $_smarty_tpl->getVariable('TREE')->value;?>

	</div>
	<div class="rightColumn thin">
		<h1><?php echo $_smarty_tpl->getVariable('CATALOGUE_ITEM')->value;?>
</h1>
		<input type="image" src="/i/buttonBack.png" width="95" height="31" alt="Back" onclick="window.location='/admin/catalogue.php?id=<?php echo $_smarty_tpl->getVariable('PID')->value;?>
'" /><br /><br />
		<form action="/admin/item.php?op=save&amp;id=<?php echo $_smarty_tpl->getVariable('ID')->value;?>
" method="post" >
			<table class="itemTable">
				<tr>
					<th>Наименование</th>
					<td><input name="title" id="title" type="text" value="<?php echo $_smarty_tpl->getVariable('TITLE')->value;?>
" /></td>
				</tr>
				<tr>
					<th>Индекс</th>
					<td><input name="sort" id="sort" type="text" value="<?php echo $_smarty_tpl->getVariable('SORT')->value;?>
" /></td>	
				</tr>
				<tr>
				<th>Скрыть</th>
					<td style="text-align: left;"><input name="hidden"<?php if ($_smarty_tpl->getVariable('HIDDEN')->value){?>checked<?php }?> type="checkbox"/></td>
				</tr>
			</table>
			<input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->getVariable('PID')->value;?>
" />
			<input type="image" src="/i/buttonSave.png" width="95" height="31" alt="Save" onclick="submit();'" />
		</form>
	</div>
<div class="clear"></div>
</div>


<script type="text/javascript">
//ddtreemenu.createTree(treeid, enablepersist, opt_persist_in_days (default is 1))
ddtreemenu.createTree("tree", true); //create tree
//ddtreemenu.flatten('tree', 'contact');  // collapse all items
</script>