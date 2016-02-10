<link rel="stylesheet" type="text/css" href="http://condorthemes.com/flatdream/js/bootstrap.multiselect/css/bootstrap-multiselect.css"/>
<link rel="stylesheet" type="text/css" href="http://condorthemes.com/flatdream/js/jquery.multiselect/css/multi-select.css" />
<?php
$PageArticleId = $PageInfo['pagearticle']['id']; 
$NewFunctionId = RandomCode(300);
if($PageArticleId == ""){ $PageArticleId = $NewFunctionId; }
$FunctionNew = $PageArticleId;
$FunctionNew = OtarEncrypt($key,$FunctionNew);
?>

<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li class="active">Settings</li>
</ol></div>

<div class="row">
<div class="col-sm-12 col-md-12">
<div class="tab-container">
<ul class="nav nav-tabs">
<li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
<li><a href="#gallery" data-toggle="tab">Gallery</a></li>
<li><a href="#social" data-toggle="tab">Social Media</a></li>
<li><a href="#layout" data-toggle="tab">Website Layout</a></li>
<li><a href="#settings" data-toggle="tab">Extra Settings</a></li>
</ul>
<div class="tab-content">

<div class="tab-pane active cont" id="basic">
<div class="row">
<form role="form" method='post' action='/Process/Settings' enctype="multipart/form-data">
<div class="col-sm-12 col-md-12">
<div class="col-sm-6 col-md-6">
<div class="header"><h3>Basic Information</h3></div></div>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Site Status</label>
<div class="col-sm-6">
<select class="form-control" name='offline'>
<option value="<?php if($Array['siteinfo']['status']['offline'] == ""){ echo "0"; } ?>">Select Below</option>
<option value="0" <?php if($Array['siteinfo']['status']['offline'] == "0"){ echo "selected='selected'"; } ?>>Active</option>
<option value="1" <?php if($Array['siteinfo']['status']['offline'] == "1"){ echo "selected='selected'"; } ?>>In-Active</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Customer back-end</label>
<div class="col-sm-6">
<select class="form-control" name='clogin'>
<option value="<?php if($Array['siteinfo']['other']['clogin'] == ""){ echo "0"; } ?>">Select Below</option>
<option value="1" <?php if($Array['siteinfo']['other']['clogin'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
<option value="0" <?php if($Array['siteinfo']['other']['clogin'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Menu Status</label>
<div class="col-sm-6">
<select class="form-control" name='menustatus'>
<option value="<?php if($Array['siteinfo']['status']['menustatus'] == ""){ echo "0"; } ?>">Select Below</option>
<option value="1" <?php if($Array['siteinfo']['other']['menustatus'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
<option value="0" <?php if($Array['siteinfo']['other']['menustatus'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
</select></div></div></div>
<br><br><br>
</div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Title</label>
<div class="col-sm-6">
<input type="text" name='name' placeholder="Enter Website Name" class="form-control" value='<?php echo $Array['siteinfo']['name']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Slogan</label>
<div class="col-sm-6">
<input type="text" name='slogan' placeholder="Enter Website Slogan" class="form-control" value='<?php echo $Array['siteinfo']['slogan']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Domain</label>
<div class="col-sm-6">
<input type="text" name='domain' placeholder="Enter Website Domain" class="form-control" value='<?php echo $Array['siteinfo']['domain']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Email</label>
<div class="col-sm-6">
<input type="text" name='email' placeholder="Enter Valid Email-Address" class="form-control" value='<?php echo $Array['siteinfo']['other']['email']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Phone</label>
<div class="col-sm-6">
<input type="text" name='phone' placeholder="Enter Valid Phone Number" class="form-control" value='<?php echo $Array['siteinfo']['other']['phone']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Tags</label>
<div class="col-sm-6">
<input type="hidden" name='tags' placeholder="Enter Universal Tags" class="tags" value='<?php echo $Array['siteinfo']['other']['tags']; ?>'>
</div></div><br><br>

</div>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label>Article Content</label>
<textarea name='content' class="ckeditor form-control"><?php echo $Array['siteinfo']['info']; ?></textarea>
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
<label class="col-sm-3 control-label">Logo</label>
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if($Array['siteinfo']['logo'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $Array['siteinfo']['logo']; } ?>" alt="..."></div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
<div><span class="btn btn-primary btn-file">
<span class="fileinput-new">Select image</span>
<span class="fileinput-exists">Change</span>
<input type="file" name="profilepic[]"></span>
<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
</div></div></div>

<!--
<div class="form-group">
<label class="col-sm-3 control-label">Logo 2</label>
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if($Array['siteinfo']['status']['logotwo'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $Array['siteinfo']['status']['logotwo']; } ?>" alt="..."></div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
<div><span class="btn btn-primary btn-file">
<span class="fileinput-new">Select image</span>
<span class="fileinput-exists">Change</span>
<input type="file" name="logotwo[]"></span>
<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
</div></div></div>
-->

<div class="form-group">
<label class="col-sm-3 control-label">Background</label>
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if($Array['siteinfo']['other']['bgimg'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $Array['siteinfo']['other']['bgimg']; } ?>" alt="..."></div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
<div><span class="btn btn-primary btn-file">
<span class="fileinput-new">Select image</span>
<span class="fileinput-exists">Change</span>
<input type="file" name="bgimg[]"></span>
<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
</div></div></div>





</div></div>
<!--
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
<th style="width:15%;" class="text-center"><strong>Action</strong></th>
</tr></thead>
<tbody class="no-border-y">
<?php $query = "SELECT * FROM images WHERE album='$PostId' AND trash='0' AND active='1' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
<tr>
<td><img src='<?php echo $row['img']; ?>' height="200" width="200"></td>
<td style="width:30%;"><input type='text' name="ImageOrder[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["list"]; ?>'></td>
<td class="text-center">
<a class="label label-danger" href="/Process/Delete/Images/<?php echo OtarEncrypt($key,$row['id']); ?>"><i class="fa fa-times"></i></a></td>
</tr><?php } ?>
</tbody></table>
</div></div></div>
-->
</div></div>

<div class="tab-pane" id="social">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Social Media Integration</h3></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<?php
$Social = $Array['siteinfo']['other']['social'];
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
$query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0' ORDER BY list LIMIT 0,$Split1";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$name = strtolower($row['name']); ?>
<label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name="social[<?php echo $name; ?>]" value="<?php echo $Array['siteinfo']['other']['social']["$name"]; ?>" placeholder="Username / Url">
</div></div><br><br><br>
<?php } echo "</div></div>"; ?>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<?php $query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0' ORDER BY list LIMIT $Split1,$TotalSocial";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$name = strtolower($row['name']); ?>
<label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name="social[<?php echo $name; ?>]" value="<?php echo $Array['siteinfo']['other']['social']["$name"]; ?>" placeholder="Username / Url">
</div></div><br><br><br>
<?php } echo "</div></div>"; ?>
</div></div></div>
</div>

<div class="tab-pane" id="settings">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Extra Website Settings</h3></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<?php
$query = "SELECT * FROM cwoptions WHERE type='settings' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $TotalSetting = $TotalSetting + 1;
}
if($TotalSetting % 2 == 0) {
}else{
    $TotalSetting = $TotalSetting + 1;
}
$Half = $TotalSetting / 2;
$Split1 = $Half;
$Split2 = $Half + 1;
$query = "SELECT * FROM cwoptions WHERE type='settings' AND trash='0' LIMIT 0,$Split1";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$name = strtolower($row[name]);
$Filter_Name = Settings_Name_Filter($name);
if($row['category'] == "text"){ ?>
<div class="form-group">
<label class="col-sm-3 control-label"><?php echo $Filter_Name; ?></label>
<div class="col-sm-6">
<input type="text" name='cwsettings[<?php echo $name; ?>]' placeholder="Enter value" class="form-control" value='<?php echo $row['content']; ?>'>
</div></div>
<?php }else{ ?>
<div class="form-group">
<label class="col-sm-3 control-label"><?php echo $Filter_Name; ?></label>
<div class="col-sm-6">
<select class="form-control" name='cwsettings[<?php echo $name; ?>]'>
<option value="<?php if($row['active'] == ""){ echo "0"; } ?>">Select Below</option>
<option value="1" <?php if($row['active'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
<option value="0" <?php if($row['active'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
</select></div></div><br><br>
<?php }} echo "</div></div>"; ?>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<?php $query = "SELECT * FROM cwoptions WHERE type='settings' AND trash='0' LIMIT $Split1,$TotalSetting";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$name = strtolower($row['name']);
$Filter_Name = Settings_Name_Filter($name);
if($row['category'] == "text"){ ?>
<div class="form-group">
<label class="col-sm-3 control-label"><?php echo $Filter_Name; ?></label>
<div class="col-sm-6">
<input type="text" name='cwsettings[<?php echo $name; ?>]' placeholder="Enter value" class="form-control" value='<?php echo $row['content']; ?>'>
</div></div><br><br>
<?php } else{ ?>
<div class="form-group">
<label class="col-sm-3 control-label"><?php echo $Filter_Name; ?></label>
<div class="col-sm-6">
<select class="form-control" name='cwsettings[<?php echo $name; ?>]'>
<option value="<?php if($row['active'] == ""){ echo "0"; } ?>">Select Below</option>
<option value="1" <?php if($row['active'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
<option value="0" <?php if($row['active'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
</select></div></div><br><br><?php }} echo "</div></div>"; ?>


</div></div></div>
</div>

<div class="tab-pane" id="layout">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Page Layout</h3></div>
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Website Template</label>
<div class="col-sm-6">
<select class="form-control" name='maintheme'>
<option value="<?php echo $Array['siteinfo']['theme']; ?>">Select Below</option>
<?php $Templates = Pulltheme($ThemePath,"0");
foreach ($Templates as $Template){
    echo "<option value='$Template[0]'"; if($Array['siteinfo']['theme'] == $Template['0']){ echo "selected=selected"; } echo ">$Template[1]</option>"; 
} ?></select></div></div><br><br><br></div>
<div class="form-group">
<label class="col-sm-3 control-label">Offline Template</label>
<div class="col-sm-6">
<select class="form-control" name='offlinetheme'>
<option value="<?php echo $Array['siteinfo']['theme']; ?>">Select Below</option>
<?php $Templates = Pulltheme($ThemePath,"0");
foreach ($Templates as $Template){
    echo "<option value='$Template[0]'"; if($Array['siteinfo']['other']['offline'] == $Template['0']){ echo "selected=selected"; } echo ">$Template[1]</option>"; 
} ?></select></div></div><br><br><br></div>

<br><br><br>
</div></div></div>









































</div></div>
</div></div>
		
		
		
		
		
	
		
		
		
		
		
		
		
		
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="block-flat">
<button class="btn btn-primary" type="submit">Submit</button>
<button class="btn btn-default">Cancel</button>
</div></div></div>

<input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
<input type="hidden" name="img" value="<?php echo $PageStructure['img']; ?>">
<input type="hidden" name="logo" value="<?php echo $Array['siteinfo']['logo']; ?>">
<input type="hidden" name="bgimg" value="<?php echo $Array['siteinfo']['other']['bgimg']; ?>">

</form>	
</div>



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



<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.multiselect/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.quicksearch/jquery.quicksearch.js"></script>

			<script type="text/javascript">
			    $(document).ready(function() {
					
			        $('#example1').multiselect();
					
			        $('#example2').multiselect();
					
			        $('#example3').multiselect({
			            buttonClass: 'btn btn-link'
			        });
					
			        $('#example4').multiselect({
			            buttonClass: 'btn btn-default btn-sm'
			        });
					
			        $('#example6').multiselect();
					
			        $('#example9').multiselect({
			            onChange:function(element, checked){
			                alert('Change event invoked!');
			                console.log(element);
			            }
			        });
					
			        for (var i = 1; i <= 100; i++) {
			            $('#example11').append('<option value="' + i + '">Options ' + i + '</option>');
			        }
			        $('#example11').multiselect({
			            maxHeight: 200
			        })
					
			        $('#example13').multiselect();
					
			        $('#example14').multiselect({
			            buttonWidth: '500px',
			            buttonText: function(options) {
			                if (options.length === 0) {
			                    return 'None selected <b class="caret"></b>';
			                }
			                else {
			                    var selected = '';
			                    options.each(function() {
			                        selected += $(this).text() + ', ';
			                    });
			                    return selected.substr(0, selected.length -2) + ' <b class="caret"></b>';
			                }
			            }
			        });
					
			        $('#example16').multiselect({
			            onChange: function(option, checked) {
                            if (checked === false) {
                                $('#example16').multiselect('select', option.val());
                            }
			            }
			        });
					
			        $('#example19').multiselect();

			        $('#example20').multiselect({
			            selectedClass: null
			        });
					
			        $('#example23').multiselect();
					
			        $('#example24').multiselect();

			        $('#example25').multiselect({
			        	dropRight: true,
			        	buttonWidth: '300px'
			        });

			        $('#example27').multiselect({
			        	includeSelectAllOption: true
			        });

					// Add options for example 28.
					for (var i = 1; i <= 100; i++) {
						$('#example28').append('<option value="' + i + '">' + i + '</option>');
					}

			        $('#example28').multiselect({
			        	includeSelectAllOption: true,
			        	enableFiltering: true,
			        	maxHeight: 150
			        });
                    
                    $('#example32').multiselect();
                    
                    $('#example39').multiselect({
                        includeSelectAllOption: true,
			        	enableCaseInsensitiveFiltering: true
                    });
                    
                    $('#example41').multiselect({
			        	includeSelectAllOption: true
			        });
              //multi-select boxed
              $('#my-select').multiSelect()
              $('#pre-selected-options').multiSelect();
              $('#callbacks').multiSelect({
                afterSelect: function(values){
                  alert("Select value: "+values);
                },
                afterDeselect: function(values){
                  alert("Deselect value: "+values);
                }
              });
              $('#optgroup').multiSelect({ selectableOptgroup: true });
              $('#disabled-attribute').multiSelect();
              $('#custom-headers').multiSelect({
                selectableHeader: "<div class='custom-header'>Selectable items</div>",
                selectionHeader: "<div class='custom-header'>Selection items</div>",
              });
              $('#searchable').multiSelect({
                selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
                selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
                afterInit: function(ms){
                  var that = this,
                      $selectableSearch = that.$selectableUl.prev(),
                      $selectionSearch = that.$selectionUl.prev(),
                      selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                      selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                  that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                  .on('keydown', function(e){
                    if (e.which === 40){
                      that.$selectableUl.focus();
                      return false;
                    }
                  });

                  that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                  .on('keydown', function(e){
                    if (e.which == 40){
                      that.$selectionUl.focus();
                      return false;
                    }
                  });
                },
                afterSelect: function(){
                  this.qs1.cache();
                  this.qs2.cache();
                },
                afterDeselect: function(){
                  this.qs1.cache();
                  this.qs2.cache();
                }
              });
			    });
			</script>