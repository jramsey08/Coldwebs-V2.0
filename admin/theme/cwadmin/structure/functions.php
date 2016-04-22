<?php







if($_GET["type"] == ""){ $_GET["type"] = "new"; }
if($_GET["list"] == ""){ $_GET["list"] = "1"; }
$ArticleId = OtarDecrypt($key,$_GET["id"]);
$Article = OtarDecrypt($key,$Article);
$Id = OtarDecrypt($key,$_GET['type']);


$Query = "SELECT * FROM page_function WHERE id='$Id' AND trash='0'"; 
$Result = mysql_query($Query) or die(mysql_error());
$Row = mysql_fetch_array($Result);
$FunctionId = $Row['id'];
if($Row['contents'] == ""){
    $Row['contents']['category'] = "all";
    $Row['contents']['feat'] = "0";
}else{
    $Row['contents'] = unserialize($Row['contents']);
}
$FunctionTheme = $Row['template'];
if($Row['contents']['category'] == ""){ $Row['contents']['category'] = "all"; }


if($ArticleId == ""){ 

}else{
    $query = "SELECT * FROM articles WHERE url='$ArticleUrl' AND trash='0'"; 
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $ArticleContents['article'] = $row;
    $ArticleContents['structure'] = $Article["structure"];
    $ArticleContents = OtarEncrypt($key,$ArticleContents);
    
    if($row['id'] == ""){
        $Random = $_GET['id'];
    }
}
?>

<style>
.gallery-cont .item img {
width: 200px;
}
.fuelux img {
width: auto\9;
height:  200px;
max-width:  200px;
/* vertical-align: middle; */
/* border: 0; */
-ms-interpolation-mode: bicubic;
}

.gallery-cont .item {
width: 28.6%;
margin-bottom: 20px;
padding-right: 10px;
padding-left: 10px;
}
</style>




<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Home</a></li>
<li class="active">Functions</li>
</ol></div>


<div class="row wizard-row">
<div class="col-md-12 fuelux">
<div class="block-wizard">


<div id="wizard1" class="wizard wizard-ux">
<ul class="steps">
<li data-target="#step1" <?php if($_GET["list"] == "1"){ echo "class='active'"; } ?>>Step 1<span class="chevron"></span></li>
<li data-target="#step3" <?php if($_GET["list"] == "3"){ echo "class='active'"; } ?>>Review<span class="chevron"></span></li>
</ul></div>
<div class="step-content">
<form class="form-horizontal group-border-dashed" action="/Process/Functions" method='post' id="articlewizard" data-parsley-namespace="data-parsley-" data-parsley-validate novalidate enctype="multipart/form-data"> 


<div class="step-pane <?php if($_GET["list"] == "1"){ echo "active"; } ?>" id="step1">
<div class="form-group no-padding">
<div class="col-sm-7">
<h3 class="hthin">Function Info</h3>
</div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Function Status</label>
<div class="col-sm-6">
<select class="form-control" name='active'>
<option value="<?php if($Array['dynamicarticle']['active'] == ""){ echo "1"; } ?>">Select Below</option>
<option value="1" <?php if($Row['active'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
<option value="0" <?php if($Row['active'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
</select></div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Available Functions</label>
<div class="col-sm-6">
<select class="form-control" name='functionselect'>
<option value="<?php echo $Row["function"]; ?>">Select Below</option>
<?php
$FunctionTheme = $ThemeArray['name'];
foreach($ThemeArray['structure']['listing'] as $y=>$y_value){
$Count = $Count + 1;
$Structure[$Count] = $y;
}

$CurrentLayout = $Row["function"];
foreach($Structure as $Layout){
    $query = "SELECT * FROM articles WHERE type='function' AND info='$Layout' AND active='1' AND trash='0'"; 
    $result = mysql_query($query) or die(mysql_error());
    while($row = mysql_fetch_array($result)){
    $row = PbUnSerial($row);
        echo "<option value='$row[id]'"; if( $CurrentLayout == $Layout){ echo "selected=selected"; } echo ">"; echo $row['content']['name']; echo"</option>";
    }
} ?>
</select></div></div>
<div class="form-group">
<label class="col-sm-3 control-label">List</label>
<div class="col-sm-6">
<input type="text" name="list" placeholder="Enter Function Order" class="form-control" value="<?php echo $Row["list"]; ?>">
</div></div><br><br>
<div class="form-group">
<div class="gallery-cont">
<div class="col-sm-6">
<?php foreach($ThemeArray['structure']['listing'] as $x=>$x_value){ ?>
<div class="item"><div class="photo">
<div class="head"><span class="pull-right"></span>
<h4><?php echo $x; ?></h4></div>
<div class="img">
<img src="<?php echo "$x_value"; ?>" height="200" width="200"/>
<div class="over">
<div class="func">
<a class="image-zoom" href="<?php echo "$x_value"; ?>"><i class="fa fa-search"></i></a></div>
</div></div></div></div>
<?php } ?>
</div></div></div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button data-wizard="#wizard1" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
</div>
</div></div>







<div class="step-pane <?php if($_GET["list"] == "3"){ echo "active"; } ?>" id="step3">
<div class="col-sm-7">
<h3 class="hthin">Continue</h3></div>
<div class="form-group">
<div class="col-sm-12"
<p>Click the Green Continue button below to complete your request</p>
</div></div>
<div class="form-group">
<div class="col-sm-12">
<button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Previous</button>
<button data-wizard="#wizard1" type="submit" onclick="document.forms[0].submit();" class="btn btn-success wizard-next"><i class="fa fa-check"></i> Continue</button>
</div></div></div>
              
<input type="hidden" name='articleid' value="<?php echo OtarEncrypt($key,$Article['id']); ?>">
<input type="hidden" name='id' value="<?php echo OtarEncrypt($key,$FunctionId); ?>">
<input type="hidden" name='random' value="<?php echo OtarEncrypt($key,$Random); ?>">
<input type="hidden" name='updatetype' value="function">
<input type="hidden" name='template' value="<?php echo $FunctionTheme; ?>">
</form></div>
</div></div></div>

</div></div></div>




<<<<<<< HEAD
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/select2.min.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/loader.min.js"></script>	
=======
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.select2/select2.min.js" ></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.slider/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/fuelux/loader.min.js"></script>	
>>>>>>> origin/master
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



<<<<<<< HEAD
<script src="/admin/theme/cwadmin/header/js/ckeditor.js"></script>
<script src="/admin/theme/cwadmin/header/js/jquery.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/summernote.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-wysihtml5.js"></script>
=======
<script src="http://condorthemes.com/flatdream/js/ckeditor/ckeditor.js"></script>
<script src="http://condorthemes.com/flatdream/js/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.summernote/dist/summernote.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/src/bootstrap-wysihtml5.js"></script>
>>>>>>> origin/master

<script type="text/javascript">
    $(document).ready(function(){
      //initialize the javascript
      $('textarea.ckeditor').ckeditor();
      CKEDITOR.disableAutoInline = true;
      $(".inline-editable").each(function(){
        CKEDITOR.inline($(this)[0]);
      });
    
      $('#some-textarea').wysihtml5();
      $('#summernote').summernote();
    });
</script>

<<<<<<< HEAD
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
=======
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
>>>>>>> origin/master
<script type="text/javascript">
    $(document).ready(function(){
      /*Date Range Picker*/
      $('#reservation').daterangepicker();
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        format: 'MM/DD/YYYY h:mm A'
      });
      var cb = function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract('days', 29),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2014',
        dateLimit: { days: 60 },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
           'Last 7 Days': [moment().subtract('days', 6), moment()],
           'Last 30 Days': [moment().subtract('days', 29), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
        }
      };

      var optionSet2 = {
        startDate: moment().subtract('days', 7),
        endDate: moment(),
        opens: 'left',
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
           'Last 7 Days': [moment().subtract('days', 6), moment()],
           'Last 30 Days': [moment().subtract('days', 29), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        }
      };

      $('#reportrange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

      $('#reportrange').daterangepicker(optionSet1, cb);

      $('#reportrange').on('show', function() { console.log("show event fired"); });
      $('#reportrange').on('hide', function() { console.log("hide event fired"); });
      $('#reportrange').on('apply', function(ev, picker) { 
        console.log("apply event fired, start/end dates are " 
          + picker.startDate.format('MMMM D, YYYY') 
          + " to " 
          + picker.endDate.format('MMMM D, YYYY')
        ); 
      });
      $('#reportrange').on('cancel', function(ev, picker) { console.log("cancel event fired"); });
      /*Switch*/
      $('.switch').bootstrapSwitch();
      
      /*DateTime Picker*/
        $(".datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
      
      /*Select2*/
        $(".select2").select2({
          width: '100%'
        });
      
       /*Tags*/
        $(".tags").select2({tags: 0,width: '100%'});
      
       /*Slider*/
        $('.bslider').slider();     
      
      /*Input & Radio Buttons*/
        $('.icheck').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
      /*spinners*/
        $("input[name='cleaninit']").TouchSpin();
        $("input[name='demo1']").TouchSpin({
          min: 0,
          max: 100,
          step: 0.1,
          decimals: 2,
          boostat: 5,
          maxboostedstep: 10,
          postfix: '%'
        });
        $("input[name='demo2']").TouchSpin({
          min: -1000000000,
          max: 1000000000,
          stepinterval: 50,
          maxboostedstep: 10000000,
          prefix: '$'
        });
        $("input[name='demo4']").TouchSpin({
          postfix: "a button",
          postfix_extraclass: "btn btn-default"
        });
      /*End of spinners*/
      /*Color Picker*/
        $('.demo1').colorpicker({
          format: 'hex', // force this format
        });
        $('.demo2').colorpicker({
          format: 'hex', // force this format
        });
        $('.demo-auto').colorpicker();
        // Disabled / enabled triggers
        $(".disable-button").click(function(e) {
            e.preventDefault();
            $("#demo_endis").colorpicker('disable');
        });

        $(".enable-button").click(function(e) {
            e.preventDefault();
            $("#demo_endis").colorpicker('enable');
        });

        
      /*End of Color Picker*/
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
       $("#myButton").click(function() {
           $("#articlewizard").submit();
       });
    });
</script>

<<<<<<< HEAD
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/masonry.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.magnific-popup.min.js"></script>
=======
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/masonry.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.magnific-popup/dist/jquery.magnific-popup.min.js"></script>
>>>>>>> origin/master

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