<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php

class UserController extends DMVCController{
	
	/*
	 * The code below is in system/core/dmvc.php.
	 * Session only starts with these three conditions.
	 * 
	 * if((!empty($cookie->login) && $cookie->login == TRUE)
	 *		|| ($uri->com == 'user' && $uri->action == 'signin')
	 *		|| ($uri->com == 'user' && $uri->action == 'signup')){
	 *		session_start();
	 *		new DMVCSession();
	 *	}
	 */
	public function index(){
		
	}
	
	public function signup(){
		
		$this->loadModel('user.php');
		$model = new UserModel();
		
		$data = $model->signup();
		if($data === TRUE){
			return 'sign up success!';
		}
		else {
			return 'sign up fail!';
		}
		
	}
	
	
	public function signin(){
		$this->loadModel('user.php');
		$model = new UserModel();
		
		$data = $model->signin();
		if($data === TRUE){
			return 'log in success!';
		}
		else {
			return 'log in fail!';
		}
	
	}
	
	public function signout(){
		session_destroy();
		$this->redirect(BASE_URL);
	}
	
	
	
	
} 