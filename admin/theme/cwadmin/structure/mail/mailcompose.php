<?php
include("$THEME/extras/inboxside.php");
$MessageId = $_GET["id"];
$MessageId = OtarDecrypt($key,$MessageId);
$query = "SELECT * FROM messages WHERE id='$MessageId' AND trash='0' AND webid='$WebId'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$Message = CwOrganize($row,$Array);
if($Get_Type == "reply"){
    $Message["subject"] = "Re: " . $Message["subject"];
}
?>
	        <div class="container-fluid" id="pcont">
	            <form action="/Process/Inbox" method="POST">
                    <div class="message">
                        <div class="head">
                            <div class="subject">
                                <input type="text" placeholder="Enter Message Subject" name='subject' value="<?php echo $Message["subject"]; ?>">
                            </div>
                        </div>
                        <div class="to">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">To:</label>
                                <div class="col-sm-11">
                                    <input class="tags" type="text" name='email' value="<?php echo $Message["email"]; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="to cc">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">Cc:</label>
                                <div class="col-sm-11">
                                    <input class="tags" type="text" name="cc" value="" />
                                </div>
                            </div>
                        </div>
<?php
if($Get_Type != "reply"){
    if($UserSiteAccess['adminmessages'] == "1"){
?>                        
<hr><b>
Please select which account you plan on usign to send your email message.
</b>
                        <div class="to cc">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">Account: </label>
                                <div class="col-sm-11">
                                    <select class="form-control" name="reply">
                                        <option value="<?php echo $SiteInfo["other"]["email"]; ?>">Admin Account</option>
                                        <option value="<?php echo $CurrentUser["email"]; ?>" selected>MY Account</option>
                                    </select>
                                </div>
                            </div>
                        </div>
<?php }}else{ ?>
                        <input type='hidden' name='reply' value='<?php echo $CurrentUser["email"]; ?>'>
<?php } ?>
                        <div class="mail editor">
                            <textarea name='message' rows="10" class="ckeditor form-control">
<?php if($Message["id"] != ""){ ?>
                                <br><br><br>
                                <hr>
                                <blocquote>
                                Your Message: submitted on <b><?php echo date("M-D-Y / g:h A", $Message["date"]); ?></b><br><br>
                                <i><?php echo $Message['message']; ?></i>
                                </blocquote>
<?php } ?>
                            </textarea>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-envelope"></i> Send</button>
                                <button class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
                            </div>
                        </div>
                    </div>
                    
<?php 
if($Get_Type == "reply"){
    if($Message["admin"] == "1"){
?>
                    <input type='hidden' name='reply' value='<?php echo $SiteInfo["other"]["email"]; ?>'>
<?php }else{ ?>
                    <input type='hidden' name='reply' value='<?php echo $CurrentUser["email"]; ?>'>
<?php }} ?>
                    <input type='hidden' name='category' value='<?php echo $Mesage["id"]; ?>'>
                    <input type='hidden' name='user' value='<?php echo $Current_Admin_Id; ?>'>                    
                    <input type='hidden' name='name' value='<?php echo $Mesage["name"]; ?>'>                    
                </form>
	        </div> 
	    </div>
	</div> 
</div>





   

<script language="JavaScript">
<!--
function formSubmitter(formTag, messageTag){
  document.getElementById(messageTag).innerHTML = "Changes Saved.";
}
// -->
</script>


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
  
