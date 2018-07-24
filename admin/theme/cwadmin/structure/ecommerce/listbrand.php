<?php include("$THEME/structure/ecommerce/top_header.php"); ?>



<?php
$SupId = OtarDecrypt($key,$_GET['type']);
$query = "SELECT * FROM cwoptions WHERE id='$SupId'";
$result = mysqli_query($CwDb,$query);
$Supplier = mysqli_fetch_assoc($result);
$Supplier = CwOrganize($Supplier,$Array);
?>
    <form role="form" action='/Process/Ecommerce/Supplier' enctype="multipart/form-data">
        <div class="cl-mcont">
            <div class="page-head">
                <ol class="breadcrumb">
                    <li><a href="/admin">Dashboard</a></li>
                    <li><a href="/admin/Ecommerce">Ecommerce</a></li>
                    <li><a href="/admin/Ecommerce-Brand">Brands</a></li>
                    <li class="active"><?php echo $Supplier['name']; ?></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-9">
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
                                                <h3>Basic Information</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                               <label class="col-sm-3 control-label">Title</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $Supplier['name']; ?>'>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Url</label>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">@</span>
                                                        <input type="text" class="form-control" name='url' value="<?php echo $Supplier['content']['url']; ?>" placeholder="Example: site.com/'URL'">
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                               <label class="col-sm-3 control-label">Website</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name='website' placeholder="Enter Title" class="form-control" value='<?php echo $Supplier['content']["website"]; ?>'>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name='content' rows="300" class="ckeditor form-control" ><?php echo $Supplier['content']['info']; ?></textarea>
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
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa "></i>Status</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="form-group"><br>
                                <label class="col-sm-3 control-label">Active</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name='active'>
                                        <option value="<?php if($Supplier['active'] == ""){ echo "1"; } ?>">Select Below</option>
                                        <option value="1" <?php if($Supplier['active'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
                                        <option value="0" <?php if($Supplier['active'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
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
                </div>
                <div class="col-sm-3 col-md-3">
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
                                                <img src="<?php if($Supplier['content']['img'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $Article['content']['img']; } ?>" alt="...">
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
        </div>
        <input type="hidden" name="imgtype" value="brand">
        <input type="hidden" name="redir" value="admin/Ecommerce-Brand">
        <input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
        <input type="hidden" name="id" value="<?php echo $Supplier["id"]; ?>">
        <input type="hidden" name="img" value="<?php echo $Article['content']['img']; ?>">
        <input type="hidden" name="imgsizes" value="<?php echo OtarEncrypt($key,$StructureImgSizes); ?>">
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
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/masonry.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      
      //Initialize Mansory
      var $container = $('.gallery-cont');
      // initialize
      $container.masonry({
        columnWidth: 0,
        itemSelector: '.item'
      });
      
      //Resizes gallery items on sidebar collapse
      $("#sidebar-collapse").click(function(){
          $container.masonry();      
      });
      
      //MagnificPopup for images zoom
      $('.image-zoom').magnificPopup({ 
        type: 'image',
        mainClass: 'mfp-with-zoom', // this class is for CSS animation below
        zoom: {
        enabled: true, // By default it's false, so don't forget to enable it

        duration: 300, // duration of the effect, in milliseconds
        easing: 'ease-in-out', // CSS transition easing function 

        // The "opener" function should return the element from which popup will be zoomed in
        // and to which popup will be scaled down
        // By defailt it looks for an image tag:
        opener: function(openerElement) {
          // openerElement is the element on which popup was initialized, in this case its <a> tag
          // you don't need to add "opener" option if this code matches your needs, it's defailt one.
          var parent = $(openerElement).parents("div.img");
          return parent;
        }
        }

      });

    });
</script>