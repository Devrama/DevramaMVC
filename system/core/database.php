<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

class DMVCDatabase{
	private static $default_db = null;
	private static $instance_db = array();
	private $name;
	
	public function __construct($host=null, $name=null, $user=null, $password=null){
		GLOBAL $config_database;
		
		require_once(DIR_ROOT.'/system/classes/database_'.$config_database['driver'].'.php');
		$driver = 'DMVC'.$config_database['driver'];
		
		if($host === null)
			$host = $config_database['host'];
		if($name === null)
			$name = $config_database['name'];
		if($user === null)
			$user = $config_database['user'];
		if($password === null)
			$password = $config_database['password'];
		
		$this->name = $host.$name.$user.$password;
		
		if(!isset(self::$instance_db[$host.$name.$user.$password]))
			self::$instance_db[$host.$name.$user.$password] = new $driver($host, $name, $user, $password);
		
	}
	
	public function getInstanceDB(){
		return self::$instance_db[$this->name];
	}
	
	private static function createDefaultDB(){
		GLOBAL $config_database;
		if(!isset($config_database['enable']) || $config_database['enable'] === FALSE) return FALSE;
		
		require_once(DIR_ROOT.'/system/classes/database_'.$config_database['driver'].'.php');
		$driver = 'DMVC'.$config_database['driver'];
		
		$host = $config_database['host'];
		$name = $config_database['name'];
		$user = $config_database['user'];
		$password = $config_database['password'];

		$db = new $driver($host, $name, $user, $password);
		return $db;
		
	}
	
	public static function getDefaultDB(){
		if(self::$default_db === null){
			self::$default_db = self::createDefaultDB();
			return self::$default_db;
		}
		else{ 
			return self::$default_db;
		}
	}
	
		
	
}