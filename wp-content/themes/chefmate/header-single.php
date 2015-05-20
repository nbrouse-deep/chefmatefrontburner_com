<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php echo (is_home() || is_front_page()) ? bloginfo('name') : wp_title('| ', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
  
<body <?php body_class(); ?>>
  <div class="primary">
    <div class="container">
      <div class="inner">
        <div class="navigation">
	        <a href="#" class="btn pull-left back"><?php _e('Back','kyte'); ?></a>
	        <a href="#" class="btn pull-right rm0 nav-next-item"><?php _e('Next','kyte'); ?></a>
	        <a href="#" class="btn pull-right rm5 nav-prev-item"><?php _e('Prev','kyte'); ?></a>
        </div>