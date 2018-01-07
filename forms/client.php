<?php
include("forms/logincheck.php");
if($Login == "1"){
	$Preview = $_REQUEST['preview'];

	$query = "SELECT * FROM articles WHERE active='1' AND trash='0' AND other='$Preview'  AND webid='$WebId'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);

	$_SESSION['previewcode'] = $row['other'];


	header("Location: http://$Website_Url_Auth/Preview");
}
?>