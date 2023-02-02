	<div class="rightColumn only" align="center">
		<div  style="width:80%" align="left">
		<h1>Настройки</h1>
		<form action="/admin/settings.php?op=save" method="post" >
			{if $message}<span class="red">{$message}</span>{/if}
			<table class="itemTable">
				{foreach key=key2 item=item from=$ITEMS}
				<tr>
					<th nowrap="nowrap">{$item.description}</th>
					<td>
						{if $item.parameter != 'register_prompt' && $item.parameter !='introduction'}
							<input name="value_{$item.id}" id="value_{$item.id}" type="text" value='{$item.value}' {if $item.parameter !='admin_email' && $item.parameter!='admin_sms_email'}class="half"{/if} />
						{else}
							<textarea name="value_{$item.id}" id="value_{$item.id}" >{$item.value}</textarea>
						{/if}
					</td>
				</tr>
				{/foreach}
			</table>
			<input type="image" src="/i/buttonSave.png" width="95" height="31" alt="Save" onclick="submit();'" />
		</form>
		</div>
</div>