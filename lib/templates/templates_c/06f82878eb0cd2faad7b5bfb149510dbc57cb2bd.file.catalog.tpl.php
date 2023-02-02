<?php /* Smarty version Smarty-3.0.7, created on 2017-03-03 19:21:04
         compiled from "/home/teabreak/public_html/lib/templates/catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80457075958b997f0e24669-81506052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f82878eb0cd2faad7b5bfb149510dbc57cb2bd' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/catalog.tpl',
      1 => 1488558042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80457075958b997f0e24669-81506052',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/home/teabreak/public_html/lib/smarty/plugins/modifier.truncate.php';
?><div class="twoColumn">

	<div class="leftMenu">
		<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Tree')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
						<a <?php if ($_smarty_tpl->tpl_vars['j']->value['id']==89||$_smarty_tpl->tpl_vars['j']->value['id']==101){?>style="color: red;"<?php }?> href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['j']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['j']->value['id']==$_smarty_tpl->getVariable('current_cat_id')->value){?> class="sel"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['j']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['j']->value['title'];?>
</a>
						<?php if ($_smarty_tpl->tpl_vars['j']->value['children']){?>
							<div class="pl15px">
								<?php  $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['j']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['k']->key => $_smarty_tpl->tpl_vars['k']->value){
?>
									<a href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['k']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['k']->value['id']==$_smarty_tpl->getVariable('current_cat_id')->value){?> class="sel"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['k']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['k']->value['title'];?>
</a>
								<?php }} ?>
							</div>
						<?php }?>
					<?php }} ?>
				</div>
			<?php }?>
		<?php }} ?>
	</div>

	<div class="rightColumn">
		<?php if ($_smarty_tpl->getVariable('selected_item')->value){?>
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('selected_item')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
				<h3><?php echo $_smarty_tpl->tpl_vars['i']->value['catalogue_title'];?>
</h3>
				<?php  $_smarty_tpl->tpl_vars['art'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('linked_articles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['art']->key => $_smarty_tpl->tpl_vars['art']->value){
?>
					<p class="pl0px"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['art']->value['content'],500);?>
  <a class="more" href="<?php if (($_smarty_tpl->tpl_vars['art']->value['type']=='article')){?>articles<?php }else{ ?> <?php if (($_smarty_tpl->tpl_vars['art']->value['type']=='news')){?>news<?php }else{ ?>blog<?php }?><?php }?>.php?art_id=<?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
">Читать далее...</a></p>
				<?php }} ?>
				<div class="clear"></div>
				
				<div class="orderBlock">
					<span class="topLeft"></span><span class="topRight"></span><span class="bottomLeft"></span><span class="bottomRight"></span>
					<h1 class="title"><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</h1>
					<div class="orderContent">
						<form method="post" action="/cart.php" onsubmit="return addToCart(this);">
							<div class="orderImg">
								<img src="i/img/<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
.<?php echo $_smarty_tpl->tpl_vars['i']->value['image'];?>
" alt='<?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
' width="176px" >
							</div>
							<div class="orderText floatLeft w55">
								<p><b><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</b> <?php if ($_smarty_tpl->tpl_vars['i']->value['property']){?>(<?php echo $_smarty_tpl->tpl_vars['i']->value['property'];?>
)<?php }?></p>
								<p><?php echo $_smarty_tpl->tpl_vars['i']->value['description'];?>
</p>
								<p class="price"><?php echo number_format($_smarty_tpl->tpl_vars['i']->value['price'],2,",",'');?>
 <span class="price_new_d">руб.</span>/<?php echo $_smarty_tpl->tpl_vars['i']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['i']->value['unit'];?>
</p>
							</div>
							<div class="clear"></div>
							<div class="info">
								<input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
">
								<p class="price_param">
								<?php if ($_smarty_tpl->tpl_vars['i']->value['available']){?>
								<input tabindex="3" type="submit" class="orderSubm floatRight" value="ЗАКАЗАТЬ">
									<?php if ($_smarty_tpl->tpl_vars['i']->value['grinding']){?>
										<label>Помол:</label>
										<select name="itemGinding" tabindex="1">
											<option value="bean">зерно</option>
											<option value="coarse">крупный</option>
											<option value="аverage">средний</option>
											<option value="fine">мелкий</option>
										</select>
									<?php }?>
								
								<label style="padding-left: 30px"> Вес: </label><input name="itemQuantity" tabindex="2" class="orderInp" type="text" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['min_qtty'];?>
"> <?php echo $_smarty_tpl->tpl_vars['i']->value['unit'];?>



								<?php }else{ ?>
									 НЕТ на складе
								<?php }?>
								</p>
								
								
							</div>
							<div class="clear"></div>
						</form>
					</div>
				</div>
			<?php }} ?>
		<?php }elseif($_smarty_tpl->getVariable('subtree')->value){?>
			<?php  $_smarty_tpl->tpl_vars['art'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('linked_articles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['art']->key => $_smarty_tpl->tpl_vars['art']->value){
?>
				<p class="pl0px"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['art']->value['content'],500);?>
  <a class="more" href="<?php if (($_smarty_tpl->tpl_vars['art']->value['type']=='article')){?>articles<?php }else{ ?> <?php if (($_smarty_tpl->tpl_vars['art']->value['type']=='news')){?>news<?php }else{ ?>blog<?php }?><?php }?>.php?art_id=<?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
">Читать далее...</a></p>
			<?php }} ?>
			<div class="clear"></div>
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subtree')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
				<h2><a href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</a></h2>
				<?php if ($_smarty_tpl->tpl_vars['i']->value['children']){?>
					<div class="sublevel">
						<?php  $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['i']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['j']->key => $_smarty_tpl->tpl_vars['j']->value){
?>
							<a href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['j']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['j']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['j']->value['title'];?>
</a>
						<?php }} ?>
					</div>
				<?php }else{ ?>
					<br>
				<?php }?>
			<?php }} ?>
		<?php }elseif($_smarty_tpl->getVariable('items')->value){?>
				<?php  $_smarty_tpl->tpl_vars['art'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('linked_articles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['art']->key => $_smarty_tpl->tpl_vars['art']->value){
?>
					<p class="pl0px"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['art']->value['content'],500);?>
  <a class="more" href="<?php if (($_smarty_tpl->tpl_vars['art']->value['type']=='article')){?>articles<?php }else{ ?> <?php if (($_smarty_tpl->tpl_vars['art']->value['type']=='news')){?>news<?php }else{ ?>blog<?php }?><?php }?>.php?art_id=<?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
">Читать далее...</a></p>
				<?php }} ?>
				<div class="clear"></div>	
				<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['goods']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['goods']['index']++;
?>
				<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['goods']['index']==0){?><h3><?php echo $_smarty_tpl->tpl_vars['i']->value['catalogue_title'];?>
</h3><?php }?>

				<div class="orderBlock">
					<span class="topLeft"></span><span class="topRight"></span><span class="bottomLeft"></span><span class="bottomRight"></span>
					<h1 class="title"><a href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['i']->value['catalog_id'];?>
&item_id=<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</a></h1>
					<div class="orderContent">
						<form method="post" action="/cart.php" onsubmit="return addToCart(this);">
							<div class="orderImg">
								<a href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['i']->value['catalog_id'];?>
&item_id=<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
"><img src="i/img/<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
.<?php echo $_smarty_tpl->tpl_vars['i']->value['image'];?>
" alt='<?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
' width="176px"></a>
								<?php if ($_smarty_tpl->tpl_vars['i']->value['new']){?><span class="new"></span><?php }?>
							</div>
							<div class="orderText floatRight w55">
								<p><b><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</b> <?php if ($_smarty_tpl->tpl_vars['i']->value['property']){?>(<?php echo $_smarty_tpl->tpl_vars['i']->value['property'];?>
)<?php }?></p>
								<p><?php echo $_smarty_tpl->tpl_vars['i']->value['description'];?>
</p>
							</div>
							<?php if ($_smarty_tpl->tpl_vars['i']->value['available']){?>
								<table>
									<?php if ($_smarty_tpl->tpl_vars['i']->value['grinding']){?>
										<tr>
											<td>Помол: </td>
											<td><select name="itemGrinding" tabindex="1"><option value="bean">зерно</option><option value="coarse">крупный</option><option value="аverage">средний</option><option value="fine">мелкий</option></select></td>
										</tr>
									<?php }?>
									<tr>
										<td>Вес: </td>
										<td><input name="itemQuantity" tabindex="2" class="orderInp" type="text" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['min_qtty'];?>
"> <?php echo $_smarty_tpl->tpl_vars['i']->value['unit'];?>
</td>
									</tr>
								</table>
							<?php }else{ ?>
								Нет на складе.
							<?php }?>
							<div class="clear"></div>
							<p class="price">
								<input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
">
								<?php if ($_smarty_tpl->tpl_vars['i']->value['available']){?>
									<input tabindex="3" type="submit" class="orderSubm floatRight" value="ЗАКАЗАТЬ">
									<?php if ($_smarty_tpl->tpl_vars['i']->value['price_discount']){?>
										<span class="lineThrough colorGrey"><?php echo number_format($_smarty_tpl->tpl_vars['i']->value['price'],2,",",'');?>
 <span>руб.</span>/<?php echo $_smarty_tpl->tpl_vars['i']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['i']->value['unit'];?>
</span>  <?php echo number_format($_smarty_tpl->tpl_vars['i']->value['price_discount'],2,",",'');?>
  <span>руб.</span>/<?php echo $_smarty_tpl->tpl_vars['i']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['i']->value['unit'];?>

									<?php }else{ ?>
										<?php echo number_format($_smarty_tpl->tpl_vars['i']->value['price'],2,",",'');?>
 <span class="price_new_d">руб.</span>/<?php echo $_smarty_tpl->tpl_vars['i']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['i']->value['unit'];?>

									<?php }?>
								<?php }else{ ?>
									<span class="colorGrey"><?php echo number_format($_smarty_tpl->tpl_vars['i']->value['price'],2,",",'');?>
 <span>руб.</span>/<?php echo $_smarty_tpl->tpl_vars['i']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['i']->value['unit'];?>
</span>  НЕТ на складе
								<?php }?>
							</p>
						</form>
					</div>
				</div>
			<?php }} ?>
		<?php }else{ ?>
			<?php $_template = new Smarty_Internal_Template('popular.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		<?php }?>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>