<?php
	
	if(isset($_POST['save']))
{
$_POST['prodavec'] = str_replace("'","",$_POST['prodavec']);
$_POST['unp'] = str_replace("'","",$_POST['unp']);
$_POST['raschetni_schet'] = str_replace("'","",$_POST['raschetni_schet']);
$_POST['bik'] = str_replace("'","",$_POST['bik']);
$_POST['tel_fax'] = str_replace("'","",$_POST['tel_fax']);
$_POST['usl_oplati'] = str_replace("'","",$_POST['usl_oplati']);
$_POST['valuta_plateja'] = str_replace("'","",$_POST['valuta_plateja']);
$_POST['osnovanie'] = str_replace("'","",$_POST['osnovanie']);

$SQL = "UPDATE nova SET prodavec = '" .$_POST['prodavec']. "', unp = '".$_POST['unp']."' , raschetni_schet = '".$_POST['raschetni_schet']."',
bik = '".$_POST['bik']."', tel_fax = '".$_POST['tel_fax']."', usl_oplati = '".$_POST['usl_oplati']."', valuta_plateja = '".$_POST['valuta_plateja']."', osnovanie = '".$_POST['osnovanie']."' where id = 'beznal' " ;
mysql_query($SQL);
exit(header('Location:'.$_SERVER['REQUEST_URI'].''));
}
	
$SQL = "SELECT * FROM nova WHERE id='beznal' " ;
$rest = mysql_query($SQL);
$beznal=mysql_fetch_assoc($rest);
$smarty->assign('BEZNAL', $beznal);
	
	

	$smarty->assign('CONTENT',$smarty->fetch("admin/beznal.tpl"));
	
?>