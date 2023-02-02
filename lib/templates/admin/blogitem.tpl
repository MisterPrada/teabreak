	<div class="rightColumn only" align="center">
		<div  style="width:80%" align="left">
		{if $ID==0}
			<h1>Новая запись</h1>
		{else}
			 <h1>Редактирование записи</h1>
		{/if}
		<br />
		<input type="image" src="/i/buttonBack.png" width="95" height="31" alt="Back" onclick="window.location='/admin/blog.php'" />
		<form action="/admin/blogitem.php?op=save&amp;id={$ID}" method="post" >
			<table class="itemTable">
				<tr>
					<th>Заголовок<span class="red">*</span></th>
					<td><input name="title" id="title" type="text" value='{$TITLE}' /></td>
				</tr>
				<tr>
					<th>Текст<span class="red">*</span></th>
					<td><textarea name="text" id="text" >{$TEXT}</textarea></td>
				</tr>
				<tr>
					<th>URL</th>
					<td><input name="url" id="url" type="text" value='{$URL}'/></td>
				</tr>
				<tr>
					<th>Дата</th>
					<td><input class="date date_toggled" type="text" style="display: inline; width:100px;" id="date" name="date" value="{$DATE2}"/><img class="date_toggler" style="position: relative; top: 3px; margin-left: 4px; cursor: pointer;" src="/i/calendar.gif"/></td>
				</tr>
				<tr>
					<th>Категории:</th>
					<td><textarea id="categories" name="categories" onclick="showPanel(true);" class='height_half'>{foreach name = cat item = i from = $RELATED_CATEGORIES}{$i},{/foreach}
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
									{$LINKS}
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

{literal}
<script>
window.addEvent('load', function() {
	new DatePicker('.date_toggled', {
		allowEmpty: true,
		toggleElements: '.date_toggler'
	});
});

</script>
{/literal}

{literal}
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
	theme_advanced_resizing : true,
	theme_advanced_text_colors : "F00,0F0,00F,3f3f3f",
	theme_advanced_default_foreground_color :"3f3f3f",
	//relative_urls : false,
	//remove_script_host : true,
	width : "90%",
	height : "100%"
});

</script>
{/literal}
