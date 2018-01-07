<?php
include("functions.php");
include("encrypt.php");
include("database.php");

$User = OtarDecrypt($key, $_GET['user']);

$query = "SELECT * FROM tasks WHERE active='1' AND trash='0' AND user='$User' AND webid='$WebId'";  
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
<div class="alert alert-block alert-danger fade in">
<button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i> </button>
<strong><a href="<?php echo $row['url']; ?>" target='_blank'><?php echo $row['content']; ?></a></strong></div>
<?php } ?>