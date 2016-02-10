<?php
$ThemeId = OtarDecrypt($key,$_GET['type']);
include("../theme/$ThemeId[0]/settings.php");
if($Article['content']['name'] == ""){
    $Article['content']['name'] = "New";
}

echo $ThemeId;

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
</ol></div>







<div class="row wizard-row">
<div class="col-md-12 fuelux">
<div class="block-wizard">


<div id="wizard1" class="wizard wizard-ux">
<ul class="steps">
<li data-target="#step1" class="active">Basic Info<span class="chevron"></span></li>
<li data-target="#step2">Structure Info<span class="chevron"></span></li>
<li data-target="#step3">Layout<span class="chevron"></span></li>
<li data-target="#step4">Media<span class="chevron"></span></li>
</ul>
<div class="actions">
<button type="button" class="btn btn-xs btn-prev btn-primary"> <i class="icon-arrow-left"></i>Prev</button>
<button type="button" class="btn btn-xs btn-next btn-primary" data-last="Finish">Next<i class="icon-arrow-right"></i></button>
</div></div>
<div class="step-content">
<form class="form-horizontal group-border-dashed" action="/Process/Functions" method='post' id="articlewizard" data-parsley-namespace="data-parsley-" data-parsley-validate novalidate enctype="multipart/form-data"> 
<div class="step-pane active" id="step1">
<div class="form-group no-padding">
<div class="col-sm-7">
<h3 class="hthin">Function Info</h3>
</div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-6">
<input type="text" class="form-control" name='name' placeholder="Function Name">
</div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Category</label>
<div class="col-sm-6">
<select class="form-control" name='category'>
<option value="<?php echo $Article['category']; ?>">Select Below</option>
<?php  $query = "SELECT * FROM articles WHERE category='self' AND type='category' AND active='1' AND trash='0'"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $Article['category']){ echo "selected=selected"; } echo ">" . $row[content][name] . "</option>";}
?></select></div></div>


<div class="form-group">
<label class="col-sm-3 control-label">Content</label>
<div class="col-sm-6">
<textarea name='content'  id='editor'></textarea>
</div></div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button class="btn btn-default">Cancel</button>
<button data-wizard="#wizard1" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
</div></div></div>
          
          
<div class="step-pane" id="step2">
<div class="form-group no-padding">
<div class="col-sm-7">
<h3 class="hthin">Structure Information</h3>
</div></div>

<div class="form-group">
<label class="col-sm-3 control-label">Structure Type</label>
<div class="col-sm-12">
<?php
$PageType = $Article['type'];
$CurrentLayout = $Article['other']['structure'];
$Layouts = $ThemeArray['structure']['all'];
foreach($ThemeArray['structure']['all'] as $Layout){
    foreach($Layout as $Structure=>$x_value){ ?>
        <label>
        <input type="radio" name="functiontype" value="<?php echo $Structure; ?>">
        <div class="imgWrap">
        <img src="<?php echo $x_value; ?>" height="150" width="150">
        <p class="imgDescription"><?php echo $Structure; ?></p>
        </div>
        </label>
   <?php }
}  ?>
</div></div>
<div class="form-group">
<div class="col-sm-12">
<button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Previous</button>
<button data-wizard="#wizard1" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
</div></div></div>



<div class="step-pane" id="step3">
<div class="col-sm-7">
<h3 class="hthin">Layout Instructions</h3></div>

<div class="form-group">
<div class="col-sm-12"
<p>Click the Green Continue button below to complete creating your article post.</p>
</div></div>

<div class="form-group">
<label class="col-sm-3 control-label">Ordering</label>
<div class="col-sm-6">
<select class="form-control" name='ordering'>
<option value="" <?php if($Function['other']['ordering'] == ""){ echo "selected=selected"; } ?>>Select Below</option>
<option value="rand" <?php if($Function['other']['ordering'] == "rand"){ echo "selected=selected"; } ?>>Random</option>
<option value="latest" <?php if($Function['other']['ordering'] == "latest"){ echo "selected=selected"; } ?>>Latest</option>
<option value="old" <?php if($Function['other']['ordering'] == "old"){ echo "selected=selected"; } ?>>Oldest</option>
</select></div></div>

<div class="form-group">
<label class="col-sm-3 control-label">Featured</label>
<div class="col-sm-6">
No<input type="radio" name="feat" value="yes" <?php if($Function['feat'] == "0" OR $Function['feat'] == ""){ echo "checked"; } ?>>
Yes<input type="radio" name="feat" value="no" <?php if($Function['feat'] == "1"){ echo "checked"; } ?>>
</div></div>

<div class="form-group">
<div class="col-sm-12">
<button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Previous</button>
<button data-wizard="#wizard1" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
</div></div></div>
              
      
      
      
      
<div class="step-pane" id="step4">
<div class="col-sm-7">
<h3 class="hthin">Media Input</h3></div>

<div class="form-group">
<label class="col-sm-3 control-label">Thumbnail Input</label>
<div class="col-sm-6">
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div><div>
<span class="btn btn-primary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="profilepic[]"></span>
<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
</div></div></div></div>

<div class="form-group">
<div class="col-sm-12"
<p>Click the Green Continue button below to complete creating your article post.</p>
</div></div>




<div class="form-group">
<div class="col-sm-12">
<button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Previous</button>
<button data-wizard="#wizard1" type="submit" onclick="document.forms[0].submit();" class="btn btn-success wizard-next"><i class="fa fa-check"></i> Continue</button>
</div></div></div>
      
      
      
<input type="hidden" name='templateid' value="<?php echo $ThemeId[2]; ?>">
<input type="hidden" name="updatetype" value="article">
<input type="hidden" name="themeurl" value="<?php echo $_GET['type']; ?>">
<input type="hidden" name="theme" value="<?php echo $ThemeId[0]; ?>">
              
</form></div>
</div></div></div>

</div></div>





</div></div></div> </div>






<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.select2/select2.min.js" ></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.slider/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/fuelux/loader.min.js"></script>	
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
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.touchspin/bootstrap-touchspin/bootstrap.touchspin.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.select2/select2.min.js" ></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.slider/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.icheck/icheck.min.js"></script>
