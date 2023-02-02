<div align="center" >
{if $registered}
	{literal}
	<SCRIPT TYPE="text/javascript">
	function bodyOnLoad() {
		window.setTimeout(goToOtherPage, 3000); 
	}
	function goToOtherPage() {
		window.location.href = "/profile.php"; 
	}
	window.onload = bodyOnLoad();
	</SCRIPT> 
	
	{/literal}
	<div class='loginForm' >
		Поздравляем, регистрация прошла успешно!
	</div>
{else}
<form action="/register.php" method="post" class="loginForm">
	<table>
		<tr>
			<td><b>РЕГИСТРАЦИЯ</b></td>
			<td colspan="2"></td>
		</tr>
		{if $error_message}
		<tr>
			<td colspan="2" align="center"><span class="red">{$error_message}</span></td>
		</tr>
		{/if}
		<tr>
			<td>Логин<span class="red">*</span>:</td>
			<td><input type="text" id="login" name="login" value="{$login}" /></td>
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
			<td><input type="text" id="firstname" name="firstname" value="{$firstname}" /></td>
		</tr>
		<tr>
			<td>Фамилия<span class="red"></span>:</td>
			<td><input type="text" id="lastname" name="lastname"  value="{$lastname}"/></td>
		</tr>
		<tr>
			<td>Адрес<span class="red">*</span>:</td>
			<td><input type="text" id="address" name="address" value="{$address}" /></td>
		</tr>
		<tr>
			<td>Доп. адрес:</td>
			<td><input type="text" id="address2" name="address2"  value="{$address2}"/></td>
		</tr>
		<tr>
			<td>Телефон:</td>
			<td><input type="text" id="phone" name="phone"  value="{$phone}"/></td>
		</tr>
		<tr>
			<td>E-mail<span class="red">*</span>:</td>
			<td ><input type="text" id="email" name="email"  value="{$email}"/></td>
		</tr>
		<tr>
			<td>Я&nbsp;хочу&nbsp;получать&nbsp;новости</td>
			<td><input class="auto" type="checkbox" id='receive_emails' name='receive_emails' checked="checked"/></td>
		</tr>	
		<tr>
			<td>Введите сумму<span class="red">*</span>:</td>
			<td><b>{$random1} + {$random2}</b> =  <input type='text' name='answer_captcha'  style="width:50px;"/></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="image" src="/i/buttonRegister.png" width="190" height="31" onclick="return validateRegisterInfo(this.form);" class="button"/></td>
		</tr>
	</table>

</form>
{/if}
</div>
