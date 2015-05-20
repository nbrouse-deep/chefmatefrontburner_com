/*-----------------------------------------------------------------------------------*/
/*	PORTFOLIO ARCHIVE ISOTOPE
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {

    var $container = $('#portfolio-archive .items');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '#portfolio-archive .item',
            layoutMode: 'fitRows'
        });
    });

    $('#portfolio-archive .filter li a').click(function () {

        $('#portfolio-archive .filter li a').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector
        });

        return false;
    });
    
    $('#portfolio-archive .load-more li').first().slideDown();
    
    $('#portfolio-archive .load-more li a').click(function(){
    	var $this = $(this);
    	$this.css({ 'pointer-events' : 'none' }).html('<div class="loader-wrapper"><img src="'+image_path.image_path+'loading.gif" /></div>');
    	
    		var url = $(this).attr('href');
    		var $wrapper = $('#portfolio-archive .items');
    		
    		$.get(url, function(data){
    			var filtered = jQuery(data).find('.items li');
    			filtered.imagesLoaded(function(){
    				$wrapper.isotope('insert', filtered, function(){
    					$(window).trigger( 'smartresize' );
    					$(window).trigger( 'resize' );
    					$this.parent().slideUp(function(){
    						$this.parent().next().slideDown();
    					});
    					new View( $('a.view') );
    				});
    			});
    		});
    		
    	return false;
    });
    
});
/*-----------------------------------------------------------------------------------*/
/*	NAVIGATION REWRITE
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {
    
    $('.page-template-page_home-php #main_menu li a').not('.page-template-page_home-php #main_menu li.external a').each(function(){
	    var pathArray = window.location.href.split( '/' );
	    var protocol = pathArray[0];
	    var host = pathArray[2];
	    var homeUrl = protocol + '//' + host + '/';
    	var url = $(this).attr('href');
    	if( $(this).parent().hasClass('home') || homeUrl == url ){
	    	$(this).attr('href', '#home');
    	} else {
	    	var splitUrl = url.split('/');
	    	var lastEl = splitUrl[splitUrl.length-2];
	    	$(this).attr('href', '#'+lastEl );
    	}
    });
    
    $(window).trigger('scroll');
    
});
/*-----------------------------------------------------------------------------------*/
/*	FORM
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {
    $('.forms').dcSlickForms();
});
jQuery(document).ready(function ($) {
    $('.comment-form input[title], .comment-form textarea').each(function () {
        if ($(this).val() === '') {
            $(this).val($(this).attr('title'));
        }

        $(this).focus(function () {
            if ($(this).val() == $(this).attr('title')) {
                $(this).val('').addClass('focused');
            }
        });
        $(this).blur(function () {
            if ($(this).val() === '') {
                $(this).val($(this).attr('title')).removeClass('focused');
            }
        });
    });
});
/*-----------------------------------------------------------------------------------*/
/*	GRID BLOG
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {
    var $container = $('.grid-blog');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.post'
        });
    });
    $(window).on('resize', function(){
    	$('.grid-blog').isotope('reLayout')
	});
});
/*-----------------------------------------------------------------------------------*/
/*	CALL PORTFOLIO SCRIPTS
/*-----------------------------------------------------------------------------------*/
function callPortfolioScripts() {

    jQuery('.player').fitVids();
    
    if( jQuery('.portfolio-banner').length > 0 ){
	    jQuery('.portfolio-banner').revolution({
			delay: 9000,
			startheight: image_path.gallery_height,
			startwidth: 1170,
			hideThumbs: 200,
			navigationType: "bullet",
			// bullet, thumb, none
			navigationArrows: "verticalcentered",
			// nexttobullets, solo (old name verticalcentered), none
			navigationStyle: "round",
			// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom
			navigationHAlign: "center",
			// Vertical Align top,center,bottom
			navigationVAlign: "bottom",
			// Horizontal Align left,center,right
			navigationHOffset: 0,
			navigationVOffset: 20,
			soloArrowLeftHalign: "left",
			soloArrowLeftValign: "center",
			soloArrowLeftHOffset: 20,
			soloArrowLeftVOffset: 0,
			soloArrowRightHalign: "right",
			soloArrowRightValign: "center",
			soloArrowRightHOffset: 20,
			soloArrowRightVOffset: 0,
			touchenabled: "on",
			// Enable Swipe Function : on/off
			onHoverStop: "on",
			// Stop Banner Timet at Hover on Slide on/off
			stopAtSlide: -1,
			// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
			stopAfterLoops: -1,
			// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic
			hideCaptionAtLimit: 0,
			// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
			hideAllCaptionAtLilmit: 0,
			// Hide all The Captions if Width of Browser is less then this value
			hideSliderAtLimit: 0,
			// Hide the whole slider, and stop also functions if Width of Browser is less than this value
			shadow: 0,
			//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
			fullWidth: "off" // Turns On or Off the Fullwidth Image Centering in FullWidth Modus
		});	
	}

};
/*-----------------------------------------------------------------------------------*/
/*	PORTFOLIO SLIDER
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($) {

	if( jQuery('.portfolio-banner').length > 0 ){
		if ($.fn.cssOriginal != undefined) $.fn.css = $.fn.cssOriginal;
		$('.portfolio-banner').revolution({
			delay: 9000,
			startheight: image_path.gallery_height,
			startwidth: 1170,
			hideThumbs: 200,
			navigationType: "bullet",
			navigationArrows: "verticalcentered",
			navigationStyle: "round",
			navigationHAlign: "center",
			navigationVAlign: "bottom",
			navigationHOffset: 0,
			navigationVOffset: 20,
			soloArrowLeftHalign: "left",
			soloArrowLeftValign: "center",
			soloArrowLeftHOffset: 20,
			soloArrowLeftVOffset: 0,
			soloArrowRightHalign: "right",
			soloArrowRightValign: "center",
			soloArrowRightHOffset: 20,
			soloArrowRightVOffset: 0,
			touchenabled: "on",
			onHoverStop: "on",
			stopAtSlide: -1,
			stopAfterLoops: -1,
			hideCaptionAtLimit: 0,
			hideAllCaptionAtLilmit: 0,
			hideSliderAtLimit: 0,
			shadow: 0,
			fullWidth: "on"
		});	
		
	}

});
/*-----------------------------------------------------------------------------------*/
/*	IMAGE HOVER
/*-----------------------------------------------------------------------------------*/				
jQuery(document).ready(function($) {
	$('.overlay a').prepend('<span class="more"></span>');
});
/*-----------------------------------------------------------------------------------*/
/*	PAGINATION
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($) {
	
	function getPathFromUrl(url) {
	  return url.split("?")[0];
	}
	
      $('body').on('click', '.pagination a', function(){
      
      	$('html,body').animate({scrollTop: $('.grid-blog').offset().top - 240},400);
      	
      	$('.grid-blog').prepend('<div class="grid-loader"></div>');
	      	
      	//CAPTURE HREF
      	url = $(this).attr('href');
      	
      	//REMOVE OLD POSTS
      	var $removeItem = $( '.grid-blog .post' );
      	$($removeItem).fadeOut(200);
      	
      	$('.pagination').fadeOut(200).delay(200).remove();
      	
      	//GET NEW POSTS
      	$.get(url, function(data){
      		var filtered = jQuery(data).find('.grid-blog .post');
      		$('.overlay a', filtered).prepend('<span class="more"></span>');
      		$(filtered).imagesLoaded(function(){
	      		$('.grid-blog').isotope('insert', filtered, function(){
	      			$('.grid-blog').isotope('reLayout');
	      			$('.grid-blog').isotope( 'remove',  $removeItem );
	      			$('.grid-blog .grid-loader').fadeOut(200, function(){
	      				$(this).remove();
	      			});
	      		});
	      	});
      	});
      	
      	//GET NEW PAGINATION
      	$.get(url, function(data){
      		var pagination = jQuery(data).find('.pagination');
      		$('a', pagination).each(function(){
      			var stripUrl = $(this).attr('href');
      			var stripped = getPathFromUrl(stripUrl);
      			$(this).attr('href', stripped);
      		});
      		if( $('body').hasClass('home') ){
      			$(pagination).appendTo('.row:has(.grid-blog) .span12');
      		} else {
      			$(pagination).insertAfter('.grid-blog');
      		}
      	});
	      	
      	//PREVENT WINDOW CHANGE
      	return false;
      });
});
/*-----------------------------------------------------------------------------------*/
/*	PRETTIFY
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
window.prettyPrint && prettyPrint()
});
/*-----------------------------------------------------------------------------------*/
/*	PARALLAX MOBILE
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($) {
if( navigator.userAgent.match(/Android/i) || 
	navigator.userAgent.match(/webOS/i) ||
	navigator.userAgent.match(/iPhone/i) || 
	navigator.userAgent.match(/iPad/i)|| 
	navigator.userAgent.match(/iPod/i) || 
	navigator.userAgent.match(/BlackBerry/i)){
			$('.parallax').addClass('mobile');
}
});
/*-----------------------------------------------------------------------------------*/
/*	DATA REL
/*-----------------------------------------------------------------------------------*/
jQuery('a[data-rel]').each(function() {
    jQuery(this).attr('rel', jQuery(this).data('rel'));
});
/*-----------------------------------------------------------------------------------*/
/*	DRIBBBLE
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {		
	
	if(typeof dribbble !== 'undefined'){
		
		jQuery.jribbble.getShotsByPlayerId(dribbble.username, function (playerShots) {
			var html = [];
			
			jQuery.each(playerShots.shots, function (i, shot) {
				html.push('<li class="thumb"><figure class="overlay"><a href="' + shot.url + '" target="_blank">');
				html.push('<img src="' + shot.image_url + '" ');
				html.push('alt="' + shot.title + '"></figure></a></li>');
			});
			
			jQuery('#'+dribbble.number+'.shots.thumbs').html(html.join(''));
			
			jQuery('.overlay a').prepend('<span class="more"></span>');
	
		}, {page: 1, per_page: 8});
	
	}
	
});
/*-----------------------------------------------------------------------------------*/
/*	ANCHOR SCROLL
/*-----------------------------------------------------------------------------------*/
/**
 * Copyright (c) 2007-2013 Ariel Flesler - aflesler<a>gmail<d>com | http://flesler.blogspot.com
 * Licensed under MIT
 * @author Ariel Flesler
 * @version 1.3.1
 */
;(function($){var h=location.href.replace(/#.*/,'');var i=$.localScroll=function(a){$('body').localScroll(a)};i.defaults={duration:1000,axis:'y',event:'click',stop:true,target:window};i.hash=function(a){if(location.hash){a=$.extend({},i.defaults,a);a.hash=false;if(a.reset){var d=a.duration;delete a.duration;$(a.target).scrollTo(0,a);a.duration=d}scroll(0,location,a)}};$.fn.localScroll=function(b){b=$.extend({},i.defaults,b);return b.lazy?this.bind(b.event,function(e){var a=$([e.target,e.target.parentNode]).filter(filter)[0];if(a)scroll(e,a,b)}):this.find('a,area').filter(filter).bind(b.event,function(e){scroll(e,this,b)}).end().end();function filter(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,'')==h&&(!b.filter||$(this).is(b.filter))}};function scroll(e,a,b){var c=a.hash.slice(1),elem=document.getElementById(c)||document.getElementsByName(c)[0];if(!elem)return;if(e)e.preventDefault();var d=$(b.target);if(b.lock&&d.is(':animated')||b.onBefore&&b.onBefore(e,elem,d)===false)return;if(b.stop)d._scrollable().stop(true);if(b.hash){var f=b.offset;f=f&&f.top||f||0;var g=elem.id==c?'id':'name',$a=$('<a> </a>').attr(g,c).css({position:'absolute',top:$(window).scrollTop()+f,left:$(window).scrollLeft()});elem[g]='';$('body').prepend($a);location=a.hash;$a.remove();elem[g]=c}d.scrollTo(elem,b).trigger('notify.serialScroll',[elem])}})(jQuery);
/**
 * Copyright (c) 2007-2013 Ariel Flesler - aflesler<a>gmail<d>com | http://flesler.blogspot.com
 * Licensed under MIT
 * @author Ariel Flesler
 * @version 1.4.7
 */
(function(d){function h(b){return"object"==typeof b?b:{top:b,left:b}}var n=d.scrollTo=function(b,c,a){return d(window).scrollTo(b,c,a)};n.defaults={axis:"xy",duration:1.3<=parseFloat(d.fn.jquery)?0:1,limit:!0};n.window=function(b){return d(window)._scrollable()};d.fn._scrollable=function(){return this.map(function(){if(this.nodeName&&-1==d.inArray(this.nodeName.toLowerCase(),["iframe","#document","html","body"]))return this;var b=(this.contentWindow||this).document||this.ownerDocument||this;return/webkit/i.test(navigator.userAgent)|| "BackCompat"==b.compatMode?b.body:b.documentElement})};d.fn.scrollTo=function(b,c,a){"object"==typeof c&&(a=c,c=0);"function"==typeof a&&(a={onAfter:a});"max"==b&&(b=9E9);a=d.extend({},n.defaults,a);c=c||a.duration;a.queue=a.queue&&1<a.axis.length;a.queue&&(c/=2);a.offset=h(a.offset);a.over=h(a.over);return this._scrollable().each(function(){function q(b){k.animate(e,c,a.easing,b&&function(){b.call(this,g,a)})}if(null!=b){var l=this,k=d(l),g=b,p,e={},s=k.is("html,body");switch(typeof g){case "number":case "string":if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(g)){g= h(g);break}g=d(g,this);if(!g.length)return;case "object":if(g.is||g.style)p=(g=d(g)).offset()}d.each(a.axis.split(""),function(b,d){var c="x"==d?"Left":"Top",m=c.toLowerCase(),f="scroll"+c,h=l[f],r=n.max(l,d);p?(e[f]=p[m]+(s?0:h-k.offset()[m]),a.margin&&(e[f]-=parseInt(g.css("margin"+c))||0,e[f]-=parseInt(g.css("border"+c+"Width"))||0),e[f]+=a.offset[m]||0,a.over[m]&&(e[f]+=g["x"==d?"width":"height"]()*a.over[m])):(c=g[m],e[f]=c.slice&&"%"==c.slice(-1)?parseFloat(c)/100*r:c);a.limit&&/^\d+$/.test(e[f])&& (e[f]=0>=e[f]?0:Math.min(e[f],r));!b&&a.queue&&(h!=e[f]&&q(a.onAfterFirst),delete e[f])});q(a.onAfter)}}).end()};n.max=function(b,c){var a="x"==c?"Width":"Height",h="scroll"+a;if(!d(b).is("html,body"))return b[h]-d(b)[a.toLowerCase()]();var a="client"+a,l=b.ownerDocument.documentElement,k=b.ownerDocument.body;return Math.max(l[h],k[h])-Math.min(l[a],k[a])}})(jQuery);

jQuery(window).load(function($){ 
	
		if(jQuery('body').hasClass('admin-bar')){ image_path.scroll_offset = parseInt(image_path.scroll_offset, 10) + 28; }
	    jQuery('.scroll, .nav-collapse .nav, .dropdown-toggle').localScroll({
		    offset: {
		    	top:-image_path.scroll_offset, 
		    	left:0
		    }
		});
		
	    jQuery('.nav-collapse .nav a').click(function () { jQuery(".nav-collapse").collapse("hide") });
    
});
/*-----------------------------------------------------------------------------------*/
/*	MENU
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($) {
      jQuery('a.js-activated').dropdownHover().dropdown().not('a.js-activated[href^="#"]').click(function(){
        var url = $(this).attr('href');
        
        if( url.match("^#") )
        	return false;
        
        window.location.href = url;
      	return true;
      });
      jQuery('.player').fitVids();
      jQuery('p:empty').remove();
});