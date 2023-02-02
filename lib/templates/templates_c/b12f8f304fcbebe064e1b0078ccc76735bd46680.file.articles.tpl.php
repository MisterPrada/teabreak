<?php /* Smarty version Smarty-3.0.7, created on 2011-04-26 19:19:53
         compiled from "/home/teabreak/public_html/lib/templates/articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11440545034db6f0a9c484f4-17359716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b12f8f304fcbebe064e1b0078ccc76735bd46680' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/articles.tpl',
      1 => 1303829889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11440545034db6f0a9c484f4-17359716',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="rightColumn only">
	<h1><a href="/articles.php" title="Статьи">Статьи</a></h1>
	
	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Articles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
		<h2><a href="/articles.php?art_id=<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</a></h2>
		<p class="time"><?php echo $_smarty_tpl->tpl_vars['i']->value['date'];?>
</p>
		<p><?php echo $_smarty_tpl->tpl_vars['i']->value['short_descr'];?>
</p>
	<?php }} ?>
	
	<?php if ($_smarty_tpl->getVariable('Article')->value){?>
		<h2><a href="/articles.php?art_id=<?php echo $_smarty_tpl->getVariable('Article')->value['id'];?>
" title="<?php echo $_smarty_tpl->getVariable('Article')->value['title'];?>
"><?php echo $_smarty_tpl->getVariable('Article')->value['title'];?>
</a></h2>
		<p class="time"><?php echo $_smarty_tpl->getVariable('Article')->value['date'];?>
</p>
		<p><?php echo $_smarty_tpl->getVariable('Article')->value['content'];?>
</p>
	<?php }?>

	<div class="clear"></div>
</div>