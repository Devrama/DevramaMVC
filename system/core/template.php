<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

class DMVCTemplate extends DMVCGlobal{
	public static $js = array();
	public static $css = array();
	
	public static $header_info = array();
	public static $com_js = array();
	public static $com_css = array();
	
	public function __construct(){
		parent::__construct();
	}
	
	public function loadTemplate(){
		
		self::$css = array_merge(self::$css, self::$com_css);
		self::$js = array_merge(self::$js, self::$com_js);
		
		self::$css = array_unique(self::$css);
		self::$js = array_unique(self::$js);
		
		$class_name = get_class($this);
		$pos = strrpos($class_name, 'Template');
		$template_name =  strtolower(substr($class_name, 0, $pos));
		
		
		foreach(get_object_vars($this) AS $key => $value){
			$$key = $value;
		}
		
		foreach(get_class_vars($class_name) AS $key => $value){
			if(!isset($$key)) $$key = $value;
		}
		
		
		ob_start();
			include(DIR_ROOT.'/service/templates/'.$template_name.'/template.php');
		$content = ob_get_clean();

		return $content;
		
	}
	
	protected function addCSS($css){
		if(strpos($css, 'http') === 0 || strpos($css, '//') === 0){
			self::$css[] = $css;
		}
		else {
			$class_name = get_class($this);
			
			$pos = strrpos($class_name, 'Template');
			$template_name =  strtolower(substr($class_name, 0, $pos));
			$css = BASE_URL.'/service/templates/'.$template_name.'/css/'.$css;
			self::$css[] = $css;
		}
	}
	
	protected function addJS($js){
		if(strpos($js, 'http') === 0 || strpos($js, '//') === 0){
			self::$js[] = $js;
		} 
		else {
			$class_name = get_class($this);
			
			$pos = strrpos($class_name, 'Template');
			$template_name =  strtolower(substr($class_name, 0, $pos));
			$js = BASE_URL.'/service/templates/'.$template_name.'/js/'.$js;
			self::$js[] = $js;
		}
	}
	
	private function getImage($file_path){
		$class_name = get_class($this);
		$pos = strrpos($class_name, 'Template');
		$template_name =  strtolower(substr($class_name, 0, $pos));
		
		$path = BASE_URL.'/service/templates/'.$template_name.'/images';
		
		if(substr($file_path, 0, 1) == '/')
			return $path.$file_path;
		else return $path.'/'.$file_path;
		
	}
	
	private function getJS($file_path){
		$class_name = get_class($this);
		$pos = strrpos($class_name, 'Template');
		$template_name =  strtolower(substr($class_name, 0, $pos));
		
		$path = BASE_URL.'/service/templates/'.$template_name.'/js';
		
		if(substr($file_path, 0, 1) == '/')
			return $path.$file_path;
		else return $path.'/'.$file_path;
		
	}
	
	private function getCSS($file_path){
		$class_name = get_class($this);
		$pos = strrpos($class_name, 'Template');
		$template_name =  strtolower(substr($class_name, 0, $pos));
		
		$path = BASE_URL.'/service/templates/'.$template_name.'/css';
		
		if(substr($file_path, 0, 1) == '/')
			return $path.$file_path;
		else return $path.'/'.$file_path;
		
	}
}