<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 01:02:15
         compiled from "/home/teabreak/public_html/lib/templates/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:958129504e0cf267d32fb9-20899216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08adb74fa9e97a812ccd0952a540d6b184538887' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/register.tpl',
      1 => 1309431269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '958129504e0cf267d32fb9-20899216',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div align="center" >
<?php if ($_smarty_tpl->getVariable('registered')->value){?>
	
	<SCRIPT TYPE="text/javascript">
	function bodyOnLoad() {
		window.setTimeout(goToOtherPage, 3000); 
	}
	function goToOtherPage() {
		window.location.href = "/profile.php"; 
	}
	window.onload = bodyOnLoad();
	</SCRIPT> 
	
	
	<div class='loginForm' >
		Поздравляем, регистрация прошла успешно!
	</div>
<?php }else{ ?>
<form action="/register.php" method="post" class="loginForm">
	<table>
		<tr>
			<td><b>РЕГИСТРАЦИЯ</b></td>
			<td colspan="2"></td>
		</tr>
		<?php if ($_smarty_tpl->getVariable('error_message')->value){?>
		<tr>
			<td colspan="2" align="center"><span class="red"><?php echo $_smarty_tpl->getVariable('error_message')->value;?>
</span></td>
		</tr>
		<?php }?>
		<tr>
			<td>Логин<span class="red">*</span>:</td>
			<td><input type="text" id="login" name="login" value="<?php echo $_smarty_tpl->getVariable('login')->value;?>
" /></td>
		</tr>
		<tr>
			<td>Пароль<span class="red">*</span>:</td>
			<td><input type="password" id="password" name="password" /></td>
		</tr>
		<tr>
			<td>Повторно пароль<span class="red">*</span>:</td>
			<td><input type="password" id="confirm" name="confirm" /></td>
		</tr>
		<tr>
			<td>Имя<span class="red">*</span>:</td>
			<td><input type="text" id="firstname" name="firstname" value="<?php echo $_smarty_tpl->getVariable('firstname')->value;?>
" /></td>
		</tr>
		<tr>
			<td>Фамилия<span class="red"></span>:</td>
			<td><input type="text" id="lastname" name="lastname"  value="<?php echo $_smarty_tpl->getVariable('lastname')->value;?>
"/></td>
		</tr>
		<tr>
			<td>Адрес<span class="red">*</span>:</td>
			<td><input type="text" id="address" name="address" value="<?php echo $_smarty_tpl->getVariable('address')->value;?>
" /></td>
		</tr>
		<tr>
			<td>Доп. адрес:</td>
			<td><input type="text" id="address2" name="address2"  value="<?php echo $_smarty_tpl->getVariable('address2')->value;?>
"/></td>
		</tr>
		<tr>
			<td>Телефон:</td>
			<td><input type="text" id="phone" name="phone"  value="<?php echo $_smarty_tpl->getVariable('phone')->value;?>
"/></td>
		</tr>
		<tr>
			<td>E-mail<span class="red">*</span>:</td>
			<td ><input type="text" id="email" name="email"  value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
"/></td>
		</tr>
		<tr>
			<td>Я&nbsp;хочу&nbsp;получать&nbsp;новости</td>
			<td><input class="auto" type="checkbox" id='receive_emails' name='receive_emails' checked="checked"/></td>
		</tr>	
		<tr>
			<td>Введите сумму<span class="red">*</span>:</td>
			<td><b><?php echo $_smarty_tpl->getVariable('random1')->value;?>
 + <?php echo $_smarty_tpl->getVariable('random2')->value;?>
</b> =  <input type='text' name='answer_captcha'  style="width:50px;"/></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="image" src="/i/buttonRegister.png" width="190" height="31" onclick="return validateRegisterInfo(this.form);" class="button"/></td>
		</tr>
	</table>

</form>
<?php }?>
</div>
