<?php /* Smarty version Smarty-3.0.7, created on 2014-05-05 12:34:48
         compiled from "/home/teabreak/public_html/lib/templates/admin/price.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117455819053675b38334c92-29996708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a576c35f2710dadb5c84b52022423ed7713f08fa' => 
    array (
      0 => '/home/teabreak/public_html/lib/templates/admin/price.tpl',
      1 => 1399282425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117455819053675b38334c92-29996708',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Оплата по безналичному расчёту</h1>
<br>
<form action="/admin/price.php" method="post" enctype="multipart/form-data">

<table border="1">
<tr><td><b>Прайс-лист</b> :</td><td><input name="price1" type="file" /><input type="submit" name="save_price" value="сохранить" /></td></tr>



</form>

</table>
