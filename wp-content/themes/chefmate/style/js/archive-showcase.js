/*-----------------------------------------------------------------------------------*/
/*	CONTENT SLIDER
/*-----------------------------------------------------------------------------------*/
/**************************************************************************
 * jQuery Plugin for Content Slider
 * @version: 1.0
 * @requires jQuery v1.8 or later
 * @author ThunderBudies
 **************************************************************************/

jQuery(document).ready(function ($) {

	 var speed=600;			// SLIDE OUT THE MAIN CONTENT
	 var speed2=500;			// FADE IN THE NEW CONTENTS


	 jQuery.fn.extend({
        unwrapInner: function (selector) {
            return this.each(function () {
                var t = this,
                    c = $(t).children(selector);
                if (c.length === 1) {
                    c.contents().appendTo(t);
                    c.remove();
                }
            });
        }
    });
    
    jQuery('.dropdown-menu.filter a').each(function(i) {
    	jQuery(this).click(function() {
   	
			jQuery('.container.box.showcase-wrapper').css({minHeight:'0px'});
		});
    });




	///////////////////////////
	// GET THE URL PARAMETER //
	///////////////////////////
	function getUrlVars(hashdivider)
			{
				var vars = [], hash;
				var hashes = window.location.href.slice(window.location.href.indexOf(hashdivider) + 1).split('_');
				for(var i = 0; i < hashes.length; i++)
				{
					hashes[i] = hashes[i].replace('%3D',"=");
					hash = hashes[i].split('=');
					vars.push(hash[0]);
					vars[hash[0]] = hash[1];
				}
				return vars;
			}
	////////////////////////
	// GET THE BASIC URL  //
	///////////////////////
    function getAbsolutePath() {
		    var loc = window.location;
		    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
		    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
    }

    //////////////////////////
	// SET THE URL PARAMETER //
	///////////////////////////
    function updateURLParameter(paramVal){
	    	var baseurl = window.location.pathname.split("#")[0];
	    	var url = baseurl.split("#")[0];
	    	if (paramVal==undefined) paramVal="";

	  		par='#'+paramVal;

			if (par=="#") par=" ";
		    window.location.replace(url+par);
	}

    var items = jQuery('.showcase-wrapper .items a');
    var deeplink = getUrlVars("#");

	 jQuery.ajaxSetup({
        // Disable caching of AJAX responses */
        cache: false
    });


    // FIRST ADD THE HANDLING ON THE DIFFERENT PORTFOLIO ITEMS
    items.slice(0, items.length).each(function (i) {
        var item = jQuery(this);
        item.data('index', i);

		var hashy = window.pageYOffset;


        if (jQuery.support.leadingWhitespace == false){
        	var conurl = jQuery(this).data('contenturl');
        	item.attr('href',conurl);
        } else {

				// THE HANDLING IN CASE ITEM IS CLICKED
				item.click(function () {

					hashy = window.pageYOffset;

					jQuery('.portfolio-filter.btn-group.pull-right.open').removeClass("open");

					var cur = item.data('index');
					jQuery('body').data('curPortfolio',cur);

					var hashy = window.pageYOffset;

					var grid = jQuery('.showcase-wrapper');

					// PREPARE THE CONTAINER FOR LOAD / REMOVE ITEMS
					grid.css({'minHeight':grid.outerHeight()+"px",'maxHeight':grid.outerHeight()+"px", 'position':'relative','overfow':'hidden'});
					grid.wrapInner('<div class="grid-remove"></div>');

					// REMOVE THE GRID
					var gr = grid.find('.grid-remove');
					gr.css({width:grid.outerWidth()+"px",height:grid.height()});
					gr.animate({'marginLeft':'-120%'},{duration:speed,queue:false, easing:"easeInOutCubic"});
					gr.fadeOut(speed+500);

					grid.append('<div class="grid-newcontent"></div>');
					grid.find('.grid-newcontent').fadeOut(0);
					grid.append('<div class="grid-loader"></div>');



					 //ADD A NEW CONTENT WRAPPER
					var conurl = jQuery(this).data('contenturl');
					var concon = jQuery(this).data('contentcontainer');
					updateURLParameter(conurl);

					var extraclass = "";

					clearTimeout(jQuery('body').data('minhreset'));
					// PRELOAD THE NEW ITEM
					setTimeout(function () {
						if (conurl != undefined && conurl.length > 0) {

							jQuery('.grid-newcontent').load(conurl + " " + concon, function () {

								//alert(jQuery('body,html').scrollTop()+"  "+grid.offset().top-60);
								
								jQuery('body,html').animate({
									scrollTop: (grid.offset().top-60) + "px"
								}, {
									duration: 600,
									queue: false
								});


								var gnc = grid.find('.grid-newcontent');
								gnc.fadeIn(speed2);
								//grid.animate({'maxHeight':gnc.innerHeight()+"px"});
								grid.css({'maxHeight':'none'});
								jQuery('body').data('minhreset',setTimeout(function() {
									grid.transition({'minHeight':'0px','maxHeight':'none',duration:400});
								},1500));
								setTimeout(function() {
									var callback = new Function(item.data('callback'));
									callback();
								},speed2+100);
								jQuery('.grid-loader').fadeOut(speed2)
								setTimeout(function() {
									jQuery('.grid-loader').remove();
								},speed2);
							});
						}
					}, speed + 200);



					return false;

				});
			if (i==0) {
						// SET THE BASIC BUTTON FUNCTIONS
						jQuery('.btn.back').live("click",function() {
							updateURLParameter("!");
							jQuery('.portfolio-filter.btn-group.pull-right.open').removeClass("open");

							var grid = jQuery('.showcase-wrapper');
							clearTimeout(jQuery('body').data('minhreset'));

							//alert(jQuery('body,html').scrollTop()+"  "+grid.offset().top-60);
							jQuery('body,html').animate({
								scrollTop: (grid.offset().top-60) + "px"
							}, {
								duration: 300,
								queue: false
							});

							var gr = grid.find('.grid-remove');
							grid.find('.grid-newcontent').fadeOut(speed2);
							setTimeout(function() {
								grid.find('.grid-newcontent').remove();
								grid.find('.grid-remove').find('div').first().unwrap();
								grid.transition({'minHeight':'0px',duration:300});
								var $container = $('.items').isotope('reLayout');
							},speed2+100);
							grid.css({'minHeight':gr.height()+"px", 'maxHeight':'none'});
							gr.animate({'marginLeft':'0'},{duration:speed,queue:false, easing:"easeInOutCubic"});
							gr.fadeIn(speed+800);
							setTimeout(function() {
								var $container = $('.items').isotope('reLayout');
							},100);
							return false;
						});

						jQuery('.nav-next-item').live('click',function() {
								
								var cur = jQuery('body').data('curPortfolio');
								cur = cur + 1;
								if (cur == items.length) cur = 0;

								jQuery('body').data('curPortfolio',cur);
								var nextitem;
								items.slice(cur, cur + 1).each(function (re) {
									
									nextitem = jQuery(this);
								});
								//console.log("Next Item:"+cur);
								swapContents(nextitem);
								return false;
						});

						jQuery('.nav-prev-item').live('click',function() {
								
								var cur = jQuery('body').data('curPortfolio');
								cur = cur - 1;
								if (cur < 0) cur = items.length - 1;
								jQuery('body').data('curPortfolio',cur);
								var nextitem;
								items.slice(cur, cur + 1).each(function (re) {
									
									nextitem = jQuery(this);
								});
								//console.log("Next Item:"+cur);
								swapContents(nextitem);
								return false;
						});
					}
		}
	});

	var firstfound=0;
    items.slice(0, items.length).each(function (i) {
     var item=jQuery(this);
   	 if (deeplink!=undefined && deeplink.length>0 && deeplink == jQuery(this).data('contenturl')) {
		   	 	if (firstfound==0) {

	  	 			setTimeout(function() {item.click();},2000);
	  	 			firstfound=1;
	  	 		}
    	    }
   });

	function swapContents(nextitem) {

			clearTimeout(jQuery('body').data('minhreset'));

			var grid = jQuery('.showcase-wrapper');
			var gr = grid.find('.grid-remove');

			grid.append('<div class="grid-loader"></div>');

			grid.find('.grid-newcontent').fadeOut(speed2/2);
			grid.css({'minHeight':gr.height()+"px", 'maxHeight':'none'});

			setTimeout(function() {

					//ADD A NEW CONTENT WRAPPER
					var conurl = nextitem.data('contenturl');
					var concon = nextitem.data('contentcontainer');
					updateURLParameter(conurl);



					var extraclass = "";


					if (conurl != undefined && conurl.length > 0) {

							jQuery('.grid-newcontent').load(conurl + " " + concon, function () {
								var gnc = grid.find('.grid-newcontent');
								gnc.fadeIn(speed2);
								//grid.animate({'maxHeight':gnc.innerHeight()+"px"});
								grid.css({'maxHeight':'none'});
								jQuery('body').data('minhreset',setTimeout(function() {
									grid.css({'minHeight':'auto','maxHeight':'none'});
								},2500));

								setTimeout(function() {
									var callback = new Function(nextitem.data('callback'));
									callback();
								},speed2+100);
								jQuery('.grid-loader').fadeOut(speed2)
								setTimeout(function() {
									jQuery('.grid-loader').remove();
								},speed2);
							});
						}
			},speed2+100);
	}

});
