<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

final class DMVCRestError {
	
	public static $general_error = 100;
	
	public static function getError($code, $message){
		
		$obj = new stdClass();
		
		$obj->error = new stdClass();
		$obj->error->code = $code;
		$obj->error->message = $message;
		
		if(!empty($_GET['callback'])) return $_GET['callback'].'('.json_encode($obj).')';
		else return json_encode($obj);
	}
		
	
}



?>
