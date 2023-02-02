<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Чайная пауза</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate">
		<meta http-equiv="expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
		<meta http-equiv="last-modified" content="Mon, 26 Jul 1997 05:00:00 GMT">
		<link href="/css/st_admin.css" type="text/css" rel="stylesheet">
		<link href="/css/tree.css" type="text/css" rel="stylesheet">
		<link href="/css/datepicker.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="/js/treemenu.js"></script>
		<script type="text/javascript" src="/js/functions.js"></script>
		<script type="text/javascript" src="/js/mootools-1.2.js"></script>
		<script type="text/javascript" src="/js/datepicker.js"></script>
		<!--[if lte IE 6]>
			<link href="/css/ie6.css" type="text/css" rel="stylesheet">
			<script src="/js/fixpng.js" type="text/javascript"></script>
		<![endif]-->
	</head>
	<body>

		<!--START HEADER-->
		<div id="header">
			<div class="wrap">

				<!--START LOGO-->
				<div class="logo"><a href="/" title="Чайная пауза"></a></div>
				<!--/ END LOGO-->

				<!--START MAIN MENU-->
				<div class="menu">
					<a {if $ORDERS_MENU}class="sel"{/if} href="/admin/orders.php" title="Заказы">Заказы</a>| 
					<a {if $CATALOGUE_MENU}class="sel"{/if} href="/admin/catalogue.php" title="Каталог">Каталог</a>| 
					<a {if $NEWS_MENU}class="sel"{/if} href="/admin/news.php" title="Новости">Новости</a>| 
					<a {if $ARTICLES_MENU}class="sel"{/if} href="/admin/articles.php" title="Статьи">Статьи</a>| 
					<a {if $BLOG_MENU}class="sel"{/if} href="/admin/blog.php" title="Вопросы и ответы">В и О</a>| 
					<a {if $USERS_MENU}class="sel"{/if} href="/admin/users.php" title="Пользователи">Пользователи</a>| 
					<a {if $JOBS_MENU}class="sel"{/if} href="/admin/jobs.php" title="Вакансии">Вакансии</a>| 
					<a {if $SETTINGS_MENU}class="sel"{/if} href="/admin/settings.php" title="Настройки">Настройки</a>|
					<a {if $OLD}class="sel"{/if} href="/admin/old.php" title="Всякое">Всякое</a>
				</div>
				<!--/ END MAIN MENU-->				
				<div class="clear"></div>					
			</div>
		</div>
		<!--/ END HEADER-->

		<!--START CONTENT-->
		<div id="content">
			<div class="center">
				{$CONTENT}
						{if $ORDERS_MENU}
						{if file_exists('i/1n.jpg')}<img id="bannerHome1" src="/i/1n.jpg" width="182" height="106">
						{elseif file_exists('i/1n.jpeg')}<img id="bannerHome1" src="/i/1n.jpeg" width="182" height="106">
						{elseif file_exists('i/1n.png')}<img id="bannerHome1" src="/i/1n.png" width="182" height="106">
						{elseif file_exists('i/1n.gif')}<img id="bannerHome1" src="/i/1n.gif" width="182" height="106">
						{else}Неверный формат!<br>Используйте: jpg, png, gif.{/if}
						
						
<form method='post' action='index.php' enctype='multipart/form-data'><input type='file' name='1filename' /><br><br>
<input type="image" src="/i/buttonSave.png" width="95" height="31" alt="Save" onclick="submit();'">

</form>
{/if}
			</div>
						
		</div>
							
					
					
					
				
		<!--/ END CONTENT-->
		
		<!--START FOOTER-->
		<div id="footer">
			<div class="center">
				<a href="http://www.offsiteteam	.com" target="_blank" class="copyright0">&copy; Offsiteteam Corp</a>, <a href="http://www.cutetag.com/ru" target="_blank" class="copyright">Cutetag Corp 2014</a>
				<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t26.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число посетителей за"+
" сегодня' "+
"border='0' width='88' height='15'><\/a>")
//--></script><!--/LiveInternet-->
			</div>
		</div>
		<!--/ END FOOTER-->

	</body>
</html>