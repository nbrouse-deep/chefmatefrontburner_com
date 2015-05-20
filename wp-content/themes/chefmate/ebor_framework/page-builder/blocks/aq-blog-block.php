<?php

class AQ_Blog_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Blog',
			'size' => 'span12',
			'resizable' => 0
		);
		
		//create the block
		parent::__construct('aq_blog_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'title' => 6
		);

		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<p class="description note">
			<?php _e('This block will output all of your Blog posts.', 'kyte') ?>
		</p>
		
		<?php
		
	}
	
	function block($instance) {
		extract($instance); ?>

    <div class="grid-blog">
    
    <?php 
    	$paged = (get_query_var('page')) ? get_query_var('page') : 1;
    	$blog_query = new WP_Query('post_type=post&paged=' . $paged);
   		if( $blog_query->have_posts() ) : while( $blog_query->have_posts() ) : $blog_query->the_post(); 
   		global $post; 
   	?>
	    
	      <div class="post span4">
	      
	        <figure class="overlay">
		        <a href="<?php the_permalink(); ?>">
			        <?php the_post_thumbnail('index'); ?>
		        </a>
	        </figure>
	        
	        <?php get_template_part('loop/post', 'meta'); ?>
	        
	        <div class="post-content">
	          <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	          <?php the_excerpt(); ?>
	        </div>

	      </div>
	      
	    <?php 
	    	endwhile; 
	    	endif;
	    ?>
    
    </div>
    
	<div class="clear"></div>
	
	<div class="span12">
		<?php 
			(function_exists('kriesi_pagination')) ? kriesi_pagination($blog_query->max_num_pages) : posts_nav_link();
			wp_reset_query(); 
		?>
	</div>
		
	<?php }
	
}