<?php /* Smarty version Smarty-3.0.7, created on 2016-01-03 12:51:16
         compiled from "/home/teabreak/public_html/lib/templates/shops.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11331669975688ef146dc3b7-40033854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e34870e582de89760f377733223dda102c87076' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/shops.tpl',
      1 => 1451814674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11331669975688ef146dc3b7-40033854',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>АДРЕСА МАГАЗИНОВ , ГДЕ МОЖНО КУПИТЬ ЭТОТ ЖЕ ТОВАР</h1>
<p>На сегодняшний день  торговая сеть наших партнеров  насчитывает <b><?php echo count($_smarty_tpl->getVariable('shops')->value);?>
 магазина</b> по г Минску. Приглашаем Вас посетить наши торговые точки по следуюшим адресам:</p>
<h1>Минск</h1>
<div id="map_canvas"></div>
<script type="text/javascript">
	<?php if ($_smarty_tpl->getVariable('shops')->value){?>
		places = [<?php  $_smarty_tpl->tpl_vars['shop'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('shops')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['shop']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['shop']->iteration=0;
if ($_smarty_tpl->tpl_vars['shop']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['shop']->key => $_smarty_tpl->tpl_vars['shop']->value){
 $_smarty_tpl->tpl_vars['shop']->iteration++;
 $_smarty_tpl->tpl_vars['shop']->last = $_smarty_tpl->tpl_vars['shop']->iteration === $_smarty_tpl->tpl_vars['shop']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['shopItem']['last'] = $_smarty_tpl->tpl_vars['shop']->last;
?>{ address:'<?php echo $_smarty_tpl->tpl_vars['shop']->value['address'];?>
', coordinates:'<?php echo $_smarty_tpl->tpl_vars['shop']->value['coordinates'];?>
', name:'<?php echo $_smarty_tpl->tpl_vars['shop']->value['name'];?>
', openingHours:'<?php echo $_smarty_tpl->tpl_vars['shop']->value['openingHours'];?>
'}<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['shopItem']['last']){?>,<?php }?><?php }} ?>];
	<?php }?>
</script>
<div class="shopsList">
	<?php if ($_smarty_tpl->getVariable('shops')->value){?>
		<?php  $_smarty_tpl->tpl_vars['shop'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('shops')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['shop']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['shop']->iteration=0;
if ($_smarty_tpl->tpl_vars['shop']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['shop']->key => $_smarty_tpl->tpl_vars['shop']->value){
 $_smarty_tpl->tpl_vars['shop']->iteration++;
 $_smarty_tpl->tpl_vars['shop']->last = $_smarty_tpl->tpl_vars['shop']->iteration === $_smarty_tpl->tpl_vars['shop']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['shopItem']['last'] = $_smarty_tpl->tpl_vars['shop']->last;
?>
			<div>
				<b><?php echo $_smarty_tpl->tpl_vars['shop']->value['name'];?>
</b> - <?php echo $_smarty_tpl->tpl_vars['shop']->value['address'];?>

				<br><?php echo $_smarty_tpl->tpl_vars['shop']->value['openingHours'];?>

				<div class="shopImage" onclick="centerOnMarker('<?php echo $_smarty_tpl->tpl_vars['shop']->value['coordinates'];?>
')"><div class="shopImageMarker">на карте</div><img src="/i/img/shop_<?php echo $_smarty_tpl->tpl_vars['shop']->value['id'];?>
.jpg"><div class="shopImageFrame"></div></div>
				<br>
			</div>
		<?php }} ?>
	<?php }?>
</div>
<div class="clear"></div>