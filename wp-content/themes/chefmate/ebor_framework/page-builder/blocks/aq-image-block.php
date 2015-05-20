<?php
/** A simple text block **/
class AQ_Image_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Image',
			'size' => 'span3',
			'link' => ''
			//'resizable' => 0,
		);
		
		//create the block
		parent::__construct('aq_image_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'image' => ''
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		
		<p class="description note">
			<?php _e('Use this block to add images to your page. Grab the edge of the block to resize to your needs.', 'kyte') ?>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('image') ?>">
				<?php _e('Upload an Image? (Required)', 'kyte'); ?>
				<?php echo aq_field_upload('image', $block_id, $image, $media_type = 'image') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('link') ?>">
				Link (optional)
				<?php echo aq_field_input('link', $block_id, $link, $size = 'full') ?>
			</label>
		</p>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);

		echo '<div class="' . $size . ' rp10">';
		
		if( $link )
			echo '<a href="'. esc_url($link) .'">';
			
		echo '<img src="'.$image.'" alt="'.$block_id.'-image" />';
		
		if( $link )
			echo '</a>';
			
		echo '</div>';

	}
	
}