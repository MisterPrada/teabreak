<?php


	if(isset($_POST['content'])){

		$SQL = sprintf("UPDATE static_item SET content = %s", quote_smart($_POST['content']));
		mysql_query($SQL);
	}


	/* промо код конец */
	//$smarty->assign('PROMO',$promo_out);
	$smarty->assign('RedNews', getStaticItem(1)); // get RedNews
	$smarty->assign('CONTENT',$smarty->fetch("admin/rednews.tpl"));


	function getStaticItem($id){


		$SQL = sprintf("SELECT * FROM static_item WHERE id = %d;", quote_smart($id));
		$result = mysql_query($SQL);
		if(mysql_num_rows($result) > 0){
			$next = mysql_fetch_object($result);
			return $next->content;
		}
		
	}
?>