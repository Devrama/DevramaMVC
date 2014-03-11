<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php

class StaticController extends DMVCController{
	
	public function about(){
		$this->setTemplate('red');
		$this->addCSS('about.css');
	
		$content = $this->loadView('about.php');
	
	
		return $content;
	}
	
	public function terms_of_service(){
		$this->setTemplate('blue');
		$this->addCSS('terms_of_service.css');
		
		$content = $this->loadView('terms_of_service.php');
		
		
		return $content;
	}
	
	public function privacy_policy(){
		//default template will be loaded
		$this->addCSS('privacy_policy.css');
		$content = $this->loadView('privacy_policy.php');
	
	
		return $content;
	}
	
	
} 