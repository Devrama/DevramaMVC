<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php

define('DIR_INDEX', str_replace("/index.php", "", trim($_SERVER['SCRIPT_NAME'], '/')));


$_config_files = glob(DIR_ROOT."/config/*.php");
foreach($_config_files AS $files){
	require_once($files);
}

