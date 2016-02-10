<?php
# include the function here
require_once 'function.resize.php';

$image_path = 'images/dog.jpg';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title>PHP Image Resize - Example</title>
	<style>
		body { 
			background: #ffffff; 
			color: #121212; 
			font-family: lucida grande; 
			text-align: center; 
		}
		h1 { font-size: 15px; text-align: center; }
		#main { margin: auto; width: 600px; text-align: left; }
		.block { margin: 20px; background: #fafafa; padding: 20px; text-align: center; border: 1px solid #cacaca; }
		pre { text-align: left; background: #010101; padding: 10px; font-size: 11px; }
		pre code { text-align: left; color: #ffffff; }
		.block p { color: #343434; font-size: 12px; }
	</style>
</head>

<body>

<div id='main'>

	<h1>PHP Image Resizer</h1>


	<div class='block'>
		<?php $settings = array('w'=>650); ?>
		<div><img src='<?=resize($image_path,$settings)?>' border='0' /></div>
		<p>Image resized by width only</p>
		<div><pre><code>src: <?=$image_path?><?php echo "\n\n"; print_r($settings)?></code></pre></div>
	</div>

</div>

</body>
</html>