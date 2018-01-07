<?php

$result = mysql_query("UPDATE login_session SET active='0' WHERE userid='$CurrentUser' AND active='1' AND session='$_COOKIE[_CwSess]' AND session_generate='$_SESSION[sessiongenerate]' AND webid='$_COOKIE[_CwOrgWebId]'")
or die(mysql_error());
session_destroy();
unset($_COOKIE['PHPSESSID']);
unset($_COOKIE['_CwSess']);
unset($_COOKIE['cpsession']);
unset($_COOKIE['_CwCart']);
unset($_COOKIE);
setcookie('PHPSESSID', '', '00000001', '/', $Website_Url_Auth);
setcookie('_CwSess', '', '00000001', '/', $Website_Url_Auth);
setcookie('cpsession', '', '00000001', '/', $Website_Url_Auth);
setcookie('_CwCart', '', '00000001', '/', $Website_Url_Auth);
setcookie('manual_webid', '', '00000001', '/', $Website_Url_Auth);


if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}


?>
	<script type="text/javascript">
	<!--
	window.location = "<?php echo "http://" .  $Website_Url_Auth . "/Login/?redirect=" . $_GET['redirect']; ?><?php if($_GET['error'] != ""){ echo "&error=" . $_GET['error']; }?>"
	//-->
	</script>