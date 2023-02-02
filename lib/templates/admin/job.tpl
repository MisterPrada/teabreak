	<div class="rightColumn only" align="center">
		<div  style="width:50%" align="left">
		{if $ID==0}
			<h1>Добавить вакансию</h1>
		{else}
			 <h1>Редактирование вакансии</h1>
		{/if}
		<BR />

		<input type="image" src="/i/buttonBack.png" width="95" height="31" alt="Back" onclick="window.location='/admin/jobs.php'" />
		<form action="/admin/job.php?op=save&amp;id={$ID}" method="post" >
			<table class="itemTable">
				<tr>
					<th>Вакансия<span class="red">*</span></th>
					<td><input name="title" id="title" type="text" value='{$TITLE}' /></td>
				</tr>
				<tr>
					<th>Требования<span class="red">*</span></th>
					<td><textarea name="requests" id="requests" >{$REQUESTS}</textarea></td>
				</tr>
				<tr>
					<th>Обязанности,&nbsp;зарплата<span class="red">*</span></th>
					<td><textarea name="description" id="description" >{$DESCRIPTION}</textarea></td>
				</tr>
				<tr>
					<th>Вакансия&nbsp;закрыта</th>
					<td><input name="closed" id="closed" type="checkbox" {if $CLOSED==1} checked="checked"{/if}/></td>
				</tr>
				<tr>
					<th>Дата</th>
					<td><input class="date date_toggled" type="text" style="display: inline; width:100px;" id="date" name="date" value="{$DATE}"/><img class="date_toggler" style="position: relative; top: 3px; margin-left: 4px; cursor: pointer;" src="/i/calendar.gif"/></td>
				</tr>
			</table>
			<input type="image" src="/i/buttonSave.png" width="95" height="31" alt="Save" onclick="submit();'" />
		</form>
		</div>
	</div>

{literal}
<script>
window.addEvent('load', function() {
	new DatePicker('.date_toggled', {
		allowEmpty: true,
		toggleElements: '.date_toggler'
	});
});

</script>
{/literal}