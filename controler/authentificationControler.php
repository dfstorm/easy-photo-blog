<?php
	// authentificationControler

	class authentificationControler {

		public $core = false;
		function __construct(&$coreCi) {
			$this->core = $coreCi;
		}
		public function index()
		{
			$arrData = array();
			
			if (isset($_POST['sUsername']) && isset($_POST['sPassword']))
			{
				$arrParam = array(
					"sUsername"=>$_POST['sUsername'],
					"sPassword"=>$_POST['sPassword']
				);
				$this->doAuthenticate($arrParam);
			}
			
			$this->core->load('view','general/headerView',$arrData);
			$this->core->load('view','auth/authView',$arrData);
			$this->core->load('view','general/footerView',$arrData);
		}
		
		public function dologout()
		{
			session_destroy();
			header("Location: ".BASE_URL."auth/");
			return (0);
		}
		
		public function doAuthenticate($arrParam)
		{
			$arrReturn = $this->core->dsm_db("SELECT users IN ".$this->core->rConfig['sDsmname']." (".json_encode($arrParam).")");
			
			if($arrReturn['iCode'] == 0)
			{
				if(count($arrReturn['content']) > 0)
				{
					$arrUser =  array_values($arrReturn['content'])[0];
					$_SESSION['data'] = $arrUser;
					$_SESSION['uid'] = $arrUser['uid'];
					header("Location: ".BASE_URL."panel/");
					return (0);
				}
			}
		}
	}
