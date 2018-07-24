<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li class="active">Website File Manager</li>
</ol></div>



<?php
$query = "SELECT * FROM login_session WHERE userid='$Current_Admin_Id' AND active='1' AND trash='0' AND webid='$WebId' ORDER BY id DESC";
$result = mysqli_query($CwDb,$query);
$row = mysqli_fetch_assoc($result);

$Incoming['pbsession'] = $row['id'];
$Incoming['user'] = $Current_Admin_Id;
$Incoming['account']['user'] = "test";
$Incoming['account']['pass'] = "test";
$Incoming = OtarEncrypt($PB_Access,$Incoming);
?>




<iframe id="tree" name="tree" src="http://www.<?php echo $_SERVER["HTTP_HOST"]; ?>/api/extplorer/index.php?pbrequest=<?php echo $Incoming; ?>" frameborder="0" marginheight="0" marginwidth="0" width="1600" height="800" scrolling="auto"></iframe>



<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery-ui.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.jeditable.mini.js"></script>
<script type="text/javascript" src="<?php echo "$THEME/header/js/datatables.min.js" ?>"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/datatables.js"></script>