<?php
include("config/encrypt.php");
include("config/functions.php");
include("config/database.php");


$Content = $_GET['info'];
$Id = $_GET['id'];


#$result = mysql_query("UPDATE articles SET info='$Content' WHERE id='$Id' AND webid='$WebId'") 
#or die(mysql_error());


#echo $Content;

#print_r($_GET);

?>

<script>
setTimeout(function() {
    $('#hidediv').fadeOut('fast');
}, 2000); // <-- time in milliseconds
</script>

<br><br>
<div style="color:limegreen;" id='hidediv'>
Your Information has been updated successfully.
</div>


