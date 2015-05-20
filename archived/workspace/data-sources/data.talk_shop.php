<?php

	require_once(TOOLKIT . '/class.datasource.php');

	Class datasourcetalk_shop extends SectionDatasource{

		public $dsParamROOTELEMENT = 'talk-shop';
		public $dsParamORDER = 'desc';
		public $dsParamPAGINATERESULTS = 'yes';
		public $dsParamLIMIT = '20';
		public $dsParamSTARTPAGE = '1';
		public $dsParamREDIRECTONEMPTY = 'no';
		public $dsParamSORT = 'system:id';
		public $dsParamASSOCIATEDENTRYCOUNTS = 'no';
		

		

		public $dsParamINCLUDEDELEMENTS = array(
				'copy: formatted'
		);
		

		public function __construct($env=NULL, $process_params=true){
			parent::__construct($env, $process_params);
			$this->_dependencies = array();
		}

		public function about(){
			return array(
				'name' => 'Talk Shop',
				'author' => array(
					'name' => 'sugar design studio',
					'website' => 'http://chefmate.dev',
					'email' => 'adam@sugards.com'),
				'version' => 'Symphony 2.3.1',
				'release-date' => '2013-01-24T17:29:22+00:00'
			);
		}

		public function getSource(){
			return '10';
		}

		public function allowEditorToParse(){
			return true;
		}

	}
