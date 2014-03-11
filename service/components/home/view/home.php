<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<a href="<?php echo BASE_URL.'/about'?>">about static page</a><br/>
<a href="<?php echo BASE_URL.'/privacy-policy'?>">privacy policy static page</a><br/>
<a href="<?php echo BASE_URL.'/terms-of-service'?>">terms of service static page</a><br/>

<?php echo $content_from_db.'<br/>';?>

