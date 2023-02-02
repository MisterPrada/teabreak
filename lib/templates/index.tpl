<div class="twoColumn">
	<div class="leftMenu">
			{foreach name=maintree item=i from=$leftMenuTree}
				<a {if $i.title eq "акции и скидки"}style="color:red"{/if} class="level1" href="/catalog.php?cat_id={$i.id}" title="{$i.title}">{$i.title}</a>
				{if $i.children}
					<div class="level2">
						{foreach name=subtree item=j from=$i.children}
							<a href="/catalog.php?cat_id={$j.id}" {if $j.id == $current_cat_id} class="sel"{/if} title="{$j.title}">{$j.title}</a>
						{/foreach}
					</div>
				{/if}
			{/foreach}
	</div>
	<div class="rightColumn">
		{if $RedNews}
		<div id="label_red_news">
			{$RedNews}
		</div>
		{/if}
		{if $introduction}
		<div class='introduction'>
			<h1>{$introduction_title}</h1>
			<p>{$introduction}</p>
		</div>
		{/if}
		<br />
		<div class="floatLeft w45">
			<h1><a href="/news.php" title="Новости">Новости</a></h1>
			{if $NewsArticle}
				<h2><a href="/news.php?art_id={$NewsArticle.id}" title="{$NewsArticle.title}">{$NewsArticle.title}</a></h2>
				<p class="time">{$NewsArticle.date}</p>
				<p>
					<span id="newsArticle">{$NewsArticle.short_descr}</span>
					<a class="more" href="/news.php" title="еще новости">еще новости</a>
				</p>
			{/if}
		</div>
		
		<div class="floatRight w45">
			<h1><a href="/blog.php" title="Вопросы и ответы">Вопросы и ответы</a></h1>
			{if $BlogArticle}
				<h2><a href="/blog.php?art_id={$BlogArticle.id}" title="{$BlogArticle.title}">{$BlogArticle.title}</a></h2>
				<p class="time">{$BlogArticle.date}</p>
				<p>
					<span id="blogArticle">{$BlogArticle.short_descr}</span>
					<a class="more" href="/blog.php" title="еще">еще</a>
				</p>
			{/if}
		</div>
		
		<script type="text/javascript">
			cutText('newsArticle', '40');
			cutText('blogArticle', '40');
		</script>

		<div class="clear"></div>
		
		{include file='popular.tpl'}

	
		<h1><a href="/articles.php" title="Статьи">Статьи</a></h1>
		{foreach name = articlesItem item = article from = $Articles}
			<h2><a href="/articles.php?art_id={$article.id}" title="{$article.title}">{$article.title}</a></h2>
			<p class="time">{$article.date}</p>
			<div>{$article.short_descr}</div>
		{/foreach}
		
		<table>
		<tr>
		<td>
		<a target="_BLANK" href="http://forexbrest.info/valyutnaya-birzha/"><img src="http://forexbrest.info/i/belarus_lite.gif" alt="Итоги торгов на на БВФБ" border="0" /></a>
		</td>
		<td style="padding-left: 50px;">
		<link rel="stylesheet" type="text/css" href="http://www.gismeteo.by/static/css/informer2/gs_informerClient.min.css">
<div id="gsInformerID-MsPoaeqiT7jkdY" class="gsInformer" style="width:329px;height:66px">
  <div class="gsIContent">
    <div id="cityLink">
      <a href="http://www.gismeteo.ru/city/daily/4248/" target="_blank">Погода в Минске</a>
    </div>
    <div class="gsLinks">
      <table>
        <tr>
          <td>
            <div class="leftCol">
              <a href="http://www.gismeteo.ru" target="_blank">
                <img alt="Gismeteo" title="Gismeteo" src="http://www.gismeteo.by/static/images/informer2/logo-mini2.png" align="absmiddle" border="0" />
                <span>Gismeteo</span>
              </a>
            </div>
            <div class="rightCol">
              <a href="http://www.gismeteo.ru/city/weekly/4248/" target="_blank">Прогноз на 2 недели</a>
            </div>
            </td>
        </tr>
      </table>
    </div>
  </div>
</div>
<script src="http://www.gismeteo.by/ajax/getInformer/?hash=MsPoaeqiT7jkdY" type="text/javascript"></script>
		</td>
		<td style="padding-left: 50px;">
		<a href={if file_exists('price/price_list.xlsx')}"price/price_list.xlsx"{else}"#"{/if}><img  width="200" src="i/list1.png"></img></a>
		<a href="/shops.php"><img width="200" src="i/list2.png"></img></a>
		</td>
		
		</tr>
		<tr>
		<td style="text-align: center; border: solid 1px orange;" colspan="5"><a style="color: red;" href="/rules.php">ПРАВИЛА ПРОДАЖИ ТОВАРОВ В ИНТЕРНЕТ-МАГАЗИНЕ TEABREAK.BY</a></td>
		</tr>
		
		</table>
		
		
	
	</div>
	<div class="clear"></div>
	
</div>
<div class="clear"></div>
