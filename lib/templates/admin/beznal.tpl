<h1>Оплата по безналичному расчёту</h1>
<br>
<form action="/admin/beznal.php" method="post">

<table border="1">
<tr><td><b>Продавец</b> :</td><td><textarea rows="1" name="prodavec">{$BEZNAL.prodavec}</textarea></td></tr>
<tr><td><b>УНП</b> :</td><td><textarea rows="1" name="unp">{$BEZNAL.unp}</textarea></td></tr>
<tr><td><b>Расчетный счет №</b> :</td><td><textarea rows="1" name="raschetni_schet">{$BEZNAL.raschetni_schet}</textarea></td></tr>
<tr><td><b>БИК</b> :</td><td><textarea rows="1" name="bik">{$BEZNAL.bik}</textarea></td></tr>
<tr><td><b>Тел./факс:</b> :</td><td><textarea rows="1" name="tel_fax">{$BEZNAL.tel_fax}</textarea></td></tr>
<tr><td><b>Условия оплаты:</b> :</td><td><textarea rows="1" name="usl_oplati">{$BEZNAL.usl_oplati}</textarea></td></tr>
<tr><td><b>Валюта платежа</b> :</td><td><textarea rows="1" name="valuta_plateja">{$BEZNAL.valuta_plateja}</textarea></td></tr>
<tr><td><b>Основание</b> :</td><td><textarea rows="1" name="osnovanie">{$BEZNAL.osnovanie}</textarea></td></tr>

<tr><td><td><center><input type="submit" name="save" value="сохранить" /></center></td></tr>




</table>
</form>