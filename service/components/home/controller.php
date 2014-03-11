<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php

class HomeController extends DMVCController{
	public function index(){
		$this->loadModel('home.php');
		$model = new HomeModel();
		$this->content_from_db = $model->getContent();
		
		$this->addHeaderInfo('<title>DevramaMVC Home</title>');
		$this->addHeaderInfo('<meta name="Keywords" content="" />');
		$this->addHeaderInfo('<meta name="Description" content="" />');
		
		$this->addJS('home.js');
		$this->addCSS('home.css');
		$this->main_map = $this->loadView('main_map.php');
		
		$content = $this->loadView('home.php');
		
		return $content;
	}
	
	
	
	public function text_for_red(){
		$this->disableTemplate();
		
		$content = $this->loadView('text_for_red.php');
		$content .= '<br/>This text came from Components/home/controller/text_for_red';
	
		return $content;
	}
	
	
} 