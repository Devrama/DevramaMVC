<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

class DMVCController extends DMVCGlobal{
	public $template;
	public $css = array();
	public $js = array();
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function loadEntranceAction($action_name){
		static $init = FALSE;
		
		if($init === FALSE){
			$init = TRUE;
			$this->template = ENTRANCE_TEMPLATE;
			return $this->loadAction($action_name);
		}
		else return FALSE;
	}
	
	public function loadAction($action_name){
		$class_name = get_class($this);
		
		$pos = strrpos($class_name, 'Controller');
		$component_name =  strtolower(substr($class_name, 0, $pos));
		
		$content = $this->$action_name();
		
		if(!empty($this->template) && !empty($content)){
			$template_name = $this->template;
			require_once(DIR_ROOT.'/service/templates/'.$this->template.'/'.$this->template.'.php');
			$class_name = $this->template.'Template';
			$template = new $class_name($content);
			return $template->loadTemplate();
		}
		else {
			return $content;
		}
	}
	
	protected function addHeaderInfo($header_str){
		DMVCTemplate::$header_info[] = $header_str;
	}
	
	protected function addCSS($css){
		if(strpos($css, 'http') === 0 || strpos($css, '//') === 0) {
			DMVCTemplate::$com_css[] = $css;
		}
		else {
			$class_name = get_class($this);
			
			$pos = strrpos($class_name, 'Controller');
			$component_name =  strtolower(substr($class_name, 0, $pos));
			$css = BASE_URL.'/service/components/'.$component_name.'/view/css/'.$css;
			DMVCTemplate::$com_css[] = $css;
		}
	}
	
	protected function addJS($js){
		if(strpos($js, 'http') === 0 || strpos($js, '//') === 0) {
			DMVCTemplate::$com_js[] = $js;
		}
		else {
			$class_name = get_class($this);
			
			$pos = strrpos($class_name, 'Controller');
			$component_name =  strtolower(substr($class_name, 0, $pos));
			$js = BASE_URL.'/service/components/'.$component_name.'/view/js/'.$js;
			DMVCTemplate::$com_js[] = $js;
		}
	}
	
	protected function setTemplate($template){
		$this->template = $template;
	}
	
	protected function disableTemplate(){
		$this->template = null;
	}
	
	protected function loadView($view_file){
		
		foreach(get_object_vars($this) AS $key => $value){
			$$key = $value;
		}
		
		$class_name = get_class($this);
		
		$pos = strrpos($class_name, 'Controller');
		$component_name =  strtolower(substr($class_name, 0, $pos));
		$view_path = DIR_ROOT.'/service/components/'.$component_name.'/view/'.$view_file;
		
		ob_start();
			include($view_path);
		$content = ob_get_clean();
		
		return $content;
	}
	
	
	private function getImage($file_path){
		$class_name = get_class($this);
		
		$pos = strrpos($class_name, 'Controller');
		$component_name =  strtolower(substr($class_name, 0, $pos));
		
		$path = BASE_URL.'/service/components/'.$component_name.'/view/images';
		
		if(substr($file_path, 0, 1) == '/')
			return $path.$file_path;
		else return $path.'/'.$file_path;
		
	}
	
	private function getTemplateImage($file_path){
		if(!empty($this->template)){
			$path = BASE_URL.'/service/templates/'.$this->template.'/images';
			
			if(substr($file_path, 0, 1) == '/')
				return $path.$file_path;
			else return $path.'/'.$file_path;
		}
		else return '';
		
	}
	
	private function getJS($file_path){
		$class_name = get_class($this);
		
		$pos = strrpos($class_name, 'Controller');
		$component_name =  strtolower(substr($class_name, 0, $pos));
		
		$path = BASE_URL.'/service/components/'.$component_name.'/view/images';
		
		if(substr($file_path, 0, 1) == '/')
			return $path.$file_path;
		else return $path.'/'.$file_path;
		
	}
	
	private function getCSS($file_path){
		$class_name = get_class($this);
		
		$pos = strrpos($class_name, 'Controller');
		$component_name =  strtolower(substr($class_name, 0, $pos));
		
		$path = BASE_URL.'/service/components/'.$component_name.'/view/images';
		
		if(substr($file_path, 0, 1) == '/')
			return $path.$file_path;
		else return $path.'/'.$file_path;
		
	}
	
	protected function loadModel($model_file_path){
		$class_name = get_class($this);
		
		$pos = strrpos($class_name, 'Controller');
		$component_name =  strtolower(substr($class_name, 0, $pos));
		require_once(DIR_ROOT.'/service/components/'.$component_name.'/model/'.$model_file_path);
		
	}
	
	protected function redirect($url, $msg=array()){
		
		if(!empty($msg)) {
			$this->cookie->_message = serialize($msg);	
		}
		
		if(substr($url, 0, 7) == 'http://'){
			header('Location: '.$url);
		}
		else if(substr($url, 0, 1) == '/'){
			header('Location: '.BASE_URL.$url);
		}
		else {
			header('Location: '.BASE_URL.'/'.$url);
		}
		exit();
	}
	
	
}