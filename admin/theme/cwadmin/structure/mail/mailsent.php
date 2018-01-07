<?php  include("$THEME/extras/inboxside.php"); ?>
                <div class="content">
                    <div class="mail-inbox">
                        <div class="head">
                            <h3> Sent Messages</h3>
                            <input type="text" class="form-control"  placeholder="Search mail..." />
                        </div>
                        <div class="filters">
                            <input id="check-all" type="checkbox" name="checkall" />
                            <span>Select All</span>
                            <div class="btn-group pull-right">
                            <button class="btn btn-sm btn-flat btn-default" type="button"><i class="fa fa-angle-left"></i></button> 
                            <button class="btn btn-sm btn-flat btn-default" type="button"><i class="fa fa-angle-right"></i></button> 
                        </div>
                        <div class="btn-group pull-right">
                            <button data-toggle="dropdown" class="btn btn-sm btn-flat btn-default dropdown-toggle" type="button">
                                Order by <span class="caret"></span>
                            </button>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#">Date</a></li>
                                <li><a href="#">From</a></li>
                                <li><a href="#">Subject</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Size</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mails">
<?php 
if($UserSiteAccess['adminmessages'] == "1"){
    $query = "SELECT * FROM messages WHERE admin='1' AND type='sent' AND trash='0' AND user='!$Current_Admin_Id' 
    OR  admin='0' AND type='sent'AND user='$Current_Admin_Id' AND trash='0' ORDER BY id DESC"; 
}else{
    $query = "SELECT * FROM messages WHERE admin='0' AND user='$Current_Admin_Id' AND type='sent' AND trash='0' ORDER BY id DESC"; 
}
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){ ?>
                        <div class="item">
                            <div>
                                <input type="checkbox" name="[<?php echo $row['id']; ?>]" />
                            </div>
                            <div>
                                <span class="date pull-right">
                                    <?php echo date("d-M-Y",$row['date']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="/Process/Delete/Mail-Delete/<?php echo OtarEncrypt($key,$row[id]); ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </span>
                                <a href="/admin/Inbox/<?php echo OtarEncrypt($key,$row["id"]); ?>">
                                    <h4 class="from"><?php echo $row['name']; ?></h4>
                                    <p class="msg"><?php echo $row['priority']; ?>- <?php echo $row['subject']; ?></p>
                                </a>
                            </div>
                        </div>
<?php } ?>
                    </div>
                </div>
            </div> 
    	</div>
	</div> 
</div>



<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.icheck/icheck.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      //initialize the javascript
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue checkbox',
        radioClass: 'icheckbox_square-blue'
      });
      
      $("#check-all").on('ifChanged',function(){
        var checkboxes = $(".mails").find(':checkbox');
        if($(this).is(':checked')) {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
      });

    });
</script>