<h1>Важная информация в красном блоке</h1>
<br>


		<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>

	<fieldset class="rednews">
	<legend>Красный новостной блок</legend>
		<form id="rednews" action="/admin/rednews.php" method="post" name="rednews">
			<textarea name="content">{$RedNews}</textarea>
			<input type="submit" class="but_red_news" name="" value="Сохранить">
		</form>
	</fieldset>

	{literal}
	 <script type="text/javascript">
	  //Инициализация редактора
	  	tinymce.init({ 
	    selector:'textarea',
	    language:"ru",
	    plugins : 'autoresize',
	    width: '100%',
	    height: 400 });
  	</script>
  	{/literal}

