<!DOCTYPE html>
<meta charset="utf-8">
<title>C-Webs Media Uploader</title>
<!--
  DO NOT SIMPLY COPY THOSE LINES. Download the JS and CSS files from the
  latest release (https://github.com/enyo/dropzone/releases/latest), and
  host them yourself!
-->
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
<!-- Change /upload-target to your upload address -->
<?php
$Rand = $_GET['rand'];
$Article = $_GET['id'];
?>

<form action="process/main.php?rand=<?php echo $Rand; ?>&id=<?php echo $Article; ?>" class="dropzone" method="post" enctype="multipart/form-data">
<input type='hidden' name='rand' value='<?php echo $Rand; ?>'>
<input type='hidden' name='id' value='<?php echo $Article; ?>'>
</form>