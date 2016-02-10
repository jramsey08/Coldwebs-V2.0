<link rel="stylesheet" type="text/css" href="http://condorthemes.com/flatdream/js/bootstrap.multiselect/css/bootstrap-multiselect.css"/>
<link rel="stylesheet" type="text/css" href="http://condorthemes.com/flatdream/js/jquery.multiselect/css/multi-select.css" />

<?php
$PageArticleId = $PageInfo['pagearticle']['id']; 
$NewFunctionId = RandomCode(300);

if($PageArticleId == ""){
    $PageArticleId = $NewFunctionId;
}

$FunctionNew = $PageArticleId;
$FunctionNew = OtarEncrypt($key,$FunctionNew);
?>


<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Pages">Pages</a></li>
<li class="active"><?php echo $Article['content']['name']; ?></li>
</ol></div>

<div class="row">		
<div class="col-sm-12 col-md-9">
<div class="tab-container">
<ul class="nav nav-tabs">
<li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
<li><a href="#social" data-toggle="tab">Social Media</a></li>
<li><a href="#layout" data-toggle="tab">Page Layout</a></li>
</ul>
<div class="tab-content">

<div class="tab-pane active cont" id="basic">
<div class="row">
<form role="form" action='/Process/Pages' enctype="multipart/form-data">
<div class="col-sm-12 col-md-12">
<div class="col-sm-6 col-md-6">
<div class="header"><h3>Basic Information</h3></div></div>
</div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<label class="col-sm-3 control-label">Title</label>
<div class="col-sm-6">
<input type="text" name='name' placeholder="Enter Title" class="form-control" value='<?php echo $Article['content']['name']; ?>'>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Url</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name='url' value="<?php echo $Article['url']; ?>" placeholder="Example: site.com/'URL'">
</div></div></div><br><br>
</div>
<div class="form-group">
<label class="col-sm-6 control-label">Featured</label>
<div class="col-sm-6">
<select class="form-control" name='feat'>
<option value='0' <?php if($Article['feat'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['feat'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['feat'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Allow Comments</label>
<div class="col-sm-6">
<select class="form-control" name='comment'>
<option value='0' <?php if($Article['other']['comment'] == ""){ echo "selected='selected'"; } ?>>Select Below</option>
<option value='0' <?php if($Article['other']['comment'] == "0"){ echo "selected='selected'"; } ?>>No</option>
<option value='1' <?php if($Article['other']['comment'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
</select></div></div>
</div>
<div class="col-sm-12 col-md-12">
<div class="form-group">
<textarea name='content' rows="300"  id='editor'><?php echo $Article['info']; ?></textarea>
</div></div>
</div></div>

<div class="tab-pane" id="social">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Social Media Integration</h3></div>
<div class="content">
<div class="col-sm-6 col-md-6">
<div class="form-group">
<?php
$query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $TotalSocial = $TotalSocial + 1;
}
if ($TotalSocial % 2 == 0) {
}else{
    $TotalSocial = $TotalSocial + 1;
}
$Half = $TotalSocial / 2;
$Split1 = $Half;
$Split2 = $Half + 1;
$query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0' LIMIT 0,$Split1";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$name = strtolower($row['name']);
$Social = $Article['other']['social']; ?>
<label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name="social[<?php echo $name; ?>]" value="<?php echo isset_get($Social,$name); ?>" placeholder="Username / Url">
</div></div><br><br><br>
<?php } echo "</div></div>"; ?>
<div class="col-sm-6 col-md-6">
<div class="form-group">
<?php $query = "SELECT * FROM cwoptions WHERE type='sm' AND active='1' AND trash='0' LIMIT $Split2,20";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$name = strtolower($row['name']);
$Social = $Article['other']['social']; ?>
<label class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">@</span>
<input type="text" class="form-control" name="social[<?php echo $name; ?>]" value="<?php echo isset_get($Social,$name); ?>" placeholder="Username / Url">
</div></div><br><br><br>
<?php } echo "</div></div>"; ?>
</div></div></div>
</div>

<div class="tab-pane" id="layout">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="header"><h3>Page Layout</h3></div>
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Page Functions</label>
<div class="table-responsive">
<table class="table table-bordered" id="datatable" >
<thead><tr>
<th>Function Name</th>
<th>Function Type</th>
<th>Order</th>
<th>Status</th>
<th>Settings     -> <a href="/admin/Functions/New/?id=<?php echo $FunctionNew; ?>" target="function">Create New</a></th>
</tr></thead>
<tbody>
<?php
$Id = $Article['id'];
$Query = "SELECT * FROM page_function WHERE template='$PageInfo[template]' AND page='$PageArticleId' AND trash='0' ORDER BY list"; 
$Result = mysql_query($Query) or die(mysql_error());
while($Row = mysql_fetch_array($Result)){
$Row = PbUnSerial($Row);
$FunctionId = $Row['id']; ?>
<tr class="odd gradeX">
<td><?php echo $Row["name"]; ?></td>
<td><?php echo $Row["function"]; ?></td>
<td><?php echo $Row["list"]; ?></td>
<td><?php if($Row['active'] == "1"){ echo "Active"; }else{ echo "In-Active"; } ?></td>
<td class="center">
<div class="btn-group">
<button class="btn btn-default btn-xs" type="button">Actions</button>
<button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
<ul role="menu" class="dropdown-menu">
<li><a href="/admin/Functions/<?php echo OtarEncrypt($key,$FunctionId); ?>" target="function">Edit</a></li>
<li><a href="#">Copy</a></li>
<li><a href="#">Details</a></li>
<li class="divider"></li>
<li><a href="/Process/Delete/Functions/<?php echo OtarEncrypt($key,$FunctionId); ?>" target="function">Remove</a></li>
</ul></div></td>
</tr><?php } ?>
</tbody></table></div></div>
</div></div></div>
</div>






</div></div>
</div>

	
		
		
		

<div class="col-sm-3 col-md-3">


<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
<i class="fa "></i>Status</a>
</h4></div>
<div id="collapseOne" class="panel-collapse collapse in">
<div class="form-group"><br>
<label class="col-sm-3 control-label">Active</label>
<div class="col-sm-6">
<select class="form-control" name='active'>
<option value="<?php if($Article['active'] == ""){ echo "1"; } ?>">Select Below</option>
<option value="1" <?php if($Article['active'] == "1"){ echo "selected='selected'"; } ?>>Yes</option>
<option value="0" <?php if($Article['active'] == "0"){ echo "selected='selected'"; } ?>>No</option>
</select></div></div><br>
<center><div class="panel-body">
<button class="btn btn-primary" type="submit" formmethod="post" onclick="formSubmitter('cwjqueryform', 'cwmessage')">Publish</button>
<button class="btn btn-default" type="reset">Reset</button>
<button class="btn btn-default" onclick="window.location.href=''">Refresh</button>
<br>
<div id='cwmessage'></div>
</div></center>
</div></div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#CwGallery">
<i class="fa "></i>Gallery</a>
</h4></div>
<div id="CwGallery" class="panel-collapse collapse in">
<div class="form-group">
<label class="col-sm-3 control-label">Main Image</label>
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if($Article['content']['img'] == ""){ echo "http://placehold.it/190x140/7761A7/ffffff"; }else{ echo $Article['content']['img']; } ?>" alt="..."></div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
<div><span class="btn btn-primary btn-file">
<span class="fileinput-new">Select image</span>
<span class="fileinput-exists">Change</span>
<input type="file" name="profilepic[]"></span>
<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
</div></div>
</div></div></div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#CwLayout">
<i class="fa "></i>Structure</a>
</h4></div>
<div id="CwLayout" class="panel-collapse collapse">
<div class="panel-body">
<div class="content">
<div class="form-group">
<label class="col-sm-3 control-label">Template</label>
<div class="col-sm-6">
<select class="form-control" name='maintheme'>
echo "<option value='default'"; if( $PageInfo['template'] == 'default'){ echo "selected=selected"; } echo ">Default</option>"; 
<?php $Templates = Pulltheme($ThemePath,"0");
foreach ($Templates as $Template){
    echo "<option value='$Template[0]'"; if($PageInfo['template'] == $Template[0]){ echo "selected=selected"; } echo ">$Template[1]</option>"; 
} ?></select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Type</label>
<div class="col-sm-6">
<select class="form-control" name='structure'>
<?php
$Category = $Article['category'];
if($Category == "page"){
    $PageType = "page";
}else{
    $PageType = $Article['type'];
}
$CurrentLayout = $Article['other']['structure'];
$PageType = "page";
$Layouts = $ThemeArray['structure'][$PageType];
if($PageType == ""){$PageType = "page"; }
foreach($Layouts as $Layout=>$x_value){
    echo "<option value='$Layout'"; if($CurrentLayout == $Layout){ echo "selected=selected"; } echo ">$Layout</option>";
}  ?>
</select></div></div>
</div></div></div></div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#CwTags">
<i class="fa "></i>Tags</a>
</h4></div>
<div id="CwTags" class="panel-collapse collapse">
<div class="form-group">
<label class="col-sm-6 control-label">Add Below:</label>
<input class="tags" type="hidden" name='tags' value="<?php echo $Article['other']['tags']; ?>" />
</div></div>
</div>





<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#cwMedia">
<i class="fa "></i>Media Integration</a>
</h4></div>
<div id="cwMedia" class="panel-collapse collapse">
<div class="form-group">
<label class="col-sm-3 control-label">Type</label>
<div class="col-sm-6">
<select class="form-control" name='codetype'>
<option value='' <?php if($Article['content']['codetype'] == ""){ echo "selected='selected'"; } ?>>Select Video Format</option>
<option value='youtube' <?php if($Article['content']['codetype'] == "youtube"){ echo "selected='selected'"; } ?>>Youtube</option>
<option value='vimeo' <?php if($Article['content']['codetype'] == "vimeo"){ echo "selected='selected'"; } ?>>Vimeo</option>
<option value='code' <?php if($Article['content']['codetype'] == "code"){ echo "selected='selected'"; } ?>>Embed Code</option>
<option value='videofile' <?php if($Article['content']['codetype'] == "videofile"){ echo "selected='selected'"; } ?>>Video File (*Uploaded)</option>
<option value='audiofile' <?php if($Article['content']['codetype'] == "audiofile"){ echo "selected='selected'"; } ?>>Audio File (*Uploaded)</option>
</select></div></div><br><br>
<div class="form-group">
EmbedCode
<textarea elastic name='code' rows='7' class="form-control"><?php echo $Article['content']['code']; ?></textarea>
<center>*(Add any embedded code or selected video URL in the box above.)</center>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Upload(*)</label>
<div class="col-sm-6">
<div class="fileinput fileinput-new" data-provides="fileinput">
<span class="btn btn-primary btn-file">
<span class="fileinput-new">Select file(s)</span>
<span class="fileinput-exists">Change</span><input type="file" name="mediafile[]"></span>
<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
</div></div></div>
<div class="panel-body"></div>
</div></div></div>




</div>




</div>
	









<input type="hidden" name="functionid" value="<?php echo $NewFunctionId; ?>">
<input type="hidden" name="category" value="page">
<input type="hidden" name="imgtype" value="post">
<input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
<input type="hidden" name="img" value="<?php echo $Article['content']['img']; ?>">
<input type="hidden" name="PageIds" value="<?php echo $PageIds; ?>">
<input type="hidden" name="pageinfo" value="<?php echo $PageIn; ?>">
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




<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.multiselect/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.quicksearch/jquery.quicksearch.js"></script>

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