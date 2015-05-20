<?php 
	$icons = array(
     	get_post_meta( $post->ID, '_cmb_team_social_icon_1', true ), 
     	get_post_meta( $post->ID, '_cmb_team_social_icon_2', true ),
     	get_post_meta( $post->ID, '_cmb_team_social_icon_3', true ), 
     	get_post_meta( $post->ID, '_cmb_team_social_icon_4', true ),
     	get_post_meta( $post->ID, '_cmb_team_social_icon_5', true ), 
     	get_post_meta( $post->ID, '_cmb_team_social_icon_6', true )
 	);
 	
 	$urls = array(
		get_post_meta( $post->ID, '_cmb_team_social_icon_1_url', true ), 
		get_post_meta( $post->ID, '_cmb_team_social_icon_2_url', true ),
		get_post_meta( $post->ID, '_cmb_team_social_icon_3_url', true ), 
		get_post_meta( $post->ID, '_cmb_team_social_icon_4_url', true ),
		get_post_meta( $post->ID, '_cmb_team_social_icon_5_url', true ), 
		get_post_meta( $post->ID, '_cmb_team_social_icon_6_url', true ),
	);
	
	$urls = array_filter(array_map(NULL, $urls));
	
	$protocols = array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype'); 
?>
  
<ul class="social color clearfix">
   <?php foreach ($urls as $index => $url ) : ?>
   	   <li><a href="<?php echo esc_url($url, $protocols); ?>" target="_blank"><i class="icon-s-<?php echo $icons[$index]; ?>"></i></a></li>
   <?php endforeach; ?>
</ul>