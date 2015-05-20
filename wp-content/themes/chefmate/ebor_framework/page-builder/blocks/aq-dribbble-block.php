<?php
/** A simple text block **/
class AQ_Dribbble_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Dribbble',
			'size' => 'span12',
			'resizable' => 0,
		);
		
		//create the block
		parent::__construct('aq_dribbble_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'text' => '',
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		
		<p class="description note">
			<?php _e('Use this block to add a dribbble feed to your page.', 'kyte') ?>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Dribbble Username
				<?php echo aq_field_input('text', $block_id, $text, $size = 'full') ?>
			</label>
		</p>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		$number = wp_rand(0,10000);
		
		echo '<ul id="'.$number.'" class="shots thumbs"></ul>';
		
		$script_data = array( 
			'username' => $text,
			'number' => $number
		);
		wp_localize_script( 'ebor-scripts', 'dribbble', $script_data );

	}
	
}