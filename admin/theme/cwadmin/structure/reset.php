<?php
if($Current_Admin_Id == "" OR $UserSiteAccess['backend'] == "0"){
    if($_GET["type"] != ""){
        $Code = OtarDecrypt($key, $_GET["type"]);
        $Date = strtotime("now");
        $Query = "SELECT * FROM cw_request WHERE id='$Code' AND trash='0' AND active='3' AND webid='$WebId' AND expire>$Date";
        $Result = mysql_query($Query) or die(mysql_error());
        $Row = mysql_fetch_array($Result);
        $Row = CwOrganize($Row,$Array);
        if($Row["id"] == ""){
            $Err = "<strong>Error!</strong> This link is invalid or has expired. Please request a new link. <a href='/Password-Recovery'> Request New Link</a>";
        }else{
            $query = "SELECT * FROM users WHERE email='$Row[email]' AND webid='$WebId'";
            $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($result);
            $row = CwOrganize($Array,$row);
            if($row["id"] == ""){
                $Err = "<strong>Error!</strong> No account associated with this username or email address was found.<br>
                <center>Please <a href='/Register'> Create an Account</a> Now</center>";
            }
        }
    }
      if($Current_Admin_Id != "" AND $UserSiteAccess['backend'] == "0"){
          $Domain = $Array['siteinfo']['domain'];
          $Redirect = "Logout";
?>
<script type="text/javascript">
<!--
window.location = "<?php echo "$Domain/$Redirect"; ?>"
//-->
</script>
<?php } ?>
<body class="texture">
<div id="cl-wrapper" class="login-container">
	<div class="middle-login">
<?php
if($_GET['error'] == "na"){
    $Err="<strong>Error!</strong> This link is invalid or has expired. Please request a new link. <a href='/Password-Recovery'> Request New Link</a>";
}
if($Err != ""){ ?>
<div class="alert alert-danger">
<?php echo $Err; ?>
</div>
<?php } ?>
		<div class="block-flat">
			<div class="header">							
				<h3 class="text-center">
				    <img class="logo-img" src="/<?php echo "$THEME/uploads/cwlogo.png"; ?>" alt="logo"/></h3>
			</div>
			<div>
				<form style="margin-bottom: 0px !important;" class="form-horizontal" method='post' action="/Process/Reset">
					<div class="content">
						<h4 class="title">Password Recovery</h4>
<?php if($_GET["type"] == ""){ ?>
						Please enter your account email address.
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon">
										    <i class="fa fa-user"></i>
										</span>
										<input type="text" name='email' placeholder="Username / Email" id="username" class="form-control">
									</div>
								</div>
							</div>
<?php
}else{
    $Code = PbEncrypt($key, $Code);
?>
						Please enter the reset code sent to your email.
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon">
										    <i class="fa fa-user"></i>
										</span>
										<input type="text" name='code' value="<?php echo $Code; ?>" placeholder="Reset Code" id="username" class="form-control" <?php if($Err != ""){ echo "disabled"; } ?>>
									</div>
								</div>
							</div>
<?php } ?>
					</div>
					<div class="foot">
					    <center>
<?php if($Err == ""){ ?>
    						<button class="btn btn-primary" data-dismiss="modal" type="submit">Reset Password</button>
    						<br>
<?php } ?>
    						<a href="/Login">Remember your password? Login Now!</a>
    					</center>
					</div>
                    <input type='hidden' name='redirect' value='<?php echo $_GET['redirect']; ?>'>
                    <input type='hidden' name='reset' value='password'>
				</form>
			</div>
		</div>
		<div class="text-center out-links"><a href="#">&copy; <?php echo date(Y); echo " " . $Array['siteinfo']['name']; ?></a></div>
	</div> 
	
</div>

<script src="js/jquery.js"></script>
	<script type="text/javascript">
    $(function(){
      $("#cl-wrapper").css({opacity:1,'margin-left':0});
    });
  </script>
<?php
}else{
    $Domain = $Array['siteinfo']['domain'];
    $Redirect = "admin"; ?>
<script type="text/javascript">
<!--
window.location = "<?php echo "$Domain/$Redirect"; ?>"
//-->
</script>
<?php } ?>