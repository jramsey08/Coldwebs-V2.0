<?php
$PageIds['access'] = $UserAccess['id'];
$PageIds = OtarEncrypt($key,$PageIds);
$ListedUserAccess = $UserAccess['content'];
?>
<div class="cl-mcont">
    <div class="page-head">
        <ol class="breadcrumb">
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/UserAccess">User Access</a></li>
            <li class="active"><?php echo $UserAccess['name']; ?></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="tab-container">
                <ul class="nav nav-tabs">
<?php if($UserSiteAccess['grantaccess'] == "1"){ ?>
                    <li class="active"><a href="#access" data-toggle="tab">User Access</a></li>
<?php }else{ ?>
                    <li class="active"><a href="#basic" data-toggle="tab">Error 403 (Not Authorized)</a></li>
<?php } ?>
                </ul>
                <div class="tab-content">
                    <form role="form" method='post' action='/Process/UserAccess' enctype="multipart/form-data">
<?php if($UserSiteAccess['grantaccess'] == "1"){ ?>
                        <div class="tab-pane active" id="access">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="header">
                                        <h3>Set User Access Level</h3>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Title</label>
                                            <div class="col-sm-6">
                                                <input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $UserAccess['name']; ?>'>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Access</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name='accesslevel'>
                                                    <option value="<?php if($UserAccess['category'] == ""){ echo "1"; } ?>">Select Below</option>
                                                    <option value="1" <?php if($UserAccess['category'] == "1"){ echo "selected='selected'"; } ?>>Administrator</option>
<?php if($CurrentUser["info"]["access"] == "0"){ ?>
                                                    <option value="0" <?php if($UserAccess['category'] == "0"){ echo "selected='selected'"; } ?>>Developer</option>
<?php } ?>
                                                    <option value="4" <?php if($UserAccess['category'] == "4"){ echo "selected='selected'"; } ?>>Registered User</option>
                                                    <option value="2" <?php if($UserAccess['category'] == "2"){ echo "selected='selected'"; } ?>>Super Administrator</option>
                                                    <option value="3" <?php if($UserAccess['category'] == "3"){ echo "selected='selected'"; } ?>>Writer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Status</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name='active'>
                                                    <option value="<?php if($UserAccess['active'] == ""){ echo "1"; } ?>">Select Below</option>
                                                    <option value="1" <?php if($UserAccess['active'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
                                                    <option value="0" <?php if($UserAccess['active'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="col-sm-12 col-md-12">
                                    <hr>
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
    $VerifyAccess = $row['content'];
    if(is_array($ListedUserAccess)){
        $Active = array_search($VerifyAccess,$ListedUserAccess);
    }else{
        $Active = 0;
    }
?>
                                            <p>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
                                                    <div class="col-sm-6">
                                                        <input class="check" type="radio" value="1" name="siteaccess[<?php echo $row['content']; ?>]" <?php if($ListedUserAccess[$VerifyAccess] == "1"){echo "checked"; } ?>> Allowed 
                                                        <input class="check" type="radio" value="0" name="siteaccess[<?php echo $row['content']; ?>]" <?php if($ListedUserAccess[$VerifyAccess] == "0" OR $ListedUserAccess[$VerifyAccess] == ""){echo "checked"; } ?>> Denied</label> 
                                                    </div>
                                                </div>
                                            </p>
                                            <br><br>
<?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
<?php
$Split2 = $Split2 - 1;
$TotalAccess = $TotalAccess - 2;
$query = "SELECT * FROM cwoptions WHERE type='access' AND active='1' AND trash='0' ORDER BY name LIMIT $Split2,$TotalAccess";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
$name = strtolower($row['name']);
$VerifyAccess = $row['content'];
if(is_array($ListedUserAccess)){
    $Active = array_search($VerifyAccess,$ListedUserAccess);
}else{
    $Active = 0;
}
?>                                          
                                            <p>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
                                                    <div class="col-sm-6">
                                                        <input class="check" type="radio" value="1" name="siteaccess[<?php echo $row['content']; ?>]" <?php if($ListedUserAccess[$VerifyAccess] == "1"){echo "checked"; } ?>> Allowed 
                                                        <input class="check" type="radio" value="0" name="siteaccess[<?php echo $row['content']; ?>]" <?php if($ListedUserAccess[$VerifyAccess] == "0" OR $ListedUserAccess[$VerifyAccess] == ""){echo "checked"; } ?>> Denied</label> 
                                                    </div>
                                                </div>
                                            </p>
                                            <br><br>
<?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php }else{ ?>
                        <div class="tab-pane active cont" id="basic">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="header">
                                            <h3>ERROR 403 FORBIDDEN!</h3>
                                            <br><br>
                                            You are not authorized to view this page.
                                        </div>
                                    </div>
                                    <br><br><br>
                                </div>
                            </div>
                        </div>
<?php } ?>
                    </form>
                </div>
            </div>
        </div>	
	</div>	
</div>	

		
		
		
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="block-flat">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-default">Cancel</button>
        </div>
    </div>
</div>


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