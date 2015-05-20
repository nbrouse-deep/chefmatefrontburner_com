<?php

	class AQ_Pricing_Table_Block extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Pricing Table',
				'size' => 'span3',
			);
			
			//create the block
			parent::__construct('aq_pricing_table_block', $block_options);
			
			//add ajax functions
			add_action('wp_ajax_aq_block_table_add_new', array($this, 'add_table'));
		}
		
		function form($instance) {
			
			$defaults = array(
				'tabs' => array(
					1 => array(
						'title' => __('Table Detail','kyte')
					)
				),
				'currency' => '$',
				'price' => '3',
				'button_link' => 'http://',
				'button_text' => 'Button',
				'color' => '#1abb9c'
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			
			<p class="description note">
				<?php _e('Use this block to add pricing tables to your page.', 'kyte') ?>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					<?php _e('Title for this Table', 'kyte'); ?>
					<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('currency') ?>">
					<?php _e('Currency', 'kyte'); ?>
					<?php echo aq_field_input('currency', $block_id, $currency, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('price') ?>">
					<?php _e('Price', 'kyte'); ?>
					<?php echo aq_field_input('price', $block_id, $price, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('color') ?>">
					Colour
					<?php echo aq_field_color_picker('color', $block_id, $color, $default = '#1abb9c') ?>
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
					<a href="#" rel="table" class="aq-sortable-add-new button"><?php _e('Add New', 'kyte'); ?></a>
					<p></p>
				</div>
				
			<p class="description">
				<label for="<?php echo $this->get_field_id('button_link') ?>">
					<?php _e('Button Link', 'kyte'); ?>
					<?php echo aq_field_input('button_link', $block_id, $button_link, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('button_text') ?>">
					<?php _e('Button Text', 'kyte'); ?>
					<?php echo aq_field_input('button_text', $block_id, $button_text, $size = 'full') ?>
				</label>
			</p>
			
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
							<?php _e("Features","kyte"); ?>
							<textarea id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][title]"><?php echo $tab['title'] ?></textarea>
							</label>
							
						</p>
						<p class="tab-desc description"><a href="#" class="sortable-delete"><?php _e('Delete','kyte'); ?></a></p>
					</div>
					
				</li>
				<?php
			}
		
		function block($instance) {
			extract($instance);
			
			if(!( isset($color) )) $color = '#1abb9c';
			echo '<div class="pricing plan ' . $size . '">
			  <h3>' . $title . '</h3>
			  <h4><span class="amount" style="color: '.$color.';"><span style="color: '.$color.';">' . $currency . '</span>' . $price . '</span></h4>
			  <div class="features"><ul>';
			
			foreach($tabs as $tab){
			   echo '<li>' . $tab['title'] . '</li>';
			}
			
			echo '</ul>
			  </div>
			  <div class="select">
			    <div> <a href="'.esc_url($button_link).'" class="btn inverse" style="background: '.$color.';">'.$button_text.'</a> </div>
			  </div>
			</div>';

		}
		
		/* AJAX add tab */
		function add_table() {
			$nonce = $_POST['security'];	
			if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
			
			$count = isset($_POST['count']) ? absint($_POST['count']) : false;
			$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
			
			//default key/value for the tab
			$tab = array(
				'title' => __('Table Detail','kyte')
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