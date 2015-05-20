<?php 

	add_action('wp_head','ebor_custom_colours', 100);
	function ebor_custom_colours(){
	
	$highlight = get_theme_mod('highlight_colour','#1abb9c');
	$highlight_hover = get_theme_mod('highlight_hover_colour','#17a78b');
	$footer_background = get_theme_mod('footer_background','#ffffff');
	$header_background = get_theme_mod('header_background','#ffffff');
	$section_heading = get_theme_mod('section_heading','#ffffff');
	$gallery_height = get_option('gallery_height','600');
	
?>
	
		<style type="text/css">
			
			a, 
			.page-template-page_contact-php .contact-info i,
			.post-title a:hover,
			ul.bullet li:before,
			blockquote small {
			    color: <?php echo $highlight; ?>;
			}
			.section-head,
			.btn,
			.btn-group > .btn,
			.parallax .btn,
			input[type="submit"] {
			    background: <?php echo $highlight; ?>;
			}
			.section-head h1:after {
			    border-top-color: <?php echo $highlight; ?>;
			}
			input[type="submit"]{
				color: #fff;
			}
			.btn:hover,
			.btn:focus,
			.btn:active,
			.btn.active,
			input[type="submit"]:hover {
			    background: <?php echo $highlight_hover; ?>;
			}
			.pagination ul > li > a,
			.pagination ul > li > span {
			    background: <?php echo $highlight; ?>;
			}
			.pagination ul > li > a:hover,
			.pagination ul > li > a:focus,
			.pagination ul > .active > a,
			.pagination ul > .active > span {
			    background: <?php echo $highlight_hover; ?>
			}
			#header.navbar .nav > .active > a,
			#header.navbar .nav > .active > a:hover,
			#header.navbar .nav > .active > a:focus,
			#header.navbar .nav > li > a:hover,
			#header.navbar .nav li.dropdown.open > .dropdown-toggle,
			#header.navbar .nav li.dropdown.active > .dropdown-toggle,
			#header.navbar .nav li.dropdown.open.active > .dropdown-toggle {
			    color: <?php echo $highlight; ?>;
			}
			.post .meta a:hover {
			    color: <?php echo $highlight; ?>
			}
			.sidebox a:hover {
			    color: <?php echo $highlight; ?>
			}
			#comments .info h2 a:hover {
			    color: <?php echo $highlight; ?>
			}
			#comments a.reply-link:hover, #comments .comment-reply-link:hover {
			    color: <?php echo $highlight; ?>
			}
			.shots .overlay a .more,
			.post .overlay a .more,
			.post-list .overlay a .more {
			    background: <?php echo $highlight; ?>;
			}
			.parallax a:hover {
			    color: <?php echo $highlight; ?>
			}
			.filter li a.active,
			.filter li a:hover {
			    color: <?php echo $highlight; ?>
			}
			.thumbs li a .overlay {
			    background: <?php echo $highlight; ?>;
			}
			.item-details span,
			.item-details a:hover,
			.pricing .plan h4 span,
			.accordion-heading .accordion-toggle:hover,
			.nav-tabs > .active > a,
			.nav.nav-tabs > li > a:hover,
			.nav.nav-tabs > li > a:focus {
			    color: <?php echo $highlight; ?>;
			}
			@media (min-width: 768px) and (max-width: 979px) { 
				#header .dropdown-menu li a:hover,
				#header .dropdown-menu li a.active,
				#header .dropdown-menu > li > a:hover,
				#header .dropdown-menu > li > a:focus,
				#header .dropdown-submenu:hover > a,
				#header .dropdown-submenu:focus > a,
				#header .dropdown-menu > .active > a,
				#header .dropdown-menu > .active > a:hover,
				#header .dropdown-menu > .active > a:focus,
				#header .nav-collapse .nav > li > a:hover,
				#header .nav-collapse .nav > li > a:focus,
				#header .nav-collapse .dropdown-menu a:hover,
				#header .nav-collapse .dropdown-menu a:focus {
				    color: <?php echo $highlight; ?>;
				}
			}
			@media (max-width: 767px) { 
				#header .dropdown-menu li a:hover,
				#header .dropdown-menu li a.active,
				#header .dropdown-menu > li > a:hover,
				#header .dropdown-menu > li > a:focus,
				#header .dropdown-submenu:hover > a,
				#header .dropdown-submenu:focus > a,
				#header .dropdown-menu > .active > a,
				#header .dropdown-menu > .active > a:hover,
				#header .dropdown-menu > .active > a:focus,
				#header .nav-collapse .nav > li > a:hover,
				#header .nav-collapse .nav > li > a:focus,
				#header .nav-collapse .dropdown-menu a:hover,
				#header .nav-collapse .dropdown-menu a:focus {
				    color: <?php echo $highlight; ?>;
				}
			}
			
			footer {
				background: <?php echo $footer_background; ?>;
			}
			
			div#header.navbar {
				background: <?php echo $header_background; ?>;
			}
			
			.section-head h1 {
				color: <?php echo $section_heading; ?>;
			}
			
			.portfolio-bannercontainer {
			    width: 100% !important;
			    position: relative;
			    padding: 0;
			    max-height: <?php echo $gallery_height; ?>px !important;
			    overflow: hidden;
			    margin-bottom: 50px;
			}
			
			<?php echo get_theme_mod('custom_css',''); ?>
			
		</style>
	
<?php }