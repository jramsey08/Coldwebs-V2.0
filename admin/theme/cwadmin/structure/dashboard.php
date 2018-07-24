<?php if($UserSiteAccess["viewanalytics"] == "1"){ ?>
<div class="cl-mcont">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="fd-tile detail clean tile-purple">
              <div class="content"><h1 class="text-left"><?php echo $TotalVisitors; ?></h1><p>Website Views</p></div>
              <div class="icon"><i class="fa fa-flag"></i></div>
              <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
            </div>
        </div>
          <div class="col-md-3 col-sm-6">
            <div class="fd-tile detail clean tile-green">
              <div class="content"><h1 class="text-left"><?php echo $TodayVisitors; ?></h1><p>Today's Views</p></div>
              <div class="icon"><i class="fa fa-comments"></i></div>
              <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
            </div>
        </div>
         <div class="col-md-3 col-sm-6">
            <div class="fd-tile detail clean tile-prusia">
              <div class="content"><h1 class="text-left"><?php echo $LiveVisitors; ?></h1><p>Live Visitors</p></div>
              <div class="icon"><i class="fa fa-heart"></i></div>
              <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
            </div>
         </div>
         <div class="col-md-3 col-sm-6">
            <div class="fd-tile detail clean tile-red">
              <div class="content"><h1 class="text-left"><?php echo Cw_Load_Avg("xxx","xxx","xxx", $Array); ?></h1><p>Average Time to load Website</p></div>
              <div class="icon"><i class="fa fa-eye"></i></div>
              <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
            </div>
        </div>
    </div>
</div>
<?php } ?>



<div class="row">


    <div class=" col-md-12">
        <div class="block-flat">
            <div class="header">
                <h1>Welcome Back!</h1>
            </div>
            <div class="content">
                <h3>Thanks again for using ColdWebs.</h3>
                <p class="spacer">Use the links provided below for faster navigation.</p>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="col-md-4">
            <div class="block-flat">
                <div class="header">
                    <h3>Quick Links</h3>
                </div>
                <div class="content overflow-hidden">
                    <ul>
                        <li><a href="/admin/Blog/">Blog Posts</a></li>
                        <li><a href="/admin/Category/">Category</a></li>
                        <li><a href="/admin/Pages/">Pages</a></li>
                        <li><a href="/admin/Menu/">Menu</a></li>
                    </ul>						
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block-flat">
                <div class="header">
                    <h3>Helpful Links</h3>
                </div>
                <div class="content overflow-hidden">
                    <ul>
                        <li><a href="/admin/Users/">User Accounts</a></li>
                        <li><a href="/admin/Analytics/">Analytics</a></li>
                        <li><a href="/admin/Advertisement">Advertisements</a></li>
                        <li><a href="/admin/CwFile">File Transers</a></li>
                        <li><a href="/admin/Settings/">Site Settings</a></li>
                    </ul>						
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block-flat">
                <div class="header">
                    <h3>Latest Features</h3>
                </div>
                <div class="content overflow-hidden">
                    <ul>
                        <li><a href="/admin/Analytics">Analytics</a></li>
                        <li><a href="/admin/ECommerce">E-Commerce</a></li>
                        <li><a href="/admin/SocialMedia">Social Media</a></li>
                        <li><a href="/admin/Inbox">Messages</a></li>
                        <li><a href="/admin/Learning-Center">Learning Center</a></li>
                    </ul>						
                </div>
            </div>
        </div>
    </div>
    

    
    
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="block-flat">
                <div class="header">
                    <h3>World Wide Visitors</h3>
                </div>
                <iframe = src="<?php echo "$Full_Url/api/vector/tests/basic.php?webid=$WebId"; ?>" height="400px" width="100%" frameborder='0' scrolling='no' ></iframe>
            </div>
        </div>  
        <div class="col-md-6">
            <div class="block-flat">
<?php if($UserSiteAccess['edittask'] == "1"){ ?>
                <div class="header">
                    <h3>Website Tasks</h3>
                </div>
                <div class="content">
                    <div class="table-responsive">
                        <table class="no-border hover list">
                            <tbody class="no-border-y">
<?php
$Query = "SELECT * FROM tasks WHERE user='$Current_Admin_Id' AND active='1' AND trash='0' AND webid='$WebId' OR  user='0' AND active='1' AND trash='0' AND webid='$WebId' ORDER BY id DESC LIMIT 0,5"; 
$Result = mysqli_query($CwDb,$Query);
while($Row = mysqli_fetch_assoc($Result)){
$row = CwOrganize($row,$Array);
?>
                                <tr class="items">
                                    <td style="width: 10%;">
                                        <span class="label label-warning">Task</span>
                                    </td>
                                    <td>
                                        <p>
                                            <strong><?php echo $row['content']['name']; ?></strong>
                                            <span><?php echo $row['content']['desc']; ?></span>
                                        </p>
                                    </td>
                                    <td class="color-success">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" style="width: 80%">80%</div>
                                        </div>
                                    </td>
                                    <td class="text-right" style="width: 15%;">
                                        <a class="label label-default" href="#">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a class="label label-danger" href="#">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
<?php } ?>
                            </tbody>
                        </table>		
                    </div>
                </div>
            </div>
<?php } ?>
        </div>
        <div class="col-md-6">
<?php if($UserSiteAccess['viewusers'] == "1"){ ?>
            <div class="block-flat">
                <div class="header">
                    <h3>Latest Registered Users</h3>
                </div>
                <div class="content">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Account Type</th>
                                    <th>Status</th>
                                    <th>Settings</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
$Query = "SELECT * FROM users WHERE email!='' AND webid='$WebId' ORDER BY id DESC LIMIT 0,5"; 
$Result = mysqli_query($CwDb,$Query);
while($Row = mysqli_fetch_assoc($Result)){
    $Row = CwOrganize($Row,$Array);
    if($Row['info']['access'] != "0"){
        $Access = CwUserAccess($Row['info']['access']);
        $Status = CwUserStatus($Row['info']['status']);
        if(mysqli_real_escape_string($CwDb,$Row['name']) == ""){
            $Row['name'] = $Row['info']['firstname'] . " " . $Row['info']['lastname'];
        }
?>
                                <tr class="odd gradeX">
                                    <td><?php echo mysqli_real_escape_string($CwDb,$Row['name']); ?></td>
                                    <td><?php echo mysqli_real_escape_string($CwDb,$Access); ?></td>
                                    <td><?php echo mysqli_real_escape_string($CwDb,$Status); ?></td>
                                    <td class="center"> 
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs" type="button">Actions</button>
                                            <button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a href="/admin/Users/<?php echo OtarEncrypt($key,$Row['id']); ?>">Edit</a></li>
                                                <li class="divider"></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
<?php }} ?>									
                            </tbody>
                        </table>							
                    </div>
                </div>
            </div>
<?php } ?>
        </div>
    </div>




</div>






<script>
	initSample();
</script>

<script type="text/javascript" src="/admin/theme/cwadmin/header/js/summernote.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-wysihtml5.js"></script>
<script src="/admin/theme/cwadmin/header/js/dashboard.js"></script>  
