<?php /* Smarty version Smarty-3.0.7, created on 2020-10-28 18:57:24
         compiled from "C:\MisterPrada\OSPanel\domains\teabreak/lib/templates/popular.tpl" */ ?>
<?php /*%%SmartyHeaderCode:320675f9994e437b8b0-41082435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a933904db3279602884b23bf11390d09a637d000' => 
    array (
      0 => 'C:\\MisterPrada\\OSPanel\\domains\\teabreak/lib/templates/popular.tpl',
      1 => 1603900128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '320675f9994e437b8b0-41082435',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'C:\MisterPrada\OSPanel\domains\teabreak\lib\smarty\plugins\modifier.truncate.php';
?><?php if ($_smarty_tpl->getVariable('PopularItems')->value){?>
	<?php if ($_smarty_tpl->getVariable('PopularItems')->value['pop_cof']){?>
		<div class="floatLeft w47">
			<h1 class="titleCoffee">Популярный кофе</h1>

			<div class="clear"></div>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('PopularItems')->value['pop_cof']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
				<div class="orderBlock">
					<span class="topLeft"></span><span class="topRight"></span><span class="bottomLeft"></span><span class="bottomRight"></span>
					<h1 class="title"><a href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['catalog_id'];?>
&amp;item_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['title'],40);?>
</a></h1>
					<div class="orderContent">
						<form method="post" action="/cart.php" onsubmit="return addToCart(this);">
							<div class="orderImg">
								<a href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['catalog_id'];?>
&amp;item_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><img src="/i/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
.<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt='<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
' width="176px" ></a>
								<?php if ($_smarty_tpl->tpl_vars['item']->value['new']){?><span class="new"></span><?php }?>
							</div>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['available']){?>
								<table>
									<?php if ($_smarty_tpl->tpl_vars['item']->value['grinding']){?>
										<tr>
											<td>Помол: </td>
											<td><select name="itemGrinding" tabindex="1"><option value="bean">зерно</option><option value="coarse">крупный</option><option value="аverage">средний</option><option value="fine">мелкий</option></select></td>
										</tr>
									<?php }?>
									<tr>
										<td>Вес:</td>
										<td><input name="itemQuantity" tabindex="2" class="orderInp" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['min_qtty'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>
</td>
									</tr>
								</table>
							<?php }else{ ?>
								Нет на складе.
							<?php }?>
							<div class="clear"></div>
							<p class="price">
								<input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
								<?php if ($_smarty_tpl->tpl_vars['item']->value['available']){?>
									<input tabindex="3" type="submit" class="orderSubm floatRight" value="ЗАКАЗАТЬ">
									<?php if ($_smarty_tpl->tpl_vars['item']->value['price_discount']){?>
										<span class="lineThrough colorGrey"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],2,",",'');?>
  <span>руб.</span>/<?php echo $_smarty_tpl->tpl_vars['item']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>
</span>  <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price_discount'],2,",",'');?>
 <span class="price_new_d">руб.</span>/<?php echo $_smarty_tpl->tpl_vars['item']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>

									<?php }else{ ?>
										<?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],2,",",'');?>
 <span class="price_new_d">руб.</span>/<?php echo $_smarty_tpl->tpl_vars['item']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>

									<?php }?>
								<?php }else{ ?>
									<span class="colorGrey"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],2,",",'');?>
 <span>руб.</span>/<?php echo $_smarty_tpl->tpl_vars['item']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>
</span>  НЕТ на складе
								<?php }?>
							</p>
						</form>
					</div>
				</div>
			<?php }} ?>

			<div class="clear"></div>
		</div>
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('PopularItems')->value['pop_tea']){?>
		<div class="floatRight w47">
			<h1 class="titleTea">Популярный чай</h1>

			<div class="clear"></div>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('PopularItems')->value['pop_tea']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
				<div class="orderBlock">
					<span class="topLeft"></span><span class="topRight"></span><span class="bottomLeft"></span><span class="bottomRight"></span>
					<h1 class="title"><a href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['catalog_id'];?>
&amp;item_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['title'],40);?>
</a></h1>
					<div class="orderContent">
						<form method="post" action="/cart.php" onsubmit="return addToCart(this);">
							<div class="orderImg">
								<a href="/catalog.php?cat_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['catalog_id'];?>
&amp;item_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><img src="/i/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
.<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt='<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
' width="176px"></a>
								<?php if ($_smarty_tpl->tpl_vars['item']->value['new']){?><span class="new"></span><?php }?>
							</div>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['available']){?>
								<table>
									<?php if ($_smarty_tpl->tpl_vars['item']->value['grinding']){?>
										<tr>
											<td>Помол: </td>
											<td><select name="itemGrinding" tabindex="1"><option value="bean">зерно</option><option value="coarse">крупный</option><option value="аverage">средний</option><option value="fine">мелкий</option></select></td>
										</tr>
									<?php }?>
									<tr>
										<td>Вес: </td>
										<td><input name="itemQuantity" tabindex="2" class="orderInp" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['min_qtty'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>
</td>
									</tr>
								</table>
							<?php }else{ ?>
								Нет на складе.
							<?php }?>
							<div class="clear"></div>
							<p class="price">
								<input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
								<?php if ($_smarty_tpl->tpl_vars['item']->value['available']){?>
									<input tabindex="3" type="submit" class="orderSubm floatRight" value="ЗАКАЗАТЬ">
									<?php if ($_smarty_tpl->tpl_vars['item']->value['price_discount']){?>
										<span class="lineThrough colorGrey"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],2,",",'');?>
 <span>руб.</span>/<?php echo $_smarty_tpl->tpl_vars['item']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>
</span>  <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price_discount'],2,",",'');?>
 <span class="price_new_d">руб.</span>/<?php echo $_smarty_tpl->tpl_vars['item']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>

									<?php }else{ ?>
										<?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],2,",",'');?>
 <span class="price_new_d">руб.</span>/<?php echo $_smarty_tpl->tpl_vars['item']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>

									<?php }?>
								<?php }else{ ?>
									<span class="colorGrey"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],2,",",'');?>
 <span class="price_new_d">руб.</span>/<?php echo $_smarty_tpl->tpl_vars['item']->value['min_qtty'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>
</span>  НЕТ на складе
								<?php }?>
							</p>
						</form>
					</div>
				</div>
			<?php }} ?>

			<div class="clear"></div>
		</div>
	<?php }?>
<?php }?>
<div class="clear"></div>