<?php
/* Aqua Tabs Block */
class AQ_Service_Columns_Block extends AQ_Block {
	
		function __construct() {
			$block_options = array(
				'name' => 'Service Columns',
				'size' => 'span12',
			);
			
			//create the widget
			parent::__construct('AQ_Service_Columns_Block', $block_options);
			
			//add ajax functions
			add_action('wp_ajax_aq_block_service_column_add_new', array($this, 'add_service_column'));
			
		}
		
		function form($instance) {
		
			$defaults = array(
				'tabs' => array(
					1 => array(
						'title' => 'New Service Column',
						'content' => 'Service column content',
						'icon' => '',
					)
				),
				'text' => '',
			);
			
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);

			?>
			<p class="description note">
				<?php _e('Use this block to add columns with images above each to the page.', 'kyte') ?>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('text') ?>">
					Content Above Tabs (optional)
					<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
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
				<a href="#" rel="service_column" class="aq-sortable-add-new button">Add New</a>
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
						<a href="#">Open / Close</a>
					</div>
				</div>
				
				<div class="sortable-body">
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title">
							Tab Title<br/>
							<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][title]" value="<?php echo $tab['title'] ?>" />
						</label>
					</p>
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content">
							Tab Content<br/>
							<textarea id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][content]" rows="5"><?php echo $tab['content'] ?></textarea>
						</label>
					</p>
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-icon">
							<?php _e('Upload an Image (Required)', 'kyte'); ?><br/>
							<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-icon" class="input-full input-upload" value="<?php echo $tab['icon'] ?>" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][icon]" />
							<a href="#" class="aq_upload_button button" rel="image"><?php _e('Upload','kyte'); ?></a><p></p>
						</label>
					</p>
					<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
				</div>
				
			</li>
			<?php
		}
		
		function block($instance) {
			extract($instance);
			
			if($text) echo '<div class="span12"><p class="lead">'.$text.'</p><div class="divide20"></div></div>';
			
			echo '<div class="flat-icons text-center">';
			
			$i = 0;
			foreach($tabs as $tab){
			$i++;
			
			echo '<div class="span3">
			  
			    <div class="icon">
			      <figure><img src="'.$tab['icon'].'" alt="'.$block_id.'-'.$tab['title'].'" /></figure>
			    </div>

			    <div class="box arrow">
			      <h4>'.$tab['title'].'</h4>
			      <p class="bm0">'.do_shortcode(htmlspecialchars_decode($tab['content'])).'</p>
			    </div>

			  </div>';
			  
			echo ( $i % 4 == 0 ) ? '<div class="clear divide30"></div>' : '';
			
			}
			  
			echo '</div>';
			
		}
		
		/* AJAX add tab */
		function add_service_column() {
			$nonce = $_POST['security'];	
			if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
			
			$count = isset($_POST['count']) ? absint($_POST['count']) : false;
			$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
			
			//default key/value for the tab
			$tab = array(
				'title' => 'New Service Column',
				'content' => 'Service column content',
				'icon' => '',
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