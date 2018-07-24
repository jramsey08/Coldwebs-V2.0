<div class="cl-mcont">
    <form role="form" method='post' action='/Process/Tracker' enctype="multipart/form-data">
        <div class="page-head">
            <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a></li>
                <li><a href="/admin/Tracker">Tracker</a></li>
                <li><a href="/admin/Tracker/Notification">Notifications</a></li>
                <li class="active"><?php echo $Notification['name']; ?></li>
            </ol>
        </div>
        <div class="row">		
            <div class="col-sm-9 col-md-9">
                <div class="tab-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active cont" id="basic">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="header">
                                            <h3>Notification Information</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Post Name:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $Notification['name']; ?>' disabled>
                                            </div>
                                        </div>
                                        <br><br> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">User:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $Notification['user']; ?>' disabled>
                                            </div>
                                        </div>
                                        <br><br> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Date:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo date("D M/d/Y h:i a", $Notification['date']); ?>' disabled>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Post Type:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $Notification['type']; ?>' disabled>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Session ID:</label>
                                            <div class="col-sm-9">
                                                <input type="text" style="<?php if($Notification['other']['tracker'] != ""){ ?> width:50% !important;<?php } ?> display:inline;"  name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $Notification['other']['tracker']; ?>' disabled>
<?php if($Notification['other']['tracker'] != ""){ ?>
                                                <button class="btn btn-trans" style="background-color: grey; color: white; width:48%;"><a style="color:white;" href="/admin/Tracker/Session/<?php echo OtarEncrypt($key,$Notification['other']['tracker']); ?>">View Session History</a></button>
<?php } ?>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Post Id:</label>
                                            <div class="col-sm-9" style="display:inline;">
                                                <input type="text" style="<?php if($Notification['post'] != "" OR $Notification['type'] != ""){ ?>width:50%<?php } ?> !important; display:inline;" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $Notification['post']; ?>' disabled>
<?php if($Notification['post'] != ""  OR $Notification['type'] != ""){ ?>
                                                <button class="btn btn-trans" style="background-color: grey; color: white; width:48%;" onclick="location.href='#'"><a style="color:white;" href="<?php echo $Notification["url"]; ?>">View Post</a></button>
<?php } ?>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Message:</label>
                                        <div class="col-sm-9 ">
                                            <textarea style="height:100px; width:100%;" disabled><?php echo $Notification['other']['message']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Errors:</label>
                                        <div class="col-sm-9 ">
                                            <textarea style="height:100px; width:100%;" disabled placeholder="No Errors Occurred"><?php echo $Notification['other']['error']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="col-sm-6 col-md-6"><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Old Info</label>
                                            <br>
                                            <pre>
                                                <?php print_r($Notification["old"]); ?>
                                            </pre>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6"><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">New Info</label>
                                            <br>
                                            <pre>
                                                <?php print_r($Notification["new"]); ?>
                                            </pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

		
		
		
	
</div></div>
</div>

	
		
		
		
<!--
<div class="col-sm-3 col-md-3">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <i class="fa "></i>Status
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="form-group"><br>
                <label class="col-sm-3 control-label">Active</label>
                <div class="col-sm-6">
                    <select class="form-control" name='active'>
                        <option value="<?php if($Article['active'] == ""){ echo "1"; } ?>">Select Below</option>
                        <option value="1" <?php if($Article['active'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
                        <option value="0" <?php if($Article['active'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
                    </select>
                </div>
            </div>
            <br>
            <center>
                <div class="panel-body">
                    <button class="btn btn-primary" type="submit" formmethod="post" onclick="formSubmitter('cwjqueryform', 'cwmessage')">Publish</button>
                    <button class="btn btn-default" type="reset">Reset</button>
<?php
if($Article['id'] != ""){ 
    if($Article["active"] == "0" OR $Article["date_created"] > $Today){
?>
                    <a href="<?php echo "$Full_Url/CwPreview/$Article[id]"; ?>" target="_blank" class="btn btn-default">Preview</a>
<?php }}else{ ?>
                    <button class="btn btn-default" onclick="window.location.href='#'">Refresh</button>
<?php } ?>
                    <br>
                    <div id='cwmessage'></div>
                </div>
            </center>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#MainImg">
                    <i class="fa "></i>Main Image
                </a>
            </h4>
        </div>
        <div id="MainImg" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="content">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Main Image</label>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?php if($Article['content']['img'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $Article['content']['img']; } ?>" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                                <span class="btn btn-primary btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="profilepic[]"></span>
                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->



</div>


    <input type="hidden" name="imgtype" value="post-blog">
    <input type="hidden" name="redirect" value="admin/Blog">
    <input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
    <input type="hidden" name="img" value="<?php echo $Article['content']['img']; ?>">
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

<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/moment.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/daterangepicker.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap.touchspin.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/select2.min.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/icheck.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/summernote.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-wysihtml5.js"></script>

<script type="text/javascript">
       /*Tags*/
        $(".tags").select2({tags: 0,width: '100%'});
</script>