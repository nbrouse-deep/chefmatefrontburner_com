<ul class="nobullets item-details">
	<?php if( get_post_meta( $post->ID, '_cmb_the_client_date', true ) && get_theme_mod('portfolio_date', '1') == 1 ) : ?>
			<li><span><?php _e('Date','kyte'); ?>:</span> <?php echo get_post_meta( $post->ID, '_cmb_the_client_date', true ); ?></li>
	<?php endif; ?>
	<?php if( the_simple_terms() && get_theme_mod('portfolio_categories', '1') == 1 ) : ?>
			<li><span><?php _e('Categories','kyte'); ?>:</span> <?php echo the_simple_terms(); ?></li>
	<?php endif; ?>
	<?php if( get_post_meta( $post->ID, '_cmb_the_client', true ) && get_theme_mod('portfolio_client', '1') == 1 ) : ?>
			<li><span><?php _e('Client','kyte'); ?>:</span> <?php echo get_post_meta( $post->ID, '_cmb_the_client', true ); ?></li>
	<?php endif; ?>
	<?php if( get_post_meta( $post->ID, '_cmb_the_client_url', true ) && get_theme_mod('portfolio_url', '1') == 1 ) : ?>
			<li><span><?php _e('URL','kyte'); ?>:</span> <a href="<?php echo esc_url(get_post_meta( $post->ID, '_cmb_the_client_url', true )); ?>" target="_blank"><?php echo esc_url(get_post_meta( $post->ID, '_cmb_the_client_url', true )); ?></a></li>
	<?php endif; ?>
</ul>