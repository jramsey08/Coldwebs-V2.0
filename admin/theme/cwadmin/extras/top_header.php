<?php if($OfflineByPass != "1"){ ?>
<body class="animated">
    <div id="cl-wrapper">
<?php include("$THEME/extras/sidebar.php"); ?>
    <div class="container-fluid" id="pcont">
<!-- TOP NAVBAR -->
        <div id="head-nav" class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-collapse">
                    <ul class="nav navbar-nav not-nav">
                        <li class="button dropdown ">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class=" fa fa-inbox"></i>
                            </a>
                            <ul class="dropdown-menu messages">
                                <li>
                                    <div class="nano nscroller has-scrollbar">
                                        <div class="content" tabindex="0" style="right: -15px;">
                                            <ul>
<?php
$Query = "SELECT * FROM messages WHERE trash='0' AND type='inbox' AND webid='$WebId' ORDER BY date DESC LIMIT 0,3"; 
$Result = mysqli_query($CwDb,$Query);
while($Tmessage = mysqli_fetch_assoc($Result)){
    $Tmessage = CwOrganize($Tmessage,$Array);
    $query = "SELECT * FROM users WHERE id='$Tmessage[user]'"; 
    $result = mysqli_query($CwDb,$query);
    $User = mysqli_fetch_assoc($result);
    $User = CwOrganize($User,$Array);
    if($User["content"]["img"] == ""){
        $User["content"]["img"] = "/admin/theme/cwadmin/uploads/avatar.png";
    }
    $Id = OtarEncrypt($key,$Tmessage["id"]); 
?>
                                                <li>
                                                    <a href="/admin/Inbox/<?php echo $Id; ?>">
                                                        <img src="<?php echo $User["content"]["img"]; ?>" alt="avatar">
                                                            <span class="date pull-right"><?php echo date("D M-d-Y", $Tmessage["date"]); ?></span>
                                                            <span class="name"><?php echo $Tmessage["name"]; ?></span>
                                                            <?php echo $Tmessage["subject"]; ?>
                                                    </a>
                                                </li>
<?php } ?>
                                            </ul>
                                        </div>
                                        <div class="pane" style="display: block;">
                                            <div class="slider" style="height: 155px; top: 0px;"></div>
                                        </div>
                                    </div>
                                    <ul class="foot">
                                        <li><a href="/admin/Inbox">View all messages </a></li>
                                    </ul>            
                                </li>
                            </ul>
                        </li>
                        <li class="button dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-globe"></i>
                                <!--<span class="bubble">2</span>-->
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="nano nscroller has-scrollbar">
                                        <div class="content" tabindex="0" style="right: -15px;">
                                            <ul>
<?php
if($UserSiteAccess['notification'] == "1"){
    if($UserSiteAccess['cross_domain'] == "1"){
        $Query = "SELECT * FROM cw_alerts WHERE trash='0' ORDER BY date DESC LIMIT 0,3";
    }else{
        $Query = "SELECT * FROM cw_alerts WHERE trash='0' AND webid='$WebId' ORDER BY date DESC LIMIT 0,3";
    }
}else{
    if($UserSiteAccess['cross_domain'] == "1"){
        $Query = "SELECT * FROM cw_alerts WHERE trash='0' AND user='$Current_Admin' ORDER BY date DESC LIMIT 0,3";
    }else{
        $Query = "SELECT * FROM cw_alerts WHERE trash='0' AND user='$Current_Admin' AND webid='$WebId' ORDER BY date DESC LIMIT 0,3";
    }
}
$Result = mysqli_query($CwDb,$Query);
while($Alerts = mysqli_fetch_assoc($Result)){
    $Alerts = CwOrganize($Alerts,$Array);
?>
                                                <li>
                                                    <a href="/admin/Tracker/Notification/<?php echo OtarEncrypt($key,$Alerts['id']); ?>">
                                                        <i class="fa fa-cloud-upload info"></i>
                                                        <b><?php echo $Alerts["other"]["message"]; ?></b> 
                                                        <span class="date"><?php echo date("F / d / Y h:i:s A", $Alerts["date"]); ?></span>
                                                    </a>
                                                </li>
<?php  } ?>
                                            </ul>
                                        </div>
                                        <div class="pane" style="display: none;">
                                            <div class="slider" style="height: 20px; top: 0px;"></div>
                                        </div>
                                    </div>
                                    <ul class="foot">
                                        <li><a href="/admin/Tracker/Notification/">View all activity </a></li>
                                    </ul>           
                                </li>
                            </ul>
                        </li>
                        <!--
                        <li class="button">
                            <a class="toggle-menu menu-right push-body jPushMenuBtn" href="javascript:;">
                                <i class="fa fa-comments"></i>
                            </a>
                        </li>
                        -->
                    </ul>
                    <ul class="nav navbar-nav navbar-right user-nav">
                        <li class="dropdown profile_menu">
                            <a href="/admin" class="dropdown-toggle" data-toggle="dropdown">
                                <img alt="Avatar" src="<?php echo $Array['userinfo']['info']['img']; ?>" height="30" width="30"/>
                                <span><?php echo $Array['userinfo']['name']; ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/Profile">My Profile</a></li>
                                <li><a href="/admin/Inbox">Messages</a></li>
                                <li class="divider"></li>
                                <li><a href="/Logout">Sign Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse animate-collapse -->
            </div>
        </div>
<?php } ?>
        <div id="Cw_Session_refresh"></div>
