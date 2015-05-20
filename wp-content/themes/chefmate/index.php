<?php 
	get_header(); 
?>

<section id="blog" class="dark-wrapper offset">
  
  <?php ebor_section_title( get_theme_mod('blog_title','Our Journal') ); ?>

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
    
    <?php 
    	(function_exists('kriesi_pagination')) ? kriesi_pagination() : posts_nav_link(); 
    ?>
    
  </div>
  
</section>

<?php 
	get_footer();