<?php

class AQ_Map_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Map',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_map_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'address' => '',
			'responsive_first' => 0,
			'marker' => '',
			'text' => ''
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('address') ?>">
				<?php _e('Address, enter as plain text, i.e: York, England', 'kyte'); ?>
				<?php echo aq_field_input('address', $block_id, $address, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('marker') ?>">
				<?php _e('Upload a map marker image (optional)', 'kyte'); ?>
				<?php echo aq_field_upload('marker', $block_id, $marker, $media_type = 'image') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('responsive_first') ?>">
				<?php _e('First block in row, or full-width?', 'kyte'); ?><br/>
				<?php echo aq_field_checkbox('responsive_first', $block_id, $responsive_first) ?>
			</label>
		</p>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		if( $responsive_first == 1 ){
			$responsive_first = ' builder-column column-first';
		} else {
			$responsive_first = ' builder-column';
		}
		
		echo '<div class="' . $size . $responsive_first . '">';
		echo '<div class="map" id="'.$block_id.'-map"></div>';
		echo '</div>';
		
		echo "
			<script type='text/javascript'>
			/*-----------------------------------------------------------------------------------*/
			/*	MAP
			/*-----------------------------------------------------------------------------------*/
			jQuery(document).ready(function($){
			'use strict';
			
				jQuery('#".$block_id."-map').goMap({ address: '".$address."',
				    		  zoom: 14,
				    		  mapTypeControl: false,
				    		  maptype: 'ROADMAP',
				    	      draggable: false,
				    	      scrollwheel: false,
				    	      streetViewControl: false,
						    	markers: [
						    		{ 'address' : '".$address."' }
						    	],
							  icon: '".$marker."', 
				   			   addMarker: false
					});
			
			});
			</script>
		";

	}
	
}