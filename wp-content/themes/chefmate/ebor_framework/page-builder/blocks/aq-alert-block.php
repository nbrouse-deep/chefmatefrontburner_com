<?php
/** Notifications block **/

if(!class_exists('AQ_Alert_Block')) {
	class AQ_Alert_Block extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Alerts',
				'size' => 'span6',
			);
			
			//create the block
			parent::__construct('aq_alert_block', $block_options);
		}
		
		function form($instance) {
			
			$defaults = array(
				'content' => '',
				'type' => '',
				'format' => 'dismiss',
				'responsive_first' => 0
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			$type_options = array(
				'' => 'Standard',
				'alert-error' => 'Error',
				'alert-success' => 'Success',
				'alert-info' => 'Info'
			);
			
			$format_options = array(
				'standard' => 'Standard Alert',
				'dismiss' => 'Alert with Dismiss'
			);
			
			?>
			
			<p class="description note">
				<?php _e('Use this to add a fixed, or dismissable alert to your page.', 'kyte') ?>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title (optional)<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('content') ?>">
					Alert Text (required)<br/>
					<?php echo aq_field_textarea('content', $block_id, $content) ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('type') ?>">
					Alert Type<br/>
					<?php echo aq_field_select('type', $block_id, $type_options, $type) ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('format') ?>">
					Alert Format<br/>
					<?php echo aq_field_select('format', $block_id, $format_options, $format) ?>
				</label>
			</p>

			<?php
			
		}
		
		function block($instance) {
			extract($instance);
				switch($format) {
					case 'standard':
							echo '<div class="alert '.$type.' '.$size.'">';
							if($title) echo '<strong>' . $title . '</strong> ';
							echo do_shortcode(htmlspecialchars_decode($content));
							echo '</div>';
						break;
					case 'dismiss':
							echo '<div class="alert '.$type.' '.$size.'">';
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
							if($title) echo '<strong>' . $title . '</strong> ';
							echo do_shortcode(htmlspecialchars_decode($content));
							echo '</div>';;
						break;
				}

		}
		
	}
}