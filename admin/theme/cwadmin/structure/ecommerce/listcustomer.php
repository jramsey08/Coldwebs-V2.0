<?php
include("$THEME/structure/ecommerce/top_header.php");

if($Current_Admin_Access >= $ListedUser['info']['access']){
    $ListedUser = array();
}
$PageIds['user'] = $ListedUser['id'];
$PageIds = OtarEncrypt($key,$PageIds);
$ListedUserAccess = $ListedUser['info']['siteaccess'];
?>
<div class="cl-mcont">
    <div class="page-head">
        <ol class="breadcrumb">
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/Users">Users</a></li>
            <li class="active"><?php echo $ListedUser['name']; ?></li>
        </ol>
    </div>

		
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="tab-container">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
                <?php if($UserSiteAccess['grantaccess'] == "1"){ ?><li><a href="#access" data-toggle="tab">Extra Access</a></li><?php } ?>
                <li><a href="#gallery" data-toggle="tab">Gallery</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active cont" id="basic">
                    <div class="row">
                        <form role="form" method='post' action='/Process/Users' enctype="multipart/form-data">
                            <div class="col-sm-12 col-md-12">
                                <div class="col-sm-6 col-md-6">
                                    <div class="header"><h3>Basic Information</h3></div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" name='name' placeholder="Enter First and Last Name" class="form-control" value='<?php echo $ListedUser['name']; ?>'>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">UserName</label>
                                            <div class="col-sm-6">
                                                <input type="text" name='username' placeholder="Enter Username" class="form-control" value='<?php echo $ListedUser['username']; ?>' <?php if($ListedUser['username'] == ""){}else{ echo "disabled"; } ?>>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email Adress</label>
                                            <div class="col-sm-6">
                                                <input type="text" name='email' placeholder="Enter E-Mail Address" class="form-control" value='<?php echo $ListedUser['email']; ?>'>
                                            </div>
                                        </div>
                                        <br><br>
                                        <h3>Change Account Password:</h3> 
                                        <hr>
<?php if($ListedUser['id'] == ""){ 
}else{ 
if($Current_Admin_Access == "0"){ 
?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Current Password</label>
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Enter Title" class="form-control" value='<?php echo PbDecrypt($key,$ListedUser['password']); ?>' disabled>
                                            </div>
                                        </div>
                                        <br><br>
<?php }} ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Enter Password</label>
                                            <div class="col-sm-6">
                                                <input type="password" name='pword[1]' placeholder="Enter New Password" class="form-control" value=''>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Confirm Password</label>
                                            <div class="col-sm-6">
                                                <input type="password" name='pword[2]' placeholder="Confirm New Password" class="form-control" value=''>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
<?php if($UserSiteAccess['grantaccess'] == "1"){ ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Account Type</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name='access'>
                                                    <option value="4">Select Below</option>
                                                    <option value="4" selected>Customer</option>
                                                    <option value="3">Grant Extra Access</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
<?php } ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Account Status</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name='status'>
                                                    <option value="<?php if($ListedUser['info']['status'] == ""){ echo "2"; } ?>">Select Below</option>
                                                    <option value="1" <?php if($ListedUser['info']['status'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
                                                    <option value="2" <?php if($ListedUser['info']['status'] == "2"){ echo "selected='selected'"; } ?>>Limited</option>
                                                    <option value="3" <?php if($ListedUser['info']['status'] == "3"){ echo "selected='selected'"; } ?>>Pending</option>
                                                    <option value="0" <?php if($ListedUser['info']['status'] == "0"){ echo "selected='selected'"; } ?>>Suspended</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Default Website</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name='webid'>
<?php 
$query = "SELECT * FROM info ORDER by name";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
    $row = CwOrganize($row,$Array);
?>
                                                    <option value='<?php echo $row["id"]; ?>' <?php if($ListedUser['other']['webid'] == $row["id"]){ echo "selected='selected'"; } ?>><?php echo $row["name"]; ?></option>
<?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div>
                                    <br><br><br>
                                </div>
                            </div>
                        </div>
                    </div>

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
<th style="width:15%;"><strong>Image</strong></th>
<th style="width:10%;"><strong>Order</strong></th>
<th style="width:50%;"><strong>Url</strong></th>
<th style="width:40%;"><strong>Show</strong></th>
<th style="width:40%;"><strong>Hide</strong></th>
<th style="width:40%;"><strong>Delete</strong></th>
</tr></thead>
<tbody class="no-border-y">
<?php $query = "SELECT * FROM images WHERE album='$PostId' AND album!='' AND trash='0' AND webid='$WebId' AND active='1' ORDER BY list";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
<td><a href="/admin/ImgRotate/<?php echo OtarEncrypt($key, $row['id']); ?>"><img class='ImgSrc' src='<?php echo $row['img']; ?>' height="200" width="200"></a></td>
<td style="width:10%;" class='ImageOrder'><input type='text' name="ImageOrder[<?php echo $row['id']; ?>]" size="10" value='<?php echo $row["list"]; ?>'></td>
<td style="width:60%;" class='ImageUrl'><input type='text' name="ImageUrl[<?php echo $row['id']; ?>]" size="80" value='<?php echo $row["url"]; ?>'></td>
<td><input type="radio" name="Imageactive[<?php echo $row['id']; ?>]" value="1" <?php if($row['active'] == "1"){ echo "checked"; } ?>></td>
<td><input type="radio" name="Imageactive[<?php echo $row['id']; ?>]" value="0" <?php if($row['active'] == "0"){ echo "checked"; } ?>></td>
<td><input type="checkbox" name="removegal[]" value="<?php echo $row['id']; ?>"></td>
</tr><?php } ?>
</tbody></table>
</div></div></div></div>
</div>




<?php
if($UserSiteAccess['grantaccess'] == "1"){
if($ListedUser['info']['access'] == "0"){
}else{ ?>
<div class="tab-pane" id="access">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Grant Website Access</h3></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<?php $TotalSocial = "0";
$query = "SELECT * FROM cwoptions WHERE type='access' AND active='1' AND trash='0'";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
    $TotalAccess = $TotalAccess + 1;
}

if($TotalAccess % 2 == 0){
}else{
    $TotalAccess = $TotalAccess + 1;
}
$Half = $TotalAccess / 2;
$Split1 = $Half;
$Split2 = $Half + 1;
$query = "SELECT * FROM cwoptions WHERE type='access' AND active='1' AND trash='0' ORDER BY name LIMIT 0,$Split1";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
$name = strtolower($row['name']);
$Social = $Article['other']['social'];
$VerifyAccess = $row['content'];
if(is_array($ListedUserAccess)){
    $Active = array_search($VerifyAccess,$ListedUserAccess);
}else{
    $Active = 0;
}
?>
<label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
<div class="col-sm-6">
<div class="input-group">
<label class="radio-inline"> <input class="check" type="radio" value="1" name="siteaccess[<?php echo $row['content']; ?>]" <?php if($ListedUserAccess[$VerifyAccess] == "1"){echo "checked=''"; } ?>> Allowed</label> 
<label class="radio-inline"> <input class="check" type="radio" value="0" name="siteaccess[<?php echo $row['content']; ?>]" <?php if($ListedUserAccess[$VerifyAccess] == "0" OR $ListedUserAccess[$VerifyAccess] == ""){echo "checked=''"; } ?>> Denied</label> 
</div></div><br><br><br><?php } ?>
</div></div>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<?php
$Split2 = $Split2 - 1;
$TotalAccess = $TotalAccess - 2;
$query = "SELECT * FROM cwoptions WHERE type='access' AND active='1' AND trash='0' ORDER BY name LIMIT $Split2,$TotalAccess";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
$name = strtolower($row['name']);
$Social = $Article['other']['social'];
$VerifyAccess = $row['content'];
if(is_array($ListedUserAccess)){
    $Active = array_search($VerifyAccess,$ListedUserAccess);
}else{
    $Active = 0;
}
?>
<label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
<div class="col-sm-6">
<div class="input-group">
<label class="radio-inline"> <input class="check" type="radio" value="1" name="siteaccess[<?php echo $row['content']; ?>]" <?php if($ListedUserAccess[$VerifyAccess] == "1"){echo "checked=''"; } ?>> Allowed</label> 
<label class="radio-inline"> <input class="check" type="radio" value="0" name="siteaccess[<?php echo $row['content']; ?>]" <?php if($ListedUserAccess[$VerifyAccess] == "0" OR $ListedUserAccess[$VerifyAccess] == ""){echo "checked=''"; } ?>> Denied</label> 
</div></div><br><br><br><?php } ?>
</div></div>
</div></div></div>
</div>
<?php }} ?>	
</div></div>
</div></div>
		
		
		
		
		
		

		
		
		
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="block-flat">
<button class="btn btn-primary" type="submit">Submit</button>
<button class="btn btn-default">Cancel</button>
</div></div></div>


<input type="hidden" name="passphrase" value="<?php echo $ListedUser['password']; ?>">
<input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
<input type="hidden" name="img" value="<?php echo $Article['content']['img']; ?>">
<input type="hidden" name="PageIds" value="<?php echo $PageIds; ?>">
<input type='hidden' value='1' name='adminverify'>
</form>	
</div>













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



<script type="text/javascript" src="/admin/theme/cwadmin/header/js/summernote.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-wysihtml5.js"></script>
