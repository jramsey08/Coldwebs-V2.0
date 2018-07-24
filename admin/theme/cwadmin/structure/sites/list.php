<?php
$WebsiteId = OtarDecrypt($key,$_GET[type]);
$Query = "SELECT * FROM info WHERE id='$WebsiteId'";
$Result = mysqli_query($CwDb,$Query);
$Website = mysqli_fetch_assoc($Result);
$Website = CwOrganize($Website,$Array);
?>
<div class="cl-mcont">
    <div class="page-head">
        <ol class="breadcrumb"> 
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/HostedSites">Hosted Websites</a></li>
            <li class="active"><?php echo $Website['name']; ?></li>
        </ol>
    </div>		

    <div class="row">		
        <div class="col-sm-12 col-md-9">
            <div class="tab-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
                    <li ><a href="#db" data-toggle="tab">Database</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active cont" id="basic">
                        <div class="row">
                            <form role="form" method='post' action='/Process/HostedSites' enctype="multipart/form-data">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="header">
                                            <h3>Basic Information</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name='name' placeholder="Enter Website Name" class="form-control" value='<?php echo $Website['name']; ?>'>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Domain</label>
                                        <div class="col-sm-6">
                                                <input type="text" class="form-control" name='domain' value="<?php echo $Website['domain']; ?>" placeholder="Enter Domain Name'">
                                        </div>
                                    </div>
                                    <br><br>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Website Type</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name='type'>
                                                <option value="<?php if(is_array($Website['info'])){ echo $Website['info']['type']; } ?>">Select Below</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br><br>


                                </div>
                            </div>
                        </div>









                        <div class="tab-pane" id="db">
                            <div class="col-sm-12 col-md-12">
                                <div class="header">
                                    <h3>External Database Config</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Database Status</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name='manualdb'>
                                                <option value='' <?php if($Website['other']['manualdb'] == ""){ echo "selected='selected'"; } ?>>Select External Database Status</option>
                                                <option value='1' <?php if($Website['other']['manualdb'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
                                                <option value='0' <?php if($Website['other']['manualdb'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="content">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Host</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name='db[host]' placeholder="Enter Database Host" class="form-control" value='<?php echo $Website['other']['db']['host']; ?>'>
                                                </div>
                                            </div>
                                            <br><br>
                                             <div class="form-group">
                                                <label class="col-sm-3 control-label">Username</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name='db[user]' placeholder="Enter Database UserName" class="form-control" value='<?php echo $Website['other']['db']['user']; ?>'>
                                                </div>
                                            </div> 
                                            <br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="content">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Name</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name='db[name]' placeholder="Enter Database Name" class="form-control" value='<?php echo $Website['other']['db']['name']; ?>'>
                                                </div>
                                            </div>
                                            <br><br>
                                             <div class="form-group">
                                                <label class="col-sm-3 control-label">Password</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name='db[pw]' placeholder="Enter Database Password" class="form-control" value='<?php echo $Website['other']['db']['pw']; ?>'>
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
                                <select class="form-control" name='offline'>
                                    <option value="<?php if($Website['status']['offline'] == ""){ echo "0"; } ?>">Select Below</option>
                                    <option value="0" <?php if($Website['status']['offline'] == "0"){ echo "selected='selected'"; } ?>>Online</option>
                                    <option value="1" <?php if($Website['status']['offline'] == "1"){ echo "selected='selected'"; } ?>>Offline</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <center>
                            <div class="panel-body">
                                <button class="btn btn-primary" type="submit" formmethod="post" onclick="formSubmitter('cwjqueryform', 'cwmessage')">Publish</button>
                                <button class="btn btn-default" type="reset">Reset</button>
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
                                <i class="fa "></i>Website Logo
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
                                            <img src="<?php if($Website['logo'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $Website['logo']; } ?>" alt="...">
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
    </div>


    <input type="hidden" name="redirect" value="admin/HostedSites">
    <input type="hidden" name="img" value="<?php echo $Website['logo']; ?>">
    <input type="hidden" name="id" value="<?php echo $Website['id']; ?>">
    <input type="hidden" name="info" value="<?php echo $Website['info']; ?>">
    <input type="hidden" name="other" value="<?php echo $Website['other']; ?>">
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
