<?php
	/*
	Template Name: Parallax
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

  <div class="light-wrapper offset">
  
    <?php ebor_section_title( get_the_title() ); ?>
    
    <div class="container inner">
      <div class="row">
      
      	<?php 
      		the_content(); 
      	?>
        
      </div>
      
    </div><!-- /.container --> 
  </div><!-- /.dark-wrapper -->
<?php 
	get_footer();