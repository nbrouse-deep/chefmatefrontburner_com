<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php echo (is_home() || is_front_page()) ? bloginfo('name') : wp_title('| ', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php wp_head(); ?>
  <script src="//use.typekit.net/kvr7che.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>
</head>

<body data-spy="scroll" data-target=".nav-collapse" data-offset="<?php echo get_option('scroll_link', '270'); ?>" <?php body_class(); ?>>

<div class="body-wrapper fb-tips">

  <div id="header" class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
      
    <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".nav-collapse"><i class='icon-menu-1'></i></a>
    
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
            'container'  => false,
            'menu_id' => 'main_menu',
            'menu_class'   => 'nav',
            'walker'   => new Bootstrap_Walker_Nav_Menu()
          );
    
          wp_nav_menu($args);
        } 
      ?>
    </div>

  </div>
  </div>
</div>
<?php 
  the_post(); 
  $format = get_post_format(); 
  if( false === $format || $format == 'standard' ) $format = 'image'; 
?>

          <div <?php post_class('post'); ?>>
            
            <div class="dark-wrapper">
             <div class="tips-bg"></div>
<div class="container tips">
<div class="theinnercontainer">
<h1 class="center sub-header">True to you promotional ideas</h1>
</div>
</div>
<div class="theinnercontainer">
  <div clas="row-fluid">
    <?php  get_template_part('loop/post', 'meta'); ?>
  <?php the_title('<h4 class="post-title center room">', '</h4>'); ?>
</div>
<div class="row-fluid">
  <div class="span10 offset1">
    <div class="business-tips-content">
      <?php the_content(); 
                wp_link_pages(); 
              ?>
  </div>
</div>
</div>
</div>
    </div>
</div>
<footer class="footer">
<div class="brown">
<div class="theinnercontainer">
<div class="row-fluid">
<div class="span9">
  <h3>ORDERING <span style="font-style:italic;">CHEF-MATE</span> PRODUCTS IS EASY. START TODAY.</h3>
</div>
  <div class="span3 hidden-phone">
<?php echo do_shortcode('[ninja-popup id=687]<div class="footer-contact-btn">Contact Us ›</div>[/ninja-popup]'); ?>
      </div>
<div class="span3 visible-phone">
<a href="/contact-us/"><div class="footer-contact-btn">
Contact Us ›</div></a>
      </div>
    </div>
  </div>
</div>
<div class="theinnercontainer">
<div class="row-fluid footerlogos">
<div class="span3">
<a href="https://www.nestleprofessional.com" target="_blank" ><img src="/wp-content/uploads/2014/10/nestle-logo.png" /></a>
</div>
<div class="span6">
<p class="terms"><a href="https://www.nestleprofessional.com/united-states/en/SiteArticles/Pages/PrivacyPolicy.aspx" target="_blank">Privacy Policy </a>| <a href="https://www.nestleprofessional.com/united-states/en/SiteArticles/Pages/TermsAndConditions.aspx?UrlReferrer=https%3a%2f%2fbasecamp.com%2f2175826%2fprojects%2f5040546%2fdocuments%2f7176368&UrlReferrer=https%3a%2f%2fbasecamp.com%2f2175826%2fpeople%2f8120761%2foutstanding_todos" target="_blank">Terms & Conditions </a> | <img src="/wp-content/uploads/2014/10/truste.png" /></p>
</div>
<div class="span3 cheflogofoot">
<a href="/"><img src="/wp-content/uploads/2014/10/chefmate-logo.png" /></a>
</div>
</div>
<div class="row-fluid trademark">
<p>All trademarks and other intellectual properties on this site are owned by Société des Produits Nestlé S.A., Vevey, Switzerland.</p>
</div>
</div>  
</footer>