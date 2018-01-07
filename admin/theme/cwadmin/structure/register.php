<?php if($Current_Admin_Id == ""){ ?>
<body class="texture">
<div id="cl-wrapper" class="sign-up-container">

	<div class="middle-sign-up">
		<div class="block-flat">
			<div class="header">							
				<h3 class="text-center"><img class="logo-img" src="<?php echo $THEME; ?>/uploads/cwlogo.png" alt="logo"/></h3>
			</div>
			<div>
				<form style="margin-bottom: 0px !important;" class="form-horizontal" action="../Process/Register" method='post' parsley-validate novalidate>
					<div class="content">
						<h5 class="title text-center"><strong>Sign Up</strong></h5>
              <hr/>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <button class="btn btn-block btn-trans btn-facebook bg btn-rad" type="button"><i class="fa fa-facebook"></i> Sign in with Facebook</button>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <button class="btn btn-block btn-trans btn-twitter bg btn-rad" type="button"><i class="fa fa-twitter"></i> Sign in with Twitter</button>
                </div>
              </div>
              <p class="text-center">Or</p>
              
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" name="username" parsley-trigger="change" parsley-error-container="#nick-error" required placeholder="Username" class="form-control">
									</div>
                  <div id="nick-error"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input type="email" name="email" parsley-trigger="change" parsley-error-container="#email-error" required placeholder="E-mail" class="form-control">
									</div>
                  <div id="email-error"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-6 col-xs-6">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input id="pass1" type="password" parsley-error-container="#password-error" placeholder="Password" required class="form-control">
									</div>
                  <div id="password-error"></div>
								</div>
								<div class="col-sm-6 col-xs-6">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input parsley-equalto="#pass1" type="password" parsley-error-container="#confirmation-error"required placeholder="Password" class="form-control">
									</div>
                  <div id="confirmation-error"></div>
								</div>
							</div>
             <p class="spacer">By creating an account, you agree with the <a href="#">Terms</a> and <a href="#">Conditions</a>.</p>
            <button class="btn btn-block btn-success btn-rad btn-lg" type="submit">Sign Up</button>
							
					</div>
			  </form>
			</div>
		</div>
		<div class="text-center out-links"><a href="/">&copy; <?php echo date(Y); echo " " . $Array['siteinfo']['name']; ?></a></div>
	</div> 
	
</div>



  <script src="/admin/theme/cwadmin/header/js/jquery.js"></script>
  <script src="/admin/theme/cwadmin/header/js/parsley.js" type="text/javascript"></script>

	<script type="text/javascript">
    $(function(){
      $("#cl-wrapper").css({opacity:1,'margin-left':0});
    });
  </script>
  <?php }else{
$Domain = $Array[siteinfo][domain];
$Redirect = "admin"; ?>
<script type="text/javascript">
<!--
window.location = "<?php echo "$Domain/$Redirect"; ?>"
//-->
</script>
<?php } ?>