<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

class DMVCURI{
	public $com = '';
	public $action = '';
	public $extra = array();
	
	public function __construct(){
		$this->getBasicRoute();
	}
	
	private function getBasicRoute(){
		GLOBAL $_uri_pattern;
		
		$dir = trim(str_replace(ROOT_URL, "", BASE_URL), '/');
		$request_uri_trimmed = trim($_SERVER['REQUEST_URI'], '/');
		if(strpos($request_uri_trimmed, $dir.'/index.php') === 0
			|| strpos($request_uri_trimmed, $dir.'/?') === 0){
			$clean_url = FALSE;		
		}
		else{
			$clean_url = TRUE;
		}
		
		if($clean_url === FALSE){
			if(!empty($_POST['com']))
				$this->com = trim($_POST['com']);
			else if(!empty($_GET['com']))
				$this->com = trim($_GET['com']);
			else
				$this->com = INIT_COM;
				
			if(!empty($_POST['action']))
				$this->action = trim($_POST['action']);
			else if(!empty($_GET['action']))
				$this->action = trim($_GET['action']);
			else
				$this->action = 'index';
			
		}
		else {
			$uri_length = strlen($request_uri_trimmed);
			$dir_length = strlen(DIR_INDEX);
			
			if($uri_length > $dir_length)
				$clean_url = substr($request_uri_trimmed, strlen(DIR_INDEX.'/'));
			else
				$clean_url = '';
			
			if(!empty($clean_url)){
				$arr_seo_split = explode('?', $clean_url);
	            if(!empty($arr_seo_split[1])){
		            $arr_get = explode('&', $arr_seo_split[1]);
		            foreach($arr_get AS $value){
		        	   	$get = explode('=', $value);
		               	if(!empty($get[1])) $_GET[$get[0]] = $get[1];
		               	else $_GET[$get[0]] = '';
		            }
	            }
	            $vars = explode('/', $arr_seo_split[0]);
			}
			else {
				$vars = null;
			}
           
          
            if(!empty($_uri_pattern)){
            	if(!empty($_POST['com']) && !empty($_POST['action'])){
            		$this->com = $_POST['com'];
            		$this->action = $_POST['action'];
            	}
            	else if(empty($vars)){
            		$this->com = INIT_COM;
            		$this->action = 'index';
            	}
            	else if(!empty($vars[0]) && !empty($vars[1]) 
            		&& !empty($_uri_pattern[$vars[0]][$vars[1]]['com'])
            		&& !empty($_uri_pattern[$vars[0]][$vars[1]]['action'])){
            		
            		$this->com = $_uri_pattern[$vars[0]][$vars[1]]['com'];
            		$this->action = $_uri_pattern[$vars[0]][$vars[1]]['action'];
            		
            	}
           		else if(!empty($vars[0]) && empty($vars[1])
            		&& !empty($_uri_pattern[$vars[0]]['']['com'])
            		&& !empty($_uri_pattern[$vars[0]]['']['action'])){
            		
            		$this->com = $_uri_pattern[$vars[0]]['']['com'];
            		$this->action = $_uri_pattern[$vars[0]]['']['action'];
            	}
            	else if(!empty($vars[0]) && !empty($vars[1]) 
            		&& !empty($_uri_pattern[$vars[0]]['']['com'])
            		&& !empty($_uri_pattern[$vars[0]]['']['action'])){
            		
            		$this->com = $_uri_pattern[$vars[0]]['']['com'];
            		$this->action = $_uri_pattern[$vars[0]]['']['action'];
            		
            	}
            	else {
            		header("HTTP/1.0 404 Not Found");
            		DMVCError::errorExit('Page not found', '404 Not Found');
            	}
            	
            	if(!empty($this->com) && !empty($this->action)){
            		$this->getExtraURI($this->com, $this->action, $vars);
            	}
            	
            }
                  
            
		}
	}
	
	
	private function getExtraURI($com, $action, $vars){
		$uri_path = DIR_ROOT.'/service/components/'.$com.'/uri.php';
		
		if(file_exists($uri_path)){
			require_once($uri_path);
			$class_name = $com.'URI';
			$uri = new $class_name();
			if(!empty($uri->{$action})){
				$uri_pattern = '';
				if(substr($uri->{$action}, 0, 1) == '/')
					$uri_pattern = substr($uri->{$action}, 1);
				else
					$uri_pattern = $uri->{$action};
				 
				$extra_vars = explode('/', $uri_pattern);
				 
				if(count($vars) > 0){
					$i=0;
					foreach($extra_vars AS $extra){
						if(!empty($vars[$i])){
							$this->extra[$extra] = $vars[$i];
						}
						$i++;
					}
				}
			}
				
		}
	}
	
	
}