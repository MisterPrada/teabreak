<?php /* Smarty version Smarty-3.0.7, created on 2011-06-05 12:29:57
         compiled from "/home/teabreak/public_html/lib/templates/jobs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13966531644deb4c95cd7662-45258752%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1266318a245e973abf7f912f8c0e5cf03943e08f' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/jobs.tpl',
      1 => 1307266030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13966531644deb4c95cd7662-45258752',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="rightColumn only">
	<h1>Вакансии</h1>
	<?php if (count($_smarty_tpl->getVariable('Jobs')->value)>0){?>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Jobs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<h2 class="colorOrange"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</h2>
			<p class="time"><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</p>
			<h3></h3>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['requests']!=''){?>
				<p><b>Требования</b><br /><?php echo $_smarty_tpl->tpl_vars['item']->value['requests'];?>
</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['description']!=''){?>
				<p><b>Обязанности</b><br /><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</p>
			<?php }?>
		<?php }} ?>
		<br />
		<br />
		
		<form action="/jobs.php" method="post" class="contactForm">
		<b>Вы можете отправить нам сообщение</b><br /><br />
		<table>
			<tr>
				<td>Ф.И.О.</td>
				<td><input  tabindex="1" class="contactInp" type="text" value="" name="name" id="name"></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input  tabindex="2" class="contactInp" type="text" value="" name="email" id="email"></td>
			</tr>
			<tr>
				<td>Ваше сообщение</td>
				<td><textarea class="contactTextarea" name="message" id="message"></textarea></td>
			</tr>
		</table>
			<input tabindex="3" type="submit" class="contactSubm floatLeft" value="ОТПРАВИТЬ СООБЩЕНИЕ">
			<input tabindex="4" type="reset" class="contactSubm2 floatRight mr13px" value="ОЧИСТИТЬ ФОРМУ">
		</form>				
		<div class="contactRightBlock" align="center"><br />
			<p>Velcom 8 (029) 651 50 34 </p>
		</div>
		<div class="clear mb40px"></div>
	<?php }else{ ?>
		<p>В настоящее время свободных вакансий нет.</p>
	<?php }?>
	<div class="clear"></div>
</div>