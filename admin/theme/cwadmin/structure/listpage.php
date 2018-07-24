<link rel="stylesheet" type="text/css" href="/admin/theme/cwadmin/header/css/bootstrap-multiselect.css"/>
<link rel="stylesheet" type="text/css" href="/admin/theme/cwadmin/header/css/multi-select.css" />
<?php
$PageArticleId = $PageInfo['pagearticle']['id']; 
$NewFunctionId = RandomCode(300);
if($PageArticleId == ""){
    $PageArticleId = $NewFunctionId;
}
$FunctionNew = $PageArticleId;
$FunctionNew = OtarEncrypt($key,$FunctionNew);
?>
<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Pages">Pages</a></li>
<li class="active"><?php echo $Article['name']; ?></li>
</ol></div>
<div class="row">		
<div class="col-sm-12 col-md-9">
<div class="tab-container">
<ul class="nav nav-tabs">
<li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
<li><a href="#gallery" data-toggle="tab">Gallery</a></li>
<li><a href="#layout" data-toggle="tab">Page Layout</a></li>
<li><a href="#uploads" data-toggle="tab">Uploads</a></li>
<li><a href="#extra" data-toggle="tab">Extra</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active cont" id="basic">
<div class="row">
<form role="form" action='/Process/Pages' enctype="multipart/form-data">
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
<input type="text" class="form-control" name='url' value="<?php echo $Article['url']; ?>" placeholder="Example: site.com/'URL'">
</div></div></div><br><br>
</div>
<div class="form-group">
<label class="col-sm-6 control-label">Featured</label>
<div class="col-sm-6">
<select class="form-control" name='feat'>
<option value='0' <?php if($Article['feat'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['feat'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['feat'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Allow Comments</label>
<div class="col-sm-6">
<select class="form-control" name='comment'>
<option value='0' <?php if($Article['other']['comment'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['other']['comment'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['other']['comment'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div>
</div>
<div class="col-sm-12 col-md-12">
<div class="form-group">
<textarea name='content' rows="300"  id='editor'><?php echo $Article['info']; ?></textarea>
</div></div>
</div></div>



<div class="tab-pane cont" id="uploads">
    <div class="col-sm-12 col-md-12">
        <div class="header">
            <h3>Media Uploader</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <?php $GalRand = "Galupload-" . RandomCode("50"); ?>
            <input type="hidden" name='galrand' value='<?php echo $GalRand; ?>'>
            <iframe src='/api/dropzone/main.php?type=track&rand=<?php echo $GalRand; ?>&id=<?php echo $Article['id']; ?>' frameborder="0" height="600" width="720" ></iframe>
        </div>
    </div>
</div>





<div class="tab-pane cont" id="gallery">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Gallery</h3>
</div></div>
<div class="row">
<div class="col-md-12">
<div class="header"><h3></h3></div>
<div class="content">
<div class="table-responsive">
<table class="table no-border hover">
<thead class="no-border">
<tr>
<th style="width:30%;"><strong>Image</strong></th>
<th style="width:30%;"><strong>Order</strong></th>
<th style="width:30%;"><strong>Url</strong></th>
<th style="width:30%;"><strong>Delete</strong></th>
</tr></thead>
<tbody class="no-border-y">
<?php
if($Get_Type != "new"){
$query = "SELECT * FROM images WHERE album='$Article[id]' AND trash='0' AND active='1' AND webid='$WebId' ORDER BY list";
$result = mysqli_query($CwDb,$query) ;
while($row = mysqli_fetch_assoc($result)){ 
if($Article['id'] == ""){
    exit;
} ?>
<tr>
<td><img src='<?php echo $row['img']; ?>' height="200" width="200"></td>
<td style="width:10%;"><input type='text' name="ImageOrder[<?php echo $row['id']; ?>]" size="1" value='<?php echo $row["list"]; ?>'></td>
<td style="width:60%;"><input type='text' name="ImageUrl[<?php echo $row['id']; ?>]" size="60" value='<?php echo $row["url"]; ?>'></td>
<td><input type="checkbox" name="removegal[]" value="<?php echo $row['id']; ?>"></td>
</tr><?php }} ?>
</tbody></table>
</div></div></div></div>
</div>





<div class="tab-pane" id="layout">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Page Layout</h3></div>
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Page Functions</label>
<div class="table-responsive">
<table class="table table-bordered" id="datatable" >
<thead><tr>
<th>Function Name</th>
<th>Function Type</th>
<th>Order</th>
<th>Status</th>
<th>Settings     -> <a href="/admin/Functions/New/?id=<?php echo $FunctionNew; ?>" target="function">Create New</a></th>
</tr></thead>
<tbody>
<?php
$Id = $Article['id'];
$Query = "SELECT * FROM page_function WHERE template='$PageInfo[template]' AND page='$PageArticleId' AND trash='0' AND webid='$WebId' ORDER BY list"; 
$Result = mysqli_query($CwDb,$Query) ;
while($Row = mysqli_fetch_assoc($Result)){
$Row = CwOrganize($Row,$Array);
$FunctionId = $Row['id']; ?>
<tr class="odd gradeX">
<td><?php echo $Row["name"]; ?></td>
<td><?php echo $Row["function"]; ?></td>
<td><?php echo $Row["list"]; ?></td>
<td><?php if($Row['active'] == "1"){ echo "Active"; }else{ echo "In-Active"; } ?></td>
<td class="center">
<div class="btn-group">
<button class="btn btn-default btn-xs" type="button">Actions</button>
<button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
<ul role="menu" class="dropdown-menu">
<li><a href="/admin/Functions/<?php echo OtarEncrypt($key,$FunctionId); ?>" target="function">Edit</a></li>
<li class="divider"></li>
<li><a href="/Process/Delete/Functions/<?php echo OtarEncrypt($key,$FunctionId); ?>" target="function">Remove</a></li>
</ul></div></td>
</tr><?php } ?>
</tbody></table></div></div>
</div></div></div>
</div>

<div class="tab-pane" id="extra">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="header">
                <h3>Extra Configurations</h3>
            </div>
            <div class="content">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Tags</label>
                    <div class="col-sm-6">
                        <input type="hidden" name='tags' placeholder="Enter Universal Tags" class="tags" value='<?php echo $Article['other']['tags']; ?>'>
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Override Category</label>
                    <div class="col-sm-6">
                        <select class="form-control" name='catoveride'>
                            <option value='0' <?php if($Article['other']['catoveride'] == "0"){ echo "selected='selected'"; } ?>>Select Below</option>
                            <option value='0' <?php if($Article['other']['catoveride'] == "0"){ echo "selected='selected'"; } ?>>No</option>
                            <option value='1' <?php if($Article['other']['catoveride'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Secure Page</label>
                    <div class="col-sm-6">
                        <select class="form-control" name='secure'>
                            <option value='0' <?php if($Article['other']['secure'] == "0"){ echo "selected='selected'"; } ?>>Select Below</option>
                            <option value='0' <?php if($Article['other']['secure'] == "0"){ echo "selected='selected'"; } ?>>No</option>
                            <option value='1' <?php if($Article['other']['secure'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
                        </select>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</div>


</div></div>
</div>
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
<i class="fa "></i>Gallery</a>
</h4></div>
<div id="CwGallery" class="panel-collapse collapse in">
<div class="form-group">
<label class="col-sm-3 control-label">Main Image</label>
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if($Article['content']['img'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $Article['content']['img']; } ?>" alt="..."></div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
<div><span class="btn btn-primary btn-file">
<span class="fileinput-new">Select image</span>
<span class="fileinput-exists">Change</span>
<input type="file" name="profilepic[]"></span>
<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
</div></div>
</div></div></div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#CwLayout">
            <i class="fa "></i>Structure</a>
        </h4>
    </div>
    <div id="CwLayout" class="panel-collapse collapse">
        <div class="panel-body"> 
            <div class="content">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Template</label>
                    <div class="col-sm-6">
                        <select class="form-control" name='maintheme' onchange="switchTem(this.value)">
                            <option value='<?php echo $StructureTheme; ?>' <?php if( $PageInfo['template'] == 'default'){ echo "selected=selected"; } ?>>Default</option> 
<?php $Templates = Pulltheme("../theme/","0",$WebId);
foreach ($Templates as $Template){
    echo "<option value='$Template[0]'"; if($PageInfo['template'] == $Template[0]){ echo "selected=selected"; } echo ">$Template[1]</option>"; 
} ?>
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="form-group" id='switchTem'>
                    <label class="col-sm-3 control-label">Type</label>
                    <div class="col-sm-6">
                        <select class="form-control" name='structure'>
                            <option value="default">Default</option>
<?php
$Category = $Article['category'];
if($Category == "page"){
    $PageType = "page";
}else{
    $PageType = $Article['type'];
}
$CurrentLayout = $Article['other']['structure'];
$PageType = "page";
$Layouts = $ThemeArray['structure'][$PageType];
if($PageType == ""){$PageType = "page"; }
foreach($Layouts as $Layout=>$x_value){
    echo "<option value='$Layout'"; if($CurrentLayout == $Layout){ echo "selected=selected"; } echo ">$Layout</option>";
}  ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#cwMedia">
<i class="fa "></i>Media Integration</a>
</h4></div>
<div id="cwMedia" class="panel-collapse collapse">
<div class="form-group">
<label class="col-sm-3 control-label">Type</label>
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
EmbedCode
<textarea elastic name='code' rows='7' class="form-control"><?php echo $Article['content']['code']; ?></textarea>
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
<input type="hidden" name="functionid" value="<?php echo $NewFunctionId; ?>">
<input type="hidden" name="category" value="page">
<input type="hidden" name="imgtype" value="post">
<input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
<input type="hidden" name="img" value="<?php echo $Article['content']['img']; ?>">
<input type="hidden" name="PageIds" value="<?php echo $PageIds; ?>">
<input type="hidden" name="article" value="<?php echo $Article['id']; ?>">
<input type="hidden" name="pageinfo" value="<?php echo $PageIn; ?>">
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
