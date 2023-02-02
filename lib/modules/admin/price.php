<?php



if($_FILES['price1']['name'])
{
	if(file_exists('price/price_list.xlsx')){unlink('price/price_list.xlsx');}

	$name=$_FILES['price1']['name'];
	
	if(strpos($name,'.xlsx')){rename($_FILES['price1']['tmp_name'],'price/price_list.xlsx'); chmod('price/price_list.xlsx',0644);}
	exit(header('Location:'.$_SERVER['REQUEST_URI'].''));
}


	$smarty->assign('CONTENT',$smarty->fetch("admin/price.tpl"));
	
?>