<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

$config_database = array();
$config_database['enable'] = FALSE;
$config_database['host'] = 'localhost';
//$config_database['host'] = 'devrama.com';
$config_database['name'] = 'db_name';
$config_database['user'] = 'db_username';
$config_database['password'] = 'db_password';

$config_database['driver'] = 'pdo';
