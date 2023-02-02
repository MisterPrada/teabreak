<div class="twoColumn wide">
	<div class="leftMenu wide">
		{$TREE}
	</div>
	<div class="rightColumn thin">
		<h1>{$CATALOGUE_ITEM}</h1>
		<input type="image" src="/i/buttonBack.png" width="95" height="31" alt="Back" onclick="window.location='/admin/catalogue.php?id={$PID}'" /><br /><br />
		<form action="/admin/item.php?op=save&amp;id={$ID}" method="post" >
			<table class="itemTable">
				<tr>
					<th>Наименование</th>
					<td><input name="title" id="title" type="text" value="{$TITLE}" /></td>
				</tr>
				<tr>
					<th>Индекс</th>
					<td><input name="sort" id="sort" type="text" value="{$SORT}" /></td>	
				</tr>
				<tr>
				<th>Скрыть</th>
					<td style="text-align: left;"><input name="hidden"{if $HIDDEN}checked{/if} type="checkbox"/></td>
				</tr>
			</table>
			<input type="hidden" name="pid" id="pid" value="{$PID}" />
			<input type="image" src="/i/buttonSave.png" width="95" height="31" alt="Save" onclick="submit();'" />
		</form>
	</div>
<div class="clear"></div>
</div>


<script type="text/javascript">
//ddtreemenu.createTree(treeid, enablepersist, opt_persist_in_days (default is 1))
ddtreemenu.createTree("tree", true); //create tree
//ddtreemenu.flatten('tree', 'contact');  // collapse all items
</script>