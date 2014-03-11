<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

require_once(DIR_ROOT.'/service/templates/'.ERROR_TEMPLATE.'/'.ERROR_TEMPLATE.'.php');

class DMVCError{
	public static function errorMessage($title, $body){
		echo $title.'<br/>';
		echo $body.'<br/>';
	}
	
	public static function errorExit($title, $body){
		$class_name = ERROR_TEMPLATE.'Template';
		$template = new $class_name($title, $body);
		$content = $template->loadTemplate();
		
		echo $content;
		exit();
		
	}
	
	
}