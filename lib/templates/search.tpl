<div class="rightColumn only">
	
			<form action="/search.php" method="post" style="vertical-align:middle"><b>ПОИСК ТОВАРОВ ПО САЙТУ: </b>&nbsp; &nbsp;<input type="text" class="search" id="search_text" name="search_text" value="{$string}" style="margin-left:0px;"><input type="image" src="/i/search.png" width="17" height="18" value="Поиск" onClick="submit();" class="search_button"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Результаты поиска: <b><u>{$count}</u></b></form> <br />
	<p></p>
	{foreach name = searchItems item = i from = $items}
		<a class="search_item" href="/catalog.php?cat_id={$i.catalog_id}&item_id={$i.good_id}" title="{$i.title}">{$i.title}</a> | <b>{$i.cat_title}</b>
		<p>{$i.description|truncate:300}</p>
	{/foreach}
	
	<div class="clear"></div>
</div>