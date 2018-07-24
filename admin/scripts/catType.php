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
<?php
$query = "SELECT * FROM articles WHERE category='$_GET[catid]' AND type='prodcat' AND active='1' AND trash='0'"; 
$result = mysqli_query($CwDb,$query) or die(mysql_error());
while($row = mysqli_fetch_assoc($result)){
$row = CwOrganize($row,$Array);
echo "<option value='$row[id]'"; if($row['id'] == $ProductInfo['shortcode']){ echo "selected='selected'"; }; ?>><?php echo $row['name']; ?></option>
<?php } ?>
        </select>
    </div>
</div>
<br><br>
