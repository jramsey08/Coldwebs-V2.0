<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Author">Content Authors</a></li>
<li class="active"><?php echo $Article['content']['name']; ?></li>
</ol></div>		
		
<<<<<<< HEAD
<div class="row">
=======
<div class="row">		
>>>>>>> origin/master
<div class="col-sm-12 col-md-9">
<div class="tab-container">
<ul class="nav nav-tabs">
<li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
<li><a href="#articles" data-toggle="tab">Posts</a></li>
<li><a href="#gallery" data-toggle="tab">Gallery</a></li>
<li><a href="#social" data-toggle="tab">Social Media</a></li>
<<<<<<< HEAD
<li><a href="#uploads" data-toggle="tab">Uploads</a></li>
=======
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
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-6">
<input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $Article['content']['name']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Url</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name='url' value="<?php echo $Article['url']; ?>" placeholder="Example: site.com/'URL'">
</div></div></div>

</div>

<div class="form-group">
<label class="col-sm-3 control-label">Registered User</label>
<div class="col-sm-6">
<select class="form-control" name='user'>
<option value='' <?php if($Article['other']['user'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<?php
$Query = "SELECT * FROM users WHERE email!='' ORDER BY id DESC LIMIT 0,5";
$Result = mysql_query($Query) or die(mysql_error());
while($Row = mysql_fetch_array($Result)){
    if($Row['content'] == ""){ }else{ $Row['content'] = unserialize($Row['content']); }
    if($Row['info'] == ""){ }else{ $Row['info'] = unserialize($Row['info']); } 
    if($Row['info']['access'] == "0"){
    }else{
        $Access = CwUserAccess($Row['info']['access']);
        $Status = CwUserStatus($Row['info']['status']);
        if(mysql_real_escape_string($Row['name']) == ""){
            $Row['name'] = $Row['info']['firstname'] . " " . $Row['info']['lastname'];
        }}
?>
<option value='<?php echo $Row['id']; ?>' <?php if($Article['other']['user'] == $Row['id']){ echo "selected='selected'"; } ?>><?php echo mysql_real_escape_string($Row['name']); ?></option>
<?php } ?>
</select></div></div>

<div class="form-group">
<label class="col-sm-3 control-label">Featured</label>
<div class="col-sm-6">
<select class="form-control" name='feat'>
<option value='0' <?php if($Article['feat'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['feat'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['feat'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div><br><br>





</div>



<div class="col-sm-12 col-md-12">
<div class="form-group">
<textarea name='content' rows="300"  id='editor'><?php echo $Article['info']; ?></textarea>
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
<th style="width:30%;"><strong>Delete</strong></th>
<<<<<<< HEAD
</tr></thead>
<tbody class="no-border-y">
<?php $query = "SELECT * FROM images WHERE album='$Article[id]' AND type='image' AND trash='0' AND active='1' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ 
if($Article['id'] == ""){
    #exit;
=======
<th style="width:15%;" class="text-center"><strong>Action</strong></th>
</tr></thead>
<tbody class="no-border-y">
<?php $query = "SELECT * FROM images WHERE album='$Article[id]' AND trash='0' AND active='1' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ 
if($Article['id'] == ""){
    exit;
>>>>>>> origin/master
} ?>
<tr>
<td><img src='<?php echo $row['img']; ?>' height="200" width="200"></td>
<td style="width:30%;"><input type='text' name="ImageOrder[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["list"]; ?>'></td>
<td style="width:30%;"><input type='text' name="ImageUrl[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["url"]; ?>'></td>
<td><input type="checkbox" name="removegal[]" value="<?php echo $row['id']; ?>"></td>
<<<<<<< HEAD
=======
<td class="text-center"><a class="label label-danger" href="/Process/Delete/Images/<?php echo OtarEncrypt($key,$row['id']); ?>"><i class="fa"></i></a></td>
>>>>>>> origin/master
</tr><?php } ?>
</tbody></table>
</div></div></div></div>
</div>


<<<<<<< HEAD
<div class="tab-pane cont" id="uploads">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Media Uploader</h3>
</div></div>
<div class="row">
<div class="col-sm-12 col-md-12">
<?php if($Article['id'] == ""){
    $Rand = rand("999","9999999");
}
?><center>
<iframe src='/api/dropzone/main.php?type=track&rand=<?php echo $Rand; ?>&id=<?php echo $Article['id']; ?>' scrolling='no' frameborder="0" height="600" width="720" ></iframe></center>
</div></div>
</div>
=======
>>>>>>> origin/master


<div class="tab-pane cont" id="articles">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Author Posts</h3>
</div></div>
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="content">
<div class="table-responsive">
<table class="table table-bordered" id="datatable" >
<thead><tr>
<th>Name</th>
<th>Page Views</th>
<th>Settings</th>
</tr></thead>
<tbody><?php
$Id = $Article['id'];
$Query = "SELECT * FROM articles WHERE type='post' AND other LIKE '%" . $Id. "%' AND trash='0'"; 
$Result = mysql_query($Query) or die(mysql_error());
while($Row = mysql_fetch_array($Result)){
$Row = PbUnSerial($Row);
$ArticleCat = $Row['category'];
$ArticleId = $Row['id'];
$ArticleId = OtarEncrypt($key,$ArticleId);
$query = "SELECT * FROM articles WHERE id='$ArticleCat' AND active='1' AND trash='0'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$row = PbUnSerial($row); ?>
<tr class="odd gradeX">
<td><?php echo $Row['content']['name']; ?></td>
<td><?php echo $Row['content']['hits']; ?></td>
<td class="center"> 
<div class="btn-group">
<button class="btn btn-default btn-xs" type="button">Actions</button>
<button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
<ul role="menu" class="dropdown-menu">
<li><a href="/admin/Articles/<?php echo $ArticleId; ?>">Edit</a></li>
<li><a href="#">Copy</a></li>
<li><a href="#">Details</a></li>
<li class="divider"></li>
<li><a href="/Process/Delete/Articles/<?php echo $ArticleId; ?>">Remove</a></li>
</ul></div></td>
</tr><?php } ?>
</tbody></table></div>
</div></div></div>
</div>


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
</div>




		
		
		
		
	
</div></div>
</div>

	
		
		
		

<div class="col-sm-3 col-md-3">


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
<i class="fa"></i>Status</a>
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
<a data-toggle="collapse" data-parent="#accordion" href="#cwMedia">
<i class="fa "></i>Media Integration</a>
</h4></div>
<div id="cwMedia" class="panel-collapse collapse">
<div class="form-group">
<label class="col-sm-3 control-label">Type</label>
<div class="col-sm-6">
<select class="form-control" name='codetype'>
<option value='' <?php if($Article['content']['codetype'] == ""){ echo "selected='selected'"; } ?>>Select Video Format</option>
<option value='youtube' <?php if($Article['content']['codetype'] == "youtube"){ echo "selected='selected'"; } ?>>Youtube</option>
<option value='vimeo' <?php if($Article['content']['codetype'] == "vimeo"){ echo "selected='selected'"; } ?>>Vimeo</option>
<option value='code' <?php if($Article['content']['codetype'] == "code"){ echo "selected='selected'"; } ?>>Embed Code</option>
<option value='videofile' <?php if($Article['content']['codetype'] == "videofile"){ echo "selected='selected'"; } ?>>Video File (*Uploaded)</option>
<option value='audiofile' <?php if($Article['content']['codetype'] == "audiofile"){ echo "selected='selected'"; } ?>>Audio File (*Uploaded)</option>
</select></div></div><br><br>
<div class="form-group">
EmbedCode
<textarea elastic name='code' rows='7' class="form-control"><?php echo $Article['content']['code']; ?></textarea>
<center>*(Add any embedded code or selected video URL in the box above.)</center>
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


<input type="hidden" name="imgtype" value="author">
<input type="hidden" name="redirect" value="admin/Author">
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

<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jasny.bootstrap/extend/js/jasny-bootstrap.min.js"></script>
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
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/src/bootstrap-wysihtml5.js"></script>