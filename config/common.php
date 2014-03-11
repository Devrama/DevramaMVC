<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 


define('SITE_NAME', 'Your Site Name');
define('SITE_ADMIN_EMAIL', 'youremail@yourdomain.com');

define('MD5SEED', 'HelloWorld#$%');
define('CAPTCHA_ID', md5(uniqid()));

define('SMTP_HOST', 'mail.your_mail_server.com');
define('SMTP_USER', 'your_smtp_username');
define('SMTP_PASSWORD', 'your_smtp_password');
define('SMTP_PORT', '25');

