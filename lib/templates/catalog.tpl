<div class="twoColumn">

	<div class="leftMenu">
		{foreach name=maintree item=i from=$Tree}
			<a {if $i.title eq "акции и скидки"}style="color:red"{/if} class="level1" href="/catalog.php?cat_id={$i.id}" title="{$i.title}">{$i.title}</a>
			{if $i.children}
				<div class="level2">
					{foreach name=subtree item=j from=$i.children}
						<a {if $j.id == 89 || $j.id == 101}style="color: red;"{/if} href="/catalog.php?cat_id={$j.id}" {if $j.id == $current_cat_id} class="sel"{/if} title="{$j.title}">{$j.title}</a>
						{if $j.children}
							<div class="pl15px">
								{foreach name=lastlevel item=k from=$j.children}
									<a href="/catalog.php?cat_id={$k.id}" {if $k.id == $current_cat_id} class="sel"{/if} title="{$k.title}">{$k.title}</a>
								{/foreach}
							</div>
						{/if}
					{/foreach}
				</div>
			{/if}
		{/foreach}
	</div>

	<div class="rightColumn">
		{if $selected_item}
			{foreach name=Item from=$selected_item item=i}
				<h3>{$i.catalogue_title}</h3>
				{foreach name=art from=$linked_articles item=art}
					<p class="pl0px">{$art.content|truncate:500}  <a class="more" href="{if ($art.type=='article')}articles{else} {if ($art.type=='news')}news{else}blog{/if}{/if}.php?art_id={$art.id}">Читать далее...</a></p>
				{/foreach}
				<div class="clear"></div>
				
				<div class="orderBlock">
					<span class="topLeft"></span><span class="topRight"></span><span class="bottomLeft"></span><span class="bottomRight"></span>
					<h1 class="title">{$i.title}</h1>
					<div class="orderContent">
						<form method="post" action="/cart.php" onsubmit="return addToCart(this);">
							<div class="orderImg">
								<img src="i/img/{$i.id}.{$i.image}" alt='{$i.title}' width="176px" >
							</div>
							<div class="orderText floatLeft w55">
								<p><b>{$i.title}</b> {if $i.property}({$i.property}){/if}</p>
								<p>{$i.description}</p>
								<p class="price">{$i.price|number_format:2:",":""} <span class="price_new_d">руб.</span>/{$i.min_qtty}{$i.unit}</p>
							</div>
							<div class="clear"></div>
							<div class="info">
								<input type="hidden" name="itemId" value="{$i.id}">
								<p class="price_param">
								{if $i.available}
								<input tabindex="3" type="submit" class="orderSubm floatRight" value="ЗАКАЗАТЬ">
									{if $i.grinding}
										<label>Помол:</label>
										<select name="itemGinding" tabindex="1">
											<option value="bean">зерно</option>
											<option value="coarse">крупный</option>
											<option value="аverage">средний</option>
											<option value="fine">мелкий</option>
										</select>
									{/if}
								
								<label style="padding-left: 30px"> Вес: </label><input name="itemQuantity" tabindex="2" class="orderInp" type="text" value="{$i.min_qtty}"> {$i.unit}


								{else}
									 НЕТ на складе
								{/if}
								</p>
								
								
							</div>
							<div class="clear"></div>
						</form>
					</div>
				</div>
			{/foreach}
		{elseif $subtree}
			{foreach name=art from=$linked_articles item=art}
				<p class="pl0px">{$art.content|truncate:500}  <a class="more" href="{if ($art.type=='article')}articles{else} {if ($art.type=='news')}news{else}blog{/if}{/if}.php?art_id={$art.id}">Читать далее...</a></p>
			{/foreach}
			<div class="clear"></div>
			{foreach name=subtree item=i from=$subtree}
				<h2><a href="/catalog.php?cat_id={$i.id}" title="{$i.title}">{$i.title}</a></h2>
				{if $i.children}
					<div class="sublevel">
						{foreach name=sublevel item=j from=$i.children}
							<a href="/catalog.php?cat_id={$j.id}" title="{$j.title}">{$j.title}</a>
						{/foreach}
					</div>
				{else}
					<br>
				{/if}
			{/foreach}
		{elseif $items}
				{foreach name=art from=$linked_articles item=art}
					<p class="pl0px">{$art.content|truncate:500}  <a class="more" href="{if ($art.type=='article')}articles{else} {if ($art.type=='news')}news{else}blog{/if}{/if}.php?art_id={$art.id}">Читать далее...</a></p>
				{/foreach}
				<div class="clear"></div>	
				{foreach name=goods item=i from=$items}
				{if $smarty.foreach.goods.index == 0}<h3>{$i.catalogue_title}</h3>{/if}

				<div class="orderBlock">
					<span class="topLeft"></span><span class="topRight"></span><span class="bottomLeft"></span><span class="bottomRight"></span>
					<h1 class="title"><a href="/catalog.php?cat_id={$i.catalog_id}&item_id={$i.id}">{$i.title}</a></h1>
					<div class="orderContent">
						<form method="post" action="/cart.php" onsubmit="return addToCart(this);">
							<div class="orderImg">
								<a href="/catalog.php?cat_id={$i.catalog_id}&item_id={$i.id}"><img src="i/img/{$i.id}.{$i.image}" alt='{$i.title}' width="176px"></a>
								{if $i.new}<span class="new"></span>{/if}
							</div>
							<div class="orderText floatRight w55">
								<p><b>{$i.title}</b> {if $i.property}({$i.property}){/if}</p>
								<p>{$i.description}</p>
							</div>
							{if $i.available}
								<table>
									{if $i.grinding}
										<tr>
											<td>Помол: </td>
											<td><select name="itemGrinding" tabindex="1"><option value="bean">зерно</option><option value="coarse">крупный</option><option value="аverage">средний</option><option value="fine">мелкий</option></select></td>
										</tr>
									{/if}
									<tr>
										<td>Вес: </td>
										<td><input name="itemQuantity" tabindex="2" class="orderInp" type="text" value="{$i.min_qtty}"> {$i.unit}</td>
									</tr>
								</table>
							{else}
								Нет на складе.
							{/if}
							<div class="clear"></div>
							<p class="price">
								<input type="hidden" name="itemId" value="{$i.id}">
								{if $i.available}
									<input tabindex="3" type="submit" class="orderSubm floatRight" value="ЗАКАЗАТЬ">
									{if $i.price_discount}
										<span class="lineThrough colorGrey">{$i.price|number_format:2:",":""} <span>руб.</span>/{$i.min_qtty}{$i.unit}</span>  {$i.price_discount|number_format:2:",":""}  <span>руб.</span>/{$i.min_qtty}{$i.unit}
									{else}
										{$i.price|number_format:2:",":""} <span class="price_new_d">руб.</span>/{$i.min_qtty}{$i.unit}
									{/if}
								{else}
									<span class="colorGrey">{$i.price|number_format:2:",":""} <span>руб.</span>/{$i.min_qtty}{$i.unit}</span>  НЕТ на складе
								{/if}
							</p>
						</form>
					</div>
				</div>
			{/foreach}
		{else}
			{include file='popular.tpl'}
		{/if}
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>