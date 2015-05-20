<?php

/////////////////////////////////////////////
////////ADD THEME SUPPORT///////////////////
///////////////////////////////////////////

//ADD FEATURED IMAGES
add_theme_support( 'post-thumbnails' );

//STYLING & CUSTOM OPTIONS
$bgArgs = array( 'default-color' => 'f0f0f0', );
add_theme_support( 'custom-background', $bgArgs );

//IMAGE SIZES
set_post_thumbnail_size( 70, 70, true );
add_image_size( 'index', 400, 270, true);
add_image_size( 'team', 430, 430, true);
add_image_size( 'index-medium', 400, 300, true);
add_image_size( 'index-large', 620, 319, true);
add_image_size( 'single-post', 770, 9999, false);
add_image_size( 'admin-list-thumb', 60, 60, true );

//POST FORMATS
add_theme_support( 'post-formats', array( 'gallery', 'video', 'image' ) );

//FEED LINKS
add_theme_support( 'automatic-feed-links' );

add_editor_style('editor-style.css');

if ( ! isset( $content_width ) && ! is_singular('post') && ! is_active_sidebar('primary') ){ 
	$content_width = 1170;
} else {
	$content_width = 770;
}

add_action('after_setup_theme', 'kyte_setup');
function kyte_setup(){
	load_theme_textdomain('kyte', get_template_directory() . '/languages');
}