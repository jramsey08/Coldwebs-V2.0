<?php include("$THEME/structure/ecommerce/top_header.php"); ?>
<div class="cl-mcont">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="fd-tile detail clean tile-purple">
                  <div class="content"><h1 class="text-left"><?php echo $TotalSales; ?></h1><p>Total Sales</p></div>
                  <div class="icon"><i class="fa fa-flag"></i></div>
                  <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="fd-tile detail clean tile-green">
                    <div class="content"><h1 class="text-left"><?php echo $MonthlySales; ?></h1><p>Sales This Month</p></div>
                    <div class="icon"><i class="fa fa-comments"></i></div>
                    <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="fd-tile detail clean tile-prusia">
                    <div class="content"><h1 class="text-left"><?php echo $TodaySales; ?></h1><p>Today's Sales</p></div>
                    <div class="icon"><i class="fa fa-heart"></i></div>
                    <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="fd-tile detail clean tile-red">
                    <div class="content"><h1 class="text-left"><?php echo $PendingSales; ?></h1><p>Pending Orders</p></div>
                    <div class="icon"><i class="fa fa-eye"></i></div>
                    <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="block-flat">
                <div class="header">
                    <h3>E-Commerce Navigation</h3>
                </div>
                <div class="content">
                    <div class="col-md-12 clearfix spacer">
                        <div class="static-lg-menu">
                            <ul class="dropdown-menu col-menu-2 static-mn static-mn spacer">
                                <li class="col-sm-3 no-padding">
                                    <ul>
                                        <li class="dropdown-header"><i class="fa fa-gear"></i>Configuration</li>
                                        <li><a href="/admin/Ecommerce-Payment">Payment Types</a></li>
                                        <li><a href="/admin/Ecommerce-Delivery">Shipment Options</a></li>
                                        <li><a href="/admin/Ecommerce-Tax">Sales Tax</a></li> 
                                        <li><a href="/admin/Ecommerce-Settings">General Settings</a></li> 
                                    </ul>
                                </li>
                                <li class="col-sm-3 no-padding">
                                    <ul>
                                        <li class="dropdown-header"><i class="fa fa-tags"></i>Products</li>
                                        <li><a href="/admin/Ecommerce-Attributes">Attributes</a></li>
                                        <li><a href="/admin/Ecommerce-Brand">Brands</a></li>
                                        <li><a href="/admin/Ecommerce-Category">Category</a></li>
                                        <li><a href="/admin/Ecommerce-Products">Products</a></li>
                                        <li><a href="/admin/Ecommerce-Supplier">Suppliers</a></li>
                                    </ul>
                                </li>
                                <li  class="col-sm-3 no-padding">
                                    <ul>
                                        <li class="dropdown-header"><i class="fa fa-legal"></i>Sales</li>
                                        <li><a href="/admin/Ecommerce-Coupons">Coupons</a></li>
                                        <li><a href="/admin/Ecommerce-Specials">Specials</a></li>
                                        <li><a href="/admin/Ecommerce-Orders">Transactions</a></li>
                                    </ul>
                                </li>
                                <li  class="col-sm-3 no-padding">
                                    <ul>
                                        <li class="dropdown-header"><i class="fa fa-users"></i>Customers</li>
                                        <li><a href="/admin/Ecommerce-Customer">Customers</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="block-flat">
                <div class="header">
                    <h3>E-Commerce Tasks</h3>
                </div>
                <div class="content">
                    <div class="table-responsive">
                        <table class="no-border hover list">
                            <tbody class="no-border-y">
<?php
$Query = "SELECT * FROM tasks WHERE user='$Current_Admin_Id' AND active='1' AND trash='0' AND webid='$WebId' ORDER BY id DESC LIMIT 0,5"; 
$Result = mysqli_query($CwDb,$Query);
while($Row = mysqli_fetch_assoc($Result)){
$row = CwOrganize($row,$Array); ?>
                                <tr class="items">
                                    <td style="width: 10%;"><span class="label label-warning">Task</span></td>
                                    <td><p><strong><?php echo $row["content"]["name"]; ?></strong><span><?php echo $row['content']['desc']; ?></span></p></td>
                                    <td class="color-success">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" style="width: 80%">80%</div>
                                        </div>
                                    </td>
                                    <td class="text-right" style="width: 15%;">
                                        <a class="label label-default" href="#"><i class="fa fa-pencil"></i></a>
                                        <a class="label label-danger" href="#"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block-flat">
                <div class="header">
                    <h3>Latest Transactions</h3>
                </div>
                <div class="content">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" >
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Settings</th> 
                                </tr>
                            </thead>
                            <tbody>
<?php
$Query = "SELECT * FROM trans WHERE trash='0' AND active='1' AND webid='$WebId' ORDER BY id DESC LIMIT 0,5"; 
$Result = mysqli_query($CwDb,$Query);
while($Row = mysqli_fetch_assoc($Result)){
    $Row = CwOrganize($Row,$Array);
    $Status = CwOrderStatus($Row['status']);
    $query = "SELECT * FROM users WHERE id='$Row[user]' AND webid='$WebId'"; 
    $result = mysqli_query($CwDb,$query);
    $row = mysqli_fetch_assoc($result);
    $row = CwOrganize($row,$Array);
    if(mysqli_real_escape_string($CwDb,$row['name']) == ""){
        $row['name'] = $row['info']['firstname'] . " " . $row['info']['lastname'];
    }
    $Row['price'] = $Row['price'] + "10";
?>
                                <tr class="odd gradeX">
                                    <td><?php echo mysqli_real_escape_string($CwDb,$row['name']); ?></td>
                                    <td><?php echo mysqli_real_escape_string($CwDb,$Status); ?></td>
                                    <td>$<?php echo $Row['price']; ?></td>
                                    <td class="center"> 
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs" type="button">Actions</button>
                                            <button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a href="/admin/Ecommerce-Orders/<?php echo OtarEncrypt($key,$Row['id']); ?>">Edit</a></li>
                                                <li class="divider"></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
<?php } ?>
                            </tbody>
                        </table>							
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script src="/admin/theme/cwadmin/header/js/dashboard.js"></script>