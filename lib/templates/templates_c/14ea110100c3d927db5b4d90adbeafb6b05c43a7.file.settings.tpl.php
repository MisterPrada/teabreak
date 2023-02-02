<?php /* Smarty version Smarty-3.0.7, created on 2012-03-27 18:12:17
         compiled from "/home/teabreak/public_html/lib/templates/admin/settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11784786634f71d8d12ab304-99760724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14ea110100c3d927db5b4d90adbeafb6b05c43a7' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/settings.tpl',
      1 => 1332861132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11784786634f71d8d12ab304-99760724',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	<div class="rightColumn only" align="center">
		<div  style="width:80%" align="left">
		<h1>Настройки</h1>
		<form action="/admin/settings.php?op=save" method="post" >
			<?php if ($_smarty_tpl->getVariable('message')->value){?><span class="red"><?php echo $_smarty_tpl->getVariable('message')->value;?>
</span><?php }?>
			<table class="itemTable">
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ITEMS')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<tr>
					<th nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</th>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['item']->value['parameter']!='register_prompt'&&$_smarty_tpl->tpl_vars['item']->value['parameter']!='introduction'){?>
							<input name="value_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="value_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value='<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
' <?php if ($_smarty_tpl->tpl_vars['item']->value['parameter']!='admin_email'&&$_smarty_tpl->tpl_vars['item']->value['parameter']!='admin_sms_email'){?>class="half"<?php }?> />
						<?php }else{ ?>
							<textarea name="value_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="value_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
</textarea>
						<?php }?>
					</td>
				</tr>
				<?php }} ?>
			</table>
			<input type="image" src="/i/buttonSave.png" width="95" height="31" alt="Save" onclick="submit();'" />
		</form>
		</div>
</div>