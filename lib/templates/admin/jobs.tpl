	<div class="rightColumn only">
		<h1>Вакансии</h1>
		<input type="image" src="/i/buttonAdd.png" width="95" height="31" alt="Add" onclick="window.location='/admin/job.php'" />
		<table class="adminTable">
			<tr class='tableHead'>
				<td colspan="5">&nbsp;</td>
			</tr>
			{if ($JOBS|@count==0)}
				<tr>
					<td colspan="5">Нет данных</td>
				</tr>
			{else}
				{foreach key=key2 item=item from=$JOBS}
				<tr>
					<td width="100%"><h2><a href="/admin/job.php?id={$item.id}">{$item.title}</a></h2></td>
					<td><h2><a href="/admin/job.php?id={$item.id}">{$item.date|date_format:"%d.%m.%Y"}</a></h2></td>
					<td>{if $item.closed==1}Закрыта{/if}</td>
					<td><a href="/admin/job.php?id={$item.id}"><img src="/i/edit.png" width="15" height="14" alt="Edit" /></a></td>
					<td><input type="image" src="/i/delete.png" width="17" height="17" alt="Delete" onclick="confirmDeleteArticle('job',{$item.id})"/></td>
				</tr>
				{/foreach}
			{/if}
			</table>
	</div>
