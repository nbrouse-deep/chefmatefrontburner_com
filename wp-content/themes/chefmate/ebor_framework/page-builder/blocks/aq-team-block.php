<?php

class AQ_Team_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Team',
			'size' => 'span12',
			'resizable' => 0
		);
		
		//create the block
		parent::__construct('aq_team_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array();

		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<p class="description note">
			<?php _e('This block will output all of your Team Member posts.', 'kyte') ?>
		</p>
		<?php
		
	}
	
	function block($instance) {
		extract($instance);
		
		echo '<div class="text-center">';
		
			$team_query = new WP_Query('post_type=team&posts_per_page=-1'); $i = 0;
			if( $team_query->have_posts() ) : while( $team_query->have_posts() ) : $team_query->the_post(); global $post; $i++;
			
				get_template_part('loop/team','content');
				if( $i % get_theme_mod('team_columns','3') == 0 ) echo '<div class="divide60 clearfix" style="clear: both;"></div>';
					
			endwhile; endif; wp_reset_query();
				
		echo '</div><div class="divide20"></div>';
		
	}
	
}