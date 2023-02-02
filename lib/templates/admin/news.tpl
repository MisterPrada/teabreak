	<div class="rightColumn only">
		<h1>Новости</h1>
		<input type="image" src="/i/buttonAdd.png" width="95" height="31" alt="Add" onclick="window.location='/admin/nnews.php'" />
		<table class="adminTable">
			<tr class='tableHead'>
				<td colspan="4">&nbsp;</td>
			</tr>
			{if ($NEWS|@count==0)}
				<tr>
					<td colspan="4">Нет данных</td>
				</tr>
			{else}
				{foreach key=key2 item=item from=$NEWS}
				<tr>
					<td width="100%"><h2><a href="/admin/nnews.php?id={$item.id}">{$item.title}</a></h2></td>
					<td><h2><a href="/admin/nnews.php?id={$item.id}">{$item.date|date_format:"%d.%m.%Y"}</a></h2></td>
					<td><a href="/admin/nnews.php?id={$item.id}"><img src="/i/edit.png" width="15" height="14" alt="Edit" /></a></td>
					<td><input type="image" src="/i/delete.png" width="17" height="17" alt="Delete" onclick="confirmDeleteArticle('ndel',{$item.id})"/></td>
				</tr>
				{/foreach}
			{/if}
			</table>
	</div>

<script type="text/javascript">
//ddtreemenu.createTree(treeid, enablepersist, opt_persist_in_days (default is 1))
ddtreemenu.createTree("tree", true); //create tree
</script>