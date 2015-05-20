<?php
	$custom_comment_form = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="name-field">
				   <input type="text" id="author" name="author" title="' . __('Name *','kyte') . '" value="' . esc_attr( $commenter['comment_author'] ) . '" />
				   </div>',
		'email'  => '<div class="email-field">
				   <input name="email" type="text" id="email" title="' . __('Email *','kyte') . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" />
				   </div>',
		'url'    => '<div class="website-field">
				   <input last" name="url" type="text" id="url" title="' . __('Website','kyte') . '" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" />
				   </div>') ),
		'comment_field' => '<div class="message-field">
							<textarea name="comment" title="' . __('Enter your comment here...','kyte') . '" id="comment" aria-required="true"></textarea>
							</div>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a> <a href="%3$s">Log out?</a>','kyte' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
		'cancel_reply_link' => __( 'Cancel' , 'kyte' ),
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'label_submit' => __( 'Submit' , 'kyte' ),
		'title_reply' => __( 'Leave a Reply' , 'kyte' )
	);
?>

<hr />
<div id="comments">
	<h3 class="section-title"><?php comments_number( __('0 Comments','kyte'), __('1 Comment','kyte'), __('% Comments','kyte') ); ?></h3>
		<?php if( have_comments() ) : ?>
			<ol id="singlecomments" class="commentlist">
				<?php wp_list_comments('type=comment&callback=custom_comment'); ?>
			</ol>
		<?php 
			endif;
			paginate_comments_links(); 
		?>
</div>

<hr />

<div id="respond" class="comment-form-wrapper">
	<h3 class="section-title"><?php echo get_theme_mod('comments_title','Would you like to share your thoughts?'); ?></h3>
	<p><?php echo get_theme_mod('comments_subtitle', 'Your email address will not be published. Required fields are marked *'); ?></p>
	<?php comment_form($custom_comment_form); ?>
</div>