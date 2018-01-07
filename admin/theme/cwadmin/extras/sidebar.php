<div class="cl-sidebar">
    <div class="cl-toggle">
        <i class="fa fa-bars"></i>
    </div>
    <div class="cl-navblock">
        <div class="menu-space">
            <div class="content">
                <div class="sidebar-logo">
                    <div class="logo">
                        <a href="/admin/Profile"></a>
                    </div>
                </div>
                <div class="side-user">
                    <div class="avatar">
                        <img src="<?php echo $Array['userinfo']['info']['img']; ?>" height="50" width="50" alt="Avatar" />
                    </div>
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
<?php
$query = "SELECT * FROM admin WHERE type='menu' AND active='1' AND category='self' AND trash='0' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $row = PbUnSerial($row);
    $rowAccess = $row['access'];
    if($UserSiteAccess["$rowAccess"] == "1"  OR $rowAccess == ""){
?>
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
<?php
}
if($UserSiteAccess["$RowAccess"] == "1" OR $RowAccess == ""){
?>
                <li><a href="/admin/<?php echo $Row['url']; ?>"><span><?php echo $Row['name']; ?></a></li>
<?php 
}}
if($Count >= "1"){
?>
                        </ul>
<?php }}
$Count = "0";
} ?>
                </ul>
            </div>
        </div>
    </div>
</div>