<?php include("$THEME/structure/ecommerce/top_header.php"); ?>
<div class="cl-mcont">
    <form role="form" method='post' action='/Process/Ecommerce/Import' enctype="multipart/form-data">
        <div class="page-head">
            <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a></li>
                <li><a href="/admin/Ecommerce">Ecommerce</a></li>
                <li><a href="/admin/Ecommerce-Products">Products</a></li>
                <li class="active">Import Products</li>
            </ol>
        </div>
        <div class="row">		
            <div class="col-sm-9 col-md-9">
                <div class="tab-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#basic" data-toggle="tab">Import Url</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active cont" id="basic">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="header">
                                            <h3>Import Url</h3>
                                        </div>
                                    </div>
                                </div>
<style>
    .select2-input {
        height: 100px;
    }
</style>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="hidden" row="20" style="height:600px !important;" name='url' placeholder="Enter URLS" class="tags" value=''>
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
                        <center>
                            <div class="panel-body">
                                <button class="btn btn-primary" type="submit" formmethod="post" onclick="formSubmitter('cwjqueryform', 'cwmessage')">Publish</button>
                                <button class="btn btn-default" type="reset">Reset</button>
                                <br>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="imgtype" value="post-product">
        <input type="hidden" name="redirect" value="admin/Ecommerce-Import">
        <input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
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