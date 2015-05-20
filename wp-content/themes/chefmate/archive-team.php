<?php 
	get_header(); 
?>

<section id="blog" class="dark-wrapper offset">

  <?php ebor_section_title( get_theme_mod('team_title','Team') ); ?>

  <div class="container inner">
  
    <div class="row text-center">

      <?php 
      	$i = 0; 
      	if( have_posts() ) : while( have_posts() ) : the_post(); 
      	$i++; 
      	
      		get_template_part('loop/team','content');
      	
      		if( $i % get_theme_mod('team_columns','3') == 0 ) echo '<div class="divide60 clearfix" style="clear: both;"></div>';
      	
      	endwhile; 
      	endif; 
      ?>
      
    </div>
    
  </div>
  
</section>

<?php 
	get_footer();