<?php

class AQ_Portfolio_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Portfolio',
			'size' => 'span12',
			'resizable' => 0
		);
		
		//create the block
		parent::__construct('aq_portfolio_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array( 
			'display_type' => 'showcase',
			'text' => '',
			'filter' => 'all'
		);
		
		$display_options = array(
			'showcase' => 'Showcase Portfolio',
			'lightbox' => 'Lightbox Portfolio'
		);
		
		$args = array(
			'orderby'                  => 'name',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
			'taxonomy'                 => 'portfolio-category'
			); 
			
		$filter_options = get_categories( $args );

		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<p class="description note">
			<?php _e('This block will output all of your Portfolio posts.', 'kyte') ?>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Content Above Portfolio (optional)
				<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description fourth">
			<label for="<?php echo $this->get_field_id('display_type') ?>">
				Pick portfolio display type<br/>
				<?php echo aq_field_select('display_type', $block_id, $display_options, $display_type, $block_id); ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('filter') ?>">
				<?php _e('Pre-filter this block to a portfolio-category? (Optional)', 'kyte'); ?><br/>
				<?php echo tommus_field_select('filter', $block_id, $filter_options, $filter) ?>
			</label>
		</p>
		
		<?php
		
	}
	
	function block($instance) {
		extract($instance);
		
	$block_id = '';
	$block_id = wp_rand(0,10000);
	if(!( isset($text) ))
		$text = false;

	if($display_type == 'showcase') : 
	
		if($filter == 'all' || $filter == false){
			if( get_theme_mod('portfolio_single','0') == 1 ){
				$paged = (get_query_var('page')) ? get_query_var('page') : 1;
				$portfolio_query = new WP_Query('post_type=portfolio&posts_per_page='.get_option('portfolio_posts_per_page','20').'&paged='.$paged);
			} else {
				$portfolio_query = new WP_Query('post_type=portfolio&posts_per_page=-1');
			}
		} else {
			$portfolio_query = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => -1, 'tax_query' => array(
					array(
						'taxonomy' => 'portfolio-category',
						'field' => 'id',
						'terms' => $filter
					)
				) ) );	
		}
	?>
		
	    <div id="<?php echo $block_id . '_showcase'; ?>" class="container showcase-wrapper">
	      <div class="inner">
	        <?php 
	        	if($title) echo '<p class="lead">'.$title.'</p>'; 
	        	echo wpautop(do_shortcode(htmlspecialchars_decode($text)));
	        ?>
	        <div class="divide30"></div>
	        
	        <?php 
	        	if($filter == 'all' || $filter == false) :
	        	
	        		get_template_part('loop/loop','filters');
	        		
	        	elseif( get_categories('taxonomy=portfolio-category&child_of='.$filter) ) :
	        	
		        	$object = get_term_by('id', $filter, 'portfolio-category');
		        	
		        	echo '<ul class="filter"><li><a class="active" href="#" data-filter="*">'.__('All','kyte').'</a></li>';
		        	echo '<li><a href="#" data-filter=".'.$object->slug.'">'.$object->name.'</a></li>';
		        	
		        	$categories = get_categories('taxonomy=portfolio-category&child_of='.$filter);
		        	foreach ($categories as $category){
		        		echo '<li><a href="#" data-filter=".' . $category->slug . '">' . $category->name . '</a></li>';
		        	}
		        	
		        	echo '</ul>';
	        	
	        	endif; 
	        ?>
	        
	        <ul class="items thumbs">
	        
		        <?php 
		        	if( $portfolio_query->have_posts() ) : while( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); 
		        	global $post;
		        	
		        	get_template_part('loop/loop','portfolioshowcase');
		        	
		        	endwhile; 
		        	endif; 
		        ?>
	          
	        </ul>
	        
	        <?php 
	        	ebor_load_more($portfolio_query->max_num_pages);
	        	wp_reset_query(); 
	        ?>
	        
	       </div>
	     </div><!--/.container--> 
	     
	     <script type="text/javascript">
	     <?php if( get_theme_mod('portfolio_single','0') == 0 ) : ?>
	     
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
	        	
	     			jQuery('.container.box#<?php echo $block_id . '_showcase'; ?>').css({minHeight:'0px'});
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
	     
	     
	         var items = jQuery('#<?php echo $block_id . '_showcase'; ?> .item a');
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
	     
	     					var grid = jQuery('#<?php echo $block_id . '_showcase'; ?>');
	     
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
	     						jQuery('#<?php echo $block_id . '_showcase'; ?> .btn.back').live("click",function() {
	     							updateURLParameter("!");
	     							jQuery('.portfolio-filter.btn-group.pull-right.open').removeClass("open");
	     
	     							var grid = jQuery('#<?php echo $block_id . '_showcase'; ?>');
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
	     
	     						jQuery('#<?php echo $block_id . '_showcase'; ?> .nav-next-item').live('click',function() {
	     								
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
	     
	     						jQuery('#<?php echo $block_id . '_showcase'; ?> .nav-prev-item').live('click',function() {
	     								
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
	     
	     			var grid = jQuery('#<?php echo $block_id . '_showcase'; ?>');
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
	     <?php endif; ?>
	     
	     	jQuery(document).ready(function ($) {
	     	    var $container = $('#<?php echo $block_id . '_showcase'; ?> .items');
	     	    $container.imagesLoaded(function () {
	     	        $container.isotope({
	     	            itemSelector: '#<?php echo $block_id . '_showcase'; ?> .item',
	     	            layoutMode: 'fitRows'
	     	        });
	     	    });
	     	
	     	    $('#<?php echo $block_id . '_showcase'; ?> .filter li a').click(function () {
	     	
	     	        $('#<?php echo $block_id . '_showcase'; ?> .filter li a').removeClass('active');
	     	        $(this).addClass('active');
	     	
	     	        var selector = $(this).attr('data-filter');
	     	        $container.isotope({
	     	            filter: selector
	     	        });
	     	
	     	        return false;
	     	    });
	     	    
	     	    $('#<?php echo $block_id . '_showcase'; ?> .load-more li').first().slideDown();
	     	    
	     	    $('#<?php echo $block_id . '_showcase'; ?> .load-more li a').click(function(){
	     	    	var $this = $(this);
	     	    	$this.css({ 'pointer-events' : 'none' }).html('<div class="loader-wrapper"><img src="'+image_path.image_path+'loading.gif" /></div>');
	     	    	
	     	    		var url = $(this).attr('href');
	     	    		var $wrapper = $('#<?php echo $block_id . '_showcase'; ?> .items');
	     	    		
	     	    		$.get(url, function(data){
	     	    			var filtered = jQuery(data).find('.items li');
	     	    			filtered.imagesLoaded(function(){
	     	    				$('a', filtered).each(function(){
	     	    					var url = $(this).attr('data-contenturl');
	     	    					$(this).attr({
	     	    						'href' : url
	     	    					});
	     	    				});
	     	    				$wrapper.isotope('insert', filtered, function(){
	     	    					$(window).trigger( 'smartresize' );
	     	    					$(window).trigger( 'resize' );
	     	    					$this.parent().slideUp(function(){
	     	    						$this.parent().next().slideDown();
	     	    					});
	     	    				});
	     	    			});
	     	    		});
	     	    		
	     	    	return false;
	     	    });
	     	    
	     	});
	     
	     </script>
	     
	<?php else : 
	
		if($filter == 'all' || $filter == false){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			$portfolio_query = new WP_Query('post_type=portfolio&posts_per_page='.get_option('portfolio_posts_per_page','20').'&paged='.$paged);
		} else {
			$portfolio_query = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => -1, 'tax_query' => array(
					array(
						'taxonomy' => 'portfolio-category',
						'field' => 'id',
						'terms' => $filter
					)
				) ) );	
		}
	?>
		<div id="<?php echo $block_id . '_lightbox'; ?>" class="container">
		  <div class="inner">
		    <?php if($title) echo '<p class="lead">'.$title.'</p>'; ?>
		    <div class="divide30"></div>
		    
		    <?php if($filter == 'all' || $filter == false) : ?>
		        <ul class="filter">
		          <li><a class="active" href="#" data-filter="*"><?php _e('All','kyte'); ?></a></li>
		          <?php 
		          	$categories = get_categories('taxonomy=portfolio-category');
	          		foreach ($categories as $category){
	          			echo '<li><a href="#" data-filter=".' . $category->slug . '">' . $category->name . '</a></li>';
	          		} 
		          ?>
		        </ul>
		        <!-- /.filter -->
		    <?php elseif( get_categories('taxonomy=portfolio-category&child_of='.$filter) ) :
		    	
		    	$object = get_term_by('id', $filter, 'portfolio-category');
		    	
		    	echo '<ul class="filter"><li><a class="active" href="#" data-filter="*">'.__('All','kyte').'</a></li>';
		    	echo '<li><a href="#" data-filter=".'.$object->slug.'">'.$object->name.'</a></li>';
		    	
		    	$categories = get_categories('taxonomy=portfolio-category&child_of='.$filter);
		    	foreach ($categories as $category){
		    		echo '<li><a href="#" data-filter=".' . $category->slug . '">' . $category->name . '</a></li>';
		    	}
		    	
		    	echo '</ul>';
		    	
		    endif; ?>
		    
		    <ul class="items thumbs">
		    
			    <?php 
			    	if( $portfolio_query->have_posts() ) : while( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); 
			    	global $post;
			    	
			    	get_template_part('loop/loop', 'portfoliolightbox');
			    	
			    	endwhile; 
			    	endif; 
			    ?>
		      
		    </ul>
		    
		    <?php 
		    	ebor_load_more($portfolio_query->max_num_pages); 
		    	wp_reset_query(); 
		    ?>
		    
		   </div>
		 </div><!--/.container--> 
		 <script type="text/javascript">
		 
		 	jQuery(document).ready(function ($) {
		 	    var $container = $('#<?php echo $block_id . '_lightbox'; ?> .items');
		 	    $container.imagesLoaded(function () {
		 	        $container.isotope({
		 	            itemSelector: '#<?php echo $block_id . '_lightbox'; ?> .item',
		 	            layoutMode: 'fitRows'
		 	        });
		 	    });
		 	
		 	    $('#<?php echo $block_id . '_lightbox'; ?> .filter li a').click(function () {
		 	
		 	        $('#<?php echo $block_id . '_lightbox'; ?> .filter li a').removeClass('active');
		 	        $(this).addClass('active');
		 	
		 	        var selector = $(this).attr('data-filter');
		 	        $container.isotope({
		 	            filter: selector
		 	        });
		 	
		 	        return false;
		 	    });
		 	    
		 	    $('#<?php echo $block_id . '_lightbox'; ?> .load-more li').first().slideDown();
		 	    
		 	    $('#<?php echo $block_id . '_lightbox'; ?> .load-more li a').click(function(){
		 	    	var $this = $(this);
		 	    	$this.css({ 'pointer-events' : 'none' }).html('<div class="loader-wrapper"><img src="'+image_path.image_path+'loading.gif" /></div>');
		 	    	
		 	    		var url = $(this).attr('href');
		 	    		var $wrapper = $('#<?php echo $block_id . '_lightbox'; ?> .items');
		 	    		
		 	    		$.get(url, function(data){
		 	    			var filtered = jQuery(data).find('.items li');
		 	    			new View( $('a', filtered) );
		 	    			filtered.imagesLoaded(function(){
		 	    				$wrapper.isotope('insert', filtered, function(){
		 	    					$(window).trigger( 'smartresize' );
		 	    					$(window).trigger( 'resize' );
		 	    					$this.parent().slideUp(function(){
		 	    						$this.parent().next().slideDown();
		 	    					});
		 	    				});
		 	    			});
		 	    		});
		 	    		
		 	    	return false;
		 	    });
		 	});
		 
		 </script>
	<?php endif;
		
	}
	
}