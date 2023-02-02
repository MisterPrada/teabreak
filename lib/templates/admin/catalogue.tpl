<div class="twoColumn wide" style="vertical-align:top;">
	<div class="leftMenu wide">
		{$TREE}
	</div>
	<div class="rightColumn thin">
	<h1>{$CATALOGUE_ITEM}</h1>
	{if $GOODS|@count==0}
		<input type="image" src="/i/buttonAddItem.png" width="190" height="31" alt="Add" onclick="window.location='/admin/item.php?pid={$ID}'" />
			{if ($ITEMS|@count==0)}
			<input type="image" src="/i/buttonAddGood.png" width="135" height="31" alt="Add" onclick="window.location='/admin/good.php?pid={$ID}'" />
		{/if}
		<table class="adminTable">
			<tr class='tableHead'>
				<td colspan="3">&nbsp;</td>
			</tr>
			{if ($ITEMS|@count==0)}
				<tr>
					<td colspan="3">Нет данных</td>
				</tr>
			{else}
				{foreach key=key2 item=item from=$ITEMS}
				<tr>
					<td width="100%"><h2 class='folder'><a href="/admin/catalogue.php?id={$item.id}">{$item.title}</a></h2></td>
					<td><a href="/admin/item.php?id={$item.id}&amp;op=edit"><img src="/i/edit.png" width="15" height="14" alt="Edit" /></a></td>
					{if $item.subItems|@count > 0 || $item.has_goods!=0}
						<td><img src="/i/delete_gray.png" width="17" height="17"></td>
					{else}
						<td><input type="image" src="/i/delete.png" width="17" height="17" alt="Delete" onclick="confirmDeleteItem('cdel',{$item.id})"/></td>
					{/if}
				</tr>
				{/foreach}
			{/if}
			</table>
	{else}
		<input type="image" src="/i/buttonAddGood.png" width="135" height="31" alt="Add" onclick="window.location='/admin/good.php?pid={$ID}'" />
		<table class="adminTable">
				<tr class="tableHead">
					<td>Товар</td>
					<td>Цена</td>
					<td>Скидка</td>
					<td>Ед.измерения</td>
					<td colspan="2"></td>
				</tr>
				{foreach key=key2 item=item from=$GOODS}
				<tr>
					<td width="100%"><h2 class="goods"><a href="/admin/good.php?id={$item.id}">{$item.title}</a></h2></td>
					<td>{$item.price}</td>
					<td>{$item.discount}</td>
					<td>{$item.min_qtty} {$item.unit}</td>
					<td><a href="/admin/good.php?id={$item.id}&amp;op=edit"><img src="/i/edit.png" width="15" height="14" alt="Edit" /></a></td>
					<td><input type="image" src="/i/delete.png" width="17" height="17" alt="Delete" onclick="confirmDeleteItem('gdel',{$item.id})"/></td>
				</tr>
				{/foreach}
			</table>
	{/if}
	</div>
<div class="clear"></div>
</div>

<script type="text/javascript">
//ddtreemenu.createTree(treeid, enablepersist, opt_persist_in_days (default is 1))
ddtreemenu.createTree("tree", true); //create tree
</script>