<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php

class RestController extends DMVCController{
	
	public function __construct(){
		parent::__construct();
		
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-Type:application/json; charset=utf-8');
	}
	
	//http://your-domain.com/rest/something/var1/var2
	public function something(){
		$uri_pattern = DMVCGlobal::$uri->extra;
		/*
		 * $uri_pattern['rest']
		 * $uri_pattern['something']
		 * $uri_pattern['var1']
		 * $uri_pattern['var2']
		 */
		
		$this->disableTemplate();
	
		$this->loadModel('rest.php');
		$model = new RestModel();
	
		$json = $model->getSomething();
		
		if($json !== FALSE){
			return $json;
		}
		else {
			$this->loadClass('rest_error.php');
			return DMVCRestError::getError(DMVCRestError::$general_error, 'Error occurred.');
		}
		
		
	
	}
	
} 