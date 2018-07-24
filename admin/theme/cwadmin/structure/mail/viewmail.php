<?php 
include("$THEME/extras/inboxside.php");
$MessageId = $_GET["type"];
$MessageId = OtarDecrypt($key,$MessageId);
$query = "SELECT * FROM messages WHERE id='$MessageId' AND webid='$WebId'";
$result = mysqli_query($CwDb,$query);
$row = mysqli_fetch_assoc($result);
$Message = CwOrganize($row,$Array);
if($Message["admin"] == "1"){
    if($UserSiteAccess['adminmessages'] == "1"){
        $GrantAccess = "1";
    }else{
        $GrantAccess = "0";
    }
}else{
    $GrantAccess = "1";
}
if($GrantAccess == "1"){
?>
        	<div class="container-fluid" id="pcont">
                <div class="message">
                    <div class="head">
                        <h3><?php echo $Message["name"]; ?>
                            <span>
                                <a href="/admin/Inbox"><i class="fa fa-inbox"></i></a>
                                <a href="/admin/Messages/Reply/<?php echo $_GET["type"]; ?>"><i class="fa fa-reply"></i></a>
                                <?php if($Message['trash'] == "0"){ ?>
                                <a href="/Process/Delete/Mail-Delete/<?php echo OtarEncrypt($key,$Message[id]); ?>"><i class="fa fa-trash"></i></a>
                                <?php }else{ ?>
                                <a href="/Process/Delete/Mail-Restore/<?php echo OtarEncrypt($key,$Message[id]); ?>"><i class="fa fa-recycle"></i></a>
                                <?php } ?>
                            </span>
                        </h3>
                        <h4>
                            <?php echo $Message["subject"]; ?>
                            <span>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <?php echo date("M D, Y", $Message["date"]); ?> <b><?php echo date("g:h A", $Message["date"]); ?></b>
                            </span>
                        </h4>
                    </div>
                    <div class="mail">
                        <?php echo $Message["message"]; ?>
                    </div>
                </div>
        	</div> 
        </div>
    </div> 
</div>
<?php }else{
    $HideSide = "1";
    include("mail.php");
} ?>