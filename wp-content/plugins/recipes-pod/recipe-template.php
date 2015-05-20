<?php
/*
Plugin Name: Recipes Template
Plguin URI:
Description:
Version:
Author:
Author URI:
License:
License URI:
*/

function slug_recipes_content_filter($content) {
	if ( get_post_type() == 'recipes' ) {
  		$obj = pods('recipes', get_the_id() );
		return $obj->template('recipes');
 	}
 	return $content;
}
add_filter( 'the_content', 'slug_recipes_content_filter' );

 
?>