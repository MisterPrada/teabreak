<div align="center" >
<form action="/login.php" method="post" class="loginForm">
	<table>
		{if $error_message}
		<tr>
			<td colspan="3" align="center"><span class="red">{$error_message}</span></td>
		</tr>
		{/if}
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
		{if $register_prompt!=''}
		<tr>
			<td colspan="3">{$register_prompt}</td>
		</tr>
		{/if}
	</table>
</form>
</div>
