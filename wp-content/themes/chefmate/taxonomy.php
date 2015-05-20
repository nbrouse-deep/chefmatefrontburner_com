<?php 
	get_header(); 
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
	$categories = get_categories('taxonomy=portfolio-category&child_of='.get_queried_object()->term_id);
?>

<div class="dark-wrapper offset">

	<?php ebor_section_title( get_theme_mod('portfolio_title','Our Portfolio') . ' - ' . $term->name ); ?>

	<div id="portfolio-archive" class="container showcase-wrapper">
	  <div class="inner">
	  
			<?php
				if( is_tax() && get_categories('taxonomy=portfolio-category&child_of='.get_queried_object()->term_id) ){
					
					echo '<ul class="filter"><li><a class="active" href="#" data-filter="*">'.__('All','kyte').'</a></li>';
					echo '<li><a href="#" data-filter=".'.get_queried_object()->slug.'">'.get_queried_object()->name.'</a></li>';
					
					foreach ($categories as $category){
						echo '<li><a href="#" data-filter=".' . $category->slug . '">' . $category->name . '</a></li>';
					}
					
					echo '</ul>';
				}
			?>
			
			<ul class="items thumbs">
			
				<?php 
					if( have_posts() ) : while( have_posts() ) : the_post();
						get_template_part('loop/loop', get_option('portfolio_layout','portfolioshowcase') );
					endwhile; 
					endif; 
				?>
			
			</ul>
	    
	   </div>
	 </div>
	 
</div>
 
<?php 
	get_footer();