<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Audio">Audio</a></li>
<li class="active"><?php echo $Article['content']['name']; ?></li>
</ol></div>		
		
<div class="row">		
<div class="col-sm-12 col-md-9">
<div class="tab-container">
<ul class="nav nav-tabs">
<li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
<li><a href="#gallery" data-toggle="tab">Gallery</a></li>
<<<<<<< HEAD
<li><a href="#tracks" data-toggle="tab">Tracks</a></li>
<li><a href="#uploads" data-toggle="tab">Uploads</a></li>
=======
<li><a href="#social" data-toggle="tab">Social Media</a></li>
>>>>>>> origin/master
</ul>



<div class="tab-content">

<div class="tab-pane active cont" id="basic">
<div class="row">
<<<<<<< HEAD
<form role="form" method='post' action='/Process/Blog' enctype="multipart/form-data">
=======
<form role="form" method='post' action='/Process/Articles' enctype="multipart/form-data">
>>>>>>> origin/master
<div class="col-sm-12 col-md-12">
<div class="col-sm-6 col-md-6">
<div class="header"><h3>Basic Information</h3></div></div>
</div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Title</label>
<div class="col-sm-6">
<input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $Article['content']['name']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Url</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name='url' value="<?php echo $Article['url']; ?>" placeholder="Example: site.com/'URL'">
</div></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Category</label>
<div class="col-sm-6">
<select class="form-control" name='category'>
<option value="<?php echo $Article['category']; ?>">Select Below</option>
<?php $query = "SELECT * FROM articles WHERE category='self' AND type='category' AND active='1' AND trash='0'"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $Article['category']){ echo "selected=selected"; }; ?>><?php echo $row['content']['name']; ?></option> <?php } ?>
</select></div></div><br><br>
</div>


<div class="form-group">
<label class="col-sm-3 control-label">Featured</label>
<div class="col-sm-6">
<select class="form-control" name='feat'>
<option value='0' <?php if($Article['feat'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['feat'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['feat'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Allow Comments</label>
<div class="col-sm-6">
<select class="form-control" name='comment'>
<option value='0' <?php if($Article['other']['comment'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['other']['comment'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['other']['comment'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div>



</div>



<div class="col-sm-12 col-md-12">
<div class="form-group">
<<<<<<< HEAD
<textarea name='content' rows="10" class="ckeditor form-control" ><?php echo $Article['info']; ?></textarea>
=======
<textarea name='content' rows="300" class="ckeditor form-control" ><?php echo $Article['info']; ?></textarea>
>>>>>>> origin/master
</div></div>


</div></div>

<div class="tab-pane cont" id="gallery">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Gallery</h3>
</div></div>
<div class="row">
<<<<<<< HEAD
<div class="col-sm-12 col-md-6">
=======
<div class="col-sm-6 col-md-6">
>>>>>>> origin/master
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Main Image</label>
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if($Article['content']['img'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $Article['content']['img']; } ?>" alt="..."></div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
<div><span class="btn btn-primary btn-file">
<span class="fileinput-new">Select image</span>
<span class="fileinput-exists">Change</span>
<input type="file" name="profilepic[]"></span>
<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
</div></div></div></div></div>
<<<<<<< HEAD
</div>
=======
<div class="col-sm-6 col-md-6">
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Extra Images</label>
<div class="col-sm-6">
<div class="fileinput fileinput-new" data-provides="fileinput">
<span class="btn btn-primary btn-file">
<span class="fileinput-new">Select file(s)</span>
<span class="fileinput-exists">Change</span><input type="file" multiple="" name="gallery[]"></span>
<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
</div></div></div></div></div></div>
>>>>>>> origin/master
<div class="row">
<div class="col-md-12">
<div class="header"><h3>Extra Images</h3></div>
<div class="content">
<div class="table-responsive">
<table class="table no-border hover">
<thead class="no-border">
<tr>
<th style="width:30%;"><strong>Image</strong></th>
<th style="width:30%;"><strong>Order</strong></th>
<th style="width:30%;"><strong>Url</strong></th>
<<<<<<< HEAD
<th style="width:30%;"><strong>Delete</strong></th>
</tr></thead>
<tbody class="no-border-y">
<?php $query = "SELECT * FROM images WHERE album='$Article[id]' AND type='image' AND trash='0' AND active='1' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ 
if($Article['id'] == ""){
    #exit;
} ?>
=======
<th style="width:15%;" class="text-center"><strong>Action</strong></th>
</tr></thead>
<tbody class="no-border-y">
<?php $query = "SELECT * FROM images WHERE album='$Article[id]' AND trash='0' AND active='1' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
>>>>>>> origin/master
<tr>
<td><img src='<?php echo $row['img']; ?>' height="200" width="200"></td>
<td style="width:30%;"><input type='text' name="ImageOrder[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["list"]; ?>'></td>
<td style="width:30%;"><input type='text' name="ImageUrl[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["url"]; ?>'></td>
<<<<<<< HEAD
<td><input type="checkbox" name="removegal[]" value="<?php echo $row['id']; ?>"></td>
=======
<td class="text-center">
<a class="label label-danger" href="/Process/Delete/Images/<?php echo OtarEncrypt($key,$row['id']); ?>"><i class="fa"></i></a></td>
>>>>>>> origin/master
</tr><?php } ?>
</tbody></table>
</div></div></div></div>
</div>

<<<<<<< HEAD


<div class="tab-pane cont" id="tracks">
<div class="row">
<div class="col-md-12">
<div class="header"><h3>Album Tracks</h3></div><br><br>
<div class="content">
<div class="table-responsive">
<table class="table no-border hover">
<thead class="no-border">
<tr>
<th style="width:20%;"><strong>Image</strong></th>
<th style="width:20%;"><strong>Name</strong></th>
<th style="width:10%;"><strong>Order</strong></th>
<!--<th style="width:30%;"><strong>Url</strong></th>-->
<?php if($Cw_Preview_Songs['active'] == "1"){ ?>
<th style="width:30%;"><strong>Controls</strong></th>
<?php } ?>
<th style="width:10%;"><strong>Delete</strong></th>
</tr></thead>
<tbody class="no-border-y">
<?php $query = "SELECT * FROM images WHERE album='$Article[id]' AND trash='0' ANd type='track' AND active='1' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ 
    $Count = $Count + 1;
    if($row['name'] == ""){
        $row['name'] = "Track $Count";
    }
    if($row['img'] == ""){
        $row['img'] = "http://icons.iconseeker.com/ico/rhor-v2-part-3/audio-cd-3.ico";
    }
    if($Article['id'] == ""){
        exit;
    }
 ?>
<tr>
<td><img src='<?php echo $row['img']; ?>' height="100" width="100"></td>
<td><input type='text' name="TrackName[<?php echo $row['id']; ?>]" value='<?php echo $row['name']; ?>'></td>
<td><input type='text' name="ImageOrder[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["list"]; ?>'></td>
<!--<td style="width:70%;"><input type='text' name="ImageUrl[<?php echo $row['id']; ?>]" size="60" value='<?php echo $row["url"]; ?>' disabled></td>-->
<?php if($Cw_Preview_Songs['active'] == "1"){ ?>
<td style="width:70%;">
<audio id="audio<?php echo $row['id']; ?>" src="<?php echo $row['url']; ?>"></audio><div style="width:120px; height:50px;">
<a onclick="document.getElementById('audio<?php echo $row['id']; ?>').play()"><img src="/uploads/play.png" height="50" width="50"></a>
<a onclick="document.getElementById('audio<?php echo $row['id']; ?>').pause()"><img src="/uploads/pause.png" height="50" width="50"></a>
</div>
</td><?php } ?>
<td><input type="checkbox" name="removegal[]" value="<?php echo $row['id']; ?>"></td>
</tr><?php } ?>
</tbody></table>
</div></div></div></div>
</div>


<div class="tab-pane cont" id="uploads">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Media Uploader</h3>
</div></div>
<div class="row">
<div class="col-sm-12 col-md-12">
<?php if($Article['id'] == ""){
    $Rand = rand("999","9999999");
}
?>
<iframe src='/api/dropzone/main.php?type=track&rand=<?php echo $Rand; ?>&id=<?php echo $Article['id']; ?>' scrolling='no' frameborder="0" height="600" width="720" ></iframe>
</div></div>
=======
<div class="tab-pane" id="social">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Social Media Integration</h3></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<?php
$query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $TotalSocial = $TotalSocial + 1;
}
if ($TotalSocial % 2 == 0) {
}else{
    $TotalSocial = $TotalSocial + 1;
}
$Half = $TotalSocial / 2;
$Split1 = $Half;
$Split2 = $Half + 1;
$query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0' LIMIT 0,$Split1";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$name = strtolower($row[name]);
$Social = $Article['other']['social']; ?>
<label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name="social[<?php echo $name; ?>]" value="<?php echo isset_get($Social,$name); ?>" placeholder="Username / Url">
</div></div><br><br><br>
<?php } echo "</div></div>"; ?>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<?php $query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0' LIMIT $Split2,$TotalSocial";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$name = strtolower($row['name']);
$Social = $Article['other']['social']; ?>
<label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name="social[<?php echo $name; ?>]" value="<?php echo isset_get($Social,$name); ?>" placeholder="Username / Url">
</div></div><br><br><br>
<?php } echo "</div></div>"; ?>
</div></div></div>
>>>>>>> origin/master
</div>




		
		
<<<<<<< HEAD
=======
		
		
>>>>>>> origin/master
	
</div></div>
</div>

	
		
		
		

<div class="col-sm-3 col-md-3">


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
<i class="fa "></i>Status</a>
</h4></div>
<div id="collapseOne" class="panel-collapse collapse in">
<div class="form-group"><br>
<label class="col-sm-3 control-label">Active</label>
<div class="col-sm-6">
<select class="form-control" name='active'>
<option value="<?php if($Article['active'] == ""){ echo "1"; } ?>">Select Below</option>
<option value="1" <?php if($Article['active'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
<option value="0" <?php if($Article['active'] == "0"){ echo "selected='selected'"; } ?>>No</option>
</select></div></div><br>
<center><div class="panel-body">
<button class="btn btn-primary" type="submit" formmethod="post" onclick="formSubmitter('cwjqueryform', 'cwmessage')">Publish</button>
<button class="btn btn-default" type="reset">Reset</button>
<button class="btn btn-default" onclick="window.location.href=''">Refresh</button>
<br>
<div id='cwmessage'></div>
</div></center>
</div></div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#CwLayout">
<i class="fa "></i>Structure</a>
</h4></div>
<div id="CwLayout" class="panel-collapse collapse">
<div class="panel-body">
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Type</label>
<div class="col-sm-6">
<select class="form-control" name='structure'>
<?php
$PageType = $Article['type'];
$CurrentLayout = $Article['other']['structure'];
$Layouts = $ThemeArray['structure'][$PageType];
echo "<option value='default'"; if( $PageInfo['template'] == 'default'){ echo "selected=selected"; } echo ">Default</option>"; 
foreach($ThemeArray['structure']["$PageType"] as $Layout=>$x_value){ 
    echo "<option value='$Layout'"; if( $CurrentLayout == $Layout){ echo "selected=selected"; } echo ">$Layout</option>"; 
}  ?>
</select></div></div>
</div></div></div></div>




<div class="panel panel-default">

<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#CwTags">
<i class="fa "></i>Tags</a>
</h4></div>

<div id="CwTags" class="panel-collapse collapse">
<div class="form-group">
<label class="col-sm-6 control-label">Add Below:</label>
<input class="tags" type="hidden" name='tags' value="<?php echo $Article['other']['tags']; ?>" />
</div></div>

</div>





<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#cwMedia">
<i class="fa "></i>Media Integration</a>
</h4></div>
<div id="cwMedia" class="panel-collapse collapse">
<div class="form-group">
<label class="col-sm-3 control-label">Type</label>
<div class="col-sm-6">
<select class="form-control" name='codetype'>
<option value='' <?php if($Article['content']['codetype'] == ""){ echo "selected='selected'"; } ?>>Select Video Format</option>
<<<<<<< HEAD
<option value='soundcloud' <?php if($Article['content']['codetype'] == "soundcloud"){ echo "selected='selected'"; } ?>>Sound Cloud</option>
=======
>>>>>>> origin/master
<option value='youtube' <?php if($Article['content']['codetype'] == "youtube"){ echo "selected='selected'"; } ?>>Youtube</option>
<option value='vimeo' <?php if($Article['content']['codetype'] == "vimeo"){ echo "selected='selected'"; } ?>>Vimeo</option>
<option value='code' <?php if($Article['content']['codetype'] == "code"){ echo "selected='selected'"; } ?>>Embed Code</option>
<option value='videofile' <?php if($Article['content']['codetype'] == "videofile"){ echo "selected='selected'"; } ?>>Video File (*Uploaded)</option>
<option value='audiofile' <?php if($Article['content']['codetype'] == "audiofile"){ echo "selected='selected'"; } ?>>Audio File (*Uploaded)</option>
</select></div></div><br><br>
<div class="form-group">
EmbedCode
<<<<<<< HEAD
<center><textarea name='code' rows="7"><?php echo $Article['content']['code']; ?></textarea><br>
*(Add any embedded code or selected video URL in the box above.)</center>
=======
<textarea elastic name='code' rows='7'  id='editor'><?php echo $Article['content']['code']; ?></textarea>
<center>*(Add any embedded code or selected video URL in the box above.)</center>
>>>>>>> origin/master
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Upload(*)</label>
<div class="col-sm-6">
<div class="fileinput fileinput-new" data-provides="fileinput">
<span class="btn btn-primary btn-file">
<span class="fileinput-new">Select file(s)</span>
<span class="fileinput-exists">Change</span><input type="file" name="mediafile[]"></span>
<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
</div></div></div>
<div class="panel-body"></div>
</div></div></div>




</div>




</div>


<input type="hidden" name="redirect" value="admin/Audio">
<<<<<<< HEAD
<input type="hidden" name="randvalue" value="<?php echo $Rand; ?>">
=======
>>>>>>> origin/master
<input type="hidden" name="imgtype" value="album">
<input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
<input type="hidden" name="img" value="<?php echo $Article['content']['img']; ?>">
<input type="hidden" name="id" value="<?php echo $Article['id']; ?>">
<input type="hidden" name="imgsizes" value="<?php echo OtarEncrypt($key,$StructureImgSizes); ?>">
</form>	
</div>











<?php if($Article['id'] == ""){ }else{ ?>
<script language="JavaScript">
<!--
function formSubmitter(formTag, messageTag){
  document.getElementById(messageTag).innerHTML = "Changes Saved.";
}
// -->
</script>
<?php } ?>






<<<<<<< HEAD
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jasny.bootstrap/extend/js/jasny-bootstrap.min.js"></script>
=======
 </script> <script type="text/javascript" src="http://condorthemes.com/flatdream/js/jasny.bootstrap/extend/js/jasny-bootstrap.min.js"></script>
>>>>>>> origin/master
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.touchspin/bootstrap-touchspin/bootstrap.touchspin.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.select2/select2.min.js" ></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.slider/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.icheck/icheck.min.js"></script>

<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.summernote/dist/summernote.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<<<<<<< HEAD
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/src/bootstrap-wysihtml5.js"></script>
=======
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/src/bootstrap-wysihtml5.js"></script>
>>>>>>> origin/master
