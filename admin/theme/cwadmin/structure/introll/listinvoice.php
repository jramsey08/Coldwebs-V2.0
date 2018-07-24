<div class="cl-mcont">
    <div class="page-head">
        <ol class="breadcrumb">
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/Cw-Invoice">Introll Invoicse</a></li>
            <li class="active">Website Invoice</li>
        </ol>
    </div>



<?php
$Incoming['user'] = $Current_Admin_Id;
$Incoming['account']['domain'] = $Website_Url_Auth;
$Incoming['account']['invoice'] = $_GET['type'];
$Incoming = OtarEncrypt($PB_Access,$Incoming);
?>




<iframe id="tree" name="tree" src="http://www.pblast.in/invoice.php?pbrequest=<?php echo $Incoming; ?>" frameborder="0" marginheight="0" marginwidth="0" width="1600" height="800" scrolling="auto"></iframe>



<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery-ui.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.jeditable.mini.js"></script>
<script type="text/javascript" src="/admin/theme/header/js/datatables.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/datatables.js"></script>