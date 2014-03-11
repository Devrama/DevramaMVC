<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

session_set_cookie_params(0,"/",".your-domain.com");
ini_set('SESSION.COOKIE_DOMAIN', '.your-domain.com');

$config_cookie = array();
$config_cookie['expire_on_close'] = TRUE;
$config_cookie['expiration'] = 7200;
$config_cookie['prefix'] = "";
$config_cookie['domain'] = ".your-domain.com";
$config_cookie['path'] = "/";

