<?php

	class AQ_Gallery_Block extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Gallery',
				'size' => 'span12',
				'resizable' => 0
			);
			
			//create the block
			parent::__construct('aq_gallery_block', $block_options);
			
			//add ajax functions
			add_action('wp_ajax_aq_block_gallery_add_new', array($this, 'add_gallery'));
		}
		
		function form($instance) {
			
			$defaults = array(
				'tabs' => array(
					1 => array(
						'title' => __('Lorem Ipsum Dolor...','kyte'),
						'photo' => ''
					)
				),
				'display_type' => 'landscape',
				'crop_height' => '667',
				'subtitle' => ''
			);
			
			$display_options = array(
				'landscape' => 'Landscape Gallery',
				'portrait' => 'Portrait Gallery'
			);
			
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			
			<p class="description note">
				<?php _e('Use this block to add full width image galleries to your page.', 'kyte') ?>
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
					<a href="#" rel="gallery" class="aq-sortable-add-new button"><?php _e('Add New', 'kyte'); ?></a>
					<p></p>
				</div>
				
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title (optional)
					<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('subtitle') ?>">
					Subtitle (optional)
					<?php echo aq_field_input('subtitle', $block_id, $subtitle, $size = 'full') ?>
				</label>
			</p>
				
			<p class="description fourth">
				<label for="<?php echo $this->get_field_id('display_type') ?>">
					Pick gallery display type<br/>
					<?php echo aq_field_select('display_type', $block_id, $display_options, $display_type, $block_id); ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('crop_height') ?>">
					<strong>Image Crop Height?</strong><br />
					Landscape display images are cropped to 1000px width<br />
					Portrait display images are cropped to 400px width<br />
					Please choose your height crop accordingly, all images will be cropped to the same size, please ensure your images match or exceed both dimensions depending on the display type chosen, this is to avoid crop issues.
					<?php echo aq_field_input('crop_height', $block_id, $crop_height, $size = 'full') ?>
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
							<?php _e("Image Caption (Optional)","kyte"); ?>
							<textarea id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][title]"><?php echo $tab['title'] ?></textarea>
							</label>
							
							<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-photo">
								<?php _e('Upload an Image (Required)', 'kyte'); ?><br/>
								<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-photo" class="input-full input-upload" value="<?php echo $tab['photo'] ?>" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][photo]" />
								<a href="#" class="aq_upload_button button" rel="image"><?php _e('Upload','kyte'); ?></a><p></p>
							</label>
							
						</p>
						<p class="tab-desc description"><a href="#" class="sortable-delete"><?php _e('Delete','kyte'); ?></a></p>
					</div>
					
				</li>
				<?php
			}
		
		function block($instance) {
			extract($instance);
			
			$block_number = wp_rand(0,10000);
			if( $display_type == 'landscape' ){
				$width = 1000;
				$elements = 'visibleElementsArray:[2,2,2,1],';
			} else {
				$width = 400;
				$elements = 'visibleElementsArray:[4,3,3,2],';
			}
			
			echo '<div class="container"><div class="divide80"></div>';
			if($title) echo '<h4>'.$title.'</h4>';
			if($subtitle) echo '<p>'.$subtitle.'</p>';
			echo '</div><div class="divide30"></div>
			<div class="showbiz-container fullwidth '.$display_type.' '.$block_number.'">
			  <div class="showbiz-navigation"> <a id="showbiz_left_'.$block_number.'" class="sb-navigation-left"></a> <a id="showbiz_right_'.$block_number.'" class="sb-navigation-right"></a>
			    <div class="sbclear"></div>
			  </div>
			  <!-- /.showbiz-navigation -->
			  
			  <div class="showbiz gallery" data-left="#showbiz_left_'.$block_number.'" data-right="#showbiz_right_'.$block_number.'">
			    <div class="overflowholder">
			      <ul>';
			      
			      foreach( $tabs as $tab ){
			      	$resized_image = aq_resize($tab['photo'], $width, $crop_height, 1);
			        echo '<li class="post">
			          <div class="mediaholder">
			            <div class="mediaholder_innerwrap"><img src="'.$resized_image.'" alt="'.$block_id.'-'.$tab['title'].'"></div>
			          </div>';
					if($tab['title']){ echo '<div class="detailholder"><p>'.$tab['title'].'</p></div>'; }
			          echo '<a href="'.$tab['photo'].'" title="'.$tab['title'].'" class="enlarge view" data-rel="gallery-'.$block_id.'"></a>
			         </li>';
			      }

			      echo '</ul>
			      <div class="clearfix"></div>
			    </div>
			    <!-- /.overflowholder -->
			    
			    <div class="clearfix"></div>
			  </div>
			  <!-- /.showbiz --> 
			</div>
			<!-- /.showbiz-container -->
			<script type="text/javascript">
			/*-----------------------------------------------------------------------------------*/
			/*	SHOWBIZ
			/*-----------------------------------------------------------------------------------*/   
			jQuery(document).ready(function() {
			          jQuery(".showbiz-container.'.$display_type.'.'.$block_number.'").showbizpro({
			            dragAndScroll:"on",
			            '.$elements.'
			            mediaMaxHeight:[0,0,0,0],
			            carousel:"off",
			            heightOffsetBottom:0,
			            rewindFromEnd:"off",
			            autoPlay:"off",
			            delay:2000,           
			            speed:250
			          });
			});
			</script>';

		}
		
		/* AJAX add tab */
		function add_gallery() {
			$nonce = $_POST['security'];	
			if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
			
			$count = isset($_POST['count']) ? absint($_POST['count']) : false;
			$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
			
			//default key/value for the tab
			$tab = array(
				'title' => __('Lorem ipsum dolor...','kyte'),
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