<?php /* Smarty version Smarty-3.0.7, created on 2011-05-30 10:00:29
         compiled from "/home/teabreak/public_html/lib/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1773218384de3408d1b39c1-06458176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8af75b2cf4939b573c07b4f33f38e00e26640773' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/login.tpl',
      1 => 1306738731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1773218384de3408d1b39c1-06458176',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div align="center" >
<form action="/login.php" method="post" class="loginForm">
	<table>
		<?php if ($_smarty_tpl->getVariable('error_message')->value){?>
		<tr>
			<td colspan="3" align="center"><span class="red"><?php echo $_smarty_tpl->getVariable('error_message')->value;?>
</span></td>
		</tr>
		<?php }?>
		<tr>
			<td><b>ВХОД</b></td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td>Имя:</td>
			<td colspan="2"><input type="text" id="login" name="login" /></td>
		</tr>
		<tr>
			<td>Пароль:</td>
			<td colspan="2"><input type="password" id="password" name="password" /></td>
		</tr>
		<tr>
			<td><input type="image" src="/i/buttonEnter.png" width="60" height="31"  onclick="submit();" class="button"/></td>
			<td></td>
			<td align="right"><a href="/restore.php">Забыли пароль?</a>&nbsp;<a href="/register.php">Регистрация</a></td>
		</tr>
		<?php if ($_smarty_tpl->getVariable('register_prompt')->value!=''){?>
		<tr>
			<td colspan="3"><?php echo $_smarty_tpl->getVariable('register_prompt')->value;?>
</td>
		</tr>
		<?php }?>
	</table>
</form>
</div>
