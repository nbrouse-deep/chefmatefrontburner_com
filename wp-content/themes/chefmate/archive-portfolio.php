<?php 
	get_header(); 
?>

<div class="dark-wrapper offset">

  <?php ebor_section_title( get_theme_mod('portfolio_title','Our Portfolio') ); ?>

	<div id="portfolio-archive" class="container showcase-wrapper">
	  <div class="inner">
	    
	    <?php get_template_part('loop/loop','filters'); ?>
	    
	    <ul class="items thumbs">
	    
		    <?php 
		    	if( get_theme_mod('portfolio_single','0') == 1 || get_option('portfolio_layout','portfolioshowcase') == 'portfoliolightbox' ){
		    		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		    		$portfolio_query = new WP_Query('post_type=portfolio&posts_per_page='.get_option('portfolio_posts_per_page','20').'&paged='.$paged);
		    	} else {
		    		$portfolio_query = new WP_Query('post_type=portfolio&posts_per_page=-1');
		    	}
		    	
		    	if( $portfolio_query->have_posts() ) : while( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); global $post;
		    	
		    		get_template_part('loop/loop', get_option('portfolio_layout','portfolioshowcase') ); 
		    	
		    	endwhile;
		    	endif;
		    ?>
	      
	    </ul>
	    
	    <?php 
	    	if( get_theme_mod('portfolio_single','0') == 1 || get_option('portfolio_layout','portfolioshowcase') == 'portfoliolightbox' )
		    	ebor_load_more(); 
	    ?>
	    
	   </div>
	 </div><!--/.container--> 
	 
</div>
 
<?php 
	get_footer();