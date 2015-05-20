<?php
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
?>

<li <?php post_class( 'item thumb ' . the_isotope_terms() ); ?>>

	<?php if( get_theme_mod('portfolio_single','0') == 1 ) : ?>
	  <a href="<?php the_permalink(); ?>">
	<?php else : ?>
      <a href="<?php echo $url[0]; ?>" data-contenturl="<?php the_permalink(); ?>" data-callback="callPortfolioScripts();" data-contentcontainer=".primary .container">
    <?php endif; ?>
      
        <div class="overlay">
          <div class="info">
            <?php the_title('<h4>','</h4>'); ?>
            <span><?php echo the_simple_terms(); ?></span>
          </div>
        </div>
        
        <?php the_post_thumbnail('index-medium'); ?>
        
      </a>
</li>