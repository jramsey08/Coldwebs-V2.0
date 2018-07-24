<?php
include("$THEME/structure/ecommerce/top_header.php");

$query = "SELECT * FROM cwoptions WHERE type='business' ORDER BY RAND()";
$result = mysqli_query($CwDb,$query);
$Article = mysqli_fetch_assoc($result);
$Article = CwOrganize($Article,$Array);

?>





<div class="content">
    <div class="cl-mcont">
        <ol class="breadcrumb">
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/Ecommerce">Ecommerce</a></li>
            <li class="active">Ecommerce Settings</li>
        </ol>
        <div class="page-head">
            <div class="row">
                <form role="form" method='post' action='/Process/Ecommerce/Settings' enctype="multipart/form-data">		
                    <div class="col-sm-12 col-md-12">
                        <div class="tab-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
                                <li><a href="#owner" data-toggle="tab">Owner Info</a></li>
                                <li><a href="#extra" data-toggle="tab">Extra Info</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active cont" id="basic">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="header">
                                                    <h1>Business Information</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            
                                            
                                            <div class="col-sm-12 col-md-12">
                                                <div class="block-flat">
                                                    <div class="header">							
                                                        <h3>Basic Info</h3>
                                                    </div>
                                                    <div class="content">
                                                        <div class="form-group">
                                                            <label>Business Name</label>
                                                            <input type="text" name='business[business_name]' placeholder="Enter Business Name" class="form-control" value='<?php echo $Article["content"]['business_name']; ?>'>
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label>Email</label>
                                                            <input type="text" name='business[business_email]' placeholder="Enter Email Address" class="form-control" value='<?php echo $Article["content"]['business_email']; ?>'>
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label>Business Type</label>
                                                            <input type="text" name='business[business_type]' placeholder="Enter Business Type" class="form-control" value='<?php echo $Article["content"]['business_type']; ?>'>
                                                        </div>
                                                    </div>
                                                </div>				
                                            </div>   
                                            
                                            
                                            <div class="col-sm-12 col-md-12">
                                                <h3>Address</h3>
                                                <div class="form-group">
                                                    <div class="col-sm-5">
                                                        <input type="text" name='business[business_address][1]' placeholder="Enter Street 1" class="form-control" value='<?php echo $Article['content']['business_address']['1']; ?>'>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" name='business[business_address][7]' placeholder="Enter Street 2" class="form-control" value='<?php echo $Article['content']['business_address']['7']; ?>'>
                                                    </div>
                                                    <br><br>
                                                    <div class="col-sm-2">
                                                        <input type="text" name='business[business_address][2]' placeholder="Enter City" class="form-control" value='<?php echo $Article['content']['business_address']['2']; ?>'>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" name='business[business_address][6]' placeholder="Enter Region" class="form-control" value='<?php echo $Article['content']['business_address']['6']; ?>'>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" name='business[business_address][3]'>
                                                            <option value="<?php echo $Article['content']['business_address']['3']; ?>">Select State Below</option>
<?php
$query = "SELECT * FROM cwoptions WHERE type='state' ORDER BY name";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
?>
                                                            <option value="<?php echo $row['id']; ?>"<?php if($row['id'] == $Article['content']['business_address']['3']){ echo "selected=selected"; }; ?>><?php echo $row['name']; ?></option>
<?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" name='business[business_address][4]' placeholder="Enter Zip" class="form-control" value='<?php echo $Article['content']['business_address']['4']; ?>'>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" name='business[business_address][5]'>
                                                            <option value="<?php echo $Article['content']['business_address']['5']; ?>">Select Country Below</option>
<?php
$query = "SELECT * FROM cwoptions WHERE type='country' ORDER BY name";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
?>
                                                            <option value="<?php echo $row['id']; ?>"<?php if($row['id'] == $Article['content']['business_address']['5']){ echo "selected=selected"; }; ?>><?php echo $row['name']; ?></option>
<?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <textarea name='business_info' rows="300"  id='editor'><?php echo $Article['content']['business_info']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

















                                <div class="tab-pane cont" id="owner">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="header">
                                                    <h1>Business Owner Information</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="block-flat">
                                                        <div class="header">							
                                                            <h3>Owner Information</h3>
                                                        </div>
                                                        <div class="content">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" name='business[firstname]' placeholder="Enter First Name" class="form-control" value='<?php echo $Article['content']['firstname']; ?>'>
                                                            </div>
                                                            <div class="form-group"> 
                                                                <label>Middle Name</label>
                                                                <input type="text" name='business[middlename]' placeholder="Enter Middle Name" class="form-control" value='<?php echo $Article['content']['middlename']; ?>'>
                                                            </div>
                                                            <div class="form-group"> 
                                                                <label>Last Name</label>
                                                                <input type="text" name='business[lastname]' placeholder="Enter Last Name" class="form-control" value='<?php echo $Article['content']['lastname']; ?>'>
                                                            </div>
                                                        </div>
                                                    </div>				
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="block-flat">
                                                        <div class="header">							
                                                            <h3>Contact Information</h3>
                                                        </div>
                                                        <div class="content">
                                                            <div class="form-group">
                                                                <label>Home Phone</label>
                                                                <input type="text" name='business[phone]' placeholder="Enter Business Phone" class="form-control" value='<?php echo $Article['content']['phone']; ?>'>
                                                            </div>
                                                            <div class="form-group"> 
                                                                <label>Cell Phone</label>
                                                                <input type="number" name='business[cell]' placeholder="Enter Cell Phone" class="form-control" value='<?php echo $Article['content']['cell']; ?>'>
                                                            </div>
                                                            <div class="form-group"> 
                                                                <label>Fax</label>
                                                                <input type="number" name='business[fax]' placeholder="Enter Fax number" class="form-control" value='<?php echo $Article['content']['fax']; ?>'>
                                                            </div>
                                                        </div>
                                                    </div>				
                                                </div>                
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="block-flat">
                                                    <div class="header">							
                                                        <h3>Date of Birth</h3>
                                                    </div>
                                                    <div class="content">
                                                        <div class="form-group">
                                                            <label>Month</label>
                                                            <input type="text" name='business[birthmonth]' placeholder="Enter Birth Month" class="form-control" value='<?php echo $Article['content']['birthmonth']; ?>'>
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label>Day</label>
                                                            <input type="number" name='business[birthdate]' placeholder="Enter Birth Day" class="form-control" value='<?php echo $Article['content']['birthdate']; ?>'>
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label>Year</label>
                                                            <input type="number" name='business[birthyear]' placeholder="Enter Birth Year" class="form-control" value='<?php echo $Article['content']['birthyear']; ?>'>
                                                        </div>
                                                    </div>
                                                </div>				
                                            </div>                          



                                            


                                            <h4> _</h4>
                                            <div class="col-sm-12 col-md-12">
                                                <h3>Home Address</h3>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name='business[address][1]' placeholder="Enter Address" class="form-control" value='<?php echo $Article['content']['address']['1']; ?>'>
                                                    </div><br><br>
                                                    <label class="col-sm-2 control-label"></label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name='business[address][2]' placeholder="Enter City" class="form-control" value='<?php echo $Article['content']['address']['2']; ?>'>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" name='business[address][3]'>
                                                            <option value="<?php echo $Article['content']['address']['3']; ?>">Select Below</option>
<?php
$query = "SELECT * FROM cwoptions WHERE type='state' ORDER BY name";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
?>
                                                            <option value="<?php echo $row['id']; ?>"<?php if($row['id'] == $Article['content']['address']['3']){ echo "selected=selected"; }; ?>><?php echo $row['name']; ?></option>
<?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" name='business[address][4]' placeholder="Enter Zip" class="form-control" value='<?php echo $Article['content']['address']['4']; ?>'>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" name='business[address][5]'>
                                                            <option value="<?php echo $Article['content']['address']['5']; ?>">Select Below</option>
<?php
$query = "SELECT * FROM cwoptions WHERE type='country' ORDER BY name";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
?>
                                                            <option value="<?php echo $row['id']; ?>"<?php if($row['id'] == $Article['content']['address']['5']){ echo "selected=selected"; }; ?>><?php echo $row['name']; ?></option>
<?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br><br>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name='business[email]' placeholder="Enter Email Address" class="form-control" value='<?php echo $Article["content"]['email']; ?>'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>















                                <div class="tab-pane" id="extra">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="header"><h3>Extra Integrations</h3></div>
                                            <div class="content">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Function Tags</label>
                                                        <div class="col-sm-6">
                                                            <input class="tags" type="hidden" name='tags' value="<?php echo $Article['other']['tags']; ?>" />
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
        <input type="hidden" name="imgtype" value="post">
        <input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
        <input type="hidden" name="articleid" value="<?php echo $ArticleId; ?>">
        <input type="hidden" name="redir" value="/admin/Ecommerce-Settings">
    </form>	
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