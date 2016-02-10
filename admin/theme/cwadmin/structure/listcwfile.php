<?php
include("../api/pblast/config.php");
$newToken = generateFormToken('cwfile');
?>

<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/CwFile">CW File Manager</a></li>
<li class="active"><?php echo $Article['content']['name']; ?></li>
</ol></div>		
		
<div class="row">		
<div class="col-sm-12 col-md-9">
<div class="tab-container">
<ul class="nav nav-tabs">
<li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
<li><a href="#gallery" data-toggle="tab">Gallery</a></li>
</ul>



<div class="tab-content">

<div class="tab-pane active cont" id="basic">
<div class="row">
<form role="form" method='post' action='/Process/CwFile' enctype="multipart/form-data">
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
<label class="col-sm-3 control-label">Protected</label>
<div class="col-sm-6">
<select class="form-control" name='protect'>
<option value="0">Select Below</option>
<option value="1"<?php if($Article['other']['protect'] == "1"){ echo "selected='selected'"; } ?>">Password Protected</option>
<option value="0"<?php if($Article['other']['protect'] == "0"){ echo "selected='selected'"; } ?>">No Protection</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Password</label>
<div class="col-sm-6">
<input type="text" name='password' placeholder="Enter Password" class="form-control" value='<?php echo $Article['other']['password']; ?>'>
</div></div><br><br>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Term</label>
<div class="col-sm-6">
<select class="form-control" name='term'>
<option value='0' <?php if($Article['other']['term'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='day' <?php if($Article['other']['term'] == "day"){ echo "selected='selected'"; } ?>>Days</option>
<option value='week' <?php if($Article['other']['term'] == "week"){ echo "selected='selected'"; } ?>>Weeks</option>
<option value='month' <?php if($Article['other']['term'] == "month"){ echo "selected='selected'"; } ?>>Months</option>
<option value='year' <?php if($Article['other']['term'] == "year"){ echo "selected='selected'"; } ?>>Years</option>
<option value='specific' <?php if($Article['other']['term'] == "specific"){ echo "selected='selected'"; } ?>>Specific Date</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Duration</label>
<div class="col-sm-6">
<input type="text" name='duration' placeholder="Enter Term Length" class="form-control" value='<?php echo $Article['other']['duration']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Specific Date</label>
<div class="col-sm-6">
<input type="date" name='specificdate' placeholder="Enter Term Length" class="form-control" value='<?php echo $Article['other']['specificdate']; ?>'>
</div></div><br><br>
</div>
<div class="col-sm-12 col-md-12">
<div class="form-group">
<textarea name='content' rows="300"  id='editor' ><?php echo $Article['info']; ?></textarea>
</div></div>
</div></div>








<div class="tab-pane cont" id="gallery">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Gallery</h3>
</div></div>
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Main Images</label>
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
<th style="width:40%;"><strong>Image</strong></th>
<th style="width:10%;"><strong>Delete</strong></th>
</tr></thead>
<tbody class="no-border-y">
<?php $query = "SELECT * FROM images WHERE album='$Article[id]' AND trash='0' AND active='1' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
<tr>
<td><img src='<?php echo $row['img']; ?>' height="200" width="200"></td>
<td><input type="checkbox" name="removegal[]" value="<?php echo $row['id']; ?>"></td>
</tr><?php } ?>
</tbody></table>
</div></div></div></div>
</div>






		
		
		
		
	
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
<a data-toggle="collapse" data-parent="#accordion" href="#CwCustomer">
<i class="fa "></i>Recipients</a>
</h4></div>
<div id="CwCustomer" class="panel-collapse collapse in">
<div class="form-group">
<label class="col-sm-3 control-label">Email</label>
<div class="col-sm-6">
<input type="text" name='recipient' placeholder="Enter Email" class="form-control" value=''>
</div></div><br><br>
</div></div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#ViewFile">
<i class="fa "></i>File Download</a>
</h4></div>
<div id="ViewFile" class="panel-collapse collapse in">
<div class="form-group">


<?php

if($Article['id'] == ""){

}else{
    $Request['article'] = $Article['id'];
    $Request['app'] = $Pblast_Api;
    $Request = OtarEnCrypt($PB_Access,$Request);
    $CwFileDomain = "http://www.PromoterBlast.com/CwFile/$Request";
?>
    <center><button><a href="<?php echo $CwFileDomain; ?>" target='_blank'>Visit Download Page</a></button></center>
<?php } ?>



</div></div></div></div>



</div>




</div>


<input type="hidden" name="redirect" value="">

<input type="hidden" name="CwFileCode" value="<?php echo $Request; ?>">
<input type="hidden" name="imgtype" value="cwfile">
<input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
<input type="hidden" name="img" value="<?php echo $Article['content']['img']; ?>">
<input type="hidden" name="id" value="<?php echo $Article['id']; ?>">
<input type="hidden" name="imgsizes" value="<?php echo OtarEncrypt($key,$StructureImgSizes); ?>">
<input type="hidden" name="token" value="<?php echo $newToken; ?>">
<input type="hidden" name="encryptid" value="<?php echo $_GET['type']; ?>">
<input type="hidden" name="cwfilecode" value="<?php echo $Article['other']['cwfilecode']; ?>">
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


v



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
