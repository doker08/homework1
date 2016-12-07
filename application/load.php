<?php
	class Load{
		
		public function view($name,array $vars = null, array $vars2 = null){
			$file = SITE_PATH.'views/'.$name.'View.php';

            //require(SITE_PATH.'template/head.php');

			if(is_readable($file)){

				if(isset($vars)){
					extract($vars);
				}

				require($file);
                //require(SITE_PATH.'template/footer.php');

				return true;
			}
			throw new Exception('View issues');
		}	
		public function model($name){
			$model = $name.'Model';
			$modelPath = SITE_PATH.'models/'.$model.'.php';

			if(is_readable($modelPath)){
				require_once($modelPath);

				if(class_exists($model)){
					$registry = Registry::getInstance();
					$registry->$name = new $model;
					return true;
				}
			}
			throw new Exception('Model issues.');	
		}	
	}
