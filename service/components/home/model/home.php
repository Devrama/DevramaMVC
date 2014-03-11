<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php

class HomeModel extends DMVCModel{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getContent(){
		/*
		$query = "SELECT * FROM ".TBL_CONTENT." WHERE 1 ORDER BY name ASC";
		$arr_obj = $this->db->getObjArray($query);
		
		if(!empty($arr_obj)) return $arr_obj;
		else return FALSE;
		*/
		return 'some data from Model(database)';
	}
	
	
} 