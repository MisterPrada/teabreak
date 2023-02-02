<?php /* Smarty version Smarty-3.0.7, created on 2014-03-26 18:06:52
         compiled from "/home/teabreak/public_html/lib/templates/blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6210061165332ed0c4b8bd4-17324519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62e8848e10ae7058294d4b0e33c4f22b3aee4267' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/blog.tpl',
      1 => 1395846365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6210061165332ed0c4b8bd4-17324519',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="rightColumn only">
	<h1><a href="/blog.php" title="Вопросы и ответы">Вопросы и ответы</a></h1>
	
	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Articles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
		<h2><a href="/blog.php?art_id=<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</a></h2>
		<p class="time"><?php echo $_smarty_tpl->tpl_vars['i']->value['date'];?>
</p>
		<p><?php echo $_smarty_tpl->tpl_vars['i']->value['short_descr'];?>
</p>
	<?php }} ?>
	
	<?php if ($_smarty_tpl->getVariable('Article')->value){?>
		<h2><a href="/blog.php?art_id=<?php echo $_smarty_tpl->getVariable('Article')->value['id'];?>
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