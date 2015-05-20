<?php
	/*
	Template Name: Portfolio
	*/
	
	if( get_theme_mod('redirect_children','1') == 1 ){
	
		global $post;
		
		if ( is_page() && $post->post_parent ) {
			wp_safe_redirect( home_url() . '#' . sanitize_title($post->post_title) ); exit;
		}
	
	}
	
	get_header(); 
	the_post(); 
?>

  <div class="dark-wrapper offset">
  
    <?php 
    	ebor_section_title( get_the_title() );
    	the_content(); 
    ?>
        
  </div><!-- /.dark-wrapper -->
  
<?php 
	get_footer();