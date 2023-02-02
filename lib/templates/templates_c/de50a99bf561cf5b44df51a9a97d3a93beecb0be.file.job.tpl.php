<?php /* Smarty version Smarty-3.0.7, created on 2011-06-17 14:04:12
         compiled from "/home/teabreak/public_html/lib/templates/admin/job.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12608071164dfb34ac02ba37-63607959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de50a99bf561cf5b44df51a9a97d3a93beecb0be' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/job.tpl',
      1 => 1307266052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12608071164dfb34ac02ba37-63607959',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	<div class="rightColumn only" align="center">
		<div  style="width:50%" align="left">
		<?php if ($_smarty_tpl->getVariable('ID')->value==0){?>
			<h1>Добавить вакансию</h1>
		<?php }else{ ?>
			 <h1>Редактирование вакансии</h1>
		<?php }?>
		<BR />

		<input type="image" src="/i/buttonBack.png" width="95" height="31" alt="Back" onclick="window.location='/admin/jobs.php'" />
		<form action="/admin/job.php?op=save&amp;id=<?php echo $_smarty_tpl->getVariable('ID')->value;?>
" method="post" >
			<table class="itemTable">
				<tr>
					<th>Вакансия<span class="red">*</span></th>
					<td><input name="title" id="title" type="text" value='<?php echo $_smarty_tpl->getVariable('TITLE')->value;?>
' /></td>
				</tr>
				<tr>
					<th>Требования<span class="red">*</span></th>
					<td><textarea name="requests" id="requests" ><?php echo $_smarty_tpl->getVariable('REQUESTS')->value;?>
</textarea></td>
				</tr>
				<tr>
					<th>Обязанности,&nbsp;зарплата<span class="red">*</span></th>
					<td><textarea name="description" id="description" ><?php echo $_smarty_tpl->getVariable('DESCRIPTION')->value;?>
</textarea></td>
				</tr>
				<tr>
					<th>Вакансия&nbsp;закрыта</th>
					<td><input name="closed" id="closed" type="checkbox" <?php if ($_smarty_tpl->getVariable('CLOSED')->value==1){?> checked="checked"<?php }?>/></td>
				</tr>
				<tr>
					<th>Дата</th>
					<td><input class="date date_toggled" type="text" style="display: inline; width:100px;" id="date" name="date" value="<?php echo $_smarty_tpl->getVariable('DATE')->value;?>
"/><img class="date_toggler" style="position: relative; top: 3px; margin-left: 4px; cursor: pointer;" src="/i/calendar.gif"/></td>
				</tr>
			</table>
			<input type="image" src="/i/buttonSave.png" width="95" height="31" alt="Save" onclick="submit();'" />
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
