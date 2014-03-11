<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php

class RestModel extends DMVCModel{
	
	public function getSomething(){
		$arr_something = array('text', 'hello');
		if(!empty($_GET['callback'])) return $_GET['callback'].'('.json_encode($arr_something).')';
		else return json_encode($arr_something);
	}
	
	
	
} 