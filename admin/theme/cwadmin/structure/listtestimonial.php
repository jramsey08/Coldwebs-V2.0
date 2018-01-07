<?php
$PageIds['article'] = $Article['id'];
$PageIds = OtarEncrypt($key, $PageIds);
?>
<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Testimonial">Testimonial</a></li>
<li class="active"><?php echo $Article['name']; ?></li>
</ol></div>		


<div class="row">		
<div class="col-sm-12 col-md-9">
<div class="tab-container">


<div class="tab-content">

<div class="tab-pane active cont" id="basic">
<div class="row">
<form role="form" action='/Process/Articles' enctype="multipart/form-data">
<div class="col-sm-12 col-md-12">
<div class="col-sm-6 col-md-6">
<div class="header"><h3>Basic Information</h3></div></div>
</div>
<div class="content">
<div class="col-sm-12 col-md-12">

<div class="form-group">
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-6">
<input type="text" name='name' placeholder="Enter Client Name" class="form-control" value='<?php echo $Article['name']; ?>'>
</div></div><br>


<div class="form-group">
<label class="col-sm-3 control-label">Email</label>
<div class="col-sm-6">
<input type="text" name='email' placeholder="Enter Email" class="form-control" value='<?php echo $Article['other']['email']; ?>'>
</div></div><br><br>

<div class="form-group">
<textarea name='content' rows="300" class="ckeditor form-control" ><?php echo $Article['info']; ?></textarea>
</div></div>
</div></div>

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
<?php if($Article['id'] != ""){ ?>
<a href="<?php echo $SiteInfo['domain']; echo "/CwPreview/$Article[id]"; ?>" target="_blank" class="btn btn-default">Preview</a>
<?php }else{ ?>
<button class="btn btn-default" onclick="window.location.href='#'">Refresh</button>
<?php } ?>
<br>
<div id='cwmessage'></div>
</div></center>
</div></div>



<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#MainImg">
<i class="fa "></i>Main Image</a>
</h4></div>
<div id="MainImg" class="panel-collapse collapse in">
<div class="panel-body">
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
</div></div></div>
</div></div></div></div>




</div>




</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		



<input type="hidden" name="category" value="self">
<input type="hidden" name="imgtype" value="review">
<input type="hidden" name="redirect" value="admin/Testimonial">
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



<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/moment.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/daterangepicker.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap.touchspin.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/select2.min.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/icheck.min.js"></script>


<script type="text/javascript" src="/admin/theme/cwadmin/header/js/summernote.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/masonry.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.magnific-popup.min.js"></script>

<script type="text/javascript">
       /*Tags*/
        $(".tags").select2({tags: 0,width: '100%'});
</script>