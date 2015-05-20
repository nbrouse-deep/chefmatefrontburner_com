<?php 
	get_header(); 
	the_post(); 
	$format = get_post_format(); 
	if( false === $format || $format == 'standard' ) $format = 'image'; 
?>

          <div <?php post_class('post'); ?>>
          	
          	<?php
	        	get_template_part( 'postformats/format', $format );
            
            ?>
            
            <div class="dark-wrapper menu-ideas offset">
            	<?php 
            		the_content(); 
            		wp_link_pages(); 
            	?>
            </div>
            
            <?php 
            	if( get_theme_mod('single_tags','1') == 1 )
            		the_tags( '<div class="tags">' . __('<span class="rp5">Tags:</span> ','kyte'), ', ', '</div>');
            ?>

          </div>
          
          <?php 
          	if( comments_open() )
          		comments_template(); 
          ?>
          
    </div>
</div>
  
<?php 
	get_footer();