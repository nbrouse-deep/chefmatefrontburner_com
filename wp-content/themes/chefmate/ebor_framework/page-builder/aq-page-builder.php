<?php

//definitions
if(!defined('AQPB_VERSION')) define( 'AQPB_VERSION', '1.1.2' );
if(!defined('AQPB_PATH')) define( 'AQPB_PATH', get_template_directory() . '/ebor_framework/page-builder/' );
if(!defined('AQPB_DIR')) define( 'AQPB_DIR', get_template_directory() . '/ebor_framework/page-builder/' );

//required functions & classes
require_once(AQPB_PATH . 'functions/aqpb_config.php');
require_once(AQPB_PATH . 'functions/aqpb_blocks.php');
require_once(AQPB_PATH . 'classes/class-aq-page-builder.php');
require_once(AQPB_PATH . 'classes/class-aq-block.php');
require_once(AQPB_PATH . 'functions/aqpb_functions.php');

//some default blocks
require_once(AQPB_PATH . 'blocks/aq-text-block.php');
require_once(AQPB_PATH . 'blocks/aq-image-block.php');
require_once(AQPB_PATH . 'blocks/aq-clear-block.php');
require_once(AQPB_PATH . 'blocks/aq-alert-block.php');
require_once(AQPB_PATH . 'blocks/aq-tabs-block.php');
require_once(AQPB_PATH . 'blocks/aq-blog-block.php');
require_once(AQPB_PATH . 'blocks/aq-portfolio-block.php');
require_once(AQPB_PATH . 'blocks/aq-team-block.php');
require_once(AQPB_PATH . 'blocks/aq-service-columns-block.php');
require_once(AQPB_PATH . 'blocks/aq-testimonials-block.php');
require_once(AQPB_PATH . 'blocks/aq-pricing-table-block.php');
require_once(AQPB_PATH . 'blocks/aq-skills-block.php');
require_once(AQPB_PATH . 'blocks/aq-gallery-block.php');
require_once(AQPB_PATH . 'blocks/aq-dribbble-block.php');
require_once(AQPB_PATH . 'blocks/aq-map-block.php');

//register default blocks
aq_register_block('AQ_Text_Block');
aq_register_block('AQ_Image_Block');
aq_register_block('AQ_Clear_Block');
aq_register_block('AQ_Alert_Block');
aq_register_block('AQ_Tabs_Block');
aq_register_block('AQ_Team_Block');
aq_register_block('AQ_Blog_Block');
aq_register_block('AQ_Portfolio_Block');
aq_register_block('AQ_Service_Columns_Block');
aq_register_block('AQ_Testimonials_Block');
aq_register_block('AQ_Pricing_Table_Block');
aq_register_block('AQ_Skills_Block');
aq_register_block('AQ_Gallery_Block');
aq_register_block('AQ_Dribbble_Block');
aq_register_block('AQ_Map_Block');

//fire up page builder
$aqpb_config = aq_page_builder_config();
$aq_page_builder = new AQ_Page_Builder($aqpb_config);
if(!is_network_admin()) $aq_page_builder->init();