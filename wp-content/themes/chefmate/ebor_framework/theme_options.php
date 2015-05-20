<?php 

add_action('customize_register', 'kyte_customize');
function kyte_customize($wp_customize) {

class Example_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="3" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
    }
}

class CBP_Customizer_Number_Control extends WP_Customize_Control {

	public $type = 'number';
	
	public function render_content() {
	?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
		</label>
	<?php
	}
	
}

$social_options = array(
    'pinterest'=> 'Pinterest',
    'rss'=> 'RSS',
    'facebook'=> 'Facebook',
    'twitter'=> 'Twitter',
    'flickr'=> 'Flickr',
    'dribbble'=> 'Dribbble',
    'behance'=> 'Behance',
    'linkedin'=> 'LinkedIn',
    'vimeo'=> 'Vimeo',
    'youtube'=> 'Youtube',
    'kkype'=> 'Skype',
    'tumblr'=> 'Tumblr',
    'delicious'=> 'Delicious',
    '500px'=> '500px',
    'grooveshark'=> 'Grooveshark',
    'forrst'=> 'Forrst',
    'digg'=> 'Digg',
    'blogger'=> 'Blogger',
    'klout'=> 'Klout',
    'dropbox'=> 'Dropbox',
    'github'=> 'Github',
    'songkick'=> 'Singkick',
    'posterous'=> 'Posterous',
    'appnet'=> 'Appnet',
    'gplus'=> 'Google Plus',
    'stumbleupon'=> 'Stumbleupon',
    'lastfm'=> 'LastFM',
    'spotify'=> 'Spotify',
    'instagram'=> 'Instagram',
    'evernote'=> 'Evernote',
    'paypal'=> 'Paypal',
    'picasa'=> 'Picasa',
    'soundcloud'=> 'Soundcloud',
);
	
///////////////////////////////////////
//     SITE SECTION                 //
/////////////////////////////////////
	
	$wp_customize->add_section( 'site_settings', array(
		'title'          => 'Site Settings',
		'priority'       => 34,
	) );
	
	//scroll offset
	$wp_customize->add_setting( 'scroll_offset', array(
	    'default'        => '90',
	    'type' => 'option'
	) );
	
	//scroll_offset
	$wp_customize->add_control( new CBP_Customizer_Number_Control( $wp_customize, 'scroll_offset', array(
	    'label' => __('Scroll Offset - Controls the offset of the header when scrolling.', 'kyte'),
	    'type' => 'number',
	    'section' => 'site_settings',
	    'priority'       => 4,
	) ) );
	
	//scroll offset
	$wp_customize->add_setting( 'scroll_link', array(
	    'default'        => '270',
	    'type' => 'option'
	) );
	
	//scroll_offset
	$wp_customize->add_control( new CBP_Customizer_Number_Control( $wp_customize, 'scroll_link', array(
	    'label' => __('Scroll Link - Adjust if header links are not highlighting at the right point. Larger numbers move the higlight point up the page.', 'kyte'),
	    'type' => 'number',
	    'section' => 'site_settings',
	    'priority'       => 5,
	) ) );
	
	//gallery height
	$wp_customize->add_setting( 'gallery_height', array(
	    'default'        => '600',
	    'type' => 'option'
	) );
	
	//header height
	$wp_customize->add_control( new CBP_Customizer_Number_Control( $wp_customize, 'gallery_height', array(
	    'label' => __('GLOBAL - Adjust height of post galleries', 'kyte'),
	    'type' => 'number',
	    'section' => 'portfolio_settings',
	    'priority'       => 3,
	) ) );
	
	//fullwidth home
	$wp_customize->add_setting( 'full_home', array(
	    'default' => 1,
	) );
	
	//fullwidth home
	$wp_customize->add_control( 'full_home', array(
	    'label' => __('Use full-width home section?', 'kyte'),
	    'type' => 'checkbox',
	    'section' => 'site_settings',
	    'priority'       => 7,
	) );
	
	//redirect children
	$wp_customize->add_setting( 'redirect_children', array(
	    'default' => 1,
	) );
	
	//redirect children
	$wp_customize->add_control( 'redirect_children', array(
	    'label' => __('Redirect child pages updwards to parent?', 'kyte'),
	    'type' => 'checkbox',
	    'section' => 'site_settings',
	    'priority'       => 7,
	) );

///////////////////////////////////////
//     BLOG SECTION                 //
/////////////////////////////////////
	
	//CREATE CUSTOM STYLING SUBSECTION
	$wp_customize->add_section( 'blog_settings', array(
		'title'          => 'Blog Settings',
		'priority'       => 35,
	) );
	
	//BLOG TITLE
	$wp_customize->add_setting( 'blog_title', array(
	    'default'        => 'This is Our Blog'
	) );
	
	//blog title
	$wp_customize->add_control( 'blog_title', array(
	    'label' => __('Blog Section Title', 'kyte'),
	    'type' => 'text',
	    'section' => 'blog_settings',
	    'priority'       => 1,
	) );
	
	//comments TITLE
	$wp_customize->add_setting( 'comments_title', array(
	    'default'        => 'Would you like to share your thoughts?'
	) );
	
	//commentstitle
	$wp_customize->add_control( 'comments_title', array(
	    'label' => __('Comments Title', 'kyte'),
	    'type' => 'text',
	    'section' => 'blog_settings',
	    'priority'       => 2,
	) );
	
	//comments subTITLE
	$wp_customize->add_setting( 'comments_subtitle', array(
	    'default'        => 'Would you like to share your thoughts?'
	) );
	
	//comments subtitle
	$wp_customize->add_control( 'comments_subtitle', array(
	    'label' => __('Comments Sub-title', 'kyte'),
	    'type' => 'text',
	    'section' => 'blog_settings',
	    'priority'       => 3,
	) );
	
	//index date
	$wp_customize->add_setting( 'index_date', array(
	    'default' => 1,
	) );
	
	//index date
	$wp_customize->add_control( 'index_date', array(
	    'label' => __('META - INDEX - Show date?', 'kyte'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 7,
	) );
	
	//index categories
	$wp_customize->add_setting( 'index_categories', array(
	    'default' => 1,
	) );
	
	//index categories
	$wp_customize->add_control( 'index_categories', array(
	    'label' => __('META - INDEX - Show categories?', 'kyte'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 8,
	) );
	
	//index likes
	$wp_customize->add_setting( 'index_likes', array(
	    'default' => 1,
	) );
	
	//index likes
	$wp_customize->add_control( 'index_likes', array(
	    'label' => __('META - INDEX - Show likes?', 'kyte'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 10,
	) );
	
	//single date
	$wp_customize->add_setting( 'single_date', array(
	    'default' => 1,
	) );
	
	//single date
	$wp_customize->add_control( 'single_date', array(
	    'label' => __('META - SINGLE - Show date?', 'kyte'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 11,
	) );
	
	//single categories
	$wp_customize->add_setting( 'single_categories', array(
	    'default' => 1,
	) );
	
	//single categories
	$wp_customize->add_control( 'single_categories', array(
	    'label' => __('META - SINGLE - Show categories?', 'kyte'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 12,
	) );
	
	//single likes
	$wp_customize->add_setting( 'single_likes', array(
	    'default' => 1,
	) );
	
	//single likes
	$wp_customize->add_control( 'single_likes', array(
	    'label' => __('META - SINGLE - Show likes?', 'kyte'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 14,
	) );
	
	//carousel link
	$wp_customize->add_setting( 'single_tags', array(
	    'default' => 1,
	) );
	
	//carousel link
	$wp_customize->add_control( 'single_tags', array(
	    'label' => __('META - SINGLE - Show Tags?', 'kyte'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 15,
	) );
	
	
///////////////////////////////////////
//     PORTFOLIO SECTION            //
/////////////////////////////////////
	
	//CREATE CUSTOM STYLING SUBSECTION
	$wp_customize->add_section( 'portfolio_settings', array(
		'title'          => 'Portfolio Settings',
		'priority'       => 36,
	) ); 
	
	//blog layout
	$wp_customize->add_setting('portfolio_layout', array(
	    'default' => 'showcase',
	    'type' => 'option'
	));
	
	//blog layout
	$wp_customize->add_control( 'portfolio_layout', array(
	    'label'   => __('Choose layout for Portfolio Archives.', 'kyte'),
	    'section' => 'portfolio_settings',
	    'type'    => 'select',
	    'priority' => 3,
	    'choices'    => array(
	        'portfoliolightbox' => 'Lightbox',
	        'portfolioshowcase' => 'Showcase',
	    ),
	));
	
	//portfolio TITLE
	$wp_customize->add_setting( 'portfolio_title', array(
	    'default'        => "Our Portfolio"
	) );
	
	//portfolio TITLE
	$wp_customize->add_control( 'portfolio_title', array(
	    'label'   => __('Title of your Portfolio', 'kyte'),
	    'type' => 'text',
	    'section' => 'portfolio_settings',
	    'priority' => 5
	) );
	
	//portfolio posts
	$wp_customize->add_setting( 'portfolio_posts_per_page', array(
	    'default'        => "20",
	    'type' => 'option'
	) );
	
	//portfolio posts
	$wp_customize->add_control( 'portfolio_posts_per_page', array(
	    'label'   => __('GLOBAL - Posts Per Page for Portfolio', 'kyte'),
	    'type' => 'text',
	    'section' => 'portfolio_settings',
	    'priority' => 5
	) );
	
	//portfolio date
	$wp_customize->add_setting( 'portfolio_single', array(
	    'default' => 0,
	) );
	
	//portfolio date
	$wp_customize->add_control( 'portfolio_single', array(
	    'label' => 'INDEX & ARCHIVES - Disable AJAX Single Posts?',
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	    'priority' => 6
	) );

	//portfolio date
	$wp_customize->add_setting( 'portfolio_date', array(
	    'default' => 1,
	) );
	
	//portfolio date
	$wp_customize->add_control( 'portfolio_date', array(
	    'label' => 'META - SINGLE - Show project date?',
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );
	
	//portfolio categories
	$wp_customize->add_setting( 'portfolio_categories', array(
	    'default' => 1,
	) );
	
	//portfolio categories
	$wp_customize->add_control( 'portfolio_categories', array(
	    'label' => 'META - SINGLE - Show project categories?',
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );
	
	//portfolio client
	$wp_customize->add_setting( 'portfolio_client', array(
	    'default' => 1,
	) );
	
	//portfolio client
	$wp_customize->add_control( 'portfolio_client', array(
	    'label' => 'META - SINGLE - Show project client?',
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );
	
	//portfolio url
	$wp_customize->add_setting( 'portfolio_url', array(
	    'default' => 1,
	) );
	
	//portfolio url
	$wp_customize->add_control( 'portfolio_url', array(
	    'label' => 'META - SINGLE - Show project URL?',
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );
	
	//portfolio url
	$wp_customize->add_setting( 'lightbox_title', array(
	    'default' => 1,
	) );
	
	//portfolio url
	$wp_customize->add_control( 'lightbox_title', array(
	    'label' => 'LIGHTBOX PORTFOLIO - Show title as caption?',
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );
	
	
///////////////////////////////////////
//     TEAM SECTION                 //
/////////////////////////////////////
	
	//CREATE TEAM SUBSECTION
	$wp_customize->add_section( 'team_settings', array(
		'title'          => 'Team Settings',
		'priority'       => 37,
	) ); 
	
	//TEAM TITLE
	$wp_customize->add_setting( 'team_title', array(
	    'default'        => "Team"
	) );
	
	//TEAM TITLE
	$wp_customize->add_control( 'team_title', array(
	    'label'   => __('Team Page Title<img src="http://www.ten28.com/qa.jpg">', 'kyte'),
	    'section' => 'team_settings',
	    'type' => 'text'
	) );
	
	//team columns
	$wp_customize->add_setting("team_columns", array(
	    'default'        => '3'
	));
	
	//team columns
	$wp_customize->add_control( "team_columns", array(
	    'label'   => __("META - GLOBAL - Columns to Display Team", 'kyte'),
	    'section' => 'team_settings',
	    'type'    => 'select',
	    'priority' => 10,
	    'choices'    => array(
	    	'3' => '3',
	    	'4' => '4',
	    	'2' => '2'
	    )
	));
	
	//team link to single
	$wp_customize->add_setting( 'team_link', array(
	    'default' => 0,
	) );
	
	//link team to single
	$wp_customize->add_control( 'team_link', array(
	    'label' => 'INDEX - Link Team Member to single post?',
	    'type' => 'checkbox',
	    'section' => 'team_settings',
	) );
	

///////////////////////////////////////
//     COLOURS SECTION              //
/////////////////////////////////////

//header colour
$wp_customize->add_setting('header_background', array(
    'default'           => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
));

//header colour
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_background', array(
    'label'    => __('HEADER - Header Background Colour - W  P L O  C  K E R  .C O M ', 'kyte'),
    'section'  => 'colors',
)));

//footer colour
$wp_customize->add_setting('footer_background', array(
    'default'           => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
));

//footer colour
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_background', array(
    'label'    => __('FOOTER - Footer Background Colour', 'kyte'),
    'section'  => 'colors',
)));

//highlight colour
$wp_customize->add_setting('highlight_colour', array(
    'default'           => '#1abb9c',
    'sanitize_callback' => 'sanitize_hex_color',
));

//highlight colour
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'highlight_colour', array(
    'label'    => __('GLOBAL - Highlight Colour', 'kyte'),
    'section'  => 'colors',
)));

//highlight hover colour
$wp_customize->add_setting('highlight_hover_colour', array(
    'default'           => '#17a78b',
    'sanitize_callback' => 'sanitize_hex_color',
));

//highlight hover colour
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'highlight_hover_colour', array(
    'label'    => __('GLOBAL - Highlight Hover Colour', 'kyte'),
    'section'  => 'colors',
)));

//section heading colour
$wp_customize->add_setting('section_heading', array(
    'default'           => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
));

//section heading colour
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'section_heading', array(
    'label'    => __('SECTIONS - Section Heading Color', 'kyte'),
    'section'  => 'colors',
)));


///////////////////////////////////////
//     CUSTOM LOGO SECTION          //
/////////////////////////////////////
	
	//CREATE CUSTOM LOGO SUBSECTION
	$wp_customize->add_section( 'custom_logo_section', array(
		'title'          => 'Custom Logo',
		'priority'       => 30,
	) );

	//CUSTOM LOGO SETTINGS
    $wp_customize->add_setting('custom_logo', array(
        'default'           => ''

    ));
	
	//CUSTOM LOGO
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
        'label'    => __('Custom Logo Upload', 'kyte'),
        'section'  => 'custom_logo_section'
    )));
    
    //CUSTOM RETINA LOGO SETTINGS
    $wp_customize->add_setting('custom_logo_retina', array(
        'default'           => ''

    ));
	
	//CUSTOM RETINA LOGO
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_logo_retina', array(
        'label'    => __('Retina Logo - Needs @2x on the file e.g logo@2x.png', 'kyte'),
        'section'  => 'custom_logo_section'
    )));
    
    //logo alt text
    $wp_customize->add_setting( 'custom_logo_alt_text', array(
        'default'        => 'Alt Text'
    ) );
    
    //logo alt text
    $wp_customize->add_control( 'custom_logo_alt_text', array(
        'label' => __('Custom Logo Alt Text', 'kyte'),
        'type' => 'text',
        'section' => 'custom_logo_section',
    ) );
    

///////////////////////////////////////
//     CUSTOM FAVICON SECTION       //
/////////////////////////////////////
	

	//CUSTOM FAVICON SETTINGS
    $wp_customize->add_setting('custom_favicon', array(
        'default'           => '',

    ));
	
	//CUSTOM FAVICON
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_favicon', array(
        'label'    => __('Custom Favicon Upload', 'kyte'),
        'section'  => 'title_tagline',
        'settings' => 'custom_favicon',
        'priority'       => 21,
    )));
    
    //CUSTOM FAVICON SETTINGS
        $wp_customize->add_setting('mobile_favicon', array(
            'default'           => '',
    
        ));
    	
    	//CUSTOM FAVICON
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mobile_favicon', array(
            'label'    => __('Non-Retina Mobile Favicon Upload', 'kyte'),
            'section'  => 'title_tagline',
            'settings' => 'mobile_favicon',
            'priority'       => 22,
        )));
        
    //CUSTOM FAVICON SETTINGS
        $wp_customize->add_setting('72_favicon', array(
            'default'           => '',
    
        ));
    	
    	//CUSTOM FAVICON
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, '72_favicon', array(
            'label'    => __('1st & 2nd Generation iPad Favicon (72x72px)', 'kyte'),
            'section'  => 'title_tagline',
            'settings' => '72_favicon',
            'priority'       => 23,
        )));
   
   //CUSTOM FAVICON SETTINGS
       $wp_customize->add_setting('114_favicon', array(
           'default'           => '',
       ));
   	
   	//CUSTOM FAVICON
       $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, '114_favicon', array(
           'label'    => __('Retina iPhone Favicon (114x114px)', 'kyte'),
           'section'  => 'title_tagline',
           'settings' => '114_favicon',
           'priority'       => 24,
       )));

//CUSTOM FAVICON SETTINGS
    $wp_customize->add_setting('144_favicon', array(
        'default'           => '',
    ));
	
	//CUSTOM FAVICON
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, '144_favicon', array(
        'label'    => __('Retina iPad Favicon (144x144px)', 'kyte'),
        'section'  => 'title_tagline',
        'settings' => '144_favicon',
        'priority'       => 25,
    )));

   
   ///////////////////////////////////////
   //     CUSTOM CSS SECTION           //
   /////////////////////////////////////
   	
   	//CREATE CUSTOM CSS SUBSECTION
   	$wp_customize->add_section( 'custom_css_section', array(
   		'title'          => 'Custom CSS',
   		'priority'       => 200,
   	) ); 
      
      $wp_customize->add_setting( 'custom_css', array(
          'default'        => '',
      ) );
       
      $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'custom_css', array(
          'label'   => __('Custom CSS', 'kyte'),
          'section' => 'custom_css_section',
          'settings'   => 'custom_css',
      ) ) );
      
      
      ///////////////////////////////////////
      //     FOOTER SETTINGS             //
      /////////////////////////////////////
      	
      	//CREATE CUSTOM CSS SUBSECTION
      	$wp_customize->add_section( 'footer_section', array(
      		'title'          => 'Footer Settings',
      		'priority'       => 40,
      	) );
      	
      	$i = 1;
      	while( $i < 11 ){
      		//footer social 1
      		$wp_customize->add_setting("footer_social_$i", array(
      		    'default'        => 'pinterest'
      		));
      		
      		//footer social 1
      		$wp_customize->add_control( "footer_social_$i", array(
      		    'label'   => __("Footer Social Icon $i", 'kyte'),
      		    'section' => 'footer_section',
      		    'type'    => 'select',
      		    'priority' => 10 + $i + $i,
      		    'choices'    => $social_options
      		));
      		
      		//footer social 1 link
      		$wp_customize->add_setting( "footer_social_link_$i", array(
      		    'default'        => ''
      		) );
      		
      		//footer social 1 link
      		$wp_customize->add_control( "footer_social_link_$i", array(
      		    'label' => __("Footer Social Link $i", 'kyte'),
      		    'type' => 'text',
      		    'section' => 'footer_section',
      		    'priority' => 11 + $i + $i,
      		) );
      		$i++;
      	}
      	
      	//copyright text
      	$wp_customize->add_setting( 'copyright', array(
      	    'default'        => 'Configure in "Appearance" => "Customise kyte" => "Footer"',
      	) );
      	
      	//copyright text
      	$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'copyright', array(
      	    'label'   => __('SubFooter Copyright Text', 'kyte'),
      	    'section' => 'footer_section',
      	    'settings'   => 'copyright',
      	    'priority' => 40,
      	) ) );
         
         $wp_customize->add_setting( 'google_analytics', array(
             'default'        => '',
         ) );
          
         $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'google_analytics', array(
             'label'   => __('Google Analytics Code - Include <script>!', 'kyte'),
             'section' => 'footer_section',
             'settings'   => 'google_analytics',
             'priority' => 50,
         ) ) );
   
}

?>