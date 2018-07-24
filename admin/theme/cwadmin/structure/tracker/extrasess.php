<div class="cl-mcont">
    <div class="page-head">
        <ol class="breadcrumb">
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/Tracker">Tracker</a></li>
            <li><a href="/admin/Tracker/Session">Session</a></li>
            <li><a href="/admin/Tracker/Session/<?php echo OtarEncrypt($key,$_GET["id"]); ?>">Session Group <?php echo $_GET["id"]; ?></a></li>
            <li class="active">Session <?php echo $PullSession['id']; ?></li>
            
        </ol>
    </div>
    <div class="row">		
        <div class="col-sm-12 col-md-12">
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
                                        <label class="col-sm-3 control-label">User:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $PullSession['user']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br> 
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Platform:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['browser_platform']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br> 
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Browser Name:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['browser_name']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">City:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['city']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Zipcode:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['zipcode']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Country Code:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['countrycode']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Longitude:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['lon']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Ip Address:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['ipaddress']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Browser Version:</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['browser_version']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Other:</label>
                                        <div class="col-sm-9" style="display:inline;">
                                            <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['date2']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">State:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['state']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Country:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['country']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Timezone:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['timezone']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Latitude:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='name' placeholder="Info Not Reported" class="form-control" value='<?php echo $PullSession['lat']; ?>' disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                </div>
                            </div>



<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="content">
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>Page Name</th>
                                <th>Date & Time</th>
                                <th>Load Time</th>
                                <th>Settings</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$Query = "SELECT * FROM tracker WHERE session='$PullSession[session]'";
$Result = mysqli_query($CwDb,$Query);
while($Row = mysqli_fetch_assoc($Result)){
    $Row = CwOrganize($Row,$Array);
    $Row = GetSessionInfo($Row);
    $ArticleCat = $Row['category'];
    $ArticleId = $Row['id'];
    $ArticleId = OtarEncrypt($key,$ArticleId);
    if($Row['pagename'] == ""){ $Row['pagename']  = "Name Not Reported"; }
?>
                            <tr class="odd gradeX">
                                <td><?php echo $Row['pagename']; ?></td>
                                <td><?php echo $Row['date']; ?></td>
                                <td><?php echo number_format($Row["loadtime"], "4"); ?> Seconds</td>
                                <td class="center"><a href="/admin/Tracker/Session/<?php echo $ArticleId; ?>">View More Info</a>
                                </td>
                            </tr>
<?php } ?>
                        </tbody>
                    </table>							
                </div>
            </div>
        </div>
    </div>
</div>






                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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