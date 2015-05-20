<?php
	/*
	Template Name: Parent Page
	*/
	get_header(); 
	the_post(); 
?>

<section id="home" class="offset">
	
	<?php if( get_the_content() ) : ?>
	  <div class="dark-wrapper offset">
	  
	    <?php ebor_section_title( get_the_title() ); ?>
	    
	    <div class="container inner">
	      <div class="row">
	      
	      	<?php the_content(); ?>
	        
	      </div>
	      
	    </div><!-- /.container --> 
	  </div><!-- /.dark-wrapper -->
  	<?php endif; ?>
  
</section>

<?php 
	get_template_part('loop/loop', 'page');
	get_footer();