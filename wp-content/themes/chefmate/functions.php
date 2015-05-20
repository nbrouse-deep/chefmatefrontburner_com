<?php 
	
////////////////////////////////////////////////////////
////////QUEUE UP FRAMEWORK/////////////////////////////
//////////////////////////////////////////////////////
//ALLOW SVG
add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes ( $existing_mimes=array() ) {

	// add the file extension to the array

	$existing_mimes['svg'] = 'mime/type';

        // call the modified list of extensions

	return $existing_mimes;

}

//MENUS & WIDGETS
	require_once ( "ebor_framework/mandw.php");
	
//STYLES & SCRIPTS
	require_once ( "ebor_framework/styles_scripts.php");
	
//THEME FUNCTIONS
	require_once ( "ebor_framework/theme_functions.php");
	
//THEME OPTIONS
	require_once ( "ebor_framework/theme_options.php");
	
//THEME SUPPORT
	require_once ( "ebor_framework/theme_support.php");
	
//THEME CUSTOM FILTERS
	require_once ( "ebor_framework/theme_filters.php");
	
//METABOXES
	require_once ( "ebor_framework/metaboxes.php");
	
//IMAGE RESIZER
	require_once('ebor_framework/aq_resizer.php');
	
//REQUIRED PLUGINS
	require_once('ebor_framework/class-tgm-plugin-activation.php');
	
//PLUGINS LOAD
	require_once('ebor_framework/plugins_load.php');
	
//IMAGE RESIZER
	require_once('ebor_framework/aq_resizer.php');
	
//COLOURS
	require_once('ebor_framework/custom_colours.php');
	
//PAGE BUILDER
	function load_page_builder() {
		if (!class_exists('AQ_Page_Builder')) {
			include_once( 'ebor_framework/page-builder/aq-page-builder.php' );
		}
	}
	add_action('after_setup_theme', 'load_page_builder');
		
/////////////////////////////////////////////
	
/////////////////////////////////////////////
////////CUSTOM COMMENTS/////////////////////
///////////////////////////////////////////

function custom_comment($comment, $args, $depth) { $GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
  <div class="user"><?php echo get_avatar( $comment->comment_author_email, 70 ); ?></div>
  <div class="message">
    <div class="arrow-box"> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
      <div class="info">
        <?php printf('<h2>%s</h2>', get_comment_author_link()); ?>
        <div class="meta"><?php echo get_comment_date(); ?></div>
      </div>
      <?php echo wpautop( get_comment_text() ); ?>
      <?php if ($comment->comment_approved == '0') : ?>
      <p><em><?php _e('Your comment is awaiting moderation.', 'kyte') ?></em></p>
      <?php endif; ?>
    </div>
  </div>
</li>

<?php }