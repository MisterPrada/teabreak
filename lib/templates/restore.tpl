<div align="center" >
<form action="/restore.php" method="post" class="loginForm">
	<table>
		{if $ok}
		<tr>
			<td colspan="2" align="center">Пароль был изменен. Новый пароль выслан на указанный email.</td>
		</tr>
		{else}
			{if $error_message}
			<tr>
				<td colspan="2" align="center"><span class="red">Ошибка - был указан неверный логин или email.</td>
			</tr>
			{/if}
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
		{/if}
	</table>
</form>
</div>
