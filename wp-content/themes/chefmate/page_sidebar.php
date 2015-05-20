<?php
	/*
	Template Name: Page With Sidebar
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
  
    <?php ebor_section_title( get_the_title() ); ?>
    
    <div class="container inner">
      <div class="row classic-blog">
        <div class="span8 content wide">
          <div <?php post_class('post'); ?>>
          	
          	<?php the_title('<h1 class="post-title">', '</h1>'); ?>
            <div class="content-wrapper">
            	<?php 
            		the_content(); 
            		wp_link_pages(); 
            	?>
            </div>

          </div>
          
        </div>
        
        <?php 
        	get_sidebar('page'); 
        ?>
        
      </div><!--/.row--> 
    </div><!-- /.container --> 
</div><!-- /.dark-wrapper -->
  
<?php 
	get_footer();