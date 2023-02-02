<?php /* Smarty version Smarty-3.0.7, created on 2011-04-26 18:19:48
         compiled from "/home/teabreak/public_html/lib/templates/news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16080011894db6e2946574a5-51713606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c922fcb95444e4a0304d41fa53715956a0be111' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/news.tpl',
      1 => 1303826525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16080011894db6e2946574a5-51713606',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="rightColumn only">
	<h1><a href="/news.php" title="Новости">Новости</a></h1>
	
	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Articles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
		<h2><a href="/news.php?art_id=<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</a></h2>
		<p class="time"><?php echo $_smarty_tpl->tpl_vars['i']->value['date'];?>
</p>
		<p><?php echo $_smarty_tpl->tpl_vars['i']->value['short_descr'];?>
</p>
	<?php }} ?>
	
	<?php if ($_smarty_tpl->getVariable('Article')->value){?>
		<h2><a href="/news.php?art_id=<?php echo $_smarty_tpl->getVariable('Article')->value['id'];?>
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