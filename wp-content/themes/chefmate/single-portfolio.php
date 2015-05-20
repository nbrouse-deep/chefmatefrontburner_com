<?php 
	if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') :

		get_header('single'); 
		the_post(); 
		
		get_template_part('loop/portfolio','content'); 
		
		get_footer('single'); 
	
	else : 

		get_header(); 
		the_post(); 
?>

			<div class="light-wrapper offset">
			
				<?php ebor_section_title( get_theme_mod('portfolio_title','Our Portfolio') ); ?>
				
					<div class="container inner">
					
						<?php 
							get_template_part('loop/portfolio','content'); 
						?>
					
					</div>
			</div>
	  
<?php 
		get_footer(); 
	endif;