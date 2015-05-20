<?php 
	$format = get_post_format(); 
	if( false === $format || $format == 'standard' )
		$format = 'image';
	
	if( get_post_meta( $post->ID, '_cmb_layout_checkbox', true ) !=='on' ) :
	
		get_template_part( 'postformats/format', $format );
		the_title('<h3>', '</h3>'); 
?>
	
		<div class="row">
		
			<div class="span8">
			  <?php the_content(); ?>
			</div>
			
			<div class="span4 lp20">
			
			  <?php get_template_part('loop/portfolio','meta'); ?>
			  
			  <div class="divide10"></div>
			  
			  <?php get_template_part('loop/loop','social'); ?>
			  
			</div>
			
		</div>
			
<?php else : ?>
	
	<div class="row">
		
		<div class="span8">
		  <?php get_template_part( 'postformats/format', $format ); ?>
		</div>
		<!-- /.span8 --> 
		<div class="span4 lp20">
		  <?php the_title('<h3>', '</h3>'); ?>
		  <?php the_content(); ?>
		  <div class="divide10"></div>
		  
		  <?php get_template_part('loop/portfolio','meta'); ?>
		  
		  <div class="divide10"></div>
		  <?php get_template_part('loop/loop','social'); ?>
		</div>
			
	</div><!-- /.row --> 
	
<?php endif; ?>