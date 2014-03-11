<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

class ErrorTemplate extends DMVCTemplate{
	public $title;
	public $body;
	public function __construct($title, $body){
		$this->title = $title;
		$this->body = $body;
	}
}