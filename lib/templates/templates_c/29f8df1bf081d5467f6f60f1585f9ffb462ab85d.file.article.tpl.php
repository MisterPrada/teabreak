<?php /* Smarty version Smarty-3.0.7, created on 2012-08-30 09:12:52
         compiled from "/home/teabreak/public_html/lib/templates/admin/article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1466532206503f0464dad5b6-97160040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29f8df1bf081d5467f6f60f1585f9ffb462ab85d' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/article.tpl',
      1 => 1346306873,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1466532206503f0464dad5b6-97160040',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	<div class="rightColumn only" align="center">
		<div  style="width:80%" align="left">
		<?php if ($_smarty_tpl->getVariable('ID')->value==0){?>
			<h1>Новая статья</h1>
		<?php }else{ ?>
			 <h1>Редактирование статьи</h1>
		<?php }?>
		<BR />
		<input type="image" src="/i/buttonBack.png" width="95" height="31" alt="Back" onclick="window.location='/admin/articles.php'" />
		<form action="/admin/article.php?op=save&amp;id=<?php echo $_smarty_tpl->getVariable('ID')->value;?>
" method="post" >
			<table class="itemTable">
				<tr>
					<th>Заголовок<span class="red">*</span></th>
					<td><input name="title" id="title" type="text" value='<?php echo $_smarty_tpl->getVariable('TITLE')->value;?>
' /></td>
				</tr>
				<tr>
					<th>Краткое описание<span class="red">*</span></th>
					<td><textarea name="short_descr" id="short_descr"><?php echo $_smarty_tpl->getVariable('SHORT_DESCR')->value;?>
</textarea></td>
				</tr>
				<tr>
					<th>Текст<span class="red">*</span></th>
					<td><textarea name="text" id="text" ><?php echo $_smarty_tpl->getVariable('TEXT')->value;?>
</textarea></td>
				</tr>
				<tr>
					<th>URL</th>
					<td><input name="url" id="url" type="text" value='<?php echo $_smarty_tpl->getVariable('URL')->value;?>
'/></td>
				</tr>
				<tr>
					<th>Дата</th>
					<td><input class="date date_toggled" type="text" style="display: inline; width:100px;" id="date" name="date" value="<?php echo $_smarty_tpl->getVariable('DATE2')->value;?>
"/><img class="date_toggler" style="position: relative; top: 3px; margin-left: 4px; cursor: pointer;" src="/i/calendar.gif"/></td>
				</tr>
				<tr>
					<th>Категории:</th>
					<td><textarea id="categories" name="categories" onclick="showPanel(true);" class='height_half'><?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('RELATED_CATEGORIES')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
,<?php }} ?>
							</textarea></td>
				</tr>
			</table>
			<input type="image" src="/i/buttonSave.png" width="95" height="31" alt="Save" onclick="submit();'" />
			<!-- POPUP WINDOW FOR LINK CATEGORIES -->
			<div id="overlay" class="overlay"></div>
			<div id="lightbox" class="leightbox">
				<table class="areas_table">
					<tr>
						<td class="lt">&nbsp;</td>
						<td class="b_top bw"></td>
						<td class="rt">&nbsp;</td>
					</tr>
					<tr>
						<td class="b_left bw"></td>
						<td class="main_td bw">
								<div align="center"><h3>Категории</h3></div>
								<div class='div_hr'></div>
								<div id="areas" align="justify">
									<?php echo $_smarty_tpl->getVariable('LINKS')->value;?>

								</div>
								<div class='div_hr'></div>
								<div id="buttons" align="center">
									<input type="button" value="Отменить" onClick="restoreSelectedCategories(); showPanel(false); ">&nbsp;&nbsp;<input type="button" value="Применить" onClick="saveSelectedCategories('categories');showPanel(false);">
								</div>
						</td>
						<td class="b_right bw"></td>
					</tr>
					<tr>
						<td class="lb">&nbsp;</td>
						<td class="b_bottom bw"></td>
						<td class="rb">&nbsp;</td>
					</tr>
				</table>
			</div>
				<!-- END POPUP WINDOW FOR LINK CATEGORIES -->

		</form>
		</div>
	</div>


<script>
window.addEvent('load', function() {
	new DatePicker('.date_toggled', {
		allowEmpty: true,
		toggleElements: '.date_toggler'
	});
});

</script>

<script type="text/javascript" src="/js/tiny_mce/plugins/upload/upload_init.php"></script>
<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
<!--script type="text/javascript" src="tiny_mce_init.js"></script-->
<script type="text/javascript">

tinyMCE.init({
	// General options
	language : 'ru',
	//mode : "textareas",
	mode: "exact",
	theme : "advanced",
	elements: "text",
	plugins : "safari,table,inlinepopups,preview,contextmenu,paste,fullscreen",
	editor_selector : "tiny",

	file_browser_callback : "upload",

	// Theme options
	theme_advanced_buttons1 : "pasteword,|,bold,italic,underline,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,|,preview,cleanup,fullscreen,|,hr,removeformat,|,undo,redo,|,image",
	theme_advanced_buttons2 : "",
	theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_text_colors : "F00,0F0,00F,3f3f3f",
	theme_advanced_default_foreground_color :"3f3f3f",
	theme_advanced_resizing : true,
	//relative_urls : false,
	//remove_script_host : true,
	width : "90%",
	height : "100%"
});

</script>

