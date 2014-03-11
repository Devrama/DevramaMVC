<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php

define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'].str_replace("/index.php", "", $_SERVER['SCRIPT_NAME']));
require_once(DIR_ROOT.'/system/core/load_config.php');
require_once(DIR_ROOT.'/system/core/uri.php');
require_once(DIR_ROOT.'/system/core/global.php');
require_once(DIR_ROOT.'/system/core/template.php');
require_once(DIR_ROOT.'/system/core/controller.php');
require_once(DIR_ROOT.'/system/core/model.php');
require_once(DIR_ROOT.'/system/core/database.php');
require_once(DIR_ROOT.'/system/core/error.php');
require_once(DIR_ROOT.'/system/core/session.php');
require_once(DIR_ROOT.'/system/core/cookie.php');

final class DMVC{
	public static $instance = null;
	
	private function __construct(){
		
	}
	
	public static function getInstance(){
		if(self::$instance == null){
			self::$instance = new DMVC();
			return self::$instance;
		}
		else{ 
			return self::$instance;
		}
	}
	
	public function init(){
		static $init = FALSE;
		
		if($init === FALSE){
			$init = TRUE;
			
			$uri = new DMVCURI();
			DMVCGlobal::$uri = $uri;
			$cookie = new DMVCCookie();
			
			
			if(isset($cookie->_message)){
				DMVCGlobal::$message = unserialize($cookie->_message);
				unset($cookie->_message);
			}
			
			if((!empty($cookie->login) && $cookie->login == TRUE)
				|| ($uri->com == 'user' && $uri->action == 'signin')
				|| ($uri->com == 'user' && $uri->action == 'signup')){
				session_start();
				new DMVCSession();
			}
			
			$dir_component = strtolower($uri->com);
			$dir_action = strtolower($uri->action);
			require_once(DIR_ROOT.'/service/components/'.$dir_component.'/controller.php');
			
			$class_name = $uri->com.'Controller';
			$action_name = $uri->action;
			
			$controller = new $class_name();
			$content = $controller->loadEntranceAction($action_name);
			
			echo $content;
			
			return TRUE;
		}
		else {
			return FALSE;
		}
		
	}
	
	
}