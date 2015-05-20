<?php 
	/**
	 * Get team members width by theme option setting
	 */
	if( get_theme_mod('team_columns','3') == '3' ){
		 $width = 'span4';
	} elseif ( get_theme_mod('team_columns','3') == '4' ) {
		$width = 'span3'; 
	} else {
		$width = 'span6';
	} 
	
	$before = '<h4>';
	$after = '</h4>';
	
	if( get_theme_mod('team_link','0') == '1' ){
		$before = '<h4><a href="'. get_permalink() .'">';
		$after = '</a></h4>';
	}
?> 

<div <?php post_class($width.' post'); ?>>

	<?php the_post_thumbnail('team', array('class' => 'round small')); ?>
	
	<div class="divide25"></div>
	
	<div class="box arrow">
		<?php the_title($before, $after); ?>
		<h6 class="light"><?php echo get_post_meta( $post->ID, '_cmb_the_job_title', true ); ?></h6>
		<div class="divide10"></div>
		
		<?php the_content(); ?>
		<div class="divide5"></div>
		
		<?php get_template_part('loop/loop','social'); ?>
	</div>
	
</div>