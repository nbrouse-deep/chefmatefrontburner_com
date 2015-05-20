<?php
	/*
	Template Name: Homepage
	*/
	get_header(); 
	the_post(); 
	
	if( get_theme_mod('full_home','1') == 1 ) : 
?>

	  <section id="home" class="offset">
	    <?php the_content(); ?>
	  </section>
  
<?php 
	else : 
?> 

		<section id="home" class="offset">
		
			<?php if( get_the_content() ) : ?>
			  <div class="dark-wrapper offset">
			  
			    <?php ebor_section_title( get_the_title() ); ?>
			    
			    <div class="container inner">
			      <div class="row">
			      
			      	<?php the_content(); ?>
			        
			      </div>
			    </div>
			    
			  </div>
			<?php endif; ?>
		
		</section>

<?php 
	endif;
	
	get_template_part('loop/loop', 'page');
	get_footer();