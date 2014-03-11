<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 
/*
 * THIS ONLY CARES ABOUT COMPONENT AND ACTION.
 * THE OTHER VARIABLES WILL BE DEFINED IN URI.PHP OF EACH COMPONENTS
 */
$_uri_pattern = array();

$_uri_pattern['home'] = array();
$_uri_pattern['home'][''] = array('com'=>'home', 'action'=>'index');
$_uri_pattern['home']['index'] = array('com'=>'home', 'action'=>'index');

$_uri_pattern['about'][''] = array('com'=>'static', 'action'=>'about');
$_uri_pattern['terms-of-service'][''] = array('com'=>'static', 'action'=>'terms_of_service');
$_uri_pattern['privacy-policy'][''] = array('com'=>'static', 'action'=>'privacy_policy');

$_uri_pattern['rest'] = array();
$_uri_pattern['rest']['something'] = array('com'=>'rest', 'action'=>'something');

$_uri_pattern['sitemap'] = array();
$_uri_pattern['sitemap']['sitemap1.xml'] = array('com'=>'sitemap', 'action'=>'sitemap1');