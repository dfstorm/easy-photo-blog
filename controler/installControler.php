<?php
	// installControler

	class installControler {

		public $core = false;
		function __construct(&$coreCi) {
			$this->core = $coreCi;
		}
		
		public function create_base_database($data)
		{
			// TODO: Need support for MySQL. Using my stuff for now.
			
			// Create Base database
			$arrReturn = $this->core->dsm_db("CREATE DATABASE ".$this->core->rConfig['sDsmname']);
			if($arrReturn['iCode'] != '0')
			{
				return ($arrReturn);
			}
			
			$arrReturn = $this->core->dsm_db("CREATE TABLE users IN ".$this->core->rConfig['sDsmname']." (sUserName,sPassword,sName,bios,sPicture)");
			if($arrReturn['iCode'] != 0)
			{
				return ($arrReturn);
			}
			
			$arrReturn = $this->core->dsm_db("INSERT INTO users IN ".$this->core->rConfig['sDsmname']." (".json_encode(array("sUserName"=>$data['sUsername'],"sPassword"=>$data['sPassword'],"sName"=>"Admin")).")");
			if($arrReturn['iCode'] != 0)
			{
				return ($arrReturn);
			}
			
			
			return (array("iCode"=> 0));
		}
		
		public function index()
		{
			$arrData = array();
			
			$arrData["sMessage"] = "";
			if(isset($_POST['sBlogName']))
			{
				$arrFE = array(
					"sBlogName",
					"sUsername",
					"sPassword",
					"sRPassword",
					"sDsmuri",
					"sDsmkey",
					"sDsmname",
					"sDsfruri",
					"sDsfrkey"
				);
				$isOk = true;
				foreach ($arrFE as $item)
					if(!isset($_POST[$item]))
						$isOk = false;
				if($isOk)
					foreach ($arrFE as $item)
						if($_POST[$item] == "" || $_POST[$item] == NULL)
							$isOk = false;
				if ($isOk)
				{
					if($_POST['sPassword'] == $_POST['sRPassword'])
					{
						// Read actual
						$arrConfig = json_decode(file_get_contents('./config.json'), true);
						
						// update
						$arrConfig['sBlogName'] = $_POST['sBlogName'];
						$arrConfig['sDsmuri'] = $_POST['sDsmuri'];
						$arrConfig['sDsmkey'] = $_POST['sDsmkey'];
						$arrConfig['sDsfruri'] = $_POST['sDsfruri'];
						$arrConfig['sDsfrkey'] = $_POST['sDsfrkey'];
						$arrConfig['sDsmname'] = $_POST['sDsmname'];
						$arrData['form'] = $_POST;
						// Write
						file_put_contents('./config.json', json_encode($arrConfig));
						
						// Reload
						$this->core->load_config();
						
						// Populate database
						$arrBDReturn = $this->create_base_database($_POST);
						if(isset($arrBDReturn['iCode']))
						{
							if($arrBDReturn['iCode'] == 0)
							{
								unlink("./INSTALL_MARKER");
								header("Location: ".BASE_URL."auth/?code=new");
								return (0);
							}
							else
							{
								$arrData["sMessage"] = "Error while creating the base database : <code>".json_encode($arrBDReturn)."</code>";
							}
						} else {
							// TODO: Total error
						}
					}
					else
					{
						$arrData["sMessage"] = "Les mots de passes ne correspondent pas.";
					}
				}
				else
				{
					$arrData["sMessage"] = "L'un des champs est manquants.";
				}
			}
			$this->core->load('view','general/headerView',$arrData);
			$this->core->load('view','install/installView',$arrData);
			$this->core->load('view','general/footerView',$arrData);
		}
	}
