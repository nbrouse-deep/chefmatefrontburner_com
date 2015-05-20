<?php
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
	
	( get_theme_mod('lightbox_title','1') == 1 ) ? $title = 'title="'. get_the_title() .'"' : $title = '';
?>

<li <?php post_class( 'item thumb ' . the_isotope_terms() ); ?>>
      <a href="<?php echo $url[0]; ?>" class="view" data-rel="lightbox" <?php echo $title; ?> data-contenturl="<?php the_permalink(); ?>" data-callback="callPortfolioScripts();" data-contentcontainer=".primary .container">
      
        <div class="overlay">
          <div class="info">
            <?php the_title('<h4>','</h4>'); ?>
            <span><?php echo the_simple_terms(); ?></span>
          </div>
        </div>
        
        <?php the_post_thumbnail('index-medium'); ?>
        
      </a>
</li>