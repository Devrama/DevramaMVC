<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

class DMVCGlobal{
	public static $uri = null;
	public static $message = null;
	public $cookie;
	public $session;
	public $user;
	
	public function __construct(){
		$this->cookie = new DMVCCookie();
		if(!empty(DMVCCookie::$data['login']) && DMVCCookie::$data['login'] == TRUE){
			$this->session = new DMVCSession();
			
			if(isset($this->session->_mvc_user)){
				$this->user = $this->session->_mvc_user;
			}
		}
		else {
			$this->user = null;
		}
	}
	
	public function getURI($key = null){
		
		if($key !== null && !empty(self::$uri->$key)){
			return self::$uri->$key;
		}
		else if($key !== null && empty(self::$uri->$key)){
			return FALSE;
		}
		else if($key === null){
			return self::$uri;
		}
		else return FALSE;
	}
	
	protected function loadClass($file_path){
		require_once(DIR_ROOT.'/system/classes/'.$file_path);
	}
	
	protected function getComponent($component_name){
		require_once(DIR_ROOT.'/service/components/'.$component_name.'/controller.php');
		
		$class_name = $component_name.'Controller';
		return new $class_name;
	}
	
	public function escape($string, $ent = ENT_QUOTES){
		if(is_string($string)) return htmlspecialchars($string, $ent);
		else return $string;
	}
	
	public function base64_safe_encode($input) {
		return strtr(base64_encode($input), '+/=', '-_,');
	}
	
	public function base64_safe_decode($input) {
		return base64_decode(strtr($input, '-_,', '+/='));
	}
	
	
}