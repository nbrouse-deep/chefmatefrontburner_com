<?php if ( get_post_meta( $post->ID, '_cmb_the_video_1', true ) ) : ?>
	<figure class="overlay player"><?php echo apply_filters('the_content', get_post_meta( $post->ID, '_cmb_the_video_1', true )); ?></figure>
<?php endif; ?>

<?php if ( get_post_meta( $post->ID, '_cmb_the_video_2', true ) ) : ?>
	<figure class="overlay player">
	  <?php echo apply_filters('the_content', get_post_meta( $post->ID, '_cmb_the_video_2', true )); ?>
	</figure>
<?php endif; ?>

<?php if ( get_post_meta( $post->ID, '_cmb_the_video_3', true ) ) : ?>
	<figure class="overlay player">
	  <?php echo apply_filters('the_content', get_post_meta( $post->ID, '_cmb_the_video_3', true )); ?>
	</figure>
<?php endif; ?>

<?php if ( get_post_meta( $post->ID, '_cmb_the_video_4', true ) ) : ?>
	<figure class="overlay player">
	  <?php echo apply_filters('the_content', get_post_meta( $post->ID, '_cmb_the_video_4', true )); ?>
	</figure>
<?php endif; ?>

<?php if ( get_post_meta( $post->ID, '_cmb_the_video_5', true ) ) : ?>
	<figure class="overlay player">
	  <?php echo apply_filters('the_content', get_post_meta( $post->ID, '_cmb_the_video_5', true )); ?>
	</figure>
<?php endif; ?>