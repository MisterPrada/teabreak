<?php /* Smarty version Smarty-3.0.7, created on 2020-10-28 18:57:24
         compiled from "C:\MisterPrada\OSPanel\domains\teabreak/lib/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48505f9994e426ce46-00103068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e77e8946523f2cd81fbc752184c18ac84c7a71a' => 
    array (
      0 => 'C:\\MisterPrada\\OSPanel\\domains\\teabreak/lib/templates/index.tpl',
      1 => 1603900128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48505f9994e426ce46-00103068',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="twoColumn">
	<div class="leftMenu">
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('leftMenuTree')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
				<a <?php if ($_smarty_tpl->tpl_vars['i']->value['title']=="акции и скидки"){?>style="color:red"<?php }?> class="level1" href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</a>
				<?php if ($_smarty_tpl->tpl_vars['i']->value['children']){?>
					<div class="level2">
						<?php  $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['i']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['j']->key => $_smarty_tpl->tpl_vars['j']->value){
?>
							<a href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['j']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['j']->value['id']==$_smarty_tpl->getVariable('current_cat_id')->value){?> class="sel"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['j']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['j']->value['title'];?>
</a>
						<?php }} ?>
					</div>
				<?php }?>
			<?php }} ?>
	</div>
	<div class="rightColumn">
		<?php if ($_smarty_tpl->getVariable('RedNews')->value){?>
		<div id="label_red_news">
			<?php echo $_smarty_tpl->getVariable('RedNews')->value;?>

		</div>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('introduction')->value){?>
		<div class='introduction'>
			<h1><?php echo $_smarty_tpl->getVariable('introduction_title')->value;?>
</h1>
			<p><?php echo $_smarty_tpl->getVariable('introduction')->value;?>
</p>
		</div>
		<?php }?>
		<br />
		<div class="floatLeft w45">
			<h1><a href="/news.php" title="Новости">Новости</a></h1>
			<?php if ($_smarty_tpl->getVariable('NewsArticle')->value){?>
				<h2><a href="/news.php?art_id=<?php echo $_smarty_tpl->getVariable('NewsArticle')->value['id'];?>
" title="<?php echo $_smarty_tpl->getVariable('NewsArticle')->value['title'];?>
"><?php echo $_smarty_tpl->getVariable('NewsArticle')->value['title'];?>
</a></h2>
				<p class="time"><?php echo $_smarty_tpl->getVariable('NewsArticle')->value['date'];?>
</p>
				<p>
					<span id="newsArticle"><?php echo $_smarty_tpl->getVariable('NewsArticle')->value['short_descr'];?>
</span>
					<a class="more" href="/news.php" title="еще новости">еще новости</a>
				</p>
			<?php }?>
		</div>
		
		<div class="floatRight w45">
			<h1><a href="/blog.php" title="Вопросы и ответы">Вопросы и ответы</a></h1>
			<?php if ($_smarty_tpl->getVariable('BlogArticle')->value){?>
				<h2><a href="/blog.php?art_id=<?php echo $_smarty_tpl->getVariable('BlogArticle')->value['id'];?>
" title="<?php echo $_smarty_tpl->getVariable('BlogArticle')->value['title'];?>
"><?php echo $_smarty_tpl->getVariable('BlogArticle')->value['title'];?>
</a></h2>
				<p class="time"><?php echo $_smarty_tpl->getVariable('BlogArticle')->value['date'];?>
</p>
				<p>
					<span id="blogArticle"><?php echo $_smarty_tpl->getVariable('BlogArticle')->value['short_descr'];?>
</span>
					<a class="more" href="/blog.php" title="еще">еще</a>
				</p>
			<?php }?>
		</div>
		
		<script type="text/javascript">
			cutText('newsArticle', '40');
			cutText('blogArticle', '40');
		</script>

		<div class="clear"></div>
		
		<?php $_template = new Smarty_Internal_Template('popular.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

	
		<h1><a href="/articles.php" title="Статьи">Статьи</a></h1>
		<?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Articles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value){
?>
			<h2><a href="/articles.php?art_id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></h2>
			<p class="time"><?php echo $_smarty_tpl->tpl_vars['article']->value['date'];?>
</p>
			<div><?php echo $_smarty_tpl->tpl_vars['article']->value['short_descr'];?>
</div>
		<?php }} ?>
		
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
		<a href=<?php if (file_exists('price/price_list.xlsx')){?>"price/price_list.xlsx"<?php }else{ ?>"#"<?php }?>><img  width="200" src="i/list1.png"></img></a>
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
