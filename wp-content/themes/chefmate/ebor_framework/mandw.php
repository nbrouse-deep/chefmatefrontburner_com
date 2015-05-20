<?php

//REGISTER CUSTOM MENUS
function register_ebor_menus() {
  register_nav_menus( array(
  	'primary' => __( 'Standard Navigation', 'kyte' ),
  ) );
}
add_action( 'init', 'register_ebor_menus' );

//REGISTER SIDEBARS
function ebor_register_sidebars() {

	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Blog Sidebar', 'kyte' ),
			'description' => __( 'Widgets to be displayed in the blog sidebar.', 'kyte' ),
			'before_widget' => '<div id="%1$s" class="sidebox widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'page',
			'name' => __( 'Page with Sidebar, Sidebar', 'kyte' ),
			'description' => __( 'Widgets to be displayed in the page with sidebar, sidebar.', 'kyte' ),
			'before_widget' => '<div id="%1$s" class="sidebox widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

}
add_action( 'widgets_init', 'ebor_register_sidebars' );