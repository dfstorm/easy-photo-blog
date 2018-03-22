<?php
	// panelControler

	class panelControler {

		public $core = false;
		function __construct(&$coreCi) {
			$this->core = $coreCi;
		}
		public function index()
		{
			if (!$_SESSION['uid'])
				header("Location: ".BASE_URL."auth/");
				
			$arrData = array();
			
			//print_r($_SESSION['data']);
			$this->core->load('view','general/headerView',$arrData);
			$this->core->load('view','panel/panelView',$arrData);
			$this->core->load('view','general/footerView',$arrData);
			
		}
	}
