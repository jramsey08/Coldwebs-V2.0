<?php
include("config/session.php");
include("config/userinfo.php");
?>
<html>
<head>
<title>Subscribe</title>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
 

<style>body{font:normal 100% Arial,sans-serif;font-size:10px;background:url(http://parallelmagz.com/uploads/parallelsubscribe.jpg) no-repeat scroll 0 0 black;color:black;text-align:left;}.login-form{padding-top:80px;padding-left:30px;margin:0;width:450px;}input,select,textarea{border:#dddddd 1px solid;font-size:16px;width:300px;}button{clear:both;color:white;background:black;width:auto;display:block;margin-top:15px;padding:5px;border:none!important;}label{display:block;font-weight:bold;padding-top:15px;}.sendicate-error{padding-left:30px;font:normal 100% Arial,sans-serif;font-size:12px;font-style:bold;color:red;}</style>

</head>
<body>
<div class="login-form">
<form id="sendicate-form-subscription" action="/Process/Subscribe?popup=1&popupuri=<?php echo $_GET['popupuri']; ?>" method="POST"/>
<label>Full Name</label>
<input type="text" value="<?php echo $CurrentUser['name']; ?>" <?php if($CurrentUser['email'] != ""){ echo disabled; } ?> name="name" class="required" id="subscriber_name">
<label>Email Address </label>
<input type="text" name="email" value="<?php echo $CurrentUser['email']; ?>" <?php if($CurrentUser['email'] != ""){ echo disabled; } ?> id="subscriber_email"/>
<label>Gender </label>
<select name="gender" class="required" id="subscriber_gender">
<option value=""></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
<label>Country </label>
<select name="country" class="required" id="subscriber_country">
<option value=""></option>
<?php while($row = Cw_Fetch("SELECT * FROM opn_country WHERE status='1' ORDER BY NAME ASC",$Array)){?>
<option value="<?php echo $row['iso_code_3']; ?>"><?php echo $row['name']; ?></option>
<?php } ?>
</select> <?php echo $Current_Admin; ?>
<input type='hidden' value='<?php echo $_GET['userid']; ?>' name='userid'>
<button type="submit" id="form_submit">Subscribe</button>
</div>
</form>
</div>
</body>
</html>