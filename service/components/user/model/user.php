<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php

class UserModel extends DMVCModel{
	
	
	public function signup(){
		/*
		 * If signup is successful, do something like this.
		 */
		/*
		$login_info = new stdClass();
		$login_info->logged = TRUE;
		$login_info->user_id = $inserted_id;
		$login_info->username = $_POST['username'];
		$login_info->email = $_POST['email'];
			
		$_SESSION['dmvc_session']['_dmvc_user'] = $login_info;
		$this->user = $_SESSION['dmvc_session']['_dmvc_user'];
		$this->cookie->login = TRUE;
		*/
	}
	
	public function signin(){
		/*
		 * If signup is successful, do something like this.
		*/
		/*
		$login_info = new stdClass();
		$login_info->logged = TRUE;
		$login_info->user_id = $obj->user_id;
		$login_info->username = $obj->username;
		$login_info->email = $obj->email;
			
		$_SESSION['dmvc_session']['_dmvc_user'] = $login_info;
		$this->user = $_SESSION['dmvc_session']['_dmvc_user'];
		$this->cookie->login = TRUE;
		*/
	}
	
	
} 