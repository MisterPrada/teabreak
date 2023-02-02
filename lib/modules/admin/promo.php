<?php

	/* удаление промокода */
		$promo_delete =  $_GET['delete'];
		if (!is_numeric($promo_delete)) {
			$promo_delete = "'" . mysql_real_escape_string($promo_delete) . "'";
		}
		$SQL = "delete from promo WHERE id = $promo_delete" ;
		$rest = mysql_query($SQL);
	
	/* удаление промокода конец */

	/* промо код */
function generatePassword($length = 8){
	  $chars = 'ABDEFGHKNQRSTYZ23456789';
	  $numChars = strlen($chars);
	  $string = '';
	  for ($i = 0; $i < $length; $i++) {
		$string .= substr($chars, rand(1, $numChars) - 1, 1);
	  }
  return $string;
}
	
	$promo = $_POST['percent'];
	$promo = intval($promo);
	$promo_code = generatePassword();
	$promo_out = array();
	if( ($promo > 0) && ($promo <= 100) )
		{
				While(true)
				{
					$SQL = "SELECT * FROM promo WHERE code = $promo_code" ;
					$rest = mysql_query($SQL);
					if(mysql_affected_rows() > 0)
					{$promo_code = generatePassword(); continue;}
					break;
				}
			
			if(isset($_POST['promo_inf']))
				{
				$SQL = "INSERT INTO promo (percent, code, used, date) VALUES($promo, '$promo_code', 8, CURRENT_DATE())" ;
				}
			else
				{
				$SQL = "INSERT INTO promo (percent, code, date) VALUES($promo, '$promo_code', CURRENT_DATE())" ;
				}
			
			$rest = mysql_query($SQL);
			
		}
		
				$SQL = "SELECT * FROM promo order by id desc" ; //вывод созданных промокодов на экран
				$rest = mysql_query($SQL);
				While($art=mysql_fetch_assoc($rest))
				{
					$promo_out[] = $art; //array
				}
	
	
	/* промо код конец */
	$smarty->assign('PROMO',$promo_out);
	$smarty->assign('CONTENT',$smarty->fetch("admin/promo.tpl"));
	
	
?>