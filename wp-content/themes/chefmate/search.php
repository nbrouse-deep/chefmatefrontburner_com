<?php 
	get_header();
	global $wp_query;
	$total_results = $wp_query->found_posts; 
?>

<section id="blog" class="dark-wrapper offset">

  <div class="section-head">
    <div class="container">
      <h1>
      	<?php 
			_e('Your Search For: ','kyte'); 
			the_search_query();
			_e( ' - Returned: ', 'kyte' ); 
			echo $total_results; 
			( $total_results == '1' ) ? _e(' Item','kyte') : _e(' Items','kyte'); 
      	 ?>
      </h1>
    </div>
  </div>

  <div class="container inner">
  
    <div class="row grid-blog">

      <?php 
      	if( have_posts() ) : while( have_posts() ) : the_post(); 
      ?>
      	    
  	      <div id="post-<?php the_ID(); ?>" <?php post_class('post span4'); ?>>
  	      
  	        <figure class="overlay">
  		        <a href="<?php the_permalink(); ?>">
  			        <?php 
  			        	the_post_thumbnail('index'); 
  			        ?>
  		        </a>
  	        </figure>
  	        
  	        <?php 
  	        	get_template_part('loop/post', 'meta'); 
  	        ?>
  	        
  	        <div class="post-content">
  	          <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
  	          <?php the_excerpt(); ?>
  	        </div>
  
  	      </div>
  	      
  	    <?php 
  	    	endwhile; 
  	    	endif; 
  	    ?>
      
    </div>
    
  </div>
  
</section>

<?php 
	get_footer();