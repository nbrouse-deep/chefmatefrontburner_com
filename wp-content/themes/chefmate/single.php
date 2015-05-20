
<?php 
	get_header(); 
	the_post(); 
	$format = get_post_format(); 
	if( false === $format || $format == 'standard' ) $format = 'image'; 
?>
<script type='text/javascript' src='/wp-content/themes/chefmate/style/js/main.js?ver=4.1'></script>

          <div <?php post_class('post'); ?>>
          	
          	<?php
	        	get_template_part( 'postformats/format', $format );
            
            ?>
            
            <div class="dark-wrapper offset">
            	<?php 
            		the_content(); 
            		wp_link_pages(); 
            	?>
          
          <?php 
          	if( comments_open() )
          		comments_template(); 
          ?>
          
    </div>
</div>
  
<?php 
	get_footer();
  ?>

