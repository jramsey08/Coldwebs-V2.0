<div class="cl-mcont">
    <form role="form" method='post' action='/Process/Blog' enctype="multipart/form-data">
        <div class="page-head">
            <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a></li>
                <li><a href="/admin/Portfolio">Portfolio</a></li>
                <li class="active"><?php echo $Article['name']; ?></li>
            </ol>
        </div>
        <div class="row">		
            <div class="col-sm-9 col-md-9">
                <div class="tab-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
                        <li><a href="#gallery" data-toggle="tab">Gallery</a></li>
                        <li><a href="#media" data-toggle="tab">Media/Video</a></li>
                        <li><a href="#uploads" data-toggle="tab">Uploads</a></li>
                        <li><a href="#extra" data-toggle="tab">Extra</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active cont" id="basic">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="header"><h3>Basic Information</h3></div>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $Article['name']; ?>'>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Url</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">@</span>
                                                    <input type="text" class="form-control" name='url' value="<?php echo $Article['url']; ?>" placeholder="Example: site.com/'URL'">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name='category'>
                                                    <option value="<?php echo $Article['category']; ?>">Select Below</option>
<?php $query = "SELECT * FROM articles WHERE category='self' AND type='category' AND active='1' AND trash='0' AND webid='$WebId'"; 
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
$row = CwOrganize($row,$Array);
echo "<option value='$row[id]'"; if($row['id'] == $Article['category']){ echo "selected=selected"; }; ?>><?php echo $row['name']; ?></option> <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Type</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name='portfoliotype'>
                                                    <option value="<?php echo $Article['content']['portfoliotype']; ?>">Select Below</option>
<?php $query = "SELECT * FROM cwoptions WHERE type='portfolio' AND active='1' AND trash='0' ORDER BY name"; 
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
$row = CwOrganize($row,$Array);
echo "<option value='$row[id]'"; if($row['id'] == $Article['content']['portfoliotype']){ echo "selected=selected"; }; ?>><?php echo $row['name']; ?></option> <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Client</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name='client'>
                                                    <option value="<?php echo $Article['other']['client']; ?>">Select Below</option>
<?php $query = "SELECT * FROM users WHERE client='1' AND webid='$WebId'";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
$row = CwOrganize($row,$Array);
echo "<option value='$row[id]'"; if($row['id'] == $Article['other']['client']){ echo "selected=selected"; }; ?>><?php echo $row['name']; ?></option> <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" name='date_created' placeholder="Enter Title" class="form-control" value='<?php echo date("Y-m-d",$Article['date_created']); ?>'>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Featured</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name='feat'>
                                                    <option value='0' <?php if($Article['feat'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
                                                    <option value='0' <?php if($Article['feat'] == "0"){ echo "selected='selected'"; } ?>>No</option>
                                                    <option value='1' <?php if($Article['feat'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Allow Comments</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name='comment'>
                                                    <option value='0' <?php if($Article['other']['comment'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
                                                    <option value='0' <?php if($Article['other']['comment'] == "0"){ echo "selected='selected'"; } ?>>No</option>
                                                    <option value='1' <?php if($Article['other']['comment'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">External</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='external' placeholder="Enter External Url" class="form-control" value='<?php echo $Article['content']['external']; ?>'>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name='content' rows="300"  id='editor' ><?php echo $Article['info']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="media">
                            <div class="col-sm-12 col-md-12">
                                <div class="header">
                                    <h3>Audio / Video Integration</h3>
                                </div>
                            </div>
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
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Upload Media(*)</label>
                                            <div class="col-sm-6">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Select file(s)</span>
                                                    <span class="fileinput-exists">Change</span><input type="file" name="mediafile[]"></span>
                                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Embed Code</label>
                                        <div class="col-sm-6">
                                            <textarea name='code' class="form-control"><?php echo $Article['content']['code']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane cont" id="gallery">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="header">
                                        <h3>Gallery</h3>
                                    </div>
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
                                                    </tr>
                                                </thead>
                                                <tbody class="no-border-y">
<?php $query = "SELECT * FROM images WHERE album='$Article[id]' AND type='image' AND trash='0' AND webid='$WebId' ORDER BY list";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){ 
if($Article['id'] == ""){
    #exit;
} ?>
                                                    <tr>
                                                        <td><a href="/admin/ImgRotate/<?php echo OtarEncrypt($key, $row['id']); ?>"><img class='ImgSrc' src='<?php echo $row['img']; ?>' height="200" width="200"></a></td>
                                                        <td style="width:10%;" class='ImageOrder'><input type='text' name="ImageOrder[<?php echo $row['id']; ?>]" size="10" value='<?php echo $row["list"]; ?>'></td>
                                                        <td style="width:60%;" class='ImageUrl'><input type='text' name="ImageUrl[<?php echo $row['id']; ?>]" size="80" value='<?php echo $row["url"]; ?>'></td>
                                                        <td><input type="radio" name="Imageactive[<?php echo $row['id']; ?>]" value="1" <?php if($row['active'] == "1"){ echo "checked"; } ?>></td>
                                                        <td><input type="radio" name="Imageactive[<?php echo $row['id']; ?>]" value="0" <?php if($row['active'] == "0"){ echo "checked"; } ?>></td>
                                                        <td><input type="checkbox" name="removegal[]" value="<?php echo $row['id']; ?>"></td>
                                                    </tr>
<?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
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
                                            <div class="col-sm-9">
                                                <input type="hidden" name='tags' placeholder="Enter Universal Tags" class="tags" value='<?php echo $Article['other']['tags']; ?>'>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Author</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name='author'>
                        <?php if($UserSiteAccess['editauthor'] == "1"){ ?>
                                                    <option value='' <?php if($Article['other']['author'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
                        <?php
                        }
                        if($UserSiteAccess['editauthor'] == "1"){ 
                        $Query = "SELECT * FROM articles WHERE type='author' AND active='1' AND trash='0' AND webid='$WebId' ORDER BY id DESC";
                        }else{
                        $Query = "SELECT * FROM articles WHERE type='author' AND active='1' AND trash='0' AND webid='$WebId' AND category='$Current_Admin_Id' ORDER BY id DESC";
                        }
                        $Result = mysql_query($Query) or die(mysql_error());
                        while($Row = mysql_fetch_array($Result)){
                        $Row = PbUnSerial($Row); ?>
                                                    <option value='<?php echo $Row['id']; ?>' <?php if($Article['other']['author'] == $Row['id']){ echo "selected='selected'"; } ?>><?php echo $Row['name']; ?></option>
                        <?php } ?>
                                                </select>
                                            </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Music Artist</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name='artist'>
                                                    <option value="<?php echo $Article['other']["artist"]; ?>">Select Below</option>
<?php
$query = "SELECT * FROM articles WHERE type='post-artist' AND active='1' AND trash='0' AND webid='$WebId' ORDER BY RAND() LIMIT 0,4";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
    $row = CwOrganize($row,$Array);
    echo "<option value='$row[id]'"; if($row['id'] == $Article['other']["artist"]){ echo "selected=selected"; }; ?>><?php echo $row['name']; ?></option>
<?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <i class="fa "></i>Status</a>
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
<?php if($Article['id'] != ""){ ?>
                                <a href="<?php echo $SiteInfo['domain']; echo "/CwPreview/$Article[id]"; ?>" target="_blank" class="btn btn-default">Preview</a>
<?php }else{ ?>
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
                            <i class="fa "></i>Main Image</a>
                        </h4>
                    </div>
                    <div id="MainImg" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="content">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Main Image</label>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if($Article['content']['img'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $Article['content']['img']; } ?>" alt="..."></div>
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
                                    <label class="col-sm-3 control-label">Type</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name='structure'>
<?php
$PageType = $Article['type'];
$CurrentLayout = $Article['other']['structure'];
$Layouts = $ThemeArray['structure'][$PageType];
echo "<option value='default'"; if( $PageInfo['template'] == 'default'){ echo "selected=selected"; } echo ">Default</option>"; 
if(is_array($ThemeArray['structure']["$PageType"])){
foreach($ThemeArray['structure']["$PageType"] as $Layout=>$x_value){ 
    echo "<option value='$Layout'"; if( $CurrentLayout == $Layout){ echo "selected=selected"; } echo ">$Layout</option>"; 
}}  ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="imgtype" value="post-portfolio">
        <input type="hidden" name="redirect" value="admin/Portfolio">
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
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-colorpicker.js"></script>
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
