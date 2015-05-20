<?php

	require_once(TOOLKIT . '/class.datasource.php');

	Class datasourcequebueno extends SectionDatasource{

		public $dsParamROOTELEMENT = 'quebueno';
		public $dsParamORDER = 'asc';
		public $dsParamPAGINATERESULTS = 'no';
		public $dsParamLIMIT = '20';
		public $dsParamSTARTPAGE = '1';
		public $dsParamREDIRECTONEMPTY = 'no';
		public $dsParamSORT = 'order';
		public $dsParamASSOCIATEDENTRYCOUNTS = 'no';
		

		

		public $dsParamINCLUDEDELEMENTS = array(
				'headline',
				'introduction',
				'ingredients',
				'procedure: formatted',
				'image',
				'download',
				'recipe-url'
		);
		

		public function __construct($env=NULL, $process_params=true){
			parent::__construct($env, $process_params);
			$this->_dependencies = array();
		}

		public function about(){
			return array(
				'name' => 'QueBueno',
				'author' => array(
					'name' => 'sugar design studio',
					'website' => 'http://chefmate.dev',
					'email' => 'adam@sugards.com'),
				'version' => 'Symphony 2.3.1',
				'release-date' => '2013-12-12T17:08:51+00:00'
			);
		}

		public function getSource(){
			return '20';
		}

		public function allowEditorToParse(){
			return true;
		}

	}
