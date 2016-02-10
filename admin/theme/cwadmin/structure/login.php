<?php if($Current_Admin_Id == "" OR $UserSiteAccess['backend'] == "0"){ 
      if($Current_Admin_Id != "" AND $UserSiteAccess['backend'] == "0"){
          $Domain = $Array['siteinfo']['domain'];
          $Redirect = "Logout"; ?>
<script type="text/javascript">
<!--
window.location = "<?php echo "$Domain/$Redirect"; ?>"
//-->
</script>
<?php } ?>
<body class="texture">
<div id="cl-wrapper" class="login-container">
	<div class="middle-login">


<?php if($_GET['error'] != ""){ ?>
<div class="alert alert-danger">
  <strong>Error!</strong> This account is not allowed to log-in. Please visit our <a href='/Contact'>Contact Us</a> page to find out why.
</div>
<?php } ?>
		<div class="block-flat">
			<div class="header">							
				<h3 class="text-center"><img class="logo-img" src="<?php echo "$THEME/uploads/cwlogo.png"; ?>" alt="logo"/></h3>
			</div>
			<div>
                
				<form style="margin-bottom: 0px !important;" class="form-horizontal" method='post' action="../Process/Login">
					<div class="content">
						<h4 class="title">Login Access</h4>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" name='log' placeholder="Username / Email" id="username" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" name='pwd' placeholder="Password" id="password" class="form-control">
									</div>
								</div>
							</div>

					</div>
					<div class="foot">
						<button class="btn btn-default" data-dismiss="modal" type="button">Register</button>
						<button class="btn btn-primary" data-dismiss="modal" type="submit">Log me in</button>
					</div>
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