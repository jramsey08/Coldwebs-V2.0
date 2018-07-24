<link rel="stylesheet" type="text/css" href="/admin/theme/cwadmin/header/js/bootstrap-multiselect.css"/>
<link rel="stylesheet" type="text/css" href="/admin/theme/cwadmin/header/css/multi-select.css" />
<?php
$PageArticleId = $PageInfo['pagearticle']['id']; 
$NewFunctionId = RandomCode(300);
if($PageArticleId == ""){ $PageArticleId = $NewFunctionId; }
$FunctionNew = $PageArticleId;
$FunctionNew = OtarEncrypt($key,$FunctionNew);
?>

<form role="form" method='post' action='/Process/Settings' enctype="multipart/form-data">
    <div class="cl-mcont">
        <div class="page-head">
            <ol class="breadcrumb">
                <li><a href="/admin">Dashboard</a></li>
                <li class="active">Settings</li>
            </ol>
        </div>
    
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="tab-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
                        <li><a href="#content" data-toggle="tab">Content</a></li>
                        <li><a href="#gallery" data-toggle="tab">Gallery</a></li>
                        <li><a href="#social" data-toggle="tab">Social Media</a></li>
                        <li><a href="#layout" data-toggle="tab">Website Layout</a></li>
                        <li><a href="#settings" data-toggle="tab">Extra Settings</a></li>
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
                        <label class="col-sm-4 control-label">Title</label>
                        <div class="col-sm-8">
                            <input type="text" name='name' placeholder="Enter Website Name" class="form-control" value='<?php echo $SiteInfo['name']; ?>'>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Slogan</label>
                        <div class="col-sm-8">
                            <input type="text" name='slogan' placeholder="Enter Website Slogan" class="form-control" value='<?php echo $SiteInfo['slogan']; ?>'>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Domain</label>
                        <div class="col-sm-8">
                            <input type="text" name='domain' placeholder="Enter Website Domain" class="form-control" value='<?php echo $SiteInfo['domain']; ?>'>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" name='email' placeholder="Enter Valid Email-Address" class="form-control" value='<?php echo $SiteInfo['other']['email']; ?>'>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Phone</label>
                        <div class="col-sm-8">
                            <input type="text" name='phone' placeholder="Enter Valid Phone Number" class="form-control" value='<?php echo $SiteInfo['other']['phone']; ?>'>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tags</label>
                        <div class="col-sm-8">
                            <input type="hidden" name='tags' placeholder="Enter Universal Tags" class="tags" value='<?php echo $SiteInfo['other']['tags']; ?>'>
                        </div>
                    </div>
                    <br><br>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Site Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" name='offline'>
                                <option value="<?php if($SiteInfo['status']['offline'] == ""){ echo "0"; } ?>">Select Below</option>
                                <option value="0" <?php if($SiteInfo['status']['offline'] == "0"){ echo "selected='selected'"; } ?>>Active</option>
                                <option value="1" <?php if($SiteInfo['status']['offline'] == "1"){ echo "selected='selected'"; } ?>>In-Active</option>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Customer back-end</label>
                        <div class="col-sm-8">
                            <select class="form-control" name='clogin'>
                                <option value="<?php if($SiteInfo['other']['clogin'] == ""){ echo "0"; } ?>">Select Below</option>
                                <option value="1" <?php if($SiteInfo['other']['clogin'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
                                <option value="0" <?php if($SiteInfo['other']['clogin'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Menu Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" name='menustatus'>
                                <option value="<?php if($SiteInfo['status']['menustatus'] == ""){ echo "0"; } ?>">Select Below</option>
                                <option value="1" <?php if($SiteInfo['other']['menustatus'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
                                <option value="0" <?php if($SiteInfo['other']['menustatus'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br><br><br>
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
        <div class="col-sm-12 col-md-12">
            <div class="form-group col-4 col-sm-4">
                <label class="col-sm-4 control-label">Main Logo</label>
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="<?php if($SiteInfo['logo'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $SiteInfo['logo']; } ?>" alt="...">
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
            <div class="form-group col-4 col-sm-4">
                <label class="col-sm-4 control-label">Extra Logo</label>
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="<?php if($SiteInfo['status']['logotwo'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $SiteInfo['status']['logotwo']; } ?>" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn btn-primary btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="logotwo[]"></span>
                        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
            </div>
            <div class="form-group col-4 col-sm-4">
                <label class="col-sm-4 control-label">Background</label>
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="<?php if($SiteInfo['other']['bgimg'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $SiteInfo['other']['bgimg']; } ?>" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn btn-primary btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="bgimg[]"></span>
                        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<div class="tab-pane cont" id="content">
    <div class="col-sm-12 col-md-12">
        <div class="header">
            <h3>Content</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <label>Welcome Message</label>
                <textarea name='content' class="ckeditor form-control"><?php echo $SiteInfo['info']; ?></textarea>
            </div>
        </div>
    </div>
</div>








<div class="tab-pane" id="social">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="header"><h3>Social Media Integration</h3></div>
            <div class="content">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
<?php
$Social = $Array['siteinfo']['other']['social'];
$query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0'";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
    $TotalSocial = $TotalSocial + 1;
}
if ($TotalSocial % 2 == 0) {
}else{
    $TotalSocial = $TotalSocial + 1;
}
$Half = $TotalSocial / 2;
$Split1 = $Half;
$Split2 = $Half + 1;
$query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0' ORDER BY list LIMIT 0,$Split1";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
$name = strtolower($row['name']);
$SocName = $SiteInfo['other']['social']["$name"];
$MainSocial = $SiteInfo['other']['socialauth']["$name"];
if($SocName != ""){ 
    if($MainSocial == $SocName){
        $MainSocial = "1";
    } 
}else{
    if($MainSocial != ""){
        $SocName = $MainSocial;
        $MainSocial = "1";
    }
}
?>
                        <label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" name="social[<?php echo $name; ?>]" value="<?php echo $SocName; ?>" placeholder="Username / Url" <?php if($MainSocial == "1"){ echo "disabled"; } ?>>
                            </div>
                        </div>
                        <br><br><br>
<?php } ?>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
<?php $query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0' ORDER BY list LIMIT $Split1,$TotalSocial";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
$name = strtolower($row['name']);
$SocName = $SiteInfo['other']['social']["$name"];
$MainSocial = $SiteInfo['other']['socialauth']["$name"];
if($SocName != ""){ 
    if($MainSocial == $SocName){
        $MainSocial = "1";
    } 
}
?>
                        <label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" name="social[<?php echo $name; ?>]" value="<?php echo $SocName; ?>" placeholder="Username / Url" <?php if($MainSocial == "1"){ echo "disabled"; } ?>>
                            </div>
                        </div>
                        <br><br><br>
<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>











                <div class="tab-pane" id="settings">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="header">
                                <h3>Extra Website Settings</h3>
                            </div>
                            <div class="content">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Hide Date</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name='cwsettings[hide_date]'>
                                                <option value="<?php if($SiteInfo["other"]["cwsettings"]['hide_date'] == ""){ echo "0"; } ?>">Select Below</option>
                                                <option value="1" <?php if($SiteInfo["other"]["cwsettings"]['hide_date'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
                                                <option value="0" <?php if($SiteInfo["other"]["cwsettings"]['hide_date'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
                                            </select>
                                        </div>
                                    </div><br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Show Ads</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name='cwsettings[show_ads]'>
                                                <option value="<?php if($SiteInfo["other"]["cwsettings"]['show_ads'] == ""){ echo "0"; } ?>">Select Below</option>
                                                <option value="1" <?php if($SiteInfo["other"]["cwsettings"]['show_ads'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
                                                <option value="0" <?php if($SiteInfo["other"]["cwsettings"]['show_ads'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
                                            </select>
                                        </div>
                                    </div><br><br>                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Multiple Cat</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name='cwsettings[multiple_cat]'>
                                                <option value="<?php if($SiteInfo["other"]["cwsettings"]['multiple_cat'] == ""){ echo "0"; } ?>">Select Below</option>
                                                <option value="1" <?php if($SiteInfo["other"]["cwsettings"]['multiple_cat'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
                                                <option value="0" <?php if($SiteInfo["other"]["cwsettings"]['multiple_cat'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
                                            </select>
                                        </div>
                                    </div><br><br>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Google Analytics</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='cwsettings[google_analytics]' placeholder="Enter value" class="form-control" value='<?php echo $SiteInfo["other"]["cwsettings"]['google_analytics']; ?>'>
                                            </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Show White Space</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name='cwsettings[show_white_space]'>
                                                    <option value="<?php if($SiteInfo["other"]["cwsettings"]['show_white_space'] == ""){ echo "0"; } ?>">Select Below</option>
                                                    <option value="1" <?php if($SiteInfo["other"]["cwsettings"]['show_white_space'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
                                                    <option value="0" <?php if($SiteInfo["other"]["cwsettings"]['show_white_space'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
                                                </select>
                                            </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Preview Songs</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name='cwsettings[preview_songs]'>
                                                    <option value="<?php if($SiteInfo["other"]["cwsettings"]['preview_songs'] == ""){ echo "0"; } ?>">Select Below</option>
                                                    <option value="1" <?php if($SiteInfo["other"]["cwsettings"]['preview_songs'] == "1"){ echo "selected='selected'"; } ?>>Active</option>
                                                    <option value="0" <?php if($SiteInfo["other"]["cwsettings"]['preview_songs'] == "0"){ echo "selected='selected'"; } ?>>In-Active</option>
                                                </select>
                                            </div>
                                        </div><br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="layout">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="header">
                                <h3>Page Layout</h3>
                            </div>
                            <div class="content">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Website Template</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name='maintheme'>
                                            <option value="<?php echo $Array['siteinfo']['theme']; ?>">Select Below</option>
<?php $Templates = Pulltheme("../theme/","0",$WebId);
if(is_array($Templates)){
foreach ($Templates as $Template){
    echo "<option value='$Template[0]'"; if($Array['siteinfo']['theme'] == $Template['0']){ echo "selected=selected"; } echo ">$Template[1]</option>"; 
}} ?>
                                        </select>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Offline Template</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name='offlinetheme'>
                                            <option value="<?php echo $Array['siteinfo']['theme']; ?>">Select Below</option>
<?php $Templates = Pulltheme("../theme/","2",$WebId);
if(is_array($Templates)){
foreach ($Templates as $Template){
    echo "<option value='$Template[0]'"; if($Array['siteinfo']['other']['offline'] == $Template['0']){ echo "selected=selected"; } echo ">$Template[1]</option>"; 
}} ?>
                                        </select>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Admin Template</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name='admin_theme'>
                                            <option value="<?php echo $Array['siteinfo']['other']['admin_theme']; ?>">Select Below</option>
<?php $Templates = Pulltheme("theme","1",$WebId);
if(is_array($Templates)){
foreach ($Templates as $Template){
    echo "<option value='$Template[0]'"; if($Array['siteinfo']['other']['admin_theme'] == $Template['0']){ echo "selected=selected"; } echo ">$Template[1]</option>";
}} ?>
                                        </select>
                                    </div>
                                </div>
                                <br><br><br>
                            </div>
                            <br><br><br>
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
</div></div></div>

<input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
<input type="hidden" name="img" value="<?php echo $PageStructure['img']; ?>">
<input type="hidden" name="logo" value="<?php echo $Array['siteinfo']['logo']; ?>">
<input type="hidden" name="bgimg" value="<?php echo $Array['siteinfo']['other']['bgimg']; ?>">

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
<script type="text/javascript" src="/admin/theme/cwadmin/header/jss/bootstrap-slider.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/icheck.min.js"></script>



<script src="/admin/theme/cwadmin/header/js/ckeditor.js"></script>

<script type="text/javascript" src="/admin/theme/cwadmin/header/js/summernote.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-wysihtml5.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      //initialize the javascript
      $('textarea.ckeditor').ckeditor();
      CKEDITOR.disableAutoInline = true;
      $(".inline-editable").each(function(){
        CKEDITOR.inline($(this)[0]);
      });
    
      $('#some-textarea').wysihtml5();
      $('#summernote').summernote();
    });
</script>



<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.quicksearch.js"></script>

			<script type="text/javascript">
			    $(document).ready(function() {
					
			        $('#example1').multiselect();
					
			        $('#example2').multiselect();
					
			        $('#example3').multiselect({
			            buttonClass: 'btn btn-link'
			        });
					
			        $('#example4').multiselect({
			            buttonClass: 'btn btn-default btn-sm'
			        });
					
			        $('#example6').multiselect();
					
			        $('#example9').multiselect({
			            onChange:function(element, checked){
			                alert('Change event invoked!');
			                console.log(element);
			            }
			        });
					
			        for (var i = 1; i <= 100; i++) {
			            $('#example11').append('<option value="' + i + '">Options ' + i + '</option>');
			        }
			        $('#example11').multiselect({
			            maxHeight: 200
			        })
					
			        $('#example13').multiselect();
					
			        $('#example14').multiselect({
			            buttonWidth: '500px',
			            buttonText: function(options) {
			                if (options.length === 0) {
			                    return 'None selected <b class="caret"></b>';
			                }
			                else {
			                    var selected = '';
			                    options.each(function() {
			                        selected += $(this).text() + ', ';
			                    });
			                    return selected.substr(0, selected.length -2) + ' <b class="caret"></b>';
			                }
			            }
			        });
					
			        $('#example16').multiselect({
			            onChange: function(option, checked) {
                            if (checked === false) {
                                $('#example16').multiselect('select', option.val());
                            }
			            }
			        });
					
			        $('#example19').multiselect();

			        $('#example20').multiselect({
			            selectedClass: null
			        });
					
			        $('#example23').multiselect();
					
			        $('#example24').multiselect();

			        $('#example25').multiselect({
			        	dropRight: true,
			        	buttonWidth: '300px'
			        });

			        $('#example27').multiselect({
			        	includeSelectAllOption: true
			        });

					// Add options for example 28.
					for (var i = 1; i <= 100; i++) {
						$('#example28').append('<option value="' + i + '">' + i + '</option>');
					}

			        $('#example28').multiselect({
			        	includeSelectAllOption: true,
			        	enableFiltering: true,
			        	maxHeight: 150
			        });
                    
                    $('#example32').multiselect();
                    
                    $('#example39').multiselect({
                        includeSelectAllOption: true,
			        	enableCaseInsensitiveFiltering: true
                    });
                    
                    $('#example41').multiselect({
			        	includeSelectAllOption: true
			        });
              //multi-select boxed
              $('#my-select').multiSelect()
              $('#pre-selected-options').multiSelect();
              $('#callbacks').multiSelect({
                afterSelect: function(values){
                  alert("Select value: "+values);
                },
                afterDeselect: function(values){
                  alert("Deselect value: "+values);
                }
              });
              $('#optgroup').multiSelect({ selectableOptgroup: true });
              $('#disabled-attribute').multiSelect();
              $('#custom-headers').multiSelect({
                selectableHeader: "<div class='custom-header'>Selectable items</div>",
                selectionHeader: "<div class='custom-header'>Selection items</div>",
              });
              $('#searchable').multiSelect({
                selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
                selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
                afterInit: function(ms){
                  var that = this,
                      $selectableSearch = that.$selectableUl.prev(),
                      $selectionSearch = that.$selectionUl.prev(),
                      selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                      selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                  that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                  .on('keydown', function(e){
                    if (e.which === 40){
                      that.$selectableUl.focus();
                      return false;
                    }
                  });

                  that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                  .on('keydown', function(e){
                    if (e.which == 40){
                      that.$selectionUl.focus();
                      return false;
                    }
                  });
                },
                afterSelect: function(){
                  this.qs1.cache();
                  this.qs2.cache();
                },
                afterDeselect: function(){
                  this.qs1.cache();
                  this.qs2.cache();
                }
              });
			    });
			</script>