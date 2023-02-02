<?php /* Smarty version Smarty-3.0.7, created on 2011-07-11 15:12:26
         compiled from "/home/teabreak/public_html/lib/templates/admin/good.tpl" */ ?>
<?php /*%%SmartyHeaderCode:882733814e1ae8aad5a818-09735364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '973ec7d57a2e13e8274a860961752ae8c45f9b78' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/good.tpl',
      1 => 1310117987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '882733814e1ae8aad5a818-09735364',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="twoColumn wide">
	<div class="leftMenu wide">
		<?php echo $_smarty_tpl->getVariable('TREE')->value;?>

	</div>
	<div class="rightColumn thin">
		<h1><?php echo $_smarty_tpl->getVariable('CATALOGUE_ITEM')->value;?>
</h1>
		<input type="image" src="/i/buttonBack.png" width="95" height="31" alt="Back" onclick="window.location='/admin/catalogue.php?id=<?php echo $_smarty_tpl->getVariable('PID')->value;?>
'" /><br /><br />
		<form action="/admin/good.php?op=save&amp;id=<?php echo $_smarty_tpl->getVariable('ID')->value;?>
" method="post" enctype="multipart/form-data" >
			<table class="itemTable">
				<?php if ($_smarty_tpl->getVariable('ERROR')->value!=''){?>
				<tr>
					<th colspan="3"><span class='red'><?php echo $_smarty_tpl->getVariable('ERROR')->value;?>
</span></th>
				</tr>
				<?php }?>
				<tr>
					<th>Наименование</th>
					<td colspan="2"><input name="title" id="title" type="text" value='<?php echo $_smarty_tpl->getVariable('TITLE')->value;?>
' /></td>
				</tr>
				<tr>
					<th>Характеристика</th>
					<td  colspan="2"><input id='property' name='property'  type="text" value="<?php echo $_smarty_tpl->getVariable('PROPERTY')->value;?>
"></td>
				</tr>
				<tr>
					<th>Описание</th>
					<td colspan="2"><textarea name="description" id="description" ><?php echo $_smarty_tpl->getVariable('DESCRIPTION')->value;?>
</textarea></td>
				</tr>
				<tr>
					<th>Количество</th>
					<td><input name="min_count" id="min_count" type="text" value="<?php echo $_smarty_tpl->getVariable('MIN_COUNT')->value;?>
" class="half" />
							<select id='unit' name='unit'  class="auto">
								<option value="гр." <?php if ($_smarty_tpl->getVariable('UNIT')->value=='гр.'){?> selected="selected" <?php }?>>гр.</option>
								<option value="кг" <?php if ($_smarty_tpl->getVariable('UNIT')->value=='кг'){?> selected="selected" <?php }?>>кг</option>
								<option value="уп." <?php if ($_smarty_tpl->getVariable('UNIT')->value=='уп.'){?> selected="selected" <?php }?>>уп.</option>
								<option value="шт." <?php if ($_smarty_tpl->getVariable('UNIT')->value=='шт.'){?> selected="selected" <?php }?>>шт.</option>
							</select></td>
					<td rowspan="6"><?php if ($_smarty_tpl->getVariable('IMAGE')->value!=''){?><img src="/i/img/<?php echo $_smarty_tpl->getVariable('ID')->value;?>
.<?php echo $_smarty_tpl->getVariable('IMAGE')->value;?>
" width="200" alt="товар" /><br /><input type="image" src="/i/buttonDeleteImage.png" width="200px" height="31px" class="auto" style="border:none;" onclick="document.forms[0].action=action='/admin/good.php?op=del_img&amp;id=<?php echo $_smarty_tpl->getVariable('ID')->value;?>
'; submit();" /><?php }else{ ?><img src="/i/no_photo.jpg" width="200" height="150" alt="нет фотографии" /><?php }?></td>
				</tr>
				<tr>
					<th>Цена</th>
					<td><input name="price" id="price" type="text" value='<?php echo $_smarty_tpl->getVariable('PRICE')->value;?>
' class="half" /></td>
				</tr>
				<tr>
					<th>Скидка</th>
					<td><input name="discount" id="discount" type="text" value="<?php echo $_smarty_tpl->getVariable('DISCOUNT')->value;?>
" class="half" /></td>
				</tr>
				<tr>
					<th>Разместить на главной</th>
					<td><input type="radio" id='advertise'  name="advertise" value="1" class="auto" <?php if ($_smarty_tpl->getVariable('ADVERTISE')->value){?>checked="checked"<?php }?> /> Да&nbsp; <input type="radio" id="advertise" value="0" name="advertise"  class="auto" <?php if (!$_smarty_tpl->getVariable('ADVERTISE')->value){?>checked="checked"<?php }?>  /> Нет
					</td>
				</tr>
				<tr>
					<th>Помол</th>
					<td><input type="radio"  name="grinding" value="1" class="auto" <?php if ($_smarty_tpl->getVariable('GRINDING')->value){?>checked="checked"<?php }?> /> Да&nbsp; <input type="radio"  value="0" name="grinding"  class="auto" <?php if (!$_smarty_tpl->getVariable('GRINDING')->value){?>checked="checked"<?php }?>  /> Нет
					</td>
				</tr>
				<tr>
					<th>Наличие на складе</th>
					<td><input type="radio" id='available'  name="available" value="1"  class="auto" <?php if ($_smarty_tpl->getVariable('AVAILABLE')->value){?>checked="checked"<?php }?>  /> Да&nbsp; <input type="radio" id="available" value="0" name="available" class="auto" <?php if (!$_smarty_tpl->getVariable('AVAILABLE')->value){?>checked="checked"<?php }?> /> Нет
					</td>
				</tr>
				<tr>
					<th>Новый товар</th>
					<td><input type="radio" id='new_good'  name="new_good" value="1"  class="auto" <?php if ($_smarty_tpl->getVariable('NEW_GOOD')->value){?>checked="checked"<?php }?>  /> Да&nbsp; <input type="radio" id="new_good" value="0" name="new_good"  class="auto"  <?php if (!$_smarty_tpl->getVariable('NEW_GOOD')->value){?>checked="checked"<?php }?> /> Нет
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
					<td colspan="2"><input name="hidden" id="hidden" type="checkbox" class="auto" <?php if (!$_smarty_tpl->getVariable('HIDDEN')->value){?> checked="checked"<?php }?> value="on" /></td>
				</tr>
			</table>
			<input type="hidden" name="sort" id="sort" value="<?php echo $_smarty_tpl->getVariable('SORT')->value;?>
" />
			<input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->getVariable('PID')->value;?>
" />
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