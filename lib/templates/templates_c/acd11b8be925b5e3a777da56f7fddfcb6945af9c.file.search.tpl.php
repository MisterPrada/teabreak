<?php /* Smarty version Smarty-3.0.7, created on 2011-06-01 16:46:03
         compiled from "/home/teabreak/public_html/lib/templates/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13002790004de6429b0ba701-87072384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acd11b8be925b5e3a777da56f7fddfcb6945af9c' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/search.tpl',
      1 => 1306738731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13002790004de6429b0ba701-87072384',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/home/teabreak/public_html/lib/smarty/plugins/modifier.truncate.php';
?><div class="rightColumn only">
	
			<form action="/search.php" method="post" style="vertical-align:middle"><b>ПОИСК ТОВАРОВ ПО САЙТУ: </b>&nbsp; &nbsp;<input type="text" class="search" id="search_text" name="search_text" value="<?php echo $_smarty_tpl->getVariable('string')->value;?>
" style="margin-left:0px;"><input type="image" src="/i/search.png" width="17" height="18" value="Поиск" onClick="submit();" class="search_button"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Результаты поиска: <b><u><?php echo $_smarty_tpl->getVariable('count')->value;?>
</u></b></form> <br />
	<p></p>
	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
		<a class="search_item" href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['i']->value['catalog_id'];?>
&item_id=<?php echo $_smarty_tpl->tpl_vars['i']->value['good_id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</a> | <b><?php echo $_smarty_tpl->tpl_vars['i']->value['cat_title'];?>
</b>
		<p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['i']->value['description'],300);?>
</p>
	<?php }} ?>
	
	<div class="clear"></div>
</div>