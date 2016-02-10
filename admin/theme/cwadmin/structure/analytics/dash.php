<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li class="active">Website Analytics</li>
</ol></div>



<?php
$query = "SELECT * FROM login_session WHERE userid='$Current_Admin_Id' AND active='1' AND trash='0' ORDER BY id DESC"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);


$Incoming['pbsession'] = $row['id'];
$Incoming['user'] = $Current_Admin_Id;
$Incoming['account']['user'] = "test";
$Incoming['account']['pass'] = "test";
$Incoming = OtarEncrypt($PB_Access,$Incoming);
?>



<iframe id="tree" name="tree" src="http://www.parallelmagz.com/test/google/test.php?pbrequest=<?php echo $Incoming; ?>" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="930" scrolling="auto"></iframe>




<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.ui/jquery-ui.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.jeditable/jquery.jeditable.mini.js"></script>
<script type="text/javascript" src="<?php echo "$THEME/header/js/datatables.min.js" ?>"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>