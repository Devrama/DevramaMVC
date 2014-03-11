<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>

<!doctype html>

<html>
	
<head>


<?php
foreach($header_info AS $info){
	echo $info."\r\n";
}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="en" />
<meta http-equiv="cache-control" content="no-cache"/>

<link rel="shortcut icon" href="<?php echo $this->getImage('favicon.ico'); ?>" type="image/x-icon"/>

<?php
//$css is from $this->addCSS() in both template and component
foreach($css AS $file){
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$file."\" />\r\n";
}

//$js is from $this->addJS() in both template and component
foreach($js AS $file){
	echo "<script type=\"text/javascript\" src=\"".$file."\"></script>\r\n";
}
?>

</head>

<body>
	<?php echo $component_as_module; //variable from template?>
	<br/>
	<?php echo $content; //content from component?>
</body>
</html>
