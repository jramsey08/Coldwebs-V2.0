<?php
include("../../config/encrypt.php");
include("../config/functions.php");
include("../../config/database.php");
?>



<div class="form-group">
<label class="col-sm-3 control-label">Category</label>
<div class="col-sm-6">
<select class="form-control" name='category'>
<option>Select Below</option>
<?php  $query = "SELECT * FROM articles WHERE category='self' AND type='prodcat' AND active='1' AND trash='0'"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
if($row['content']['cattype'] == $_GET['catid']){
echo "<option value='$row[id]'"; if($row['id'] == $ProductInfo['category']){ echo "selected='selected'"; }; ?>><?php echo $row['content']['name']; ?></option> <?php }} ?>
</select></div></div><br><br>