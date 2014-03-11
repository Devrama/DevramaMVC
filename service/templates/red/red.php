<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

class RedTemplate extends DMVCTemplate{
	
	public function __construct($content){
		$this->addJS('red.js');
		$this->addCSS('red.css');
		
		$this->component_as_module = $this->getComponent('home')->text_for_red();
		
		$this->content = $content;
	}
}