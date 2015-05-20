<?php
	$settings = array(


		###### ADMIN ######
		'admin' => array(
			'max_upload_size' => '5242880',
		),
		########


		###### SYMPHONY ######
		'symphony' => array(
			'pagination_maximum_rows' => '99999',
			'lang' => 'en',
			'pages_table_nest_children' => 'no',
			'version' => '2.3.1',
			'cookie_prefix' => 'sym-',
			'session_gc_divisor' => '10',
		),
		########


		###### LOG ######
		'log' => array(
			'archive' => '1',
			'maxsize' => '102400',
		),
		########


		###### DATABASE ######
		'database' => array(
			'host' => '10.181.131.196',
			'port' => '3306',
			'user' => 'ussql04',
			'password' => 'ZNa2AjUUERNbzr6C',
			'db' => 'chefmatefrontburner_com',
			'tbl_prefix' => 'sym_',
		),
		########


		###### PUBLIC ######
		'public' => array(
			'display_event_xml_in_source' => 'no',
		),
		########


		###### GENERAL ######
		'general' => array(
			'sitename' => 'Chef-mate: The Front Burner',
		),
		########


		###### FILE ######
		'file' => array(
			'write_mode' => '0644',
		),
		########


		###### DIRECTORY ######
		'directory' => array(
			'write_mode' => '0755',
		),
		########


		###### REGION ######
		'region' => array(
			'time_format' => 'g:i a',
			'date_format' => 'm/d/Y',
			'datetime_separator' => ' ',
			'timezone' => 'America/Los_Angeles',
		),
		########


		###### IMAGE ######
		'image' => array(
			'cache' => '1',
			'quality' => '90',
			'disable_regular_rules' => 'no',
		),
		########


		###### MAINTENANCE_MODE ######
		'maintenance_mode' => array(
			'enabled' => 'no',
		),
		########


		###### SORTING ######
		'sorting' => array(
			'section_partners_sortby' => '25',
			'section_partners_order' => 'asc',
			'section_products_sortby' => '37',
			'section_products_order' => 'asc',
			'section_promo-ideas_sortby' => '1',
			'section_promo-ideas_order' => 'desc',
			'section_product-categories_sortby' => '31',
			'section_product-categories_order' => 'asc',
			'section_business-tips_sortby' => '113',
			'section_business-tips_order' => 'asc',
			'section_contest-entries_sortby' => '86',
			'section_contest-entries_order' => 'asc',
		),
		########


		###### SEARCH_INDEX ######
		'search_index' => array(
			're-index-per-page' => '20',
			're-index-refresh-rate' => '0.5',
			'get-param-prefix' => null,
			'get-param-keywords' => 'keywords',
			'get-param-per-page' => 'per-page',
			'get-param-sort' => 'sort',
			'get-param-direction' => 'direction',
			'get-param-sections' => 'sections',
			'get-param-page' => 'page',
			'default-sections' => 'business-tips,business-tips-intro,categories,contest-intro,menu-ideas,menu-ideas-intro,partners,partners-intro,products,products-intro,promo-ideas,promo-ideas-intro',
			'default-per-page' => '100',
			'default-sort' => 'score',
			'default-direction' => 'desc',
			'excerpt-length' => '500',
			'min-word-length' => '3',
			'max-word-length' => '30',
			'stem-words' => 'yes',
			'build-entries' => 'yes',
			'mode' => 'like',
			'log-keywords' => 'yes',
			'indexes' => 'a:11:{i:4;a:3:{s:6:\"fields\";a:4:{i:0;s:8:\"headline\";i:1;s:6:\"author\";i:2;s:7:\"lead-in\";i:3;s:4:\"copy\";}s:9:\"weighting\";s:1:\"2\";s:7:\"filters\";a:0:{}}i:9;a:3:{s:6:\"fields\";a:2:{i:0;s:8:\"headline\";i:1;s:4:\"copy\";}s:9:\"weighting\";s:1:\"2\";s:7:\"filters\";a:0:{}}i:6;a:3:{s:6:\"fields\";a:1:{i:0;s:4:\"name\";}s:9:\"weighting\";s:1:\"2\";s:7:\"filters\";a:0:{}}i:15;a:3:{s:6:\"fields\";a:2:{i:0;s:8:\"headline\";i:1;s:4:\"copy\";}s:9:\"weighting\";s:1:\"2\";s:7:\"filters\";a:0:{}}i:3;a:3:{s:6:\"fields\";a:6:{i:0;s:8:\"headline\";i:1;s:6:\"author\";i:2;s:7:\"lead-in\";i:3;s:12:\"introduction\";i:4;s:11:\"ingredients\";i:5;s:9:\"procedure\";}s:9:\"weighting\";s:1:\"2\";s:7:\"filters\";a:0:{}}i:13;a:3:{s:6:\"fields\";a:2:{i:0;s:8:\"headline\";i:1;s:4:\"copy\";}s:9:\"weighting\";s:1:\"2\";s:7:\"filters\";a:0:{}}i:12;a:3:{s:6:\"fields\";a:2:{i:0;s:8:\"headline\";i:1;s:4:\"copy\";}s:9:\"weighting\";s:1:\"2\";s:7:\"filters\";a:0:{}}i:7;a:3:{s:6:\"fields\";a:3:{i:0;s:4:\"name\";i:1;s:11:\"description\";i:2;s:8:\"category\";}s:9:\"weighting\";s:1:\"2\";s:7:\"filters\";a:0:{}}i:14;a:3:{s:6:\"fields\";a:2:{i:0;s:8:\"headline\";i:1;s:4:\"copy\";}s:9:\"weighting\";s:1:\"2\";s:7:\"filters\";a:0:{}}i:1;a:3:{s:6:\"fields\";a:4:{i:0;s:8:\"headline\";i:1;s:6:\"author\";i:2;s:7:\"lead-in\";i:3;s:4:\"copy\";}s:9:\"weighting\";s:1:\"2\";s:7:\"filters\";a:0:{}}i:11;a:3:{s:6:\"fields\";a:2:{i:0;s:8:\"headline\";i:1;s:4:\"copy\";}s:9:\"weighting\";s:1:\"2\";s:7:\"filters\";a:0:{}}}',
		),
		########


		###### CKEDITOR ######
		'ckeditor' => array(
			'styles' => null,
		),
		########


		###### EMAIL ######
		'email' => array(
			'default_gateway' => 'sendmail',
		),
		########


		###### EMAIL_SENDMAIL ######
		'email_sendmail' => array(
			'from_name' => null,
			'from_address' => null,
		),
		########


		###### EMAIL_SMTP ######
		'email_smtp' => array(
			'from_name' => null,
			'from_address' => null,
			'host' => '127.0.0.1',
			'port' => '25',
			'secure' => 'no',
			'auth' => '0',
			'username' => null,
			'password' => null,
		),
		########


		###### DATETIME ######
		'datetime' => array(
			'english' => 'en, en_GB.UTF8, en_GB',
		),
		########


		###### HTML5_DOCTYPE ######
		'html5_doctype' => array(
			'exclude_pagetypes' => null,
		),
		########
	);
