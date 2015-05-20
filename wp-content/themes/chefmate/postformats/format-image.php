<?php 

$images = array(
	get_post_meta( $post->ID, '_cmb_image1', true ), 
	get_post_meta( $post->ID, '_cmb_image2', true ),
	get_post_meta( $post->ID, '_cmb_image3', true ), 
	get_post_meta( $post->ID, '_cmb_image4', true ),
	get_post_meta( $post->ID, '_cmb_image5', true ), 
	get_post_meta( $post->ID, '_cmb_image6', true ),
	get_post_meta( $post->ID, '_cmb_image7', true ), 
	get_post_meta( $post->ID, '_cmb_image8', true ),
	get_post_meta( $post->ID, '_cmb_image9', true ), 
	get_post_meta( $post->ID, '_cmb_image10', true )
); 

$images = array_filter(array_map(NULL, $images));
	
 ?>
	
<?php foreach ($images as $index => $image ) : ?>
	<figure class="overlay">
		<img src="<?php echo $image; ?>" alt="<?php the_title(); echo '-' . $index; ?>" />
	</figure>
<?php endforeach; ?>