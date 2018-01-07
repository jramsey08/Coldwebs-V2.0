<?php
if($Get_Type == "new"){
    $ProductInfo["content"] = array();
    $ProductInfo["other"] = array();
}
    if($ProductInfo["content"]["prodprice"] == ""){
        $ProductInfo["content"]["prodprice"] = "0";
    }
?>
<div class="cl-mcont">
    <div class="page-head">
        <ol class="breadcrumb">
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/Ecommerce">Ecommerce</a></li>
            <li><a href="/admin/Products">Products</a></li>
            <li class="active"><?php echo $ProductInfo['name']; ?></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-9 col-md-9">
            <div class="tab-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
                    <li><a href="#gallery" data-toggle="tab">Gallery</a></li>
                    <li><a href="#attributes" data-toggle="tab">Attributes</a></li>
                    <li><a href="#uploads" data-toggle="tab">Uploader</a></li>
                    <li><a href="#reseller" data-toggle="tab">ReSeller Program</a></li>
                    <li><a href="#extra" data-toggle="tab">Extra Info</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active cont" id="basic">
                        <div class="row">
                            <form role="form" method='post' action='/Process/Products' enctype="multipart/form-data">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="header">
                                            <h3>Basic Information</h3>
                                        </div>
                                    </div>
                                    <br><br><br>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Title</label>
                                            <div class="col-sm-6">
                                                <input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $ProductInfo['name']; ?>'>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Url</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">@</span>
                                                    <input type="text" class="form-control" name='url' value="<?php echo $ProductInfo['url']; ?>" placeholder="Example: site.com/'URL'">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Price</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" class="form-control" name='prodprice' value="<?php echo $ProductInfo['content']['prodprice']; ?>" placeholder="Example: $'100.00'">
                                                </div>
                                            </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Sale Price</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" class="form-control" name='newprice' value="<?php echo $ProductInfo['content']['newprice']; ?>" placeholder="Example: $'100.00'">
                                                </div>
                                            </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Qty</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name='qty' value="<?php echo $ProductInfo['content']['qty']; ?>" placeholder="Example: '100'">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">SKU</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name='sku' value="<?php echo $ProductInfo['other']['sku']; ?>" placeholder="Enter SKU'">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Category Type</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name='cattype' onchange="catType(this.value)">
                                                    <option value="" <?php if($ProductInfo['shortcode'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<?php
$Query = "SELECT * FROM admin WHERE type='prodcat' AND trash='0' AND active='1' ORDER BY name";
$Result = mysql_query($Query) or die(mysql_error());
while($Row = mysql_fetch_array($Result)){
    $Row = PbUnSerial($Row);
?>
                                                    <option value="<?php echo $Row["id"]; ?>" <?php if($ProductInfo['shortcode'] == $Row[id]){ echo "selected='selected'"; }; ?>><?php echo $Row["name"]; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div id="showCatType">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Category</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name='category'>
                                                        <option>Select Below</option>
<?php  $query = "SELECT * FROM articles WHERE category='$ProductInfo[shortcode]' AND type='prodcat' AND active='1' AND trash='0'"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $ProductInfo['category']){ echo "selected='selected'"; }; ?>><?php echo $row['name']; ?></option> <?php }
?>
                                                    </select>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Condition</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name='condition'>
                                                    <option value="" <?php if($ProductInfo['content']['condition'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
                                                    <option value="New" <?php if($ProductInfo['content']['condition'] == "New"){ echo "selected='selected'"; }; ?>>New</option>
                                                    <option value="Slightly New" <?php if($ProductInfo['content']['condition'] == "Slightly New"){ echo "selected='selected'"; }; ?>>Slightly New</option>
                                                    <option value="Used" <?php if($ProductInfo['content']['condition'] == "Used"){ echo "selected='selected'"; }; ?>>Used</option>
                                                    <option value="Damaged" <?php if($ProductInfo['content']['condition'] == "Damaged"){ echo "selected='selected'"; }; ?>>Damaged</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Featured</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name='feat'>
                                                    <option value='0' <?php if($ProductInfo['feat'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
                                                    <option value='0' <?php if($ProductInfo['feat'] == "0"){ echo "selected='selected'"; } ?>>No</option>
                                                    <option value='1' <?php if($ProductInfo['feat'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Brand</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name='brand'>
                                                    <option value="" <?php if($ProductInfo['content']['brand'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<?php
$query = "SELECT * FROM cwoptions WHERE type='brand' AND trash='0' AND webid='$WebId' ORDER BY name";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ 
    $row = CwOrganize($row,$Array);
?>
                                                    <option value="<?php echo $row["id"]; ?>" <?php if($ProductInfo['content']['brand'] == $row["id"]){ echo "selected='selected'"; } ?>><?php echo $row["name"]; ?></option>
<?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="header">
                                                <h3>Short Description</h3>
                                            </div>
                                            <textarea style="width: 100%;height: 100px;" name='shortdesc'><?php echo $ProductInfo['content']['shortdesc']; ?></textarea>
                                        </div>
                                    </div>                                    
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="header">
                                                <h3>Full Description</h3>
                                            </div>
                                            <textarea name='content' ows="60" cols="500" id='editor'><?php echo $ProductInfo['info']; ?></textarea>
                                        </div> 
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
            <iframe src='/api/dropzone/main.php?type=track&rand=<?php echo $GalRand; ?>&id=<?php echo $Article['id']; ?>' scrolling='no' frameborder="0" height="600" width="720" ></iframe>
        </div>
    </div>
</div>


















<div class="tab-pane cont" id="gallery">
    <div class="col-sm-12 col-md-12">
        <div class="header">
            <h3>Gallery</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="header"><h3></h3></div>
            <div class="content">
                
                
                
                
                
                
                <div class="table-responsive">
                    <table class="table no-border hover">
                        <thead class="no-border">
                            <tr>
                                <th style="width:15%;"><strong>Image</strong></th>
                                <th style="width:40%;"><strong>Name</strong></th>
                                <th style="width:10%;"><strong>Order</strong></th>
                                <th style="width:30%;"><strong>Front</strong></th>
                                <th style="width:30%;"><strong>Back</strong></th>
                                <th style="width:40%;"><strong>Show</strong></th>
                                <th style="width:40%;"><strong>Hide</strong></th>
                                <th style="width:40%;"><strong>Delete</strong></th>
                            </tr>
                        </thead>
                        <tbody class="no-border-y">
<?php $query = "SELECT * FROM images WHERE album='$Article[id]' AND trash='0' AND webid='$WebId' ORDER BY list";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ 
if($Article['id'] == ""){
    exit;
} ?>
                            <tr>
                                <td><a href="/admin/ImgRotate/<?php echo OtarEncrypt($key, $row['id']); ?>"><img class='ImgSrc' src='<?php echo $row['img']; ?>' height="200" width="200"></a></td>
                                <td style="width:70%;"><input type='text' name="TrackName[<?php echo $row['id']; ?>]" value='<?php echo $row['name']; ?>'></td>
                                <td style="width:10%;" class='ImageOrder'><input type='text' name="ImageOrder[<?php echo $row['id']; ?>]" size="10" value='<?php echo $row["list"]; ?>'></td>
                                <td style="width:10%;"><input type='radio' name="ImgLayout[front]"  value='<?php echo $row['id']; ?>' <?php if($row['id'] == $ProductInfo["other"]["layout"]["front"]){ echo "checked"; } ?>></td>
                                <td style="width:10%;"><input type='radio' name="ImgLayout[back]" value='<?php echo $row['id']; ?>' <?php if($row['id'] == $ProductInfo["other"]["layout"]["back"]){ echo "checked"; } ?>></td>
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
















<div class="tab-pane cont" id="attributes">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Attributes</h3></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Size</label>
<div class="col-sm-6">
<select class="form-control" name='size[]' multiple>
<option value=''>Select Below</option>
<?php $query = "SELECT * FROM cwoptions WHERE category='size' AND trash='0' AND active='1'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
<option value='<?php echo $row['id']; if(in_array($row['id'], $Article['content']['size'])){ echo "'selected='selected"; }?>'><?php echo $row[name]; ?></option>
<?php } ?></select></div></div><br><br><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Color</label>
<div class="col-sm-6">
<select class="form-control" name='color[]' multiple>
<option value=''>Select Below</option>
<?php $query = "SELECT * FROM cwoptions WHERE category='color' AND trash='0' AND active='1'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
<?php if(is_array($Article["content"]["color"])){ ?>
    <option value='<?php echo $row[id]; ?>' <?php if(in_array($row['id'], $Article['content']['color'])){ echo "selected='selected'"; }?>><?php echo $row['name']; ?></option>
<?php }else{ ?>
    <option value='<?php echo $row[id]; ?>' <?php if($row['id'] == $Article['content']['color']){ echo "selected='selected'"; }?>><?php echo $row['name']; ?></option>
<?php }} ?></select></div></div><br><br><br><br>
</div></div>
</div></div>
</div>








            <div class="tab-pane" id="extra">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="header">
                            <h3>Extra Integrations</h3>
                        </div>
                        <div class="content">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Product Tags</label>
                                    <div class="col-sm-6">
                                        <input class="tags" type="hidden" name='tags' value="<?php echo $ProductInfo['other']['tags']; ?>" />
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Page Structure</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name='structure'>
<?php
$PageType = $ProductInfo['type'];
$CurrentLayout = $ProductInfo['other']['structure'];
$Layouts = $ThemeArray['structure']["$PageType"];
echo "<option value=''"; if( $CurrentLayout == $Layout){ echo "selected=selected"; } echo ">Default</option>"; 
if(is_array($ThemeArray['structure']["$PageType"])){
    foreach($ThemeArray['structure']["$PageType"] as $Layout=>$x_value){ 
        echo "<option value='"; echo $Layout; echo "'"; if( $CurrentLayout == $Layout){ echo "selected=selected"; } echo ">$Layout</option>";
    }}  ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            








            <div class="tab-pane" id="reseller">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="header">
                            <h3>ReSeller/Dropship Settings</h3>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Supplier</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name='supplier'>
<?php
$query = "SELECT * FROM cwoptions WHERE type='supplier' AND trash='0' AND webid='$WebId' ORDER BY name";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ 
    $row = CwOrganize($row,$Array);
?>
                                            <option value="<?php echo $row["id"]; ?>" <?php if($ProductInfo['other']['supplier'] == $row["id"]){ echo "selected='selected'"; } ?>><?php echo $row["name"]; ?></option>
<?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Type</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name='suppliertype'>
                                            <option value="resell" <?php if($ProductInfo['other']['suppliertype'] == "resell"){ echo "selected='selected'"; } ?>>Manual ReSell</option>
                                            <option value="dropship" <?php if($ProductInfo['other']['suppliertype'] == "dropship"){ echo "selected='selected'"; } ?>>Drop Shipping</option>
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Purchase Price</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control" name='resell[price]' value="<?php echo $ProductInfo['other']['resell']['price']; ?>" placeholder="Enter Price'">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">MSRP</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control" name='resell[msrp]' value="<?php echo $ProductInfo['other']['resell']['msrp']; ?>" placeholder="Enyter MSRP'">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Average Price</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control" name='resell[avgprice]' value="<?php echo $ProductInfo['other']['resell']['avgprice']; ?>" placeholder="Enyter MSRP'">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">SKU</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <input type="text" class="form-control" name='resell[sku]' value="<?php echo $ProductInfo['other']['resell']['sku']; ?>" placeholder="Enter Sku'">
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
            <div class="form-group">
                <br>
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
                    <button class="btn btn-default" onclick="window.location.href=''">Refresh</button>
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
                        <label class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if($ProductInfo['content']['img'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $Article['content']['img']; } ?>" alt="..."></div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                <div>
                                    <span class="btn btn-primary btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="profilepic[]">
                                    </span>
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
    <input type="hidden" name="imgtype" value="post-product">
    <input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
    <input type="hidden" name="img" value="<?php echo $ProductInfo['content']['img']; ?>">
    <input type="hidden" name="id" value="<?php echo $ProductInfo['id']; ?>">
    <input type="hidden" name="imgsizes" value="<?php echo OtarEncrypt($key,$ProductImgSizes); ?>">
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
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/summernote.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-wysihtml5.js"></script>



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
