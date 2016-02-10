<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Advertisement">Advertisements</a></li>
<li class="active"><?php echo $Article['content']['name']; ?></li>
</ol></div>		
		
<div class="row">		
<div class="col-sm-12 col-md-9">
<div class="tab-container">
<ul class="nav nav-tabs">
<li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
<li><a href="#gallery" data-toggle="tab">Extra Images</a></li>
</ul>



<div class="tab-content">

<div class="tab-pane active cont" id="basic">
<div class="row">
<form role="form" method='post' action='/Process/Advertisement' enctype="multipart/form-data">
<div class="col-sm-12 col-md-12">
<div class="col-sm-6 col-md-6">
<div class="header"><h3>Basic Information</h3></div></div>
</div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Title</label>
<div class="col-sm-6">
<input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $Article['name']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Url</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name='url' value="<?php echo $Article['other']['url']; ?>" placeholder="Example: http://site.com/">
</div></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Type</label>
<div class="col-sm-6">
<select class="form-control" name='type'>
<option value="<?php echo $Article['type']; ?>">Select Below</option>
<option value="code" <?php if($Article['type'] == "code"){ echo "selected=selected"; }; ?>>Code</option>
<option value="img" <?php if($Article['type'] == "img"){ echo "selected=selected"; }; ?>>Image</option>
<option value="video" <?php if($Article['type'] == "video"){ echo "selected=selected"; }; ?>>Video (Upload)</option>
<option value="audio" <?php if($Article['type'] == "audio"){ echo "selected=selected"; }; ?>>Audio (Upload)</option>
<option value="embed" <?php if($Article['type'] == "embed"){ echo "selected=selected"; }; ?>>Embeded Code</option>
</select></div></div><br><br>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Featured</label>
<div class="col-sm-6">
<select class="form-control" name='feat'>
<option value='0' <?php if($Article['feat'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['feat'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['feat'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Ad Location</label>
<div class="col-sm-6">
<select class="form-control" name='location'>
<option value='any' <?php if($Article['location'] == "any"){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='x' <?php if($Article['location'] == "x"){ echo "selected='selected'"; } ?>>Any*</option>
<option value='1' <?php if($Article['location'] == "1"){ echo "selected='selected'"; } ?>>Top Banner</option>
<option value='2' <?php if($Article['location'] == "2"){ echo "selected='selected'"; } ?>>Body</option>
<option value='3' <?php if($Article['location'] == "3"){ echo "selected='selected'"; } ?>>Sidebar</option>
<option value='4' <?php if($Article['location'] == "4"){ echo "selected='selected'"; } ?>>Footer</option>
<option value='x' <?php if($Article['location'] == "x"){ echo "selected='selected'"; } ?>>Manual</option>
</select></div></div>
</div>
<br><br>
<div class="col-sm-12 col-md-12">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Limitations</label>
<div class="col-sm-6">
<select class="form-control" name='adlimit'>
<option value="<?php echo $Article['adlimit']; ?>">Select Below</option>
<option value="views" <?php if($Article['adlimit'] == "views"){ echo "selected=selected"; }; ?>>Views</option>
<option value="clicks" <?php if($Article['adlimit'] == "clicks"){ echo "selected=selected"; }; ?>>Clicks</option>
<option value="time" <?php if($Article['adlimit'] == "time"){ echo "selected=selected"; }; ?>>Time</option>
<option value="none" <?php if($Article['adlimit'] == "none"){ echo "selected=selected"; }; ?>>None</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Payment Options</label>
<div class="col-sm-6">
<select class="form-control" name='adpayment'>
<option value="<?php echo $Article['other']['adpayment']; ?>">Select Below</option>
<option value="paypal" <?php if($Article['other']['adpayment'] == "paypal"){ echo "selected=selected"; }; ?>>PayPal</option>
<option value="cash" <?php if($Article['other']['adpayment'] == "cash"){ echo "selected=selected"; }; ?>>Cash</option>
<option value="cheque" <?php if($Article['other']['adpayment'] == "cheque"){ echo "selected=selected"; }; ?>>Cheque</option>
<option value="other" <?php if($Article['other']['adpayment'] == "other"){ echo "selected=selected"; }; ?>>Other</option>
<option value="free" <?php if($Article['other']['adpayment'] == "free"){ echo "selected=selected"; }; ?>>Free</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Payment Status</label>
<div class="col-sm-6">
<select class="form-control" name='adpaymentstatus'>
<option value="<?php echo $Article['other']['adpaymentstatus']; ?>">Select Below</option>
<option value="0" <?php if($Article['other']['adpaymentstatus'] == "0"){ echo "selected=selected"; }; ?>>Not-Paid</option>
<option value="1" <?php if($Article['other']['adpaymentstatus'] == "1"){ echo "selected=selected"; }; ?>>Paid</option>
<option value="2" <?php if($Article['other']['adpaymentstatus'] == "2"){ echo "selected=selected"; }; ?>>Pending</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">PB Marketing</label>
<div class="col-sm-6">
<select class="form-control" name='pbmarketing'>
<option value='0' <?php if($Article['other']['pbmarketing'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['other']['pbmarketing'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['other']['pbmarketing'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Override Title</label>
<div class="col-sm-6">
<select class="form-control" name='usetitle'>
<option value='0' <?php if($Article['other']['usetitle'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['other']['usetitle'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['other']['usetitle'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Override Sizing</label>
<div class="col-sm-6">
<select class="form-control" name='manualsize'>
<option value='0' <?php if($Article['other']['manualsize'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['other']['manualsize'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['other']['manualsize'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div>
</div>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Total Views</label>
<div class="col-sm-6">
<input type="text" name='adviews' placeholder="Enter Total Views" class="form-control" value='<?php echo $Article['other']['adviews']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Total Clicks</label>
<div class="col-sm-6">
<input type="text" name='adclicks' placeholder="Enter Total Clicks" class="form-control" value='<?php echo $Article['other']['adclicks']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">End Date</label>
<div class="col-sm-6">
<input type="text" name='adtime' placeholder="Enter End Date MM/DD/YYYY " class="form-control" value='<?php echo $Article['other']['adtime']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Height</label>
<div class="col-sm-6">
<input type="text" name='height' placeholder="Enter Height" class="form-control" value='<?php echo $Article['height']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Width</label>
<div class="col-sm-6">
<input type="text" name='width' placeholder="Enter Width" class="form-control" value='<?php echo $Article['width']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Manual Location</label>
<div class="col-sm-6">
<input type="text" name='manualadloc' placeholder="Enter Width" class="form-control" value='<?php echo $Article['other']['manualadloc']; ?>'>
</div></div><br><br>
</div></div>
</div></div>











<div class="tab-pane cont" id="gallery">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Extra Images</h3>
</div></div>
<div class="row">
<div class="col-sm-6 col-md-6">
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Upload Images</label>
<div class="col-sm-6">
<div class="fileinput fileinput-new" data-provides="fileinput">
<span class="btn btn-primary btn-file">
<span class="fileinput-new">Select file(s)</span>
<span class="fileinput-exists">Change</span><input type="file" multiple="" name="gallery[]"></span>
<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
</div></div></div></div></div></div>
<div class="row">
<div class="col-md-12">
<div class="header"><h3>View Images</h3></div>
<div class="content">
<div class="table-responsive">
<table class="table no-border hover">
<thead class="no-border">
<tr>
<th style="width:30%;"><strong>Image</strong></th>
<th style="width:20%;"><strong>Order</strong></th>
<th style="width:50%;"><strong>Url</strong></th>
<th style="width:30%;"><strong>Delete</strong></th>
</tr></thead>
<tbody class="no-border-y">
<?php $query = "SELECT * FROM images WHERE album='$Article[id]' AND trash='0' AND active='1' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
<tr>
<td><img src='<?php echo $row['img']; ?>' height="200" width="200"></td>
<td style="width:20%;"><input type='text' name="ImageOrder[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["list"]; ?>'></td>
<td style="width:50%;"><input type='text' name="ImageUrl[<?php echo $row['id']; ?>]" placeholder='http://example.com' size="50" value='<?php echo $row["url"]; ?>'></td>
<td><input type="checkbox" name="removegal[]" value="<?php echo $row['id']; ?>"></td>
</tr><?php } ?>
</tbody></table>
</div></div></div></div>

</div></div>
</div></div>





	
		
		
		

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
<a data-toggle="collapse" data-parent="#accordion" href="#CwGallery">
<i class="fa "></i>Preview Ad</a>
</h4></div>
<div id="CwGallery" class="panel-collapse collapse in">
<div class="form-group">



<?php if($Article['type'] == "img" OR $Article['type'] == ""){ ?>
    <label class="col-sm-3 control-label">Ad Image</label>
    <div class="fileinput fileinput-new" data-provides="fileinput">
    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if($Article['img'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $Article['img']; } ?>" alt="..."></div>
    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
    <div><span class="btn btn-primary btn-file">
    <span class="fileinput-new">Select image</span>
    <span class="fileinput-exists">Change</span>
    <input type="file" name="profilepic[]"></span>
    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
</div></div>
<?php }else if($Article['type'] == "video" OR $Article['type'] == "audio"){ ?>
    <label class="col-sm-3 control-label">Media Display</label>
    <center><?php $Article['other']['mediacodetype']($Article['other']['mediacode'],300,300); ?></center>
<?php }else if($Article['type'] == "embed"){ ?>


<?php } ?>
</div></div></div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#cwMedia">
<i class="fa "></i>Media Upload</a>
</h4></div>
<div id="cwMedia" class="panel-collapse collapse in">
<div class="form-group">
<label class="col-sm-3 control-label">Type</label>
<div class="col-sm-6">
<select class="form-control" name='mediacodetype'>
<option value='' <?php if($Article['other']['mediacodetype'] == ""){ echo "selected='selected'"; } ?>>Select Video Format</option>
<option value='youtube' <?php if($Article['other']['mediacodetype'] == "youtube"){ echo "selected='selected'"; } ?>>Youtube</option>
<option value='vimeo' <?php if($Article['other']['mediacodetype'] == "vimeo"){ echo "selected='selected'"; } ?>>Vimeo</option>
<option value='embed' <?php if($Article['other']['mediacodetype'] == "embed"){ echo "selected='selected'"; } ?>>Embeded Code</option>
<option value='videofile' <?php if($Article['other']['mediacodetype'] == "videofile"){ echo "selected='selected'"; } ?>>Video File (*Uploaded)</option>
<option value='audiofile' <?php if($Article['other']['mediacodetype'] == "audiofile"){ echo "selected='selected'"; } ?>>Audio File (*Uploaded)</option>

</select></div></div><br><br>
<div class="form-group">
EmbedCode
<textarea elastic name='mediacode' rows='7' class="form-control"><?php echo $Article['other']['mediacode']; ?></textarea>
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


<input type="hidden" name="redirect" value="admin/Advertisement">
<input type="hidden" name="imgtype" value="ads">
<input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
<input type="hidden" name="img" value="<?php echo $Article['img']; ?>">
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



<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.summernote/dist/summernote.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/src/bootstrap-wysihtml5.js"></script>
