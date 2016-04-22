<?php
include("../../config/encrypt.php");
include("../config/functions.php");
include("../../config/database.php");
?>



<div class="form-group">
<label class="col-sm-3 control-label">Team 1</label>
<div class="col-sm-6">
<select class="form-control" name='team[1]'>
<option value=''>Select Below</option>
<?php 
$query = "SELECT * FROM sport_team WHERE type='team' AND cat='$_GET[id]' AND trash='0' AND active='1'  ORDER BY name";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
?>
<option value='<?php echo $row['id']; ?>'><?php echo $row['name']; ?></option>
<?php } ?>
</select></div></div><br><br>

<?php if($_GET['compare'] == "1"){ ?>
<div class="form-group">
<label class="col-sm-3 control-label">Team 2</label>
<div class="col-sm-6">
<select class="form-control" name='team[2]'>
<option value=''>Select Below</option>
<?php 
$query = "SELECT * FROM sport_team WHERE type='team' AND cat='$_GET[id]' AND trash='0' AND active='1'  ORDER BY name";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
?>
<option value='<?php echo $row['id']; ?>'><?php echo $row['name']; ?></option>
<?php } ?>
</select></div></div><br>
<?php } ?>