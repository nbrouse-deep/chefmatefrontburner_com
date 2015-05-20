<?php
/** "Clear" block 
 * 
 * Clear the floats vertically
 * Optional to use horizontal lines/images
**/
class AQ_Clear_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Clear',
			'size' => 'span12',
			'resizable' => 0
		);
		
		//create the block
		parent::__construct('aq_clear_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'horizontal_line' => 'none',
			'line_color' => '#353535',
			'pattern' => '1',
			'height' => ''
		);
		
		$line_options = array(
			'none' => 'None 0px',
			'none-30' => 'None 30px',
			'none-70' => 'None 70px',
			'none-100' => 'None 100px',
			'hr' => 'Horizontal Rule',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<p class="description note">
			<?php _e('Use this block to clear the floats between two or more separate blocks vertically.', 'kyte') ?>
		</p>
		<p class="description fourth">
			<label for="<?php echo $this->get_field_id('line_color') ?>">
				Pick a horizontal line<br/>
				<?php echo aq_field_select('horizontal_line', $block_id, $line_options, $horizontal_line, $block_id); ?>
			</label>
		</p>
		<?php
		
	}
	
	function block($instance) {
		extract($instance);
		
		switch($horizontal_line) {
			case 'none':
				echo '<div class="clear"></div>';
				break;
			case 'none-30':
				echo '<div class="clear thirtypx"></div>';
				break;
			case 'none-70':
				echo '<div class="clear seventypx"></div>';
				break;
			case 'none-100':
				echo '<div class="clear hundredpx"></div>';
				break;
			case 'hr':
				echo '<div class="clear"></div><hr class="span12" />';
				break;
		}
		
	}
	
}