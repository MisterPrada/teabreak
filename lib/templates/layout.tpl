<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>{$title|default:"Чайная пауза - оптовая и розничная торговля"}</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="/css/st.css" type="text/css" rel="stylesheet">
		
		<link rel="stylesheet" type="text/css" href="js/jScrollPane/jScrollPane.css" />
		<link rel="stylesheet" type="text/css" href="css/chat.css" />
		
		<script src="/js/js.js" type="text/javascript"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<!--[if lte IE 6]>
			<link href="/css/ie6.css" type="text/css" rel="stylesheet">
			<script src="/js/fixpng.js" type="text/javascript"></script>
		<![endif]-->
		
		{if $mainmenu eq 'shops'}
			<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;sensor=true&amp;v=2&amp;key={$key_google_map}&amp;hl=ru"></script>
		{/if}
		{literal}
		<!-- GOOGLE ANALITICS -->
			<script type="text/javascript">
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-24027051-3']);
				_gaq.push(['_trackPageview']);
				
				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
			</script>
		<!-- END OF GOOGLE ANALITICS -->

			<script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?168",t.onload=function(){VK.Retargeting.Init("VK-RTRG-538622-erK3O"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-538622-erK3O" style="position:fixed; left:-999px;" alt=""/></noscript>
		{/literal}
		

<!-- including css styles -->
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="/js/scroll.js" type="text/javascript"></script>
<script type="text/javascript"> $(function() { $("#toTop").scrollToTop(); }); </script>
<script type="text/javascript" src="js/jquery-1.4.min.js"></script>
<script type="text/javascript" src="js/cufon.js"></script>
<script type="text/javascript" src="js/custom.js"></script> 
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	</head>
	<body {if $mainmenu eq 'shops'}onload="initialize()" onunload="GUnload()"{/if}>

		<!--START HEADER-->
		<div id="header">
			<div class="wrap">

				<!--START LOGO-->
				<div class="logo"><a href="/" title="Чайная пауза"></a></div>
				<!--/ END LOGO-->

				<!--START MAIN MENU-->
				<div class="menu">
					<a {if $mainmenu eq 'home'} class="sel"{/if} href="/" title="Главная">Главная</a>| 

					<span class="popup{if $mainmenu eq 'info' || $mainmenu eq 'shops'} sel{/if}" title="Доставка и оплата" onmouseover="showHidePopup(this, true)" onmouseout="showHidePopup(this, false)">
						Доставка и оплата
						<span>
							<a href="/info.php" title="Доставка и оплата">Оплата за товар</a>
							<a href="/beznal.php" title="Оплата товара по безналичному расчету">Оплата товара по безналичному расчету</a>
							<a href="/zamena.php" title="Замена либо возврат товара">Замена либо возврат товара</a>
						</span>
					</span>
					
					| 
					<a {if $mainmenu eq 'catalog'} class="sel"{/if} href="/catalog.php" title="Каталог">Каталог</a>| 
					<!--a {if $mainmenu eq 'about'} class="sel"{/if} href="/about.php" title="О компании">О компании</a-->
					<span class="popup{if $mainmenu eq 'about' || $mainmenu eq 'shops' || $mainmenu eq 'jobs'} sel{/if}" title="О компании" onmouseover="showHidePopup(this, true)" onmouseout="showHidePopup(this, false)">
						О компании
						<span>
							<a href="/about.php" title="О компании">Контакты</a>
							<a href="/shops.php" title="Торговые точки">Наши магазины</a>
							<a href="/jobs.php" title="Вакансии">Вакансии</a>
						</span>
					</span>|
					<a {if $mainmenu eq 'news'} class="sel"{/if} href="/news.php" title="Новости">Новости</a>| 
					<a {if $mainmenu eq 'blog'} class="sel"{/if} href="/blog.php" title="Вопросы и ответы">Вопросы и ответы</a>| 
					<a {if $mainmenu eq 'articles'} class="sel"{/if} href="/articles.php" title="Полезно знать">Полезно знать</a>
					| {if $smarty.session.logged_in}{else}<a {if $mainmenu eq 'login'} class="sel"{/if} href="/login.php" title="Вход">Вход</a>{/if}
					{if $smarty.session.logged_in}<div class="userInfo">Здравствуйте, <span class="orange">{$smarty.session.firstname} {$smarty.session.lastname}</span>!
					 {if $smarty.session.logged_in}<a href="/profile.php" title="Кабинет"  {if $mainmenu eq 'profile'} class="sel"{/if} >Кабинет</a>|<a href="/logout.php" title="Выход">Выход</a>{else}<a {if $mainmenu eq 'login'} class="sel"{/if} href="/login.php" title="Вход">Вход</a>{/if}
					</div>{/if}
				</div>
				<!--/ END MAIN MENU-->
				<form class="telephon"><img src="/i/velcom.png" width="20" height="20"></img>8(029) 651-50-<h>34</h><a></a></form>
				<form class="skype"><img src="/i/skype.png" width="27" height="20"></img>teabreak.by<a></a></form>
				<form action="/search.php" method="post" class="headerInfo"><a href="/cart.php" title="Корзина"></a>Товаров (<span id="totalItems">{$total_items}</span>)   Сумма (<span id="totalPrice"> {$total_price|number_format:2:",":""} руб.<span> 
				</span></span>) <input type="text" class="search" id="search_text" name="search_text"><input type="image" src="/i/search.png" width="17" height="18" value="Поиск" onClick="submit();" class="search_button"></form>
				
				<div class="clear"></div>
			</div>
		</div>
		<!--/ END HEADER-->
		
		<!--START CONTENT-->
		<div id="content">
			<div class="center">
				<div class="menuPics">
					<a class="coffee" href="/catalog.php?cat_id=1" title="Кофе"><img class="raz" src="/i/coffee2.jpg" />
<img class="dva" src="/i/coffee.jpg" /></a>
					<a class="tea" href="/catalog.php?cat_id=2" title="Чай"><img class="raz1" src="/i/tea2.jpg" />
<img class="dva1" src="/i/tea.jpg" /></a>
					<a class="dishes" href="/catalog.php?cat_id=3" title="Посуда"><img class="raz2" src="/i/dishes2.jpg" />
<img class="dva2" src="/i/dishes.jpg" /></a>
					<a class="gifts" href="/catalog.php?cat_id=4" title="Подарки"><img class="raz3" src="/i/gifts2.jpg" />
<img class="dva3" src="/i/gifts.jpg" /></a>
					<a class="sweets" href="/catalog.php?cat_id=5" title="Сладости"><img class="raz4" src="/i/sweets2.jpg" />
<img class="dva4" src="/i/sweets.jpg" /></a>
					<div class="clear"></div>
				</div>
				<div class="content">
					{$CONTENT}
				</div>
				{if $show_banners}
					<div id="banner">

		<div class="hr"></div>
		
<div id="chatContainer">

	{if $smarty.session.logged_in}
    <div id="chatTopBar" class="rounded"></div>
	{/if}
    <div id="chatLineHolder"></div>
    
    
    <div id="chatBottomBar" class="rounded">
    	<div class="tip"></div>
        {if $smarty.session.logged_in}
        <form id="loginForm" method="post" action="">
            <input id="name" name="name" {literal} onfocus="if(this.value=='Псевдоним') this.value='';" onblur="if(this.value=='') this.value='Псевдоним';"{/literal} class="rounded" maxlength="16" />
            <input id="email" name="email" class="rounded" />
            <center><input id="subm" type="submit" class="blueButton" value="Войти" /></center>
        </form>
		 {else}
		<center><a href="/register.php">Зарегистрироваться</a></center>
		{/if}
        
        <form id="submitForm" method="post" action="">
            <input id="chatText" name="chatText" class="rounded" maxlength="255" />
            <center><input type="submit" class="blueButton" value="Отправить" /></center>
        </form>
       
    </div>
    
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/jScrollPane/jquery.mousewheel.js"></script>
<script src="js/jScrollPane/jScrollPane.min.js"></script>
<script src="js/script.js"></script>
			
		{if $smarty.session.logged_in}		
		<div class="hr"></div>
		{else}
		<div id="cho" class="hr"></div>
		{/if}
		
		
		
						<a>
						
						{if file_exists('i/1n.jpg')}<a class="portfolio_box_anime">
												<a href="/i/1n.jpg" rel="prettyPhoto[canyon_gallery]">	
												<img id="bannerHome1" src="/i/1n.jpg" width="182" height="106" alt=""/>	
												</a>
						{elseif file_exists('i/1n.jpeg')}<a class="portfolio_box_anime">
												<a href="/i/1n.jpeg" rel="prettyPhoto[canyon_gallery]">	
												<img id="bannerHome1" src="/i/1n.jpeg" width="182" height="106" alt=""/>													
												</a>
						{elseif file_exists('i/1n.png')}<a class="portfolio_box_anime">
												<a href="/i/1n.png" rel="prettyPhoto[canyon_gallery]">	
												<img id="bannerHome1" src="/i/1n.png" width="182" height="106" alt=""/>													
												</a>
						{elseif file_exists('i/1n.gif')}<a class="portfolio_box_anime">
												<a href="/i/1n.gif" rel="prettyPhoto[canyon_gallery]">	
												<img id="bannerHome1" src="/i/1n.gif" width="182" height="106" alt=""/>													
												</a>
						{else}<a class="portfolio_box_anime">
												<a href="/i/gifts.jpg" rel="prettyPhoto[canyon_gallery]">	
												<img id="bannerHome1" src="/i/gifts.jpg" width="182" height="106" alt=""/>													
												</a>{/if}
						
						</a>
						<div class="shr"></div>
						<a id="bannerHome" href="http://detdom2.org/" alt="Детский дом № 2, г. Минск, ул. Калиновского, 65, тел./факс. +(375-17) 281 14 18"> <img src="http://detdom2.org/img/detdom2_120_90.gif" width="120" height="90"> </a>
					</div>
				{/if}

			</div>
		</div>
		<!--/ END CONTENT-->
		
		<!--START FOOTER-->
		<div id="footer">
			<div class="center">
				<a href="http://site-magic.by" target="_blank" class="copyright0 copyright">Заказать сайт в Минске</a>
				<a href="http://vk.com/club46096904" target="_blank" class="vk">
					<img src="/i/vk.png" weight="20" height="20"></img>
				</a>

				<a href="https://vk.com/id322980906" target="_blank" class="vk2">
					<img src="/i/vk2.png" weight="20" height="20"></img>
				</a>

				<a href="https://www.instagram.com/teabreakby/" target="_blank" class="social_instagram">
					<img src="/i/instagram.png" weight="23" height="23"></img>
				</a>

				<a href="https://ok.ru/group/59190093152438" target="_blank" class="social_ok">
					<img src="/i/ok.png" weight="20" height="20"></img>
				</a>
			
				
				
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
		
		<div id="popup">
			Товар добавлен в корзину. Желаете ли вы оформить заказ?
			<br>
			<a class="floatLeft" href="/cart.php">Оформить заказ</a>
			<a class="floatRight" onclick="hideConfirm()">Продолжить покупки</a>
		</div>
		<div id="toTop">
<img src="/i/verx.png" weight="30" height="40" alt="вверх" />
</div>

<!-- BEGIN JIVOSITE CODE -->
{literal}
<script type='text/javascript'>
(function(){ var widget_id = 'owpMZU6cgO';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
{/literal}
<!-- END JIVOSITE CODE -->

	</body>
</html>