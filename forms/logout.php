<?php
<<<<<<< HEAD

=======
>>>>>>> origin/master
include("forms/logincheck.php");
if($Login == "1"){

	$result = mysql_query("UPDATE login_session SET active='0' WHERE userid='$CurrentUser' AND active='1' AND session='$_COOKIE[_CwSess]' AND session_generate='$_SESSION[sessiongenerate]'")
	or die(mysql_error());
	session_destroy();

unset($_COOKIE['PHPSESSID']);
unset($_COOKIE['_CwSess']);
unset($_COOKIE['cpsession']);
unset($_COOKIE['_CwCart']);
setcookie('PHPSESSID', '', '00000001', '/', $Website_Url_Auth);
setcookie('_CwSess', '', '00000001', '/', $Website_Url_Auth);
setcookie('cpsession', '', '00000001', '/', $Website_Url_Auth);
setcookie('_CwCart', '', '00000001', '/', $Website_Url_Auth);
}

?>
	<script type="text/javascript">
	<!--
	window.location = "<?php echo $Site_Domain . "/" . $_GET['redirect']; ?><?php if($_GET['error'] != ""){ echo "&error=" . $_GET['error']; }?>"
	//-->
	</script>