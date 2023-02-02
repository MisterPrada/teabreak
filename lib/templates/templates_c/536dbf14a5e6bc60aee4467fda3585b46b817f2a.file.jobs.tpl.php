<?php /* Smarty version Smarty-3.0.7, created on 2011-06-17 14:04:06
         compiled from "/home/teabreak/public_html/lib/templates/admin/jobs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7713337874dfb34a650a382-81494291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '536dbf14a5e6bc60aee4467fda3585b46b817f2a' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/jobs.tpl',
      1 => 1307266053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7713337874dfb34a650a382-81494291',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/teabreak/public_html/lib/smarty/plugins/modifier.date_format.php';
?>	<div class="rightColumn only">
		<h1>Вакансии</h1>
		<input type="image" src="/i/buttonAdd.png" width="95" height="31" alt="Add" onclick="window.location='/admin/job.php'" />
		<table class="adminTable">
			<tr class='tableHead'>
				<td colspan="5">&nbsp;</td>
			</tr>
			<?php if ((count($_smarty_tpl->getVariable('JOBS')->value)==0)){?>
				<tr>
					<td colspan="5">Нет данных</td>
				</tr>
			<?php }else{ ?>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('JOBS')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<tr>
					<td width="100%"><h2><a href="/admin/job.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></h2></td>
					<td><h2><a href="/admin/job.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date'],"%d.%m.%Y");?>
</a></h2></td>
					<td><?php if ($_smarty_tpl->tpl_vars['item']->value['closed']==1){?>Закрыта<?php }?></td>
					<td><a href="/admin/job.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><img src="/i/edit.png" width="15" height="14" alt="Edit" /></a></td>
					<td><input type="image" src="/i/delete.png" width="17" height="17" alt="Delete" onclick="confirmDeleteArticle('job',<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"/></td>
				</tr>
				<?php }} ?>
			<?php }?>
			</table>
	</div>
