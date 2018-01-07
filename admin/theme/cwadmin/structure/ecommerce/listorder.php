    <form role="form" method='post' action='/Process/Ecommerce/Orders' enctype="multipart/form-data">
        <div class="cl-mcont">
            <div class="page-head">
                <ol class="breadcrumb">
                    <li><a href="/admin">Dashboard</a></li>
                    <li><a href="/admin/Ecommerce">Ecommerce</a></li>
                    <li><a href="/admin/Ecommerce-Orders">Orders</a></li>
                    <li class="active"><?php echo $Trans['transid']; ?></li>
                </ol>
            </div>
            <div class="row">		
                <div class="col-sm-12 col-md-9">
                    <div class="tab-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#basic" data-toggle="tab">Trans Info</a></li>
                            <li><a href="#payment" data-toggle="tab">Payment Info</a></li>
                            <li><a href="#deliver" data-toggle="tab">Delivery Info</a></li>
                            <li><a href="#message" data-toggle="tab">Messages</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active cont" id="basic">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="header">
                                                <h3>Order Details</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                        				<div class="col-md-4">
                        					<div class="block-flat">
                        						<div class="header">
                        							<h3>Customer Info</h3>
                        						</div>
                        						<div class="content overflow-hidden">
                        							<address>
                        								<strong><?php echo $Trans_User["info"]["firstname"] . " " . $Trans_User["info"]["lastname"]; ?></strong><br>
                        								<?php echo $Trans_User["info"]["address"]["company"]; ?><br />
                        								<?php echo $Trans_User["info"]["address"]["1"]; ?><br>
                        								<?php echo $Trans_User["info"]["address"]["6"]; ?><br>
                        								<?php echo $Trans_User["info"]["address"]["2"]; ?>,  <?php echo $Trans_User["info"]["address"]["3"]; ?>, <?php echo $Trans_User["info"]["address"]["4"]; ?><br/>
                                                        <?php echo $Trans_User["info"]["address"]["5"]; ?><br/>
                        								<abbr title="Phone">T:</abbr> <?php echo $Trans_User["info"]["address"]["telephone"]; ?><br>
                                                        <abbr title="Fax">F:</abbr><?php echo $Trans_User["info"]["address"]["fax"]; ?>
                        							</address>
                        						</div>
                        					</div>	
                        				</div>
                        				<div class="col-md-4">
                        					<div class="block-flat">
                        						<div class="header">
                        							<h3>Billing Info</h3>
                        						</div>
                        						<div class="content overflow-hidden">
                        							<address>
                        								<strong><?php echo $BillingInfo["firstname"] . " " . $BillingInfo["lastname"]; ?></strong><br>
                                                        <?php echo $BillingInfo["company"]; ?><br />
                                                        <?php echo $OrderOther["address"]["1"]; ?><br />
                                                        <?php echo $OrderOther["address"]["6"]; ?><br />
                                                        <?php echo $OrderOther["address"]["2"]; ?>,  <?php echo $OrderOther["address"]["3"]; ?>, <?php echo $OrderOther["address"]["4"]; ?><br/>
                                                        <?php echo $OrderOther["address"]["5"]; ?><br/>
                                                        <abbr title="Phone">T:</abbr> <?php echo $BillingInfo["telephone"]; ?><br>
                                                        <abbr title="Fax">F:</abbr><?php echo $BillingInfo["fax"]; ?>
                        							</address>				
                        						</div>
                        					</div>	
                        				</div>
                        				<div class="col-md-4">
                        					<div class="block-flat">
                        						<div class="header">
                        							<h3>Delivery Info</h3>
                        						</div>
                        						<div class="content overflow-hidden">
                        							<address>
                        								<strong><?php echo $BillingInfo["firstname"] . " " . $BillingInfo["lastname"]; ?></strong><br>
                                                        <?php echo $BillingInfo["company"]; ?><br />
                                                        <?php echo $OrderOther["address"]["1"]; ?><br />
                                                        <?php echo $OrderOther["address"]["6"]; ?><br />
                                                        <?php echo $OrderOther["address"]["2"]; ?>,  <?php echo $OrderOther["address"]["3"]; ?>, <?php echo $OrderOther["address"]["4"]; ?><br/>
                                                        <?php echo $OrderOther["address"]["5"]; ?><br/>
                                                        <abbr title="Phone">T:</abbr> <?php echo $BillingInfo["telephone"]; ?><br>
                                                        <abbr title="Fax">F:</abbr><?php echo $BillingInfo["fax"]; ?>
                        							</address>							
                        						</div>
                        					</div>	
                        				</div>
                                    </div> 
                                    <div class="col-sm-12 col-md-12">
                                        <h3>Shopping Cart</h3>
                    					<div class="block-flat no-padding">
                    						<div class="content">
                    							<table class="no-border red">
                    								<thead class="no-border">
                    									<tr>
                    									    <th></th>
                    										<th style="width:50%;">Name</th>
                    										<th>Sku</th>
                    										<th class="text-right">Price</th>
                    										<th class="text-right">Qty</th>
                    										<th class="text-right">Total</th>
                    									</tr>
                    								</thead>
                    								<tbody class="no-border-x">
<?php
$query = "SELECT * FROM cw_cart WHERE session='$Trans[cart]' AND webid='$WebId'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $row = CwOrganize($row,$Array);
    $Item = Cw_Quick_Info("articles",$WebId,$row["item"],$Array);
    $Total = $row["qty"] * $row["price"];
?>
                    									<tr>
                    									    <td><a href="#" target="_blank"><a href="/admin/Products/<?php echo OtarEncrypt($key,$Item["id"]); ?>" target="_blank"><img src="<?php echo $Item["content"]["img"]; ?>" height="50" width="50"></a></td>
                    										<td style="width:30%;"><a href="/admin/Products/<?php echo OtarEncrypt($key,$Item["id"]); ?>" target="_blank"><?php echo $Item["name"]; ?></a></td>
                    										<td style="width:10%;"><?php echo $Item["other"]["sku"]; ?></td>
                    										<td class="text-right">$<?php echo number_format($row["price"], "2"); ?></td>
                    										<td class="text-right"><?php echo $row["qty"]; ?></td>
                    										<td class="text-right">$<?php echo number_format($Total, "2"); ?></td>
                    									</tr>
<?php } ?>
                    								</tbody>
                    							</table>
                    						</div>
                    					</div>                                        
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <h3>Order Notes</h3>
                                        <div class="form-group">
                                            <textarea name='notes' rows="5" cols="124"><?php echo $Trans['info']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="payment">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="header">
                                            <h3>Payment Info</h3>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="col-md-6">
                            					<div class="block-flat">
                            						<div class="header">
                            							<h3>Customer Info</h3>
                            						</div>
                            						<div class="content overflow-hidden">
                            							<address>
                            								<strong><?php echo $Payment_Info["info"]["firstname"] . " " . $Payment_Info["info"]["lastname"]; ?></strong><br>
                            								<?php echo $Payment_Info["info"]["address"]["1"]; ?><br>
                            								<?php echo $Payment_Info["info"]["address"]["6"]; ?><br>
                            								<?php echo $Payment_Info["info"]["address"]["2"]; ?>,  <?php echo $Payment_Info["info"]["address"]["3"]; ?>, <?php echo $Payment_Info["info"]["address"]["4"]; ?><br/>
                                                            <?php echo $Payment_Info["info"]["address"]["5"]; ?><br/>
                            								<abbr title="Phone">T:</abbr> <?php echo $Payment_Info["info"]["address"]["telephone"]; ?><br>
                                                            <abbr title="Fax">F:</abbr><?php echo $Payment_Info["info"]["address"]["fax"]; ?>
                            							</address>
                            						</div>
                            					</div>	
                            				</div>
                            				<div class="col-md-6">
                            					<div class="block-flat">
                            						<div class="header">
                            							<h3>Billing Info</h3>
                            						</div>
                            						<div class="content overflow-hidden">
                            							<address>
                            								<strong><?php echo $Payment_Info["billing"]["firstname"] . " " . $Payment_Info["billing"]["lastname"]; ?></strong><br>
                                                            <?php echo $Payment_Info["billing"]["company"]; ?><br />
                                                            <?php echo $Payment_Info["billing"]["address"]["1"]; ?><br />
                                                            <?php echo $Payment_Info["billing"]["address"]["6"]; ?><br />
                                                            <?php echo $Payment_Info["billing"]["address"]["2"]; ?>,  <?php echo $Payment_Info["billing"]["address"]["3"]; ?>, <?php echo $Payment_Info["billing"]["address"]["4"]; ?><br/>
                                                            <?php echo $Payment_Info["billing"]["address"]["5"]; ?><br/>
                                                            <abbr title="Phone">T:</abbr> <?php echo $Payment_Info["billing"]["telephone"]; ?><br>
                                                            <abbr title="Fax">F:</abbr><?php echo $Payment_Info["billing"]["fax"]; ?>
                            							</address>				
                            						</div>
                            					</div>	
                            				</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="deliver">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="header">
                                            <h3>Delivery Info</h3>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="col-md-6">
                            					<div class="block-flat">
                            						<div class="header">
                            							<h3>Delivery Info</h3>
                            						</div>
                            						<div class="content overflow-hidden">
                            							<address>
                            								<strong>Carrier:</strong><br>
                            								<strong>Pick-up Date:</strong> Name<br>
                            								<strong>Status:</strong> Name<br>
                            								<strong>Delivery Date:</strong> Name<br>
                            								<strong>Payment:</strong> Name<br><br>
                            							</address>
                            						</div>
                            					</div>	
                            				</div>
                            				<div class="col-md-6">
                            					<div class="block-flat">
                            						<div class="header">
                            							<h3>Delivery Address</h3>
                            						</div>
                            						<div class="content overflow-hidden">
                            							<address>
                        								<strong><?php echo $BillingInfo["firstname"] . " " . $BillingInfo["lastname"]; ?></strong><br>
                                                        <?php echo $BillingInfo["company"]; ?><br />
                                                        <?php echo $OrderOther["address"]["1"]; ?><br />
                                                        <?php echo $OrderOther["address"]["6"]; ?><br />
                                                        <?php echo $OrderOther["address"]["2"]; ?>,  <?php echo $OrderOther["address"]["3"]; ?>, <?php echo $OrderOther["address"]["4"]; ?><br/>
                                                        <?php echo $OrderOther["address"]["5"]; ?><br/>
                        							</address>				
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
            <div class="col-sm-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <i class="fa"></i>Status
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="form-group"><br>
                            <div class="col-sm-12">
                                <select class="form-control" name='status'>
                                    <option value="<?php if($Trans['status'] == ""){ echo "1"; } ?>">Select Below</option>
                                    <option value="0" <?php if($Trans['status'] == "0"){ echo "selected='selected'"; } ?>>Awaiting Payment</option>
                                    <option value="1" <?php if($Trans['status'] == "1"){ echo "selected='selected'"; } ?>>Processing Order</option>
                                    <option value="2" <?php if($Trans['status'] == "2"){ echo "selected='selected'"; } ?>>Preparing Shipment</option>
                                    <option value="3" <?php if($Trans['status'] == "3"){ echo "selected='selected'"; } ?>>Shipped</option>
                                    <option value="4" <?php if($Trans['status'] == "4"){ echo "selected='selected'"; } ?>>Delivered</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <center>
                            <div class="panel-body">
                                <button class="btn btn-primary" type="submit" formmethod="post" onclick="formSubmitter('cwjqueryform', 'cwmessage')">Publish</button>
                                <button class="btn btn-default" type="reset">Undo</button>
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
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOneq">
                                <i class="fa"></i>Tracking Info
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOneq" class="panel-collapse collapse in">
                        <div class="form-group">Carrier:
                            <input type="text" name='carrier' placeholder="Enter Shipping Carrier" class="form-control" value='<?php echo $Trans['other']["carrier"]; ?>'>
                        </div>
                        <div class="form-group">Tracking Number:
                            <textarea name='tracking' cols="38%"><?php echo $Trans['other']['tracking']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
        <input type="hidden" name="id" value="<?php echo $Trans['id']; ?>">
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
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/select2.min.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/icheck.min.js"></script>


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



<script type="text/javascript" src="/admin/theme/cwadmin/header/js/summernote.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-wysihtml5.js"></script>