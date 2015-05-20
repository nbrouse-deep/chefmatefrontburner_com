<?php

/////////////////////////////////////////////
////////CUSTOM FILTERS  ////////////////////
///////////////////////////////////////////

add_filter( 'the_content' , 'mh_youtube_wmode' , 15 );
 
function mh_youtube_wmode( $content ) {
 
// Regex to find all <ifram ... > YouTube tags
$mh_youtube_regex = "/\<iframe .*\.com.*><\/iframe>/";
 
// Populate the results into an array
preg_match_all( $mh_youtube_regex , $content, $mh_matches );
 
// If we get any hits then put the update the results
if ( $mh_matches ) {;
        for ( $mh_count = 0; $mh_count < count( $mh_matches[0] ); $mh_count++ )
                {
                // Old YouTube iframe
                $mh_old = $mh_matches[0][$mh_count];
 
                $mh_new = str_replace( "?feature=oembed" , "?wmode=transparent" , $mh_old );
                $mh_new = preg_replace( '/\><\/iframe>$/' , ' wmode="Opaque"></iframe>' , $mh_new );
 
                // make the substitution
                $content = str_replace( $mh_old, $mh_new , $content );
                }
        }
return $content;
}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function _s_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'kyte' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', '_s_wp_title', 10, 2 );

add_filter('previous_post_link', 'prev_post_link_attributes');
function prev_post_link_attributes($output) {
    $class = 'class="btn pull-right prev"';
    return str_replace('<a href=', '<a '.$class.' href=', $output);
}

add_filter('next_post_link', 'next_post_link_attributes');
function next_post_link_attributes($output) {
    $class = 'class="btn pull-right next"';
    return str_replace('<a href=', '<a '.$class.' href=', $output);
}

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter('widget_text', 'do_shortcode');

	/* This code filters the Categories archive widget to include the post count inside the link */
add_filter('wp_list_categories', 'cat_count_span');
function cat_count_span($links) {
	$links = str_replace('</a> (', ' (', $links);
	$links = str_replace(')', ')</a>', $links);
	return $links;
}
/* This code filters the Archive widget to include the post count inside the link */
add_filter('get_archives_link', 'archive_count_span');
function archive_count_span($links) {
	$links = str_replace('</a>&nbsp;(', ' (', $links);
	$links = str_replace(')', ')</a>', $links);
	return $links;
}

/**
 * Custom gallery shortcode
 *
 * Filters the standard WordPress gallery to create a gallery using revolution slider.
 *
 * @since 1.0.0
 * @return Revolution Slider Gallery
 */
add_filter( 'post_gallery', 'my_post_gallery', 10, 2 );
function my_post_gallery( $output, $attr) {
    global $post, $wp_locale;

    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'li',
        'icontag'    => 'dt',
        'captiontag' => 'div',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $output = apply_filters('gallery_style', "<div id='$selector' class='portfolio-bannercontainer revolution'><div class='portfolio-banner'><ul>");

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        $output .= "<{$itemtag} data-transition='fade'>";
        $image = wp_get_attachment_image_src( $attachment->ID, 'full' );
        $output .= "<img src='" . $image[0] . "' />";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='caption sfb white-bg small text-center' data-x='30' data-y='30' data-speed='500' data-start='400' data-easing='easeOutExpo'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
    }

    $output .= "</ul></div></div>\n";

    return $output;
}

add_filter( 'mce_buttons_2', 'ebor_mce_buttons_2' );

function ebor_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'ebor_mce_before_init' );

function ebor_mce_before_init( $settings ) {

    $style_formats = array(
    	array(
    		'title' => 'Subheading Paragraph',
    		'selector' => 'p',
    		'classes' => 'lead'
    	),
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}