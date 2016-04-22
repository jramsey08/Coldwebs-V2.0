<?php
$PageIds['article'] = $Article['id'];
$PageIds = OtarEncrypt($key, $PageIds);
?>
<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Menu">Menu</a></li>
<li class="active">Menu Link</li>
</ol></div>		

    
<div class="row wizard-row">
<div class="col-md-12 fuelux">
<div class="block-wizard">

<div class="step-content">
<form class="form-horizontal group-border-dashed" action="/Process/Menu" method='post' id="articlewizard" data-parsley-namespace="data-parsley-" data-parsley-validate novalidate enctype="multipart/form-data"> 
<div class="step-pane active" id="step1">
<div class="form-group no-padding">
<div class="col-sm-7">
<h3 class="hthin">Menu Info</h3>
</div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Active</label>
<div class="col-sm-6">
<select class="form-control" name='active'>
<option value="<?php if($Article['active'] == ""){ echo "1"; } ?>">Select Below</option>
<option value="1" <?php if($Article['active'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
<option value="0" <?php if($Article['active'] == "0"){ echo "selected='selected'"; } ?>>No</option>
</select></div></div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-6">
<input type="text" class="form-control" name='name' placeholder="Menu Name" value='<?php echo $Article['content']['name']; ?>'>
</div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Menu Category</label>
<div class="col-sm-6">
<select class="form-control" name='category'>
<option value="self">Select Below</option>
<option value="self" <?php if($Article['category'] == "self" OR $Article['category'] == "1"){ echo "selected=selected"; } ?>">None</option>
<?php  $query = "SELECT * FROM articles WHERE type='menu' AND id!='$PageIds[article]' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
if($row['url'] == $Article['url']){ }else{
echo "<option value='$row[id]'"; if($row['id'] == $Article['category']){ echo "selected=selected"; } echo ">" . $row['content']['name'] . "</option>";}}
?></select></div></div>

<div class="form-group">
<label class="col-sm-3 control-label">Link Page/Article/Category</label>
<div class="col-sm-6">
<select id='search' name='articleupdate'>
<option value="<?php echo $PageArticleId; ?>">Select Below</option>
<option value="">Custom Page</option>
<optgroup label='Category'>
<?php
$Query = "SELECT * FROM articles WHERE type='category' AND trash='0' ORDER BY id";
$Result = mysql_query($Query) or die(mysql_error());
while($row = mysql_fetch_array($Result)){
$ArticleId = $row['id'];
$row = PbUnSerial($row);
    echo "<option value='$row[id]'"; if($PageArticleId == $ArticleId){ echo "selected=selected"; } if($row['active'] == "0"){echo "disabled";}echo ">"; echo $row['content']['name']; echo "</option>"; 
} ?></optgroup>
<optgroup label='Articles'>
<?php 
$Query = "SELECT * FROM articles WHERE type='post' AND trash='0' ORDER BY id";
$Result = mysql_query($Query) or die(mysql_error());
while($row = mysql_fetch_array($Result)){
$ArticleId = $row[id];
$row = PbUnSerial($row);
    echo "<option value='$row[id]'"; if($PageArticleId == $ArticleId){ echo "selected=selected"; } if($row['active'] == "0"){echo "disabled";}echo ">"; echo $row['content']['name']; echo "</option>";
} ?></optgroup>
</select></div></div>


<div class="form-group">
<label class="col-sm-3 control-label">Order</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">#</span>
<input type="text" class="form-control" name='order' placeholder="Example: '1'" value='<?php echo $Article['list']; ?>'">
</div></div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Url</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name='url' placeholder="Example: site.com/'URL'" value='<?php echo $Article['url']; ?>'">
</div></div></div>
<div class="form-group">
<label class="col-sm-3 control-label">External Link</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name='external' placeholder="Example: http://Website.com/'" value='<?php echo $Article['content']['external']; ?>'">
</div></div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Menu Tags</label>
<div class="col-sm-6"> 
<input class="tags" type="hidden" name='tags' value="<?php echo $Article['other']['tags']; ?>" />
</div></div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button class="btn btn-default">Cancel</button>
<button data-wizard="#wizard1" type="submit" onclick="document.forms[0].submit();" class="btn btn-success wizard-next"><i class="fa "></i> Submit</button>
</div></div></div>

<input type="hidden" name='imgtype' value='menu'>
<input type="hidden" name='PageIds' value='<?php echo $PageIds; ?>'>
</form></div>
</div></div></div>

</div></div></div>









<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/select2.min.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/loader.min.js"></script>	
<script src="js/modernizr.js" type="text/javascript"></script>
<script type="text/javascript">
  $("#credit_slider").slider().on("slide",function(e){
    $("#credits").html("$" + e.value);
  });
  $("#rate_slider").slider().on("slide",function(e){
    $("#rate").html(e.value + "%");
  });
  </script>
<script type="text/javascript">
$(document).ready(function(){
      //initialize the javascript

    //Fuel UX
    $('.wizard-ux').wizard();

    $('.wizard-ux').on('changed',function(){
      //delete $.fn.slider;
      $('.bslider').slider();
    });
    
    $(".wizard-next").click(function(e){
      var id = $(this).data("wizard");
      $(id).wizard('next');
      e.preventDefault();
    });
    
    $(".wizard-previous").click(function(e){
      var id = $(this).data("wizard");
      $(id).wizard('previous');
      e.preventDefault();
    });
    
      /*Switch*/
      $('.switch').bootstrapSwitch();
      /*Slider*/
      $('.bslider').slider();     
      /*Select2*/
        $(".select2").select2({
          width: '100%'
        });
       /*Tags*/
        $(".tags").select2({tags: 0,width: '100%'});

});
</script>




<script type="text/javascript" src="/admin/theme/cwadmin/header/js/summernote.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-wysihtml5.js"></script>

<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/moment.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/daterangepicker.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap.touchspin.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/select2.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/icheck.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
       $("#myButton").click(function() {
           $("#articlewizard").submit();
       });
    });
</script>