<?php
//ADD ADMIN AREA CUSTOM JQUERY
function kyte_custom_metaboxes_jquery() {
        wp_enqueue_script('custom_script', get_template_directory_uri().'/ebor_framework/admin.js', array('jquery'), false, true);
}
add_action('admin_enqueue_scripts', 'kyte_custom_metaboxes_jquery', 9999); 

add_filter( 'cmb_render_imag_select_taxonomy_id', 'imag_render_imag_select_taxonomy_id', 10, 2 );
function imag_render_imag_select_taxonomy_id( $field, $meta ) {

    wp_dropdown_categories(array(
            'show_option_none' => '&#8212; Select &#8212;',
            'hierarchical' => 1,
            'taxonomy' => $field['taxonomy'],
            'orderby' => 'name', 
            'hide_empty' => 0, 
            'name' => $field['id'],
            'selected' => $meta  

        ));
    if ( !empty($field['desc']) ) echo '<p class="cmb_metabox_description">' . $field['desc'] . '</p>';

}
  
function kyte_custom_metaboxes( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	
	
	$social_options = array(
		array('name' => 'Pinterest', 'value' => 'pinterest'),
		array('name' => 'RSS', 'value' => 'rss'),
		array('name' => 'Facebook', 'value' => 'facebook'),
		array('name' => 'Twitter', 'value' => 'twitter'),
		array('name' => 'Flickr', 'value' => 'flickr'),
		array('name' => 'Dribbble', 'value' => 'dribbble'),
		array('name' => 'Behance', 'value' => 'behance'),
		array('name' => 'linkedIn', 'value' => 'linkedin'),
		array('name' => 'Vimeo', 'value' => 'vimeo'),
		array('name' => 'Youtube', 'value' => 'youtube'),
		array('name' => 'Skype', 'value' => 'skype'),
		array('name' => 'Tumblr', 'value' => 'tumblr'),
		array('name' => 'Delicious', 'value' => 'delicious'),
		array('name' => '500px', 'value' => '500px'),
		array('name' => 'Grooveshark', 'value' => 'grooveshark'),
		array('name' => 'Forrst', 'value' => 'forrst'),
		array('name' => 'Digg', 'value' => 'digg'),
		array('name' => 'Blogger', 'value' => 'blogger'),
		array('name' => 'Klout', 'value' => 'klout'),
		array('name' => 'Dropbox', 'value' => 'dropbox'),
		array('name' => 'Github', 'value' => 'github'),
		array('name' => 'Songkick', 'value' => 'singkick'),
		array('name' => 'Posterous', 'value' => 'posterous'),
		array('name' => 'Appnet', 'value' => 'appnet'),
		array('name' => 'Google Plus', 'value' => 'gplus'),
		array('name' => 'Stumbleupon', 'value' => 'stumbleupon'),
		array('name' => 'LastFM', 'value' => 'lastfm'),
		array('name' => 'Spotify', 'value' => 'spotify'),
		array('name' => 'Instagram', 'value' => 'instagram'),
		array('name' => 'Evernote', 'value' => 'evernote'),
		array('name' => 'Paypal', 'value' => 'paypal'),
		array('name' => 'Picasa', 'value' => 'picasa'),
		array('name' => 'Soundcloud', 'value' => 'soundcloud')
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR PORTFOLIO POST TYPE /////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'portfolio_metabox',
		'title' => __('Additional Portfolio Item Details', 'kyte'),
		'pages' => array('portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Portfolio Item Layout','kyte'),
				'desc' => __("Check to disable full-width for this post", 'kyte'),
				'id'   => $prefix . 'layout_checkbox',
				'type' => 'checkbox',
			),
			array(
				'name' => __('Client Name', 'kyte'),
				'desc' => __("(Optional) Add a Client Name for this Project?", 'kyte'),
				'id'   => $prefix . 'the_client',
				'type' => 'text',
			),
			array(
				'name' => __('Project Date', 'kyte'),
				'desc' => __("(Optional) Add the Date this Project Took Place?", 'kyte'),
				'id'   => $prefix . 'the_client_date',
				'type' => 'text_date',
			),
			array(
				'name' => __('Client URL', 'kyte'),
				'desc' => __("(Optional) Add a URL for this Project?", 'kyte'),
				'id'   => $prefix . 'the_client_url',
				'type' => 'text',
			),
		)
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR PAGES             ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'page_metabox',
		'title' => __('Background Colour', 'kyte'),
		'pages' => array('page'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Page Background Colour',
			    'desc' => 'Used only in the single page version.',
			    'id'   => $prefix . 'item_background',
			    'type' => 'colorpicker',
				'std'  => '#ffffff'
			),
			array(
				'name' => __('Disable header title bar on this page / section?','kyte'),
				'desc' => __("Check to disable the title for this section.", 'kyte'),
				'id'   => $prefix . 'disable_title',
				'type' => 'checkbox',
			),
		)
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR TEAM MEMBERS      ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'team_metabox',
		'title' => __('The Job Title', 'kyte'),
		'pages' => array('team'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Job Title', 'kyte'),
				'desc' => '(Optional) Enter a Job Title for this Team Member',
				'id'   => $prefix . 'the_job_title',
				'type' => 'text',
			),
		)
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR SOCIAL            ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'social_metabox',
		'title' => __('Post Social Details', 'kyte'),
		'pages' => array('team', 'portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Social Icon 1',
				'desc' => 'What icon would you like for this team members first social profile?',
				'id' => $prefix . 'team_social_icon_1',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 1', 'kyte'),
				'desc' => __("Enter the URL for Social Icon 1 e.g www.google.com", 'kyte'),
				'id'   => $prefix . 'team_social_icon_1_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 2',
				'desc' => 'What icon would you like for this team members second social profile?',
				'id' => $prefix . 'team_social_icon_2',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 2', 'kyte'),
				'desc' => __("Enter the URL for Social Icon 1 e.g www.google.com", 'kyte'),
				'id'   => $prefix . 'team_social_icon_2_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 3',
				'desc' => 'What icon would you like for this team members third social profile?',
				'id' => $prefix . 'team_social_icon_3',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 3', 'kyte'),
				'desc' => __("Enter the URL for Social Icon 3 e.g www.google.com", 'kyte'),
				'id'   => $prefix . 'team_social_icon_3_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 4',
				'desc' => 'What icon would you like for this team members fourth social profile?',
				'id' => $prefix . 'team_social_icon_4',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 4', 'kyte'),
				'desc' => __("Enter the URL for Social Icon 4 e.g www.google.com", 'kyte'),
				'id'   => $prefix . 'team_social_icon_4_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 5',
				'desc' => 'What icon would you like for this team members fifth social profile?',
				'id' => $prefix . 'team_social_icon_5',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 5', 'kyte'),
				'desc' => __("Enter the URL for Social Icon 5 e.g www.google.com", 'kyte'),
				'id'   => $prefix . 'team_social_icon_5_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 6',
				'desc' => 'What icon would you like for this team members sixth social profile?',
				'id' => $prefix . 'team_social_icon_6',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 6', 'kyte'),
				'desc' => __("Enter the URL for Social Icon 6 e.g www.google.com", 'kyte'),
				'id'   => $prefix . 'team_social_icon_6_url',
				'type' => 'text',
			),
		)
	);
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR CONTACT           ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'contact_metabox',
		'title' => __('Contact Page Options', 'kyte'),
		'pages' => array('page'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Contact Form "Name" Title', 'kyte'),
				'id'   => $prefix . 'form_name',
				'type' => 'text',
			),
			array(
				'name' => __('Contact Form "Email" Title', 'kyte'),
				'id'   => $prefix . 'form_email',
				'type' => 'text',
			),
			array(
				'name' => __('Contact Form "Subject" Title', 'kyte'),
				'id'   => $prefix . 'form_subject',
				'type' => 'text',
			),
			array(
				'name' => __('Contact Form "Submit" Title', 'kyte'),
				'id'   => $prefix . 'form_submit',
				'type' => 'text',
			),
		)
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR CLIENTS /////////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'clients_metabox',
		'title' => __('Client URL', 'kyte'),
		'pages' => array('client'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('URL for this client (optional)', 'kyte'),
				'desc' => __("Enter a URL for this client, if left blank, client logo will open into a lightbox.", 'kyte'),
				'id'   => $prefix . 'client_url',
				'type' => 'text',
			),
		),
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR GALLERY POST FORMAT /////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'gallery_metabox',
		'title' => __('The Gallery Shortcode', 'kyte'),
		'pages' => array('post', 'portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Gallery Shortcode', 'kyte'),
				'desc' => 'e.g. [gallery ids="74,73,75"]',
				'id'   => $prefix . 'the_gallery_shortcode',
				'type' => 'textarea_code',
			),
		)
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR image POST FORMAT /////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'image_metabox',
		'title' => __('Featured Images for Single Post', 'kyte'),
		'pages' => array('post', 'portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Image 1', 'kyte'),
				'desc' => __('Upload an image or enter an URL.', 'kyte'),
				'id' => $prefix . 'image1',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Image 2', 'kyte'),
				'desc' => __('Upload an image or enter an URL.', 'kyte'),
				'id' => $prefix . 'image2',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Image 3', 'kyte'),
				'desc' => __('Upload an image or enter an URL.', 'kyte'),
				'id' => $prefix . 'image3',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Image 4', 'kyte'),
				'desc' => __('Upload an image or enter an URL.', 'kyte'),
				'id' => $prefix . 'image4',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Image 5', 'kyte'),
				'desc' => __('Upload an image or enter an URL.', 'kyte'),
				'id' => $prefix . 'image5',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Image 6', 'kyte'),
				'desc' => __('Upload an image or enter an URL.', 'kyte'),
				'id' => $prefix . 'image6',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Image 7', 'kyte'),
				'desc' => __('Upload an image or enter an URL.', 'kyte'),
				'id' => $prefix . 'image7',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Image 8', 'kyte'),
				'desc' => __('Upload an image or enter an URL.', 'kyte'),
				'id' => $prefix . 'image8',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Image 9', 'kyte'),
				'desc' => __('Upload an image or enter an URL.', 'kyte'),
				'id' => $prefix . 'image9',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Image 10', 'kyte'),
				'desc' => __('Upload an image or enter an URL.', 'kyte'),
				'id' => $prefix . 'image10',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
		),
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR VIDEO POST FORMAT ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'video_metabox',
		'title' => __('The Video Link', 'kyte'),
		'pages' => array('post', 'portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'oEmbed',
				'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
				'id'   => $prefix . 'the_video_1',
				'type' => 'oembed',
			),
			array(
				'name' => 'oEmbed',
				'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
				'id'   => $prefix . 'the_video_2',
				'type' => 'oembed',
			),
			array(
				'name' => 'oEmbed',
				'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
				'id'   => $prefix . 'the_video_3',
				'type' => 'oembed',
			),
			array(
				'name' => 'oEmbed',
				'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
				'id'   => $prefix . 'the_video_4',
				'type' => 'oembed',
			),
			array(
				'name' => 'oEmbed',
				'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
				'id'   => $prefix . 'the_video_5',
				'type' => 'oembed',
			),
		)
	);


	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'kyte_custom_metaboxes' );

// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'metabox/init.php' );
	}
}
?>