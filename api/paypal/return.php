<?php
$Value = $_GET[end];
$Value = OtarDecrypt($Array,$Value);
$Status = $Value[status];
$TransId = $Value[id];
$TransId = OtarDecrypt($Array,$TransId);

$query = "SELECT * FROM trans WHERE transid='$TransId' AND active='1' AND trash='0'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$TransId = $row[transid];

if($TransId == ""){
     $REDIRECT = "Events";
}else{
     if($Status == "1"){
          $result = mysql_query("UPDATE trans SET status='Complete' WHERE transid='$TransId'")
          or die(mysql_error());
          $TransId = OtarEncrypt($Array,$TransId);
          $REDIRECT = "Dashboard/Orders/$TransId";
     }else{
          $result = mysql_query("UPDATE trans SET status='Pending' WHERE transid='$TransId'")
          or die(mysql_error());
          $TransId = OtarEncrypt($Array,$TransId);
          $REDIRECT = "Dashboard/Orders/$TransId";

// CREATE QR BARCODE \\

     }
}

$Domain = $Array[siteinfo][domain];
?>
<script type="text/javascript">
<!--
window.location = "<?php echo "$Domain/$REDIRECT"; ?>"
//-->
</script>