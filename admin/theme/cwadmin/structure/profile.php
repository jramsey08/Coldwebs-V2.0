<?php
$PageIds['article'] = $Article['id'];
$PageIds = OtarEncrypt($key, $PageIds);
if($Current_Admin_Access >= $ListedUser['info']['access']){
    $ListedUser = array();
}
?>
<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li>Profile</li>
</ol></div>

		
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="tab-container">
<ul class="nav nav-tabs">
<li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
<li><a href="#gallery" data-toggle="tab">Gallery</a></li>
<li><a href="#media" data-toggle="tab">Media/Video</a></li>
<li><a href="#social" data-toggle="tab">Social Media</a></li>
</ul>
<div class="tab-content">

<div class="tab-pane active cont" id="basic">
<div class="row">
<form role="form" method='post' action='/Process/Users' enctype="multipart/form-data">
<div class="col-sm-12 col-md-12">
<div class="col-sm-6 col-md-6">
<div class="header"><h3>Basic Information</h3></div></div>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Account Status:</label>
<div class="col-sm-6">
<input type="text" class="form-control" value='<?php echo CwUserStatus($CurrentUser['info']['status']); ?>' disabled>
</div></div></div><br><br>
<br><br><br></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-6">
<input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $CurrentUser['name']; ?>'>
</div></div><br><br>
<div class="form-group">
<<<<<<< HEAD
=======
<label class="col-sm-3 control-label">E-Mail</label>
<div class="col-sm-6">
<input type="text" name='email' placeholder="Enter Title" class="form-control" value='<?php echo $CurrentUser['email']; ?>'>
</div></div><br><br>
<div class="form-group">
>>>>>>> origin/master
<label class="col-sm-3 control-label">Account Type:</label>
<div class="col-sm-6">
<input type="text" class="form-control" value='<?php echo CwUserAccess($Current_Admin_Access); ?>' disabled>
</div></div><br><br>
<br><br>
Change Account Password: 
<hr>
<div class="form-group">
<label class="col-sm-3 control-label">Enter Password</label>
<div class="col-sm-6">
<input type="password" name='pword[1]' placeholder="Enter New Password" class="form-control" value=''>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Confirm Password</label>
<div class="col-sm-6">
<input type="password" name='pword[2]' placeholder="Confirm New Password" class="form-control" value=''>
</div></div><br><br>



</div>
</div></div></div>

<div class="tab-pane cont" id="gallery">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Gallery</h3>
</div></div>
<div class="row">
<div class="col-sm-6 col-md-6">
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Profile Picture</label>
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
<?php $query = "SELECT * FROM images WHERE album='$PostId' AND trash='0' AND active='1' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
<tr>
<td><img src='<?php echo $row['img']; ?>' height="200" width="200"></td>
<td style="width:30%;"><input type='text' name="ImageOrder[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["list"]; ?>'></td>
<td style="width:30%;"><input type='text' name="ImageUrl[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["url"]; ?>'></td>
<td class="text-center">
<a class="label label-danger" href="/Process/Delete/Images/<?php echo OtarEncrypt($key,$row[id]); ?>"><i class="fa fa-times"></i></a></td>
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
<span class="fileinput-new">Select file(s)</span>
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

<div class="tab-pane" id="social">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Social Media Integration</h3></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<?php
$query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $TotalSocial = $TotalSocial + 1;
}
if ($TotalSocial % 2 == 0) {
}else{
    $TotalSocial = $TotalSocial + 1;
}
$Half = $TotalSocial / 2;
$Split1 = $Half;
$Split2 = $Half + 1;
$query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0' LIMIT 0,$Split1";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$name = strtolower($row['name']);
$Social = $Article['other']['social']; ?>
<label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name="social[<?php echo $name; ?>]" value="<?php echo isset_get($Social,$name); ?>" placeholder="Username / Url">
</div></div><br><br><br>
<?php } echo "</div></div>"; ?>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<?php $query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0' LIMIT $Split2,$TotalSocial";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$name = strtolower($row['name']);
$Social = $Article['other']['social']; ?>
<label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name="social[<?php echo $name; ?>]" value="<?php echo isset_get($Social,$name); ?>" placeholder="Username / Url">
</div></div><br><br><br>
<?php } echo "</div></div>"; ?>
</div></div></div>
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
<input type="hidden" name="passphrase" value="<?php echo $Array['userinfo']['password']; ?>">
<input type="hidden" name="img" value="<?php echo $Article['content']['img']; ?>">
<input type="hidden" name="PageIds" value="<?php echo $PageIds; ?>">
</form>	
</div>










































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