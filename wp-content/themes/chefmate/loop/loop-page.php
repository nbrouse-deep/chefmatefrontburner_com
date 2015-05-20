<?php 
	$ebor_pages = get_pages( 
		array( 
			'child_of' => $post->ID, 
			'sort_column' => 'menu_order', 
			'sort_order' => 'asc' 
		) 
	);
	
	foreach( $ebor_pages as $page ) :
	
		if( get_post_meta( $page->ID, '_wp_page_template', true ) == 'page_parallax.php' ) : 
			$bg_colour = get_post_meta( $page->ID, '_cmb_item_background', true );
	?>
		
			<div id="<?php echo sanitize_title($page->post_title); ?>" class="parallax" style="background-image: url(<?php $url = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID), 'full'); echo $url[0]; ?>); background-color: <?php echo $bg_colour; ?>;">
			  <div class="container inner text-center">
			    <h2><?php echo $page->post_title; ?></h2>
			    <div class="divide10"></div>
			    <div class="row">
				    <?php 
				    	$content = $page->post_content;
				    	$content = apply_filters( 'the_content', $content );
				    	echo $content; 
				    ?>
				</div>
			  </div>
			</div>
			
	<?php 
		elseif( get_post_meta( $page->ID, '_wp_page_template', true ) == 'page_parallax_with_header.php' ) : 
			$bg_colour = get_post_meta( $page->ID, '_cmb_item_background', true );
	?>
		
			<div id="<?php echo sanitize_title($page->post_title); ?>" class="parallax" style="background-image: url(<?php $url = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID), 'full'); echo $url[0]; ?>); background-color: <?php echo $bg_colour; ?>;">

			  <?php ebor_child_section_title( $page->post_title, get_post_meta( $page->ID, '_cmb_disable_title', true ) ); ?>
			  
			  <div class="container inner">
			  	<div class="row">
			  		<?php 
			  			$content = $page->post_content;
			  			$content = apply_filters( 'the_content', $content );
			  			echo $content; 
			  		?>
			  	</div>
			  </div>
			  
			</div>
			
	<?php 
		elseif( get_post_meta( $page->ID, '_wp_page_template', true ) == 'page_contact.php' ) : 
			$bg_colour = get_post_meta( $page->ID, '_cmb_item_background', true );
	?>
			
				<section class="parallax" id="<?php echo sanitize_title($page->post_title); ?>" style="background-image: url(<?php $url = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID), 'full'); echo $url[0]; ?>); background-color: <?php echo $bg_colour; ?>;">
				
				<?php ebor_child_section_title( $page->post_title, get_post_meta( $page->ID, '_cmb_disable_title', true ) ); ?>
				
				<div class="parallax contact">
				
				  <div class="container inner">
				    
				    <div class="row">
				      <div class="span8">
				        <div class="form-container">
				          <div class="response alert alert-success"></div>
				          <form class="forms" action="<?php echo get_template_directory_uri(); ?>/contact/form-handler.php" method="post">
				            <fieldset>
				              <ol>
				                <li class="form-row text-input-row name-field">
				                  <input type="text" name="name" class="text-input defaultText required" title="<?php echo get_post_meta( $page->ID, '_cmb_form_name', true ); ?>"/>
				                </li>
				                <li class="form-row text-input-row email-field">
				                  <input type="text" name="email" class="text-input defaultText required email" title="<?php echo get_post_meta( $page->ID, '_cmb_form_email', true ); ?>"/>
				                </li>
				                <li class="form-row text-input-row subject-field">
				                  <input type="text" name="subject" class="text-input defaultText" title="<?php echo get_post_meta( $page->ID, '_cmb_form_subject', true ); ?>"/>
				                </li>
				                <li class="form-row text-area-row">
				                  <textarea name="message" class="text-area required"></textarea>
				                </li>
				                <li class="form-row hidden-row">
				                  <input type="hidden" name="hidden" value="" />
				                </li>
				                <li class="button-row">
				                  <input type="submit" value="<?php echo get_post_meta( $page->ID, '_cmb_form_submit', true ); ?>" name="submit" class="btn btn-submit bm0" />
				                </li>
				              </ol>
				              <input type="hidden" name="v_error" id="v-error" value="Required" />
				              <input type="hidden" name="v_email" id="v-email" value="Enter a valid email" />
				            </fieldset>
				          </form>
				        </div>
				        <!-- /.form-container --> 
				      </div>
				      <!-- /.span8 -->
				      <aside class="span4 sidebar lp10">
				       <?php 
				       	$content = $page->post_content;
				       	$content = apply_filters( 'the_content', $content );
				       	echo $content; 
				       ?>
				      </aside>
				      <!-- /.span4 --> 
				    </div>
				    <!-- /.row -->
				    <div class="clearfix"></div>
		
				  </div>
				 </div>
				</section>
			
	<?php 
		elseif( get_post_meta( $page->ID, '_wp_page_template', true ) == 'page_portfolio.php' ) :
			$bg_colour = get_post_meta( $page->ID, '_cmb_item_background', true ); 
	?>
			
			<section class="<?php echo ebor_hex_brightness($bg_colour); ?>" id="<?php echo sanitize_title($page->post_title); ?>" style="background: <?php echo $bg_colour; ?>;">
			
			  <?php ebor_child_section_title( $page->post_title, get_post_meta( $page->ID, '_cmb_disable_title', true ) ); ?>
			  
			  <?php 
			  	$content = $page->post_content;
			  	$content = apply_filters( 'the_content', $content );
			  	echo $content; 
			  ?>
		
			</section>
			
	<?php 
		elseif( get_post_meta( $page->ID, '_wp_page_template', true ) == 'page_sidebar.php' ) :
			$bg_colour = get_post_meta( $page->ID, '_cmb_item_background', true ); 
	?>
			
			<section class="<?php echo ebor_hex_brightness($bg_colour); ?>" id="<?php echo sanitize_title($page->post_title); ?>" style="background: <?php echo $bg_colour; ?>;">
			
			  <?php ebor_child_section_title( $page->post_title, get_post_meta( $page->ID, '_cmb_disable_title', true ) ); ?>
			  
			  <div class="container inner">
			  	<div class="row">
			  		<div class="span8">
				  		<?php 
					  		$content = $page->post_content;
					  		$content = apply_filters( 'the_content', $content );
					  		echo $content; 
				  		?>
			  		</div>
			  		
			  		<?php 
			  			get_sidebar('page'); 
			  		?>
			  	</div>
			  </div>
			  
			</section>
			
	<?php else : 
		
			$bg_colour = get_post_meta( $page->ID, '_cmb_item_background', true ); ?>
			
			<section class="<?php echo ebor_hex_brightness($bg_colour); ?>" id="<?php echo sanitize_title($page->post_title); ?>" style="background: <?php echo $bg_colour; ?>;">
			
			  <?php ebor_child_section_title( $page->post_title, get_post_meta( $page->ID, '_cmb_disable_title', true ) ); ?>
			  
			  <div class="container inner">
			  	<div class="row">
			  		<?php 
			  			$content = $page->post_content;
			  			$content = apply_filters( 'the_content', $content );
			  			echo $content; 
			  		?>
			  	</div>
			  </div>
			  
			</section>
		
	<?php 
		endif;
		endforeach;