<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

class DMVCModel extends DMVCGlobal{
	protected static $s_db = null;
	protected $db = null;
	
	public function __construct(){
		if(self::$s_db === null){
			self::$s_db = DMVCDatabase::getDefaultDB();
		}
		
		$this->db = self::$s_db;
		
		parent::__construct();
	}
	
	
	
}