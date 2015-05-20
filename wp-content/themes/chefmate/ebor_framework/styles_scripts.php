<?php
//ENQUEUE JQUERY & CUSTOM SCRIPTS
function ebor_load_scripts() {
	$protocol = is_ssl() ? 'https' : 'http';

	wp_enqueue_style( 'ebor-font1', 'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' );
	wp_enqueue_style( 'ebor-bootstrap', get_template_directory_uri() . '/style/css/bootstrap.css' );
	wp_enqueue_style( 'ebor-prettify', get_template_directory_uri() . '/style/js/google-code-prettify/prettify.css' );
	wp_enqueue_style( 'ebor-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ebor-fontello', get_template_directory_uri() . '/style/type/fontello.css' );
	wp_enqueue_style( 'ebor-custom', get_template_directory_uri() . '/custom.css' );
	
	wp_enqueue_script( 'ebor-maps', '//maps.google.com/maps/api/js?sensor=false', false, true  );
	wp_enqueue_script( 'ebor-plugins', get_template_directory_uri() . '/style/js/plugins.js', array('jquery'), false, false  );
	wp_enqueue_script( 'ebor-prettify', get_template_directory_uri() . '/style/js/google-code-prettify/prettify.js', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-view', get_template_directory_uri() . '/style/js/view.min.js?auto', array('jquery'), false, true  );
	
	if( is_post_type_archive('portfolio') && get_option('portfolio_layout','portfolioshowcase') == 'portfolioshowcase' && get_theme_mod('portfolio_single','0') == 0 || is_tax('portfolio-category') && get_option('portfolio_layout','portfolioshowcase') == 'portfolioshowcase' ){
		wp_enqueue_script( 'ebor-archive-showcase', get_template_directory_uri() . '/style/js/archive-showcase.js', array('jquery'), false, true  );
	}
	
	wp_enqueue_script( 'ebor-scripts', get_template_directory_uri() . '/style/js/scripts.js', array('jquery'), false, true  );
	
	$script_data = array( 
		'image_path' => get_template_directory_uri() . '/style/images/',
		'scroll_offset' => get_option('scroll_offset', '90'),
		'gallery_height' => get_option('gallery_height', '600')
	);
	wp_localize_script( 'ebor-scripts', 'image_path', $script_data );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action('wp_enqueue_scripts', 'ebor_load_scripts');

function ebor_load_non_standard_scripts() {
	echo '<!--[if IE 8]><link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/style/css/ie8.css" media="all" /><![endif]-->
		  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->'; }
add_action('wp_head', 'ebor_load_non_standard_scripts', 95);