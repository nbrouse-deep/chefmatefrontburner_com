<?php
	/*
	Template Name: Contact
	*/
	
	if( get_theme_mod('redirect_children','1') == 1 ){
	
		global $post;
		
		if ( is_page() && $post->post_parent ) {
			wp_safe_redirect( home_url() . '#' . sanitize_title($post->post_title) ); exit;
		}
	
	}
	
	get_header(); 
	the_post(); 
?>

  <section class="light-wrapper offset">
  		
  		<?php ebor_section_title( get_the_title() ); ?>
  		
  		  <div class="container inner">
  		    
  		    <div class="row">
  		      <div class="span8">
  		        <div class="form-container">
  		          <div class="response alert alert-success"></div>
  		          <form class="forms" action="<?php echo get_template_directory_uri(); ?>/contact/form-handler.php" method="post">
  		            <fieldset>
  		              <ol>
  		                <li class="form-row text-input-row name-field">
  		                  <input type="text" name="name" class="text-input defaultText required" title="<?php echo get_post_meta( $post->ID, '_cmb_form_name', true ); ?>"/>
  		                </li>
  		                <li class="form-row text-input-row email-field">
  		                  <input type="text" name="email" class="text-input defaultText required email" title="<?php echo get_post_meta( $post->ID, '_cmb_form_email', true ); ?>"/>
  		                </li>
  		                <li class="form-row text-input-row subject-field">
  		                  <input type="text" name="subject" class="text-input defaultText" title="<?php echo get_post_meta( $post->ID, '_cmb_form_subject', true ); ?>"/>
  		                </li>
  		                <li class="form-row text-area-row">
  		                  <textarea name="message" class="text-area required"></textarea>
  		                </li>
  		                <li class="form-row hidden-row">
  		                  <input type="hidden" name="hidden" value="" />
  		                </li>
  		                <li class="button-row">
  		                  <input type="submit" value="<?php echo get_post_meta( $post->ID, '_cmb_form_submit', true ); ?>" name="submit" class="btn btn-submit bm0" />
  		                </li>
  		              </ol>
  		              <input type="hidden" name="v_error" id="v-error" value="Required" />
  		              <input type="hidden" name="v_email" id="v-email" value="Enter a valid email" />
  		            </fieldset>
  		          </form>
  		        </div>
  		      </div>

  		      <aside class="span4 sidebar lp10">
	  		      <?php the_content(); ?>
  		      </aside>

  		    </div>

  		    <div class="clearfix"></div>
  
  	</div>
  		  
</section>

<?php 
	get_footer();