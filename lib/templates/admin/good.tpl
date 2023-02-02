<div class="twoColumn wide">
	<div class="leftMenu wide">
		{$TREE}
	</div>
	<div class="rightColumn thin">
		<h1>{$CATALOGUE_ITEM}</h1>
		<input type="image" src="/i/buttonBack.png" width="95" height="31" alt="Back" onclick="window.location='/admin/catalogue.php?id={$PID}'" /><br /><br />
		<form action="/admin/good.php?op=save&amp;id={$ID}" method="post" enctype="multipart/form-data" >
			<table class="itemTable">
				{if $ERROR!=''}
				<tr>
					<th colspan="3"><span class='red'>{$ERROR}</span></th>
				</tr>
				{/if}
				<tr>
					<th>Наименование</th>
					<td colspan="2"><input name="title" id="title" type="text" value='{$TITLE}' /></td>
				</tr>
				<tr>
					<th>Характеристика</th>
					<td  colspan="2"><input id='property' name='property'  type="text" value="{$PROPERTY}"></td>
				</tr>
				<tr>
					<th>Описание</th>
					<td colspan="2"><textarea name="description" id="description" >{$DESCRIPTION}</textarea></td>
				</tr>
				<tr>
					<th>Количество</th>
					<td><input name="min_count" id="min_count" type="text" value="{$MIN_COUNT}" class="half" />
							<select id='unit' name='unit'  class="auto">
								<option value="гр." {if $UNIT =='гр.'} selected="selected" {/if}>гр.</option>
								<option value="кг" {if $UNIT =='кг'} selected="selected" {/if}>кг</option>
								<option value="уп." {if $UNIT =='уп.'} selected="selected" {/if}>уп.</option>
								<option value="шт." {if $UNIT =='шт.'} selected="selected" {/if}>шт.</option>
							</select></td>
					<td rowspan="6">{if $IMAGE!=''}<img src="/i/img/{$ID}.{$IMAGE}" width="200" alt="товар" /><br /><input type="image" src="/i/buttonDeleteImage.png" width="200px" height="31px" class="auto" style="border:none;" onclick="document.forms[0].action=action='/admin/good.php?op=del_img&amp;id={$ID}'; submit();" />{else}<img src="/i/no_photo.jpg" width="200" height="150" alt="нет фотографии" />{/if}</td>
				</tr>
				<tr>
					<th>Цена</th>
					<td><input name="price" id="price" type="text" value='{$PRICE}' class="half" /></td>
				</tr>
				<tr>
					<th>Скидка</th>
					<td><input name="discount" id="discount" type="text" value="{$DISCOUNT}" class="half" /></td>
				</tr>
				<tr>
					<th>Разместить на главной</th>
					<td><input type="radio" id='advertise'  name="advertise" value="1" class="auto" {if $ADVERTISE}checked="checked"{/if} /> Да&nbsp; <input type="radio" id="advertise" value="0" name="advertise"  class="auto" {if !$ADVERTISE}checked="checked"{/if}  /> Нет
					</td>
				</tr>
				<tr>
					<th>Помол</th>
					<td><input type="radio"  name="grinding" value="1" class="auto" {if $GRINDING}checked="checked"{/if} /> Да&nbsp; <input type="radio"  value="0" name="grinding"  class="auto" {if !$GRINDING}checked="checked"{/if}  /> Нет
					</td>
				</tr>
				<tr>
					<th>Наличие на складе</th>
					<td><input type="radio" id='available'  name="available" value="1"  class="auto" {if $AVAILABLE}checked="checked"{/if}  /> Да&nbsp; <input type="radio" id="available" value="0" name="available" class="auto" {if !$AVAILABLE}checked="checked"{/if} /> Нет
					</td>
				</tr>
				<tr>
					<th>Новый товар</th>
					<td><input type="radio" id='new_good'  name="new_good" value="1"  class="auto" {if $NEW_GOOD}checked="checked"{/if}  /> Да&nbsp; <input type="radio" id="new_good" value="0" name="new_good"  class="auto"  {if !$NEW_GOOD}checked="checked"{/if} /> Нет
					</td>
				</tr>
				<tr>
					<th>Фото</th>
					<td colspan="2">
						<input  id='userfile'  name="userfile" type="file" />
						<br>(Размер файла не должен превышать 1Мб, размер фото - не более 1200х1200 )
					</td>
				</tr>
				<tr>
					<th>Показать товар</th>
					<td colspan="2"><input name="hidden" id="hidden" type="checkbox" class="auto" {if !$HIDDEN} checked="checked"{/if} value="on" /></td>
				</tr>
			</table>
			<input type="hidden" name="sort" id="sort" value="{$SORT}" />
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