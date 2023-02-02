<?php /* Smarty version Smarty-3.0.7, created on 2011-06-15 14:00:10
         compiled from "/home/teabreak/public_html/lib/templates/restore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7041839224df890bad65649-49358708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb864ca510694931ebc937ebc6a7fbb2646695ef' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/restore.tpl',
      1 => 1306145122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7041839224df890bad65649-49358708',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div align="center" >
<form action="/restore.php" method="post" class="loginForm">
	<table>
		<?php if ($_smarty_tpl->getVariable('ok')->value){?>
		<tr>
			<td colspan="2" align="center">Пароль был изменен. Новый пароль выслан на указанный email.</td>
		</tr>
		<?php }else{ ?>
			<?php if ($_smarty_tpl->getVariable('error_message')->value){?>
			<tr>
				<td colspan="2" align="center"><span class="red">Ошибка - был указан неверный логин или email.</td>
			</tr>
			<?php }?>
		<tr>
			<td colspan="2"><b>ВОССТАНОВЛЕНИЕ ПАРОЛЯ</b></td>
		</tr>
		<tr>
			<td>Логин:</td>
			<td><input type="text" id="login" name="login" /></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" id="email" name="email" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="image" src="/i/buttonSend.png" width="95" height="31"  onclick="submit();" class="button"/></td>
		</tr>
		<?php }?>
	</table>
</form>
</div>
