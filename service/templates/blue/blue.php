<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

class BlueTemplate extends DMVCTemplate{
	
	public function __construct($content){
		parent::__construct();
		
		$this->addJS('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
		$this->addJS('common.js');
		
		$this->addCSS('common.css');
		
		/*
		$ctl = $this->getComponent('home');
		$this->register_box = $ctl->register_box();
		
		$ctl = $this->getComponent('search');
		$this->search_box = $ctl->search_box();
		*/
		
		$this->greeting = 'Hello World!!';
		
		$this->content = $content;
				
	}
}