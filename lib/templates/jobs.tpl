<div class="rightColumn only">
	<h1>Вакансии</h1>
	{if $Jobs|count>0}
		{foreach key=key2 item=item from=$Jobs}
			<h2 class="colorOrange">{$item.title}</h2>
			<p class="time">{$item.date}</p>
			<h3></h3>
			{if $item.requests!=''}
				<p><b>Требования</b><br />{$item.requests}</p>
			{/if}
			{if $item.description!=''}
				<p><b>Обязанности</b><br />{$item.description}</p>
			{/if}
		{/foreach}
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
	{else}
		<p>В настоящее время свободных вакансий нет.</p>
	{/if}
	<div class="clear"></div>
</div>