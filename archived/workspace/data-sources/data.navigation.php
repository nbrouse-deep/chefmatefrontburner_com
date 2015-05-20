<?php

	require_once(TOOLKIT . '/class.datasource.php');

	Class datasourcenavigation extends NavigationDatasource{

		public $dsParamROOTELEMENT = 'navigation';
		public $dsParamORDER = 'desc';
		public $dsParamREDIRECTONEMPTY = 'no';
		

		

		

		public function __construct($env=NULL, $process_params=true){
			parent::__construct($env, $process_params);
			$this->_dependencies = array();
		}

		public function about(){
			return array(
				'name' => 'Navigation',
				'author' => array(
					'name' => 'sugar design studio',
					'website' => 'http://chefmate.dev',
					'email' => 'adam@sugards.com'),
				'version' => 'Symphony 2.3.1',
				'release-date' => '2013-01-24T20:23:34+00:00'
			);
		}

		public function getSource(){
			return 'navigation';
		}

		public function allowEditorToParse(){
			return true;
		}

	}
