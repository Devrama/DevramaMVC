<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

class DMVCSession{
	
	public static $data = array();
	
	
	public function __construct(){
		if(!empty($_SESSION['mvc_session'])) self::$data = $_SESSION['mvc_session'];
	}

	public function __get($name){
		return self::$data[$name];
	}
	
	public function __set($name, $value){
		self::$data[$name] = $value;
		$_SESSION['mvc_session'][$name] = $value;
	}
	
	public function __unset($name){
		unset($_SESSION['mvc_session'][$name]);
		unset(self::$data[$name]);
	}
	
	public function __isset($name){
		return isset(self::$data[$name]);
	}
	
	public function __toString(){
		return print_r(self::$data, TRUE);
	}
}