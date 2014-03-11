<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

class DMVCCookie{
	
	public static $data = array();
	
	
	public function __construct(){
		if(!empty($_COOKIE)) {
			
			foreach($_COOKIE AS $key => $value){
				self::$data[$key] = $value;
			}
		}
	}

	public function __get($name){
		if(!empty(self::$data[$name])) return self::$data[$name];
		else return ;
	}
	
	public function __set($name, $value){
		GLOBAL $config_cookie;
		
		self::$data[$name] = $value;
		$_COOKIE[$name] = $value;
		
		$expire = ($config_cookie['expire_on_close'] === TRUE) ? 0 : $config_cookie['expiration'] + time();
		$path = $config_cookie['path'];
		$domain = $config_cookie['domain'];
		
		setcookie($name, $value, $expire, $path, $domain);
		
	}

	public function __unset($name){
		GLOBAL $config_cookie;
		$expire = time() - (60*60);
		$path = $config_cookie['path'];
		$domain = $config_cookie['domain'];
		
		unset($_COOKIE[$name]);
		setcookie($name, "", $expire, $path, $domain);
		
	}
	
	public function __isset($name){
		return isset(self::$data[$name]);
	}
	
	public function __toString(){
		return print_r(self::$data, TRUE);
	}
	
}