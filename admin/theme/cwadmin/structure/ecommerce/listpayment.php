<?php  include("$THEME/structure/ecommerce/sidebar.php"); ?>
<?php
$ArticleId = OtarDecrypt($key,$_GET["type"]);
$query = "SELECT * FROM cwoptions WHERE id='$ArticleId'";
$result = mysql_query($query) or die(mysql_error());
$Article = mysql_fetch_array($result);
$Article = CwOrganize($Article,$Array);
?>

<div class="content">
    <div class="cl-mcont">
        <div class="page-head">
            <form role="form" method='post' action='/Process/Ecommerce/Payment' enctype="multipart/form-data">		
                <div class="row">
                    <div class="col-sm-12 col-md-9">
                        <div class="tab-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
                                <li><a href="#extra" data-toggle="tab">Extra Info</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active cont" id="basic">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="header">
                                                    <h3>Payment Information</h3>
                                                </div>
                                            </div>
                                            <br><br><br>
                                        </div>
                                        <div class="content">
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
                                                        <label class="col-sm-3 control-label">Provider</label>
                                                        <div class="col-sm-6">                                                    
                                                            <select class="form-control" name='provider'>
                                                                <option value="<?php echo $Article['content']['provider']; ?>">Select Below</option>
<?php 
$query = "SELECT * FROM cwoptions WHERE  type='payment_provider' AND active='1' AND trash='0' AND webid='$WebId' ORDER BY name";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $row = CwOrganize($row,$Array);
?>
                                                                <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $Article['content']['provider']){ echo "selected=selected"; }; ?>><?php echo $row['name']; ?></option>
<?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br><br>                                                    
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                   <div class="form-group">
                                                        <label class="col-sm-3 control-label">Default Payment</label>
                                                        <div class="col-sm-6">                                                    
                                                            <select class="form-control" name='default'>
                                                                <option value="<?php if($Article['content']['default'] == ""){ echo "0"; } ?>">Select Below</option>
                                                                <option value="1" <?php if($Article['content']['default'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
                                                                <option value="0" <?php if($Article['content']['default'] == "0"){ echo "selected='selected'"; } ?>>No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                        <label class="col-sm-3 control-label">Api</label>
                                                        <div class="col-sm-6">
                                                            <textarea name='api' rows="2" cols="100"><?php echo $Article['content']['api']; ?></textarea>
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
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="block-flat">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <button class="btn btn-default">Cancel</button>
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
                                        <br>
                                        <div id='cwmessage'></div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
                <input type="hidden" name="id" value="<?php echo $Article['id']; ?>">
            </form>	
        </div>
    </div>
</div>






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