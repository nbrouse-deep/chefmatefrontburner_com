<?php

	require_once(TOOLKIT . '/class.datasource.php');

	Class datasourceabout_us_intro extends SectionDatasource{

		public $dsParamROOTELEMENT = 'about-us-intro';
		public $dsParamORDER = 'desc';
		public $dsParamPAGINATERESULTS = 'yes';
		public $dsParamLIMIT = '20';
		public $dsParamSTARTPAGE = '1';
		public $dsParamREDIRECTONEMPTY = 'no';
		public $dsParamSORT = 'system:id';
		public $dsParamASSOCIATEDENTRYCOUNTS = 'no';
		

		

		public $dsParamINCLUDEDELEMENTS = array(
				'headline',
				'copy: formatted',
				'header-image'
		);
		

		public function __construct($env=NULL, $process_params=true){
			parent::__construct($env, $process_params);
			$this->_dependencies = array();
		}

		public function about(){
			return array(
				'name' => 'About Us Intro',
				'author' => array(
					'name' => 'sugar design studio',
					'website' => 'http://chefmate.dev',
					'email' => 'adam@sugards.com'),
				'version' => 'Symphony 2.3.1',
				'release-date' => '2013-02-07T15:43:37+00:00'
			);
		}

		public function getSource(){
			return '14';
		}

		public function allowEditorToParse(){
			return true;
		}

	}
