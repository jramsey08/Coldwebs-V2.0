<div class="cl-sidebar">
    <div class="cl-toggle"><i class="fa fa-bars"></i></div>
    <div class="cl-navblock">
      <div class="menu-space">
        <div class="content">
          <div class="sidebar-logo">
            <div class="logo">
                <a href="/admin/Profile"></a>
            </div>
          </div>
          <div class="side-user">
            <div class="avatar"><img src="<?php echo $Array['userinfo']['info']['img']; ?>" height="50" width="50" alt="Avatar" /></div>
            <div class="info">
              <p><?php echo $HostingInfo['sizetype']; ?> / <?php echo $HostingInfo['max']; ?> <b>GB</b><span><a href="#"><i class="fa fa-plus"></i></a></span></p>
              <div class="progress progress-user">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $HostingInfo['size']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $HostingInfo['max']; ?>" style="width: <?php echo $HostingInfo['percent']; ?>%">
                  <span class="sr-only">50% Complete (success)</span>
                </div>
              </div>
            </div>
          </div>
          <ul class="cl-vnavigation">
<li class="active"><a href="/admin"><i class="fa"></i><span>Dashboard</span></a></li>

<<<<<<< HEAD

<?php
$query = "SELECT * FROM admin WHERE type='menu' AND active='1' AND category='self' AND trash='0' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $row = PbUnSerial($row);
    $rowAccess = $row['access'];
?>
<?php if($UserSiteAccess["$rowAccess"] == "1"  OR $rowAccess == ""){ ?>
    <li><a href="#"><i class="fa"></i><span><?php echo $row['name']; ?></span></a>
<?php
$Query = "SELECT * FROM admin WHERE type='menu' AND active='1' AND category='$row[id]' AND trash='0' ORDER BY name";
$Result = mysql_query($Query) or die(mysql_error());
while($Row = mysql_fetch_array($Result)){
    $Row = PbUnSerial($Row);
    $RowAccess = $Row['access'];
    $Count = $Count + 1;
if($Count == "1"){
?>
<ul class="sub-menu">
<?php } ?>
<?php if($UserSiteAccess["$RowAccess"] == "1" OR $RowAccess == ""){ ?>
    <li><a href="/admin/<?php echo $Row['url']; ?>"><span><?php echo $Row['name']; ?></a></li>
<?php 
}}
if($Count >= "1"){
?>
</ul>
<?php }}
$Count = "0";
} ?>

<?php if($UserSiteAccess['editdesign'] == "1"){ ?>
<li><a href="#"><i class="fa"></i><span>Themes</span></a>
<ul class="sub-menu">
<li ><a href="/admin/Design/Upload">Upload</a></li>
<li  ><a href="/admin/Design/">View All</a></li>
=======
<?php if($UserSiteAccess['editarticle'] == "1"){ ?>
<li><a href="#"><i class="fa"></i><span>Posts</span></a>
<ul class="sub-menu">
    <li><a href="/admin/Articles">Articles</a></li>
    <li><a href="/admin/Services">Services</a></li>
    <li><a href="/admin/Portfolio">Portfolio</a></li>
    <li><a href="/admin/Transfer">Transfers</a></li>
    <li><a href="/admin/Audio">Audio</span></a></li>
    <?php if($UserSiteAccess['editgallery'] == "1"){ ?><li><a href="/admin/Gallery"><span>Gallery</a></li><?php } ?>
    <li><a href="/admin/Cinema">Cinema/Video</span></a></li>
</ul></li><?php } ?>

<li><a href="#"><i class="fa"></i><span>Main Sections</span></a>
<ul class="sub-menu">
    <?php if($UserSiteAccess['editcategory'] == "1"){ ?>
        <li  ><a href="/admin/Category">Category</a></li>
    <?php } ?>
    <?php if($UserSiteAccess['editmenu'] == "1"){ ?>
        <li  ><a href="/admin/Menu">Menu</a></li>
    <?php } ?>
    <?php if($UserSiteAccess['editpages'] == "1"){ ?>
        <li  ><a href="/admin/Pages">Pages</a></li>
    <?php } ?>
</ul></li>

<?php if($UserSiteAccess['ecommerce'] == "1"){ ?>
<li><a href="#"><i class="fa"></i><span>E-Commerce</span></a>
<ul class="sub-menu">
<li  ><a href="/admin/Ecommerce/">Dashboard</a></li>
<li  ><a href="/admin/Products">Products</a></li>
<li  ><a href="/admin/Attributes">Attributes</a></li>
<?php if($Access['vieworders'] == "1"){ ?><li><a href="/admin/Orders">Orders</a></li><?php } ?>
</ul></li><?php } ?>

<?php if($UserSiteAccess['editdesign'] == "1"){ ?>
<li><a href="#"><i class="fa"></i><span>Appearance</span></a>
<ul class="sub-menu">
<li><a href="/admin/Design/">Themes</a></li>
<?php if($UserSiteAccess['editsidebar'] == "1"){ ?>
<li><a href="/admin/Sidebar">Sidebar</a></li>
<?php } ?>
<li><a href="/admin/Design/Upload">Upload</a></li>
</ul></li><?php } ?>

<?php if($UserSiteAccess['viewusers'] == "1"){ ?>
<li><a href="#"><i class="fa"></i><span>Users</span></a>
<ul class="sub-menu">
<?php if($UserSiteAccess['editauthor'] == "1"){ ?>
<li><a href="/admin/Author/"> Authors</a></li>
<?php } ?>
<li><a href="/admin/Users">User Accounts</a></li>
>>>>>>> origin/master
</ul></li><?php } ?>

<li><a href="#"><i class="fa"></i><span>Extra</span></a>
<ul class="sub-menu">
<<<<<<< HEAD
<?php if($UserSiteAccess['editcwfile'] == "1"){ ?>
<li ><a href="/admin/CwFile">CW File Transfer</a></li>
<?php } ?>
</ul></li>

<li><a href="#"><i class="fa"></i><span>Settings</span></a>
<ul class="sub-menu">
<li ><a href="/admin/Profile">My Profile</a></li>
<?php if($UserSiteAccess['editoffline'] == "1"){ ?><li ><a href="/admin/Offline">Offline Page</a></li><?php } ?>
<?php if($UserSiteAccess['editsocial'] == "1"){ ?><li ><a href="/admin/SocialMedia">Social Media</a></li><?php } ?>
<?php if($UserSiteAccess['edituseraccess'] == "1"){ ?><li ><a href="/admin/UserAccess">User Access</a></li><?php } ?>
<?php if($UserSiteAccess['editsettings'] == "1"){ ?><li ><a href="/admin/Settings">Website Config</a></li>
<?php if($UserSiteAccess['setaccess'] == "1"){ ?><li ><a href="/admin/CwAccess">Website Access</a></li><?php } ?>
<?php if($UserSiteAccess['bgmenu'] == "1"){ ?><li ><a href="/admin/Bg-Menu">Background Menu</a></li><?php } ?>
<?php } ?>
</ul></li>

=======
<li ><a href="/admin/Advertisement">Advertisement</a></li>
<?php if($UserSiteAccess['viewanalytics'] == "1"){ ?>
<li ><a href="/admin/Analytics">Analytics</a></li>
<?php } ?>
<?php if($UserSiteAccess['editcwfile'] == "1"){ ?>
<li ><a href="/admin/CwFile">CW File Transfer</a></li>
<?php } ?>
<?php if($UserSiteAccess['filemanager'] == "1"){ ?>
<li ><a href="/admin/Filemanager">File Manager</a></li>
<?php } ?>
<?php if($UserSiteAccess['editticker'] == "1"){ ?>
<li ><a href="/admin/Ticker">Ticker</a></li>
<?php } ?>
</ul></li>



<li><a href="#"><i class="fa"></i><span>Settings</span></a>
<ul class="sub-menu">
<li ><a href="/admin/Profile">My Profile</a></li>
<?php if($UserSiteAccess['editsettings'] == "1"){ ?>
<li ><a href="/admin/Settings">Website Config</a></li>
<?php if($UserSiteAccess['setaccess'] == "1"){ ?>
<li ><a href="/admin/CwAccess">Website Access</a></li>
<?php } ?>
<?php if($UserSiteAccess['editoffline'] == "1"){ ?>
<li ><a href="/admin/Offline">Offline Page</a></li>
<?php } ?>
<?php if($UserSiteAccess['editsocial'] == "1"){ ?>
<li ><a href="/admin/SocialMedia">Social Media</a></li>
<?php }} ?>
</ul></li>



>>>>>>> origin/master
</ul>
</div></div>


</div></div>