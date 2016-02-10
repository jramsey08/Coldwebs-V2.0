<?php
include("forms/logincheck.php");
if($Login == "1"){
	$Preview = $_REQUEST['preview'];

	$query = "SELECT * FROM articles WHERE active='1' AND trash='0' AND other='$Preview'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);

	$_SESSION['previewcode'] = $row['other'];

	$Domain = "$Array["siteinfo"]["domain"] . "/Preview";
	header("Location: $Domain/");
}
?>