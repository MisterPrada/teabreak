/* Cufon Text Effects */

Cufon.replace('.main_menu li a', { textShadow: '#000000 1px 2px', fontFamily: 'Century Gothic', fontSize: '17', color: '-linear-gradient(#f5f4f4, 0.60=#e3e3e3, 0.60=#a2a2a2, #fff)'});
Cufon.replace('.widgets_title', {  textShadow: '#000000 1px 2px', fontFamily: 'Century Gothic', fontSize: '19', color: '-linear-gradient(#f5f4f4, 0.60=#e3e3e3, 0.60=#a2a2a2, #fff)'});
Cufon.replace('.hot_news', {       textShadow: '#000000 1px 2px', fontFamily: 'Century Gothic', fontSize: '19', color: '-linear-gradient(#f5f4f4, 0.60=#e3e3e3, 0.60=#a2a2a2, #fff)'});
Cufon.replace('.main_menu li ul li a', { fontFamily: 'Century Gothic', fontSize: '12', color: '#4e4e4e'});
Cufon.replace('.intro_text, .custom_title ,.some_title, h1, h2, h3, h4, h5, h6, #cufon_ul', {fontFamily: 'Century Gothic'})


$(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto({theme:'dark_square'});
	$('#success').hide();
	$('#error').hide();
});

$(function() {
	$('#slideshow').cycle({
		speed:       300,
		timeout:     banner_delay,
		pager:      '#nav',
		pagerEvent: 'click',
		pauseOnPagerHover: true,
		pagerAnchorBuilder: function(idx, slide) {
			return '#recentimages li:eq(' + idx + ')';
		} 
	});

	$('#slideshow_details').cycle({
		speed:       300,
		timeout:     banner_delay,
		pager:      '#nav_details',
		pagerEvent: 'click',
		pauseOnPagerHover: true,
		pagerAnchorBuilder: function(idx, slide) {
			return '#recentimages_details li:eq(' + idx + ')';
		} 
	});
	
	$('#news_ticker').cycle({ 
		cleartype:  10,
		cleartypeNoBg: true
	});
});
$.fn.cycle.updateActivePagerLink = function(pager, currSlideIndex) {
	$(pager).find('li').removeClass('selected').filter('li:eq('+currSlideIndex+')').addClass('selected');
};

/* Starting the site scripts */
$(document).ready(function(){ 
	superfish_dropdown();
	menu_background_effect();
	banner_buttons();   
	slideshow_control();   
	go_top();
	portfolio_zoom();
	
	$(".activefocus").focus(function () {
			if ($(this).attr("value") == $(this).attr("defaultValue")) {
					$(this).attr("value", '');
			}

	});

	$(".activefocus").blur(function () {
			if ($(this).attr("value") == '') {
					$(this).attr("value", $(this).attr("defaultValue"));
			}

	});


	$('#myform').FormValidate({
		phpFile:"mail.php",
		ajax:true
	});
	
});


/* DropDown Menu */
function superfish_dropdown(){
	$("ul.main_menu").superfish();
}

/* Main Menu Background Effect */
function menu_background_effect(){
	 $('.main_menu li a').append('<div class="hover"></div>');  
	 $('.main_menu li a').hover(  
		 function() {
			$('ul li:last', this).css('background','none');
			$(this).children('div').fadeIn('500');   
		},function() {  
			$(this).children('div').fadeOut('500');      
		});
}

/* Banner Button Effect */
function banner_buttons(){
	$('#recentimages li').append('<div class="hover"></div>');  
	$('#recentimages li').hover(  
		function() {  
			$(this).children('div').fadeIn('500');   
		},   
		function() {  
			$(this).children('div').fadeOut('500');      
		}).click(function () {
			$('#recentimages li').removeClass('selected');
			$(this).addClass('selected');
			return false;
		});

	$('#recentimages_details li').append('<div class="hover_details"></div>');  
	$('#recentimages_details li').hover(  
		function() {  
			$(this).children('div').fadeIn('500');   
		},   
		function() {  
			$(this).children('div').fadeOut('500');      
		}).click(function () {
			$('#recentimages_details li').removeClass('selected');
			$(this).addClass('selected');
			return false;
		});

}

function portfolio_zoom(){

	$('.portfolio_box_anime').hover(function(){
		$(".portfolio_zoom", this).fadeIn('500');
	
	}, function() {
		$(".portfolio_zoom", this).fadeOut('500');
	});
}


/* Slide show play & pause */
function slideshow_control(){
	$('#slideshow').hover(  
		function() {
			jQuery('#slideshow').cycle('pause')
		},   
		function() {  
		 	jQuery('#slideshow').cycle('resume')
	});
	$('#slideshow_details').hover(  
		function() {
			jQuery('#slideshow_details').cycle('pause')
		},   
		function() {  
		 	jQuery('#slideshow_details').cycle('resume')
	});
}


function go_top(){
	 $('a[href^=#]').bind("click", function(event) {
        event.preventDefault();
        var ziel = $(this).attr("href");

        $('html,body').animate({
                scrollTop: $(ziel).offset().top
        }, 1000);
        return false;
    });	
}


jQuery.iFormValidate = {
	build : function(options)
	{
		var defaults = {
			phpFile:"mail.php",
			ajax: true
		};
		var options = $.extend(defaults, options); 
		return $(this).each(
			function() {
			$inputs = $(this).find(":input").filter(":not(:submit)");
			$(this).submit(function(){
				var isValid = jQuery.iFormValidate.validateForm($inputs);
				if(!isValid){
					$('#error').fadeIn("slow");
					$('#success').fadeOut("slow");
					return false;
				};
				if(options.ajax){
					var data = {};
					$inputs.each(function(){
						data[this.name] = this.value
					});
					$inputs.each(function(){
						data[this.name] = this.value
						
					});
					
						$('#error').fadeOut("slow");
						$('#success').load(options.phpFile, data, function(){
						$('#success').fadeIn("slow");
						
						
						$(':input','#myform')
						 .not(':button, :submit, :reset, :hidden')
						 .val('')
						 .removeAttr('checked')
						 .removeAttr('selected');

					});
					return false;
				}else{
					return true;
				}
			});
			
			$inputs.bind("keyup", jQuery.iFormValidate.validate);
			$inputs.filter("select").bind("change", jQuery.iFormValidate.validate);
		});
	},
	validateForm : function($inputs)
	{
		var isValid = true; //benifit of the doubt?
		$inputs.filter(".is_required").each(jQuery.iFormValidate.validate);
		if($inputs.filter(".is_required").hasClass("invalid")){isValid=false;}
		return isValid;
	},
		
	validate : function(){
		var $val = $(this).val();
		var isValid = true;
		

		
		if($(this).hasClass('vdate')){
			var Regex = /^([\d]|1[0,1,2]|0[1-9])(\-|\/|\.)([0-9]|[0,1,2][0-9]|3[0,1])(\-|\/|\.)\d{4}$/;
			isValid = Regex.test($val);
		}else if($(this).hasClass('vemail')){
			var Regex =/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!Regex.test($val)){isValid = false;};
		}else if($(this).hasClass('vname')){
			if($val == "name" || $val == ""){
				isValid = false;
				$('.vname').val('name');
				$('.vsemail').val('email address');
				$('.vsubject').val('subject');
				$('.vmessage').val('message');
			};
		}else if($(this).hasClass('vsemail')){
			if($val == "email address" || $val == ""){
				isValid = false;
			};
		}else if($(this).hasClass('vsubject')){
			if($val == "subject" || $val == ""){
				isValid = false;
			};
		}else if($(this).hasClass('vmessage')){
			if($val == "message" || $val == ""){
				isValid = false;
			};
		}else if($(this).hasClass('vphone')){
			var Regex =/^([0-9a-zA-Z]+([_+.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$/;
			if(!Regex.test($val)){isValid = false;}
		}else if($val.length == 0){
			isValid = false;
		}
		
		if(isValid){
			$(this).removeClass("invalid");
			$(this).addClass("valid");
		}else{
			$(this).removeClass("valid");
			$(this).addClass("invalid");
		}
		return isValid;
	}	
}
jQuery.fn.FormValidate = jQuery.iFormValidate.build;