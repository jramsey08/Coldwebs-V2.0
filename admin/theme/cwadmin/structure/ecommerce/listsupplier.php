<?php
$SupId = OtarDecrypt($key,$_GET['type']);
$query = "SELECT * FROM cwoptions WHERE id='$SupId'";
$result = mysql_query($query) or die(mysql_error());
$Supplier = mysql_fetch_array($result);
$Supplier = CwOrganize($Supplier,$Array);
?>
    <form role="form" action='/Process/Ecommerce/Supplier' enctype="multipart/form-data">
        <div class="cl-mcont">
            <div class="page-head">
                <ol class="breadcrumb">
                    <li><a href="/admin">Dashboard</a></li>
                    <li><a href="/admin/Ecommerce">Ecommerce</a></li>
                    <li><a href="/admin/Ecommerce-Supplier">Suppliers</a></li>
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
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Type</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name='type'>
                                                        <option value='resell' <?php if($Supplier['content']["type"] == "resell"){ echo "selected='selected'"; } ?>>ReSeller</option>
                                                        <option value='dropship' <?php if($Supplier['content']["type"] == "dropship"){ echo "selected='selected'"; } ?>>Drop Shipping</option>
                                                        <option value='both' <?php if($Supplier['content']["type"] == "both"){ echo "selected='selected'"; } ?>>Both</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="header">
                                                <h3>Retun Policy</h3>
                                            </div>
                                            <textarea style="width: 100%;height: 100px;" name='returns'><?php echo $Supplier['content']['returns']; ?></textarea>
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
            </div>
        </div>
        <input type="hidden" name="imgtype" value="supplier">
        <input type="hidden" name="redir" value="admin/Ecommerce-Supplier">
        <input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
        <input type="hidden" name="id" value="<?php echo $Supplier["id"]; ?>">
    </form>	
</div>




<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jasny.bootstrap/extend/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.touchspin/bootstrap-touchspin/bootstrap.touchspin.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.select2/select2.min.js" ></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.slider/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.icheck/icheck.min.js"></script>


<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.summernote/dist/summernote.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/src/bootstrap-wysihtml5.js"></script>




<script type="text/javascript" src="http://condorthemes.com/flatdream/js/masonry.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.magnific-popup/dist/jquery.magnific-popup.min.js"></script>
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