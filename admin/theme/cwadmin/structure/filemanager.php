<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li class="active">Website File Manager</li>
</ol></div>



<?php
<<<<<<< HEAD
$query = "SELECT * FROM login_session WHERE userid='$Current_Admin_Id' AND active='1' AND trash='0' ORDER BY id DESC";
=======
$query = "SELECT * FROM login_session WHERE userid='$Current_Admin_Id' AND active='1' AND trash='0' ORDER BY id DESC"; 
>>>>>>> origin/master
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);


$Incoming['pbsession'] = $row['id'];
$Incoming['user'] = $Current_Admin_Id;
$Incoming['account']['user'] = "test";
$Incoming['account']['pass'] = "test";
$Incoming = OtarEncrypt($PB_Access,$Incoming);
?>



<<<<<<< HEAD
<iframe id="tree" name="tree" src="http://www.<?php echo $_SERVER["HTTP_HOST"]; ?>/api/extplorer/index.php?pbrequest=<?php echo $Incoming; ?>" frameborder="0" marginheight="0" marginwidth="0" width="1600" height="800" scrolling="auto"></iframe>
=======
<iframe id="tree" name="tree" src="http://parallelmagz.com/api/extplorer/index.php?pbrequest=<?php echo $Incoming; ?>" frameborder="0" marginheight="0" marginwidth="0" width="1600" height="800" scrolling="auto"></iframe>
>>>>>>> origin/master




<<<<<<< HEAD
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery-ui.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.jeditable.mini.js"></script>
<script type="text/javascript" src="<?php echo "$THEME/header/js/datatables.min.js" ?>"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/datatables.js"></script>
=======
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.ui/jquery-ui.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.jeditable/jquery.jeditable.mini.js"></script>
<script type="text/javascript" src="<?php echo "$THEME/header/js/datatables.min.js" ?>"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
>>>>>>> origin/master
