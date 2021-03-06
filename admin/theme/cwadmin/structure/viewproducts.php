<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Ecommerce">Ecommerce</a></li>
<li><a href="/admin/Products">Products</a></li>
<li class="active"><?php echo $ProductInfo['content']['name']; ?></li>
</ol></div>
		
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="tab-container">
<ul class="nav nav-tabs">
<li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
<li><a href="#gallery" data-toggle="tab">Gallery</a></li>
<li><a href="#attributes" data-toggle="tab">Attributes</a></li>
<li><a href="#layout" data-toggle="tab">Page Layout</a></li>
<li><a href="#extra" data-toggle="tab">Extra Info</a></li>
</ul>
<div class="tab-content">

<div class="tab-pane active cont" id="basic">
<div class="row">
<form role="form" method='post' action='/Process/Products' enctype="multipart/form-data">
<div class="col-sm-12 col-md-12">
<div class="col-sm-6 col-md-6">
<div class="header"><h3>Basic Information</h3></div></div>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Product Active</label>
<div class="col-sm-6">
<select class="form-control" name='active'>
<option value="<?php if($ProductInfo['active'] == ""){ echo "1"; } ?>">Select Below</option>
<option value="1" <?php if($ProductInfo['active'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
<option value="0" <?php if($ProductInfo['active'] == "0"){ echo "selected='selected'"; } ?>>No</option>
</select></div></div></div>
<br><br><br></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Title</label>
<div class="col-sm-6">
<input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $ProductInfo['content']['name']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Url</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name='url' value="<?php echo $ProductInfo['url']; ?>" placeholder="Example: site.com/'URL'">
</div></div></div><br><br>
<<<<<<< HEAD


<div class="form-group">
<label class="col-sm-3 control-label">Category Type</label>
<div class="col-sm-6">
<select class="form-control" name='cattype' onchange="catType(this.value)">
<option value="" <?php if($ProductInfo['content']['cattype'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value="0" <?php if($ProductInfo['content']['cattype'] == "0"){ echo "selected='selected'"; }; ?>>Women</option>
<option value="1" <?php if($ProductInfo['content']['cattype'] == "1"){ echo "selected='selected'"; }; ?>>Men</option>
<option value="2" <?php if($ProductInfo['content']['cattype'] == "2"){ echo "selected='selected'"; }; ?>>Kids</option>
<option value="3" <?php if($ProductInfo['content']['cattype'] == "3"){ echo "selected='selected'"; }; ?>>Other</option>
</select></div></div><br><br>


<div id="showCatType">
<div class="form-group">
<label class="col-sm-3 control-label"></label>
<div class="col-sm-6">
<div class="input-group">
Please select a Category Type.
</div></div></div><br><br></div>

=======
<div class="form-group">
<label class="col-sm-3 control-label">Category</label>
<div class="col-sm-6">
<select class="form-control" name='category'>
<option>Select Below</option>
<option value="" <?php if($ProductInfo['category'] == "1"){ echo "selected='selected'"; } ?>>None</option>
<?php  $query = "SELECT * FROM articles WHERE category='self' AND type='category' AND active='1' AND trash='0'"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $ProductInfo['category']){ echo "selected='selected'"; }; ?>><?php echo $row['content']['name']; ?></option> <?php } ?>
</select></div></div><br><br>
>>>>>>> origin/master
<div class="form-group">
<label class="col-sm-3 control-label">Price</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">$</span>
<<<<<<< HEAD
<input type="text" class="form-control" name='prodprice' value="<?php echo $ProductInfo['content']['prodprice']; ?>" placeholder="Example: $'100.00'">
</div></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Qty</label>
<div class="col-sm-6">
<div class="input-group">
<input type="text" class="form-control" name='qty' value="<?php echo $ProductInfo['content']['qty']; ?>" placeholder="Example: '100'">
=======
<input type="text" class="form-control" name='prodprice' value="<?php echo isset_get($ProductInfo['content'], 'prodprice'); ?>" placeholder="Example: $'100.00'">
>>>>>>> origin/master
</div></div></div><br><br>
</div>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label>Article Content</label>
<textarea name='content'  id='editor'><?php echo $ProductInfo['info']; ?></textarea>
</div></div>
</div></div></div>

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
<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if($ProductInfo['content']['img'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $ProductInfo['content']['img']; } ?>" alt="..."></div>
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
<?php $query = "SELECT * FROM images WHERE album='$ProductInfo[id]' AND trash='0' AND active='1' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
<tr>
<td><img src='<?php echo $row[img]; ?>' height="200" width="200"></td>
<td style="width:30%;"><input type='text' name="ImageOrder[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["list"]; ?>'></td>
<td style="width:30%;"><input type='text' name="ImageUrl[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["url"]; ?>'></td>
<td class="text-center">
<a class="label label-danger" href="/Process/Delete/Product-Images/<?php echo OtarEncrypt($key,$row['id']); ?>"><i class="fa fa-times"></i></a></td>
</tr><?php } ?>
</tbody></table>
</div></div></div></div>
</div>

<div class="tab-pane cont" id="attributes">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Attributes</h3></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Size</label>
<div class="col-sm-6">
<select class="form-control" name='size[]' multiple>
<option value=''>Select Below</option>
<?php $query = "SELECT * FROM cwoptions WHERE category='size' AND trash='0' AND active='1'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
<option value='<?php echo $row[id]; if(in_array($row['id'], $Article['content']['size'])){echo "'selected='selected"; }?>'><?php echo $row[name]; ?></option>
<?php } ?></select></div></div><br><br><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Color</label>
<div class="col-sm-6">
<select class="form-control" name='color[]' multiple>
<option value=''>Select Below</option>
<?php $query = "SELECT * FROM cwoptions WHERE category='color' AND trash='0' AND active='1'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
<option value='<?php echo $row[id]; if(in_array($row['id'], $Article['content']['color'])){echo "'selected='selected"; }?>'><?php echo $row['name']; ?></option>
<?php } ?></select></div></div><br><br><br><br>
</div></div>
</div></div>
</div>



<div class="tab-pane" id="layout">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Page Layout</h3></div>
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Structure Type</label>
<div class="col-sm-6">
<select class="form-control" name='structure'>
<?php
$PageType = $ProductInfo['type'];
$CurrentLayout = $ProductInfo['other']['structure'];
<<<<<<< HEAD
$Layouts = $ThemeArray['structure']["$PageType"];
=======
$Layouts = $ThemeArray[structure][$PageType];
>>>>>>> origin/master
echo "<option value=''"; if( $CurrentLayout == $Layout){ echo "selected=selected"; } echo ">Default</option>"; 
foreach($ThemeArray['structure']["$PageType"] as $Layout=>$x_value){ 
    echo "<option value='"; echo $Layout; echo "'"; if( $CurrentLayout == $Layout){ echo "selected=selected"; } echo ">$Layout</option>";
}  ?>
</select></div></div>
</div></div></div>
</div>

<div class="tab-pane" id="extra">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Extra Integrations</h3></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Product Tags</label>
<div class="col-sm-6">
<input class="tags" type="hidden" name='tags' value="<?php echo $ProductInfo['other']['tags']; ?>" />
</div></div><br><br>

<div class="form-group">
<label class="col-sm-3 control-label">Featured</label>
<div class="col-sm-6">
<select class="form-control" name='feat'>
<option value='0' <?php if($ProductInfo['feat'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($ProductInfo['feat'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($ProductInfo['feat'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div><br><br>

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


<input type="hidden" name="imgtype" value="product">
<input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
<input type="hidden" name="img" value="<?php echo $ProductInfo['content']['img']; ?>">
<input type="hidden" name="id" value="<?php echo $ProductInfo['id']; ?>">
<input type="hidden" name="imgsizes" value="<?php echo OtarEncrypt($key,$ProductImgSizes); ?>">
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

