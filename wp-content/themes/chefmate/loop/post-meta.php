<?php 
	( is_single() ) ? $meta_location = 'single_' : $meta_location = 'index_';
?>

<div class="meta">
  <div class="pull-left">
  
  	<?php if( get_theme_mod($meta_location . 'date', '1') == 1 ) : ?>
    	<div class="date"><?php the_time(get_option('date_format')); ?></div>
    <?php endif; ?>
    
    <?php if( get_theme_mod($meta_location . 'categories', '1') == 1 && has_category() ) : ?>
    	<div class="sep">|</div><div class="categories"><?php the_category(', '); ?></div>
    <?php endif; ?>
    
  </div>
  
  <?php if( get_theme_mod($meta_location . 'likes', '1') == 1 && function_exists('zilla_likes') ) : ?>
	  <div class="pull-right">
	  	<?php zilla_likes(); ?>
	  </div>
  <?php endif; ?>
  
</div>