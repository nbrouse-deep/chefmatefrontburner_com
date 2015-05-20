<?php

	class AQ_Testimonials_Block extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Testimonials',
				'size' => 'span12',
				'resizable' => 0
			);
			
			//create the block
			parent::__construct('aq_testimonials_block', $block_options);
			
			//add ajax functions
			add_action('wp_ajax_aq_block_testimonial_add_new', array($this, 'add_testimonial'));
		}
		
		function form($instance) {
			
			$defaults = array(
				'title' => '5000',
				'tabs' => array(
					1 => array(
						'title' => __('Testimonial','kyte'),
						'content' => ''
					)
				),
				'responsive_first' => 0
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			
			<p class="description note">
				<?php _e('Use this block to add client testimonials to your page. Grab the edge of the block to resize to your needs.', 'kyte') ?>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Animation Speed (Milliseconds) e.g 5000
					<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
				</label>
			</p>

			<div class="description cf">
					<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
						<?php
						$tabs = is_array($tabs) ? $tabs : $defaults['tabs'];
						$count = 1;
						foreach($tabs as $tab) {	
							$this->tab($tab, $count);
							$count++;
						}
						?>
					</ul>
					<p></p>
					<a href="#" rel="testimonial" class="aq-sortable-add-new button"><?php _e('Add New', 'kyte'); ?></a>
					<p></p>
				</div>
			
				<?php
			}
			
			function tab($tab = array(), $count = 0) {
					
				?>
				<li id="<?php echo $this->get_field_id('tabs') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
					
					<div class="sortable-head cf">
						<div class="sortable-title">
							<strong><?php echo $tab['title'] ?></strong>
						</div>
						<div class="sortable-handle">
							<a href="#"><?php _e('Open / Close', 'kyte'); ?></a>
						</div>
					</div>
					
					<div class="sortable-body">
						<p class="tab-desc description">
						
							<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title">
							<?php _e("The Testimonial Giver","kyte"); ?>
							<textarea id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][title]"><?php echo $tab['title'] ?></textarea>
							</label>
							
							<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content">
							<?php _e("The Testimonial","kyte"); ?>
							<textarea id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][content]"><?php echo $tab['content'] ?></textarea>
							</label>
							
						</p>
						<p class="tab-desc description"><a href="#" class="sortable-delete"><?php _e('Delete','kyte'); ?></a></p>
					</div>
					
				</li>
				<?php
			}
		
		function block($instance) {
			extract($instance);
			
			$rand = wp_rand(0,10000);
			
			if(!( $title )) $title = '5000';
			if(!( is_numeric($title))) $title = '5000';
			echo '<div class="testimonials testimonials-tab tab-container" id="'.$block_id.'-testimonials-'.$rand.'"><div class="panel-container text-center">';
			
			$i = 0;
			foreach( $tabs as $tab ){
			$i++;
				echo '<div id="tst'.$i.'" class="tab-block">'.htmlspecialchars_decode($tab['content']); 
				
				if( $tab['title'] )
					echo '<span class="author">'.htmlspecialchars_decode($tab['title']).'</span>';
					
				echo '</div>';
			}
			
			echo '</div><ul class="etabs">';
			
			$i = 0;
			foreach( $tabs as $tab ){
				$i++;
				echo '<li class="tab"><a href="#tst'.$i.'">'.$i.'</a></li>';
			}
			
			echo '</ul></div>
			<script type="text/javascript">
			jQuery(document).ready( function($) {
		        jQuery("#'.$block_id.'-testimonials-'.$rand.'").easytabs({
			      animationSpeed: 500,
			      updateHash: false,
			      cycle: '.$title.'
		        });
			});
			</script>';	

		}
		
		/* AJAX add tab */
		function add_testimonial() {
			$nonce = $_POST['security'];	
			if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
			
			$count = isset($_POST['count']) ? absint($_POST['count']) : false;
			$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
			
			//default key/value for the tab
			$tab = array(
				'title' => __('Testimonial','kyte'),
				'content' => '',
				'photo' => ''
			);
			
			if($count) {
				$this->tab($tab, $count);
			} else {
				die(-1);
			}
			
			die();
		}
		
		function update($new_instance, $old_instance) {
			$new_instance = aq_recursive_sanitize($new_instance);
			return $new_instance;
		}
		
	}