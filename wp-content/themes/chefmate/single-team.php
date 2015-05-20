<?php 
	get_header(); 
	the_post(); 
?>

<div class="dark-wrapper offset">
  
    <?php ebor_section_title( get_theme_mod('team_title','Team') ); ?>
    
    <div class="container inner">
      <div class="row classic-blog">
        <div class="span8 content wide">
          <div <?php post_class('post'); ?>>
          	
          	<?php 
          		the_post_thumbnail('full');
          		get_template_part('loop/post', 'meta');
            	the_title('<h1 class="post-title">', '</h1>'); 
            ?>
            
            <div class="content-wrapper">
            	<?php 
            		the_content(); 
            		wp_link_pages(); 
            	?>
            </div>

          </div>
        </div>
        
        <?php get_sidebar(); ?>
        
      </div>
    </div>
</div>
  
<?php 
	get_footer();