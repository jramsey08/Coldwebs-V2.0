<?php
$ThemeId = OtarDecrypt($key,$_GET['type']);
include("../theme/$ThemeId[0]/settings.php");
if($Article['content']['name'] == ""){
    $Article['content']['name'] = "New";
}
?>
<style>
.imgWrap {
  position: relative;
  max-height: 150px;
  max-width: 150px;
}

.imgDescription {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(29, 106, 154, 0.72);
  color: #fff;

  visibility: hidden;
  opacity: 0;

  /*remove comment if you want a gradual transition between states
  -webkit-transition: visibility opacity 0.2s;
  */
}

.fuelux img {
min-height: 150px;
max-height: 150px;
}
</style>


<div class="cl-mcont aside">	
<div class="page-aside">
<div>
<div class="content">
<h2><?php echo $ThemeId['1']; ?></h2>
<br><br><br>
<?php include("theme/cwadmin/extras/themesidebar.php"); ?>
</div></div></div>


    
<div class="content">
<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Design">Themes</a></li>
<li><a href="/admin/Design/<?php echo $_GET['type']; ?>"><?php echo $ThemeId['1']; ?></a></li>
<li><a href="/admin/Design/<?php echo $_GET['type']; ?>/Functions">Functions</a></li>
<li class="active"><?php echo $Article['content']['name']; ?></li>		
		






<div class="row">		
<div class="col-sm-12 col-md-12">
<div class="tab-container">
<ul class="nav nav-tabs">
<li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
<li><a href="#gallery" data-toggle="tab">Gallery</a></li>
<li><a href="#media" data-toggle="tab">Media/Video</a></li>
<li><a href="#double" data-toggle="tab">Double</a></li>
<li><a href="#extra" data-toggle="tab">Extra Info</a></li>
</ul>
<div class="tab-content">

<div class="tab-pane active cont" id="basic">
<div class="row">
<form role="form" method='post' action='/Process/Functions' enctype="multipart/form-data">
<div class="col-sm-12 col-md-12">
<div class="col-sm-6 col-md-6">
<div class="header"><h3>Basic Information</h3></div></div>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Function Active</label>
<div class="col-sm-6">
<select class="form-control" name='active'>
<option value="<?php echo $Article['active']; ?>">Select Below</option>
<option value="1" <?php if($Article['active'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
<option value="0" <?php if($Article['active'] == "0"){ echo "selected='selected'"; } ?>>No</option>
</select></div></div></div>
<br><br><br></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Title</label>
<div class="col-sm-6">
<input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $Article['content']['name']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Category</label>
<div class="col-sm-6">
<select class="form-control" name='category'>
<option value="<?php echo $Article['other']['category']; ?>">Select Below</option>
<?php  $query = "SELECT * FROM articles WHERE category='self' AND type='category' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $Article['other']['category']){ echo "selected=selected"; }; ?>><?php echo $row['content']['name']; ?></option> <?php } ?>
</select></div></div><br><br>

<div class="form-group">
<label class="col-sm-3 control-label">Function</label>
<div class="col-sm-6">
<select class="form-control" name='functiontype'>
<option value="<?php echo $Article['other']['functiontype']; ?>">Select Below</option>
<?php
foreach($ThemeArray['structure']['all'] as $Layout){
    foreach($Layout as $Structure => $x_value){ 
        echo "<option value='$Structure'"; if($Article['other']['functiontype'] == $Structure){ echo "selected=selected"; } echo ">$Structure</option>";
    }
} ?>
</select></div></div><br><br>

<div class="form-group">
<label class="col-sm-3 control-label">Featured</label>
<div class="col-sm-6">
<select class="form-control" name='feat'>
<option value='<?php echo $Article['feat']; ?>' <?php if($Article['feat'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['feat'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['feat'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div><br><br>
</div>

<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Type</label>
<div class="col-sm-6">
<select class="form-control" name='ftype'>
<option value='<?php echo $Article['other']['ftype']; ?>' <?php if($Article['other']['ftype'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='article' <?php if($Article['other']['ftype'] == "article"){ echo "selected='selected'"; } ?>>Article</option>
<option value='audio' <?php if($Article['other']['ftype'] == "audio"){ echo "selected='selected'"; } ?>>Audio</option>
<option value='code' <?php if($Article['other']['ftype'] == "code"){ echo "selected='selected'"; } ?>>Code</option>
<option value='gallery' <?php if($Article['other']['ftype'] == "gallery"){ echo "selected='selected'"; } ?>>Gallery</option>
<option value='img' <?php if($Article['other']['ftype'] == "img"){ echo "selected='selected'"; } ?>>Image</option>
<option value='video' <?php if($Article['other']['ftype'] == "video"){ echo "selected='selected'"; } ?>>Video</option>
<option value='portfolio' <?php if($Article['other']['ftype'] == "portfolio"){ echo "selected='selected'"; } ?>>Portfolio</option>
<option value='service' <?php if($Article['other']['ftype'] == "service"){ echo "selected='selected'"; } ?>>Services</option>
<option value='other' <?php if($Article['other']['ftype'] == "other"){ echo "selected='selected'"; } ?>>Other</option>
</select></div></div><br><br>
</div>

<div class="col-sm-12 col-md-12">
<div class="form-group">
<div class="gallery-cont">
<div class="col-sm-6">
<?php $FunctionTheme = $ThemeArray['name'];
$Count = 0;
foreach($ThemeArray['structure']['all'] as $Layout){ 
    foreach($Layout as $Structure => $x_value){ 
$Count = $Count + 1; ?>
<div class="item"><div class="photo">
<div class="head"><span class="pull-right"></span>
<h4><?php if($Article['other']['functiontype'] == $Structure){ echo "<b>"; } echo $Structure; ?></b></h4></div>
<div class="img">
<img src="<?php echo "$x_value"; ?>" height="200" width="200"/>
<div class="over">
<div class="func">
<a class="image-zoom" href="<?php echo "$x_value"; ?>"><i class="fa "></i></a></div>
</div></div></div></div><?php }} ?></div></div></div></div>
</div>
</div></div>






<div class="tab-pane cont" id="gallery">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Gallery</h3>
</div></div>
<div class="row">
<div class="col-sm-6 col-md-6">
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
<div class="col-sm-6 col-md-6">
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Link Gallery</label>
<div class="col-sm-6">
<select class="form-control" name='gallery'>
<option value="<?php echo $Article['other']['gallery']; ?>">Select Below</option>
<?php $query = "SELECT * FROM articles WHERE type='gallery' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $Article['other']['gallery']){ echo "selected=selected"; }; ?>><?php echo $row['content']['name']; ?></option> <?php } ?>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Extra Images</label>
<div class="col-sm-6">
<div class="fileinput fileinput-new" data-provides="fileinput">
<span class="btn btn-primary btn-file">
<span class="fileinput-new">Select file(s)</span>
<span class="fileinput-exists">Change</span><input type="file" multiple="" name="gallery[]"></span>
<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
</div></div></div></div></div></div>
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
<th style="width:15%;" class="text-center"><strong>Action</strong></th>
</tr></thead>
<tbody class="no-border-y">
<?php $GalleryId = $Article['other']['gallery'];
$query = "SELECT * FROM images WHERE album='$GalleryId' AND trash='0' AND active='1' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
<tr>
<td><img src='<?php echo $row[img]; ?>' height="200" width="200"></td>
<td style="width:30%;"><input type='text' name="ImageOrder[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["list"]; ?>'></td>
<td style="width:30%;"><input type='text' name="ImageUrl[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["url"]; ?>'></td>
<td class="text-center">
<a class="label label-danger" href="/Process/Delete/Images/<?php echo OtarEncrypt($key,$row['id']); ?>"><i class="fa "></i></a></td>
</tr><?php } ?>
</tbody></table>
</div></div></div></div>
</div>

<div class="tab-pane" id="media">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Audio / Video Integration</h3>
</div></div>
<div class="row">
<div class="col-sm-6 col-md-6">
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Media Type</label>
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
<label class="col-sm-3 control-label">Upload Media(*)</label>
<div class="col-sm-6">
<div class="fileinput fileinput-new" data-provides="fileinput">
<span class="btn btn-primary btn-file">
<span class="fileinput-new">Select file</span>
<span class="fileinput-exists">Change</span><input type="file" name="mediafile[]"></span>
<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
</div></div></div>
</div></div>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Embed Code</label>
<div class="col-sm-6">
<textarea name='code' class="form-control"><?php echo $Article['content']['code']; ?></textarea>
</div></div></div>
</div></div>

















<div class="tab-pane" id="double">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="col-sm-6 col-md-6">
<div class="header"><h3>Function Double</h3></div></div>
<div class="col-sm-6 col-md-6">

<div class="form-group">
<label class="col-sm-3 control-label">Status</label>
<div class="col-sm-6">
<select class="form-control" name='dbactive'>
<option value="<?php if($Article['active'] == ""){ echo "1"; } ?>">Select Below</option>
<option value="1" <?php if($Article['other']['dbactive'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
<option value="0" <?php if($Article['other']['dbactive'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
</select></div><br><br><br></div>

</div><br><br><br></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="header"><h4>Double 1</h4></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Title</label>
<div class="col-sm-6">
<input type="text" name='double[0][name]' placeholder="Enter Title" class="form-control" value="<?php echo $Article['other']['double']['0']['name']; ?>">
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Article</label>
<div class="col-sm-6">
<select class="form-control" name='double[0][article]'>
<option value="<?php echo $Double['0']['category']; ?>">Select Below</option>
<?php  $query = "SELECT * FROM articles WHERE type='post' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row[id] == $Double['0']['article']){ echo "selected=selected"; }; ?>><?php echo $row['content']['name']; ?></option> <?php } ?>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Category</label>
<div class="col-sm-6">
<select class="form-control" name='double[0][category]'>
<option value="<?php echo $Double['1']['category']; ?>">Select Below</option>
<?php  $query = "SELECT * FROM articles WHERE category='self' AND type='category' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $Double['0']['category']){ echo "selected=selected"; }; ?>><?php echo $row['content']['name']; ?></option> <?php } ?>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Gallery</label>
<div class="col-sm-6">
<select class="form-control" name='double[0][gallery]'>
<option value="<?php echo $Double[0][gallery]; ?>">Select Below</option>
<?php  $query = "SELECT * FROM articles WHERE type='gallery' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $Double['0']['gallery']){ echo "selected=selected"; }; ?>><?php echo $row['content']['name']; ?></option> <?php } ?>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Type</label>
<div class="col-sm-6">
<select class="form-control" name='double[0][type]'>
<option value='0' <?php if($Article['other']['double']['0']['type'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='article' <?php if($Article['other']['double']['0']['type'] == "article"){ echo "selected='selected'"; } ?>>Article</option>
<option value='audio' <?php if($Article['other']['double']['0']['type'] == "audio"){ echo "selected='selected'"; } ?>>Audio</option>
<option value='code' <?php if($Article['other']['double']['0']['type'] == "code"){ echo "selected='selected'"; } ?>>Code</option>
<option value='gallery' <?php if($Article['other']['double']['0']['type'] == "gallery"){ echo "selected='selected'"; } ?>>Gallery</option>
<option value='img' <?php if($Article['other']['double']['0']['type'] == "img"){ echo "selected='selected'"; } ?>>Image</option>
<option value='video' <?php if($Article['other']['double']['0']['type'] == "video"){ echo "selected='selected'"; } ?>>Video</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Featured</label>
<div class="col-sm-6">
<select class="form-control" name='double[0][feat]'>
<option value='0' <?php if($Article['other']['double']['0']['feat'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['other']['double']['0']['feat'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['other']['double']['0']['feat'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Url</label>
<div class="col-sm-6">
<input type="text" name='double[0][url]' placeholder="Enter Title" class="form-control" value='<?php echo $Article['other']['double']['0']['url']; ?>'>
</div></div><br><br>
</div>
<div class="col-sm-6 col-md-6">
<div class="header"><h4>Double 2</h4></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Title</label>
<div class="col-sm-6">
<input type="text" name='double[1][name]' placeholder="Enter Title" class="form-control" value='<?php echo $Article['other']['double']['1']['name']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Article</label>
<div class="col-sm-6">
<select class="form-control" name='double[1][article]'>
<option value="<?php echo $Double['1']['category']; ?>">Select Below</option>
<?php $query = "SELECT * FROM articles WHERE type='post' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $Double['1']['article']){ echo "selected=selected"; }; ?>><?php echo $row['content']['name']; ?></option> <?php } ?>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Category</label>
<div class="col-sm-6">
<select class="form-control" name='double[1][category]'>
<option value="<?php echo $Double['1']['category']; ?>">Select Below</option>
<?php  $query = "SELECT * FROM articles WHERE category='self' AND type='category' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $Double['1']['category']){ echo "selected=selected"; }; ?>><?php echo $row['content']['name']; ?></option> <?php } ?>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Gallery</label>
<div class="col-sm-6">
<select class="form-control" name='double[1][gallery]'>
<option value="<?php echo $Double['1']['gallery']; ?>">Select Below</option>
<?php  $query = "SELECT * FROM articles WHERE type='gallery' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $Double['1']['gallery']){ echo "selected=selected"; }; ?>><?php echo $row['content']['name']; ?></option> <?php } ?>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Type</label>
<div class="col-sm-6">
<select class="form-control" name='double[1][type]'>
<option value='0' <?php if($Article['other']['double']['1']['type'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='article' <?php if($Article['other']['double']['1']['type'] == "article"){ echo "selected='selected'"; } ?>>Article</option>
<option value='audio' <?php if($Article['other']['double']['1']['type'] == "audio"){ echo "selected='selected'"; } ?>>Audio</option>
<option value='code' <?php if($Article['other']['double']['1']['type'] == "code"){ echo "selected='selected'"; } ?>>Code</option>
<option value='gallery' <?php if($Article['other']['double']['1']['type'] == "gallery"){ echo "selected='selected'"; } ?>>Gallery</option>
<option value='img' <?php if($Article['other']['double']['1']['type'] == "img"){ echo "selected='selected'"; } ?>>Image</option>
<option value='video' <?php if($Article['other']['double']['1']['type'] == "video"){ echo "selected='selected'"; } ?>>Video</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Featured</label>
<div class="col-sm-6">
<select class="form-control" name='double[1][feat]'>
<option value='0' <?php if($Article['other']['double']['1']['feat'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['other']['double']['1']['feat'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['other']['double']['1']['feat'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Url</label>
<div class="col-sm-6">
<input type="text" name='double[1][url]' placeholder="Enter Title" class="form-control" value='<?php echo $Article['other']['double']['1']['url']; ?>'>
</div></div><br><br>
</div>






</div></div>

</div>











<div class="tab-pane" id="extra">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Extra Integrations</h3></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Function Tags</label>
<div class="col-sm-6">
<input class="tags" type="hidden" name='tags' value="<?php echo $Article['other']['tags']; ?>" />
</div></div>
</div></div>
</div></div>
</div>






</div></div>
</div></div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="block-flat">
<button class="btn btn-primary" type="submit">Submit</button>
<button class="btn btn-default">Cancel</button>
</div></div></div>


<input type="hidden" name="imgtype" value="post">
<input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
<input type="hidden" name="img" value="<?php echo $Article['content']['img']; ?>">
<input type="hidden" name="PageIds" value="<?php echo $PageIds; ?>">
<input type="hidden" name="articleid" value="<?php echo $ArticleId; ?>">
<input type="hidden" name="themeurl" value="<?php echo $_GET['type']; ?>">
<input type="hidden" name="theme" value="<?php echo $ThemeId[0]; ?>">
<input type="hidden" name="shortcode" value="<?php echo $Article['shortcode']; ?>">

</form>	
</div>










































 </script> <script type="text/javascript" src="http://condorthemes.com/flatdream/js/jasny.bootstrap/extend/js/jasny-bootstrap.min.js"></script>
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


<script type="text/javascript" src="http://condorthemes.com/flatdream/js/masonry.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.magnific-popup/dist/jquery.magnific-popup.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      
      //Initialize Mansory
      var $container = $('.gallery-cont');
      // initialize
      $container.masonry({
        columnWidth: 0,
        itemSelector: '.item'
      });
      
      //Resizes gallery items on sidebar collapse
      $("#sidebar-collapse").click(function(){
          $container.masonry();      
      });
      
      //MagnificPopup for images zoom
      $('.image-zoom').magnificPopup({ 
        type: 'image',
        mainClass: 'mfp-with-zoom', // this class is for CSS animation below
        zoom: {
        enabled: true, // By default it's false, so don't forget to enable it

        duration: 300, // duration of the effect, in milliseconds
        easing: 'ease-in-out', // CSS transition easing function 

        // The "opener" function should return the element from which popup will be zoomed in
        // and to which popup will be scaled down
        // By defailt it looks for an image tag:
        opener: function(openerElement) {
          // openerElement is the element on which popup was initialized, in this case its <a> tag
          // you don't need to add "opener" option if this code matches your needs, it's defailt one.
          var parent = $(openerElement).parents("div.img");
          return parent;
        }
        }

      });

    });
</script>