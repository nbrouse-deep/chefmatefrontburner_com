<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php echo (is_home() || is_front_page()) ? bloginfo('name') : wp_title('| ', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-FRAME-OPTIONS" content="DENY">
	<meta http-equiv="X-FRAME-OPTIONS" content="SAMEORIGIN">
	<link rel="stylesheet" href="/wp-includes/typeicon/typicons.min.css" />
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
	<script src="//use.typekit.net/rlg0vno.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!--<script> 
jQuery(function ($) {
$('div[data-filter="filter-que-bueno-sauces"]').addClass('italic');
  }); 
</script> -->
<script>
   jQuery(function ($) {
        if (Modernizr.touch) {
            // show the close overlay button
            $(".close-overlay").removeClass("hidden");
            // handle the adding of hover class when clicked
            $(".img").click(function(e){
                if (!$(this).hasClass("hover")) {
                    $(this).addClass("hover");
                }
            });
            // handle the closing of the overlay
            $(".close-overlay").click(function(e){
                e.preventDefault();
                e.stopPropagation();
                if ($(this).closest(".img").hasClass("hover")) {
                    $(this).closest(".img").removeClass("hover");
                }
            });
        } else {
            // handle the mouseenter functionality
            $(".img").mouseenter(function(){
                $(this).addClass("hover");
            })
            // handle the mouseleave functionality
            .mouseleave(function(){
                $(this).removeClass("hover");
            });
        }
    });
</script>
<script>
 jQuery(function ($) {
    var $txtBlock = $('.possible-italic'),
        highlightClass = 'italic';
    $txtBlock.highlight('Que Bueno', highlightClass);
    
});
</script> 
</head>
<?php
	header( 'X-Frame-Options: DENY' );
	header( 'X-Frame-Options: SAMEORIGIN' );
?>
<body data-spy="scroll" data-target=".nav-collapse" data-offset="<?php echo get_option('scroll_link', '270'); ?>" <?php body_class(); ?>>

<div class="body-wrapper">

  <div id="header" class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
      
		<a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".nav-collapse">MENU</a>
		
		<a class="brand" href="<?php echo home_url(); ?>">
			<?php if( get_theme_mod('custom_logo') ) : ?>
				<img src="<?php echo get_theme_mod('custom_logo'); ?>" alt="<?php echo get_theme_mod('custom_logo_alt_text'); ?>" />
			<?php 
				else :
					echo bloginfo('title');
				endif; 
			?>
		</a>
		
		<div class="nav-collapse pull-right collapse">
		 <?php	
		  	if ( has_nav_menu( 'primary' ) ) { 
					$args = array(
						'theme_location' => 'primary',
						'container'	 => false,
						'menu_id' => 'main_menu',
						'menu_class'	 => 'nav',
						'walker'	 => new Bootstrap_Walker_Nav_Menu()
					);
		
					wp_nav_menu($args);
				} 
			?>
		</div>

	</div>
  </div>
</div>