<div class="rightColumn only">
	<h1><a href="/news.php" title="Новости">Новости</a></h1>
	
	{foreach name = articlesItem item = i from = $Articles}
		<h2><a href="/news.php?art_id={$i.id}" title="{$i.title}">{$i.title}</a></h2>
		<p class="time">{$i.date}</p>
		<p>{$i.short_descr}</p>
	{/foreach}
	
	{if $Article}
		<h2><a href="/news.php?art_id={$Article.id}" title="{$Article.title}">{$Article.title}</a></h2>
		<p class="time">{$Article.date}</p>
		<p>{$Article.content}</p>
	{/if}

	<div class="clear"></div>
</div>