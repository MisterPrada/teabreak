<?php /* Smarty version Smarty-3.0.7, created on 2017-01-04 23:56:00
         compiled from "/home/teabreak/public_html/lib/templates/admin/rednews.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2086413677586d61607595a7-87890613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9bf6730f6e14fc21464f04fd51aedd5b431c3bb' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/rednews.tpl',
      1 => 1483563269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2086413677586d61607595a7-87890613',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Важная информация в красном блоке</h1>
<br>


		<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>

	<fieldset class="rednews">
	<legend>Красный новостной блок</legend>
		<form id="rednews" action="/admin/rednews.php" method="post" name="rednews">
			<textarea name="content"><?php echo $_smarty_tpl->getVariable('RedNews')->value;?>
</textarea>
			<input type="submit" class="but_red_news" name="" value="Сохранить">
		</form>
	</fieldset>

	
	 <script type="text/javascript">
	  //Инициализация редактора
	  	tinymce.init({ 
	    selector:'textarea',
	    language:"ru",
	    plugins : 'autoresize',
	    width: '100%',
	    height: 400 });
  	</script>
  	

