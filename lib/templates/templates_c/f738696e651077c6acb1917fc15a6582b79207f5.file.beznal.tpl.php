<?php /* Smarty version Smarty-3.0.7, created on 2014-03-12 18:02:12
         compiled from "/home/teabreak/public_html/lib/templates/admin/beznal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:892768292532076f4691329-77767627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f738696e651077c6acb1917fc15a6582b79207f5' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/beznal.tpl',
      1 => 1394636457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '892768292532076f4691329-77767627',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Оплата по безналичному расчёту</h1>
<br>
<form action="/admin/beznal.php" method="post">

<table border="1">
<tr><td><b>Продавец</b> :</td><td><textarea rows="1" name="prodavec"><?php echo $_smarty_tpl->getVariable('BEZNAL')->value['prodavec'];?>
</textarea></td></tr>
<tr><td><b>УНП</b> :</td><td><textarea rows="1" name="unp"><?php echo $_smarty_tpl->getVariable('BEZNAL')->value['unp'];?>
</textarea></td></tr>
<tr><td><b>Расчетный счет №</b> :</td><td><textarea rows="1" name="raschetni_schet"><?php echo $_smarty_tpl->getVariable('BEZNAL')->value['raschetni_schet'];?>
</textarea></td></tr>
<tr><td><b>БИК</b> :</td><td><textarea rows="1" name="bik"><?php echo $_smarty_tpl->getVariable('BEZNAL')->value['bik'];?>
</textarea></td></tr>
<tr><td><b>Тел./факс:</b> :</td><td><textarea rows="1" name="tel_fax"><?php echo $_smarty_tpl->getVariable('BEZNAL')->value['tel_fax'];?>
</textarea></td></tr>
<tr><td><b>Условия оплаты:</b> :</td><td><textarea rows="1" name="usl_oplati"><?php echo $_smarty_tpl->getVariable('BEZNAL')->value['usl_oplati'];?>
</textarea></td></tr>
<tr><td><b>Валюта платежа</b> :</td><td><textarea rows="1" name="valuta_plateja"><?php echo $_smarty_tpl->getVariable('BEZNAL')->value['valuta_plateja'];?>
</textarea></td></tr>
<tr><td><b>Основание</b> :</td><td><textarea rows="1" name="osnovanie"><?php echo $_smarty_tpl->getVariable('BEZNAL')->value['osnovanie'];?>
</textarea></td></tr>

<tr><td><td><center><input type="submit" name="save" value="сохранить" /></center></td></tr>




</table>
</form>