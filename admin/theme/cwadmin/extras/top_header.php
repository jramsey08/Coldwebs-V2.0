<?php if($Get_Url == "login" OR $Get_Url == "register"){  }else{ ?>
<body class="animated">
<div id="cl-wrapper">

<?php include("$THEME/extras/sidebar.php"); ?>
  
<div class="container-fluid" id="pcont">
<!-- TOP NAVBAR -->
<div id="head-nav" class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-collapse">
<ul class="nav navbar-nav navbar-right user-nav">
<li class="dropdown profile_menu">
<a href="/admin" class="dropdown-toggle" data-toggle="dropdown">
<img alt="Avatar" src="<?php echo $Array['userinfo']['info']['img']; ?>" height="30" width="30"/><span><?php echo $Array['userinfo']['name']; ?></span> <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="/admin/Profile">My Profile</a></li>
<li><a href="/admin/Messages">Messages</a></li>
<li class="divider"></li>
<li><a href="/Logout">Sign Out</a></li>
</ul>
</li>
</ul>			




</div><!--/.nav-collapse animate-collapse -->
</div></div>
<?php } ?>

<div id="Cw_Session_refresh"></div>
