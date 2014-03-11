<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

final class DMVCValidate {

	public static function getBlankFields($arr_post = array()){
		$arr_invalid_field = array();
		foreach($arr_post AS $key=>$value){
			if(empty($value))$arr_invalid_field[] = $key;
		}
		
		if(empty($arr_invalid_field)) return FALSE;
		else return $arr_invalid_field;
	}
	
	public function getOversizeFields($arr_post = array(), $max_number){
		$arr_invalid_field = array();
		foreach($arr_post AS $key=>$value){
			if(is_numeric($value) && $value > $max_number) $arr_invalid_field[] = $key;
			else if(is_string($value) && strlen($value) > $max_number) $arr_invalid_field[] = $key;
			
		}
		
		if(empty($arr_invalid_field)) return FALSE;
		else return $arr_invalid_field;
	}
	
	public static function checkEmailAddress($email) {
		if( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	
	
	/**
	* Canadian Postal code
	**/
	
	public static function isPostalCode($postal) {
		$regex = "/^([a-ceghj-npr-tv-z]){1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}$/i";
	
		//remove spaces
		$postal = str_replace(' ', '', $postal);
	
		if ( preg_match( $regex , $postal ) ) {
			return $postal;
		} else {
			return FALSE;
		}
	 
	}
	 
	
	/** 
	* Checks for a 5 digit zip code
	* Clears extra characters
	* returns clean zip
	**/
	
	public static function isZipCode($zip) {
		//remove everything but numbers
		$numbers = preg_replace("[^0-9]", "", $zip );
	 
		//how many numbers are supplied
		$length = strlen($numbers);
	 
		if ($length != 5) {
			return FALSE;
		} else {
			return $numbers;
		}
	}
	
		
	
}



?>
