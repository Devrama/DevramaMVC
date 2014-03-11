<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 
/*
 * The component which is loaded first 
 */
define('INIT_COM', 'home');
define('ENTRANCE_TEMPLATE', 'blue');
define('ERROR_TEMPLATE', 'error');

define('ROOT_URL', 'http://local.kulapix.com/');

//if you installed this under sub-directory, BASE_URL may have sub-directory name at the end of ROOT_URL
define('BASE_URL', 'http://local.kulapix.com/devramaMVC');
define('BASE_SSL_URL', 'https://local.kulapix.com/devramaMVC');

define('ADMIN_EMAIL', 'admin@your-domain.com');

