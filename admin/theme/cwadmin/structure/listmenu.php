<div class="cl-mcont">
    
    <div class="page-head">
        <ol class="breadcrumb"> 
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/Menu">Menu</a></li>
            <li class="active"><?php echo $Article['name']; ?></li>
        </ol>
    </div>		
		
    <div class="row">		
        <div class="col-sm-12 col-md-9">
            <div class="tab-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
                    <li><a href="#extra" data-toggle="tab">Extra</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active cont" id="basic">
                        <div class="row">
                            <form role="form" method='post' action='/Process/Menu' enctype="multipart/form-data">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="header">
                                            <h3>Basic Information</h3>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12 col-md-12">
                                    
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Title</label>
                                            <div class="col-sm-6">
                                                <input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $Article['name']; ?>'>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Url</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">@</span>
                                                    <input type="text" class="form-control" name='url' value="<?php echo $Article['url']; ?>" placeholder="Example: site.com/'URL'">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">External Url</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">@</span>
                                                    <input type="text" class="form-control" name='external' value="<?php echo $Article['content']['external']; ?>" placeholder="http://Site.com/">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div>
                                    
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Category</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name='category'>
                                                    <option value="<?php echo $Article['category']; ?>">Select Below</option>
    <?php $query = "SELECT * FROM articles WHERE category='1' AND type='menu' AND active='1' AND id!='$Article[id]' AND trash='0' AND webid='$WebId'"; 
    $result = mysql_query($query) or die(mysql_error());
    while($row = mysql_fetch_array($result)){
        $row = PbUnSerial($row);
        echo "<option value='$row[id]'"; if($row['id'] == $Article['category']){ echo "selected=selected"; }; ?>><?php echo $row['name']; ?></option> <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Location</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name='shortcode'>
                                                    <option value='main' <?php if($Article['shortcode'] == "main"){ echo "selected='selected'"; } ?>>Main</option>
                                                    <option value='sub' <?php if($Article['shortcode'] == "sub"){ echo "selected='selected'"; } ?>>Sub/Side</option>
                                                    <option value='footer' <?php if($Article['shortcode'] == "footer"){ echo "selected='selected'"; } ?>>Footer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Link Menu</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name='articleupdate'>
                                                    <option value="">Select from below:</option>
                                                    <option value='article' <?php if($Article['shortcode'] == "article"){ echo "selected='selected'"; } ?>>Article</option>
                                                    <option value='category' <?php if($Article['shortcode'] == "category"){ echo "selected='selected'"; } ?>>Category</option>
                                                    <option value='page' <?php if($Article['shortcode'] == "page"){ echo "selected='selected'"; } ?>>Page</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        
                                        
                                         
                                        
                                        
                                        
                                    </div>
                                    
                                </div>
                            </div>
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
                                            <label class="col-sm-3 control-label">Sequencial Order</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">#</span>
                                                    <input type="text" class="form-control" name='list' value="<?php echo $Article['list']; ?>" placeholder="Sequence Order">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
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
                                <select class="form-control" name='active'>
                                    <option value="<?php if($Article['active'] == ""){ echo "1"; } ?>">Select Below</option>
                                    <option value="1" <?php if($Article['active'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
                                    <option value="0" <?php if($Article['active'] == "0"){ echo "selected='selected'"; } ?>>No</option>
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
    </div>


    <input type="hidden" name="redirect" value="admin/Menu">
    <input type="hidden" name="randvalue" value="<?php echo $Rand; ?>">
    <input type="hidden" name="imgtype" value="menu">
    <input type="hidden" name="img" value="<?php echo $Article['content']['img']; ?>">
    <input type="hidden" name="id" value="<?php echo $Article['id']; ?>">
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
