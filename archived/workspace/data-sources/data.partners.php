<?php

	require_once(TOOLKIT . '/class.datasource.php');

	Class datasourcepartners extends SectionDatasource{

		public $dsParamROOTELEMENT = 'partners';
		public $dsParamORDER = 'desc';
		public $dsParamPAGINATERESULTS = 'yes';
		public $dsParamLIMIT = '20';
		public $dsParamSTARTPAGE = '1';
		public $dsParamREDIRECTONEMPTY = 'no';
		public $dsParamSORT = 'system:id';
		public $dsParamASSOCIATEDENTRYCOUNTS = 'no';
		

		

		public $dsParamINCLUDEDELEMENTS = array(
				'name',
				'show-in-sidebar',
				'large-logo',
				'small-logo',
				'url'
		);
		

		public function __construct($env=NULL, $process_params=true){
			parent::__construct($env, $process_params);
			$this->_dependencies = array();
		}

		public function about(){
			return array(
				'name' => 'Partners',
				'author' => array(
					'name' => 'sugar design studio',
					'website' => 'http://chefmate.dev',
					'email' => 'adam@sugards.com'),
				'version' => 'Symphony 2.3.1',
				'release-date' => '2013-01-30T15:41:17+00:00'
			);
		}

		public function getSource(){
			return '5';
		}

		public function allowEditorToParse(){
			return true;
		}

	}
