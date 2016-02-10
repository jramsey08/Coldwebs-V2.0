<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li><a href="#">Forms</a></li>
<li class="active">Wizard</li>
</ol></div>		

    
    <div class="row wizard-row">
      <div class="col-md-12 fuelux">
        <div class="block-wizard">


<div id="wizard1" class="wizard wizard-ux">
<ul class="steps">
<li data-target="#step1" class="active">Step 1<span class="chevron"></span></li>
<li data-target="#step2">Step 2<span class="chevron"></span></li>
<li data-target="#step3">Step 3<span class="chevron"></span></li>
</ul>
<div class="actions">
<button type="button" class="btn btn-xs btn-prev btn-primary"> <i class="icon-arrow-left"></i>Prev</button>
<button type="button" class="btn btn-xs btn-next btn-primary" data-last="Finish">Next<i class="icon-arrow-right"></i></button>
</div></div>
<div class="step-content">
<form class="form-horizontal group-border-dashed" action="/Process/Articles" method='post' id="articlewizard" data-parsley-namespace="data-parsley-" data-parsley-validate novalidate enctype="multipart/form-data"> 
<div class="step-pane active" id="step1">
<div class="form-group no-padding">
<div class="col-sm-7">
<h3 class="hthin">Article Info</h3>
</div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-6">
<input type="text" class="form-control" name='name' placeholder="Article Name">
</div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Category</label>
<div class="col-sm-6">
<select class="form-control" name='category'>
<option value="<?php echo $Array['dynamicarticle']['category']; ?>">Select Below</option>
<?php  $query = "SELECT * FROM articles WHERE category='self' AND type='category' AND active='1' AND trash='0'"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $Array['dynamicarticle']['category']){ echo "selected=selected"; } echo ">" . $row[content][name] . "</option>";}
?></select></div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Url</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name='url' placeholder="Example: site.com/'URL'">
</div></div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Content</label>
<div class="col-sm-6">
<textarea name='content' class="ckeditor form-control"></textarea>
</div></div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button class="btn btn-default">Cancel</button>
<button data-wizard="#wizard1" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
</div></div></div>
          
<div class="step-pane" id="step2">
<div class="form-group no-padding">
<div class="col-sm-7">
<h3 class="hthin">Addittional Information</h3>
</div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Thumbnail Input</label>
<div class="col-sm-6">
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div><div>
<span class="btn btn-primary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="profilepic[]"></span>
<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
</div></div></div></div>
<div class="form-group">
<label class="col-sm-3 control-label">Article Tags</label>
<div class="col-sm-6"> 
<input class="tags" type="hidden" name='tags' value="" />
</div></div>
<div class="form-group">
<div class="col-sm-12">
<button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Previous</button>
<button data-wizard="#wizard1" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
</div></div></div>

<div class="step-pane" id="step3">
<div class="col-sm-7">
<h3 class="hthin">Continue</h3></div>
<div class="form-group">
<div class="col-sm-12"
<p>Click the Green Continue button below to complete creating your article post.</p>
</div></div>
<div class="form-group">
<div class="col-sm-12">
<button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Previous</button>
<button data-wizard="#wizard1" type="submit" onclick="document.forms[0].submit();" class="btn btn-success wizard-next"><i class="fa fa-check"></i> Continue</button>
</div></div></div>
              
              
              
</form></div>
</div></div></div>

</div></div></div>









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



<script src="http://condorthemes.com/flatdream/js/ckeditor/ckeditor.js"></script>
<script src="http://condorthemes.com/flatdream/js/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.summernote/dist/summernote.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/src/bootstrap-wysihtml5.js"></script>

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