<?php
$AttId = OtarDecrypt($key,$_GET['type']);
$Query = "SELECT * FROM cwoptions WHERE id='$AttId' AND trash='0'";
$Result = mysql_query($Query) or die(mysql_error());
$Article = mysql_fetch_array($Result);
$PageIds['article'] = $Article['id'];
$PageIds = OtarEncrypt($key, $PageIds);
if($Article['id'] == ""){
    if($Article['active'] == ""){
        $Article['active'] = "1";
    }
}
?>
<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Attributes">Attributes</a></li>
<li class="active">Edit/Create Attributes</li>
</ol></div>		

    
<div class="row wizard-row">
<div class="col-md-12 fuelux">
<div class="block-wizard">

<div class="step-content">
<form class="form-horizontal group-border-dashed" action="/Process/Attributes" method='post' id="articlewizard" data-parsley-namespace="data-parsley-" data-parsley-validate novalidate enctype="multipart/form-data"> 
<div class="step-pane active" id="step1">
<div class="form-group no-padding">
<div class="col-sm-7">
<h3 class="hthin">Attribute Info</h3>
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
<label class="col-sm-3 control-label">Value</label>
<div class="col-sm-6">
<input type="text" class="form-control" name='name' placeholder="Attribute Value" value='<?php echo $Article['name']; ?>'>
</div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Type</label>
<div class="col-sm-6">
<select class="form-control" name='category'>
<option value="<?php echo $Article['category']; ?>">Select Below</option>
<option <?php if($Article['category'] == "size"){echo "selected='selected'"; } ?> value="size">Size</option>
<option <?php if($Article['category'] == "color"){echo "selected='selected'"; } ?>value="color">Color</option>
</select></div></div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button class="btn btn-default">Cancel</button>
<button data-wizard="#wizard1" type="submit" onclick="document.forms[0].submit();" class="btn btn-success wizard-next"><i class="fa "></i> Submit</button>
</div></div></div>

<input type="hidden" name='type' value='attribute'>
<input type="hidden" name='id' value='<?php echo $PageIds; ?>'>
</form></div>
</div></div></div>

</div></div></div>









<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.select2/select2.min.js" ></script>	
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



<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.summernote/dist/summernote.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/src/bootstrap-wysihtml5.js"></script>



<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jasny.bootstrap/extend/js/jasny-bootstrap.min.js"></script>

<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.touchspin/bootstrap-touchspin/bootstrap.touchspin.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.switch/bootstrap-switch.min.js"></script>
</script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.slider/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.icheck/icheck.min.js"></script>



<script type="text/javascript">
    $(document).ready(function() {
       $("#myButton").click(function() {
           $("#articlewizard").submit();
       });
    });
</script>