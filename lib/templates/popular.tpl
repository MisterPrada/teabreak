{if $PopularItems}
	{if $PopularItems['pop_cof']}
		<div class="floatLeft w47">
			<h1 class="titleCoffee">Популярный кофе</h1>

			<div class="clear"></div>
			{foreach name=items item=item from=$PopularItems['pop_cof']}
				<div class="orderBlock">
					<span class="topLeft"></span><span class="topRight"></span><span class="bottomLeft"></span><span class="bottomRight"></span>
					<h1 class="title"><a href="/catalog.php?cat_id={$item.catalog_id}&amp;item_id={$item.id}">{$item.title|truncate:40}</a></h1>
					<div class="orderContent">
						<form method="post" action="/cart.php" onsubmit="return addToCart(this);">
							<div class="orderImg">
								<a href="/catalog.php?cat_id={$item.catalog_id}&amp;item_id={$item.id}"><img src="/i/img/{$item.id}.{$item.image}" alt='{$item.title}' width="176px" ></a>
								{if $item.new}<span class="new"></span>{/if}
							</div>
							{if $item.available}
								<table>
									{if $item.grinding}
										<tr>
											<td>Помол: </td>
											<td><select name="itemGrinding" tabindex="1"><option value="bean">зерно</option><option value="coarse">крупный</option><option value="аverage">средний</option><option value="fine">мелкий</option></select></td>
										</tr>
									{/if}
									<tr>
										<td>Вес:</td>
										<td><input name="itemQuantity" tabindex="2" class="orderInp" type="text" value="{$item.min_qtty}"> {$item.unit}</td>
									</tr>
								</table>
							{else}
								Нет на складе.
							{/if}
							<div class="clear"></div>
							<p class="price">
								<input type="hidden" name="itemId" value="{$item.id}">
								{if $item.available}
									<input tabindex="3" type="submit" class="orderSubm floatRight" value="ЗАКАЗАТЬ">
									{if $item.price_discount}
										<span class="lineThrough colorGrey">{$item.price|number_format:2:",":""}  <span>руб.</span>/{$item.min_qtty}{$item.unit}</span>  {$item.price_discount|number_format:2:",":""} <span class="price_new_d">руб.</span>/{$item.min_qtty}{$item.unit}
									{else}
										{$item.price|number_format:2:",":""} <span class="price_new_d">руб.</span>/{$item.min_qtty}{$item.unit}
									{/if}
								{else}
									<span class="colorGrey">{$item.price|number_format:2:",":""} <span>руб.</span>/{$item.min_qtty}{$item.unit}</span>  НЕТ на складе
								{/if}
							</p>
						</form>
					</div>
				</div>
			{/foreach}

			<div class="clear"></div>
		</div>
	{/if}
	{if $PopularItems['pop_tea']}
		<div class="floatRight w47">
			<h1 class="titleTea">Популярный чай</h1>

			<div class="clear"></div>
			{foreach name=items item=item from=$PopularItems['pop_tea']}
				<div class="orderBlock">
					<span class="topLeft"></span><span class="topRight"></span><span class="bottomLeft"></span><span class="bottomRight"></span>
					<h1 class="title"><a href="/catalog.php?cat_id={$item.catalog_id}&amp;item_id={$item.id}">{$item.title|truncate:40}</a></h1>
					<div class="orderContent">
						<form method="post" action="/cart.php" onsubmit="return addToCart(this);">
							<div class="orderImg">
								<a href="/catalog.php?cat_id={$item.catalog_id}&amp;item_id={$item.id}"><img src="/i/img/{$item.id}.{$item.image}" alt='{$item.title}' width="176px"></a>
								{if $item.new}<span class="new"></span>{/if}
							</div>
							{if $item.available}
								<table>
									{if $item.grinding}
										<tr>
											<td>Помол: </td>
											<td><select name="itemGrinding" tabindex="1"><option value="bean">зерно</option><option value="coarse">крупный</option><option value="аverage">средний</option><option value="fine">мелкий</option></select></td>
										</tr>
									{/if}
									<tr>
										<td>Вес: </td>
										<td><input name="itemQuantity" tabindex="2" class="orderInp" type="text" value="{$item.min_qtty}"> {$item.unit}</td>
									</tr>
								</table>
							{else}
								Нет на складе.
							{/if}
							<div class="clear"></div>
							<p class="price">
								<input type="hidden" name="itemId" value="{$item.id}">
								{if $item.available}
									<input tabindex="3" type="submit" class="orderSubm floatRight" value="ЗАКАЗАТЬ">
									{if $item.price_discount}
										<span class="lineThrough colorGrey">{$item.price|number_format:2:",":""} <span>руб.</span>/{$item.min_qtty}{$item.unit}</span>  {$item.price_discount|number_format:2:",":""} <span class="price_new_d">руб.</span>/{$item.min_qtty}{$item.unit}
									{else}
										{$item.price|number_format:2:",":""} <span class="price_new_d">руб.</span>/{$item.min_qtty}{$item.unit}
									{/if}
								{else}
									<span class="colorGrey">{$item.price|number_format:2:",":""} <span class="price_new_d">руб.</span>/{$item.min_qtty}{$item.unit}</span>  НЕТ на складе
								{/if}
							</p>
						</form>
					</div>
				</div>
			{/foreach}

			<div class="clear"></div>
		</div>
	{/if}
{/if}
<div class="clear"></div>