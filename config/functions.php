<?php


class session { 
    // session-lifetime 
    var $lifeTime; 
    // mysql-handle 
    var $dbHandle; 
    function open($savePath, $sessName) { 
       // get session-lifetime 
       $this->lifeTime = get_cfg_var("session.gc_maxlifetime"); 
       // open database-connection 
       $dbHandle = @mysql_connect("localhost","parallel_coldweb","Lo8rHu}_dCGc"); 
       $dbSel = @mysql_select_db("parallel_coldweb",$dbHandle); 
       // return success 
       if(!$dbHandle || !$dbSel) 
           return false; 
       $this->dbHandle = $dbHandle; 
       return true; 
    } 
    function close() { 
        $this->gc(ini_get('session.gc_maxlifetime')); 
        // close database-connection 
        return @mysql_close($this->dbHandle); 
    } 
    function read($sessID) { 
        // fetch session-data 
        $res = mysql_query("SELECT session_data AS d FROM ws_sessions 
                            WHERE session_id = '$sessID' 
                            AND session_expires > ".time(),$this->dbHandle); 
        // return data or an empty string at failure 
        if($row = mysql_fetch_assoc($res)) 
            return $row['d']; 
        return ""; 
    } 
    function write($sessID,$sessData) { 
        // new session-expire-time 
        $newExp = time() + $this->lifeTime; 
        // is a session with this id in the database? 
        $res = mysql_query("SELECT * FROM ws_sessions 
                            WHERE session_id = '$sessID'",$this->dbHandle); 
        // if yes, 
        if(mysql_num_rows($res)) { 
            // ...update session-data 
            mysql_query("UPDATE ws_sessions 
                         SET session_expires = '$newExp', 
                         session_data = '$sessData' 
                         WHERE session_id = '$sessID'",$this->dbHandle); 
            // if something happened, return true 
            if(mysql_affected_rows($this->dbHandle)) 
                return true; 
        } 
        // if no session-data was found, 
        else { 
            // create a new row 
            mysql_query("INSERT INTO ws_sessions ( 
                         session_id, 
                         session_expires, 
                         session_data) 
                         VALUES( 
                         '$sessID', 
                         '$newExp', 
                         '$sessData')",$this->dbHandle); 
            // if row was created, return true 
            if(mysql_affected_rows($this->dbHandle)) 
                return true; 
        } 
        // an unknown error occured 
        return false; 
    } 
    function destroy($sessID) { 
        // delete session-data 
        mysql_query("DELETE FROM ws_sessions WHERE session_id = '$sessID'",$this->dbHandle); 
        // if session was deleted, return true, 
        if(mysql_affected_rows($this->dbHandle)) 
            return true; 
        // ...else return false 
        return false; 
    } 
    function gc($sessMaxLifeTime) { 
        // delete old sessions 
        mysql_query("DELETE FROM ws_sessions WHERE session_expires < ".time(),$this->dbHandle); 
        // return affected rows 
        return mysql_affected_rows($this->dbHandle); 
    } 
} 






function Cw_Ads($width,$height,$Location,$Array){
    #$Session_Id = $_SESSION['sessionid'];
    #$TrackerPage = $_SESSION['trackerpage'];
    $Website_Id = $Array['websiteid'];
    $Website = WebsiteUrlAuth();
	if($Array['cwadsextrainfo'] == "1"){
		if($Array['cwadsextrainfolocation'] == $Location){
			$Extra = "1";
			$Other['cwadsbg'] = $Array['cwadsbg'];
			$Other['cwadsraw'] = $Array['cwadsraw'];
			$Other = serialize($Other);
		}
	}

    if($Cw_Ads_Remote == "1"){
        $body ="?location=$Location&width=$width&height=$height&user=$Website_Id&session=$Session_Id&url=$TrackerPage&website=$Website&extra=$Extra&other=$Other";
        $url = 'http://www.pblast.in/ads.php';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, '3');
        $content = trim(curl_exec($ch));
        $content_array = trim(curl_exec($ch));
        curl_close($ch);
	if($Extra == "1"){
            if($Array['cwadsraw'] == "1"){
	        echo $content;
	    }else{
		$content = unserialize($content);
		$query = "SELECT * FROM cw_ads WHERE id='$content[id]'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$Other = unserialize($row['other']);
		$querY = "SELECT * FROM images WHERE album='$row[id]' and gallery='ads' AND trash='0' ORDER BY list";
		$resulT = mysql_query($querY) or die(mysql_error());
		while($roW = mysql_fetch_array($resulT)){
	            $Count = $Count + 1;
		    $Images["$Count"] = $roW;
		}
		if($Other['usetitle'] == "1"){
		    $content['name'] = $content['name'];
		}else{
		    $content['name'] = "";
		}
		$content['images'] = $Images;
		return $content;
	   }
	}else{
	   echo $content;
	}
    }else{
        include("api/cwads/fetch.php");
        return $Ads_Extra;
        
    }
}

function TotalVisitors(){
    $query = "SELECT ipaddress, COUNT(ipaddress) FROM tracker";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row['COUNT(ipaddress)'];
    $row['1'] = $row['1'] + "1231378";
    echo number_format("$row[1]");
}

function MonthlyVisitors(){
    $Date = date("m.y");
    $query = "SELECT ipaddress, COUNT(ipaddress) FROM tracker WHERE date3='$Date'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row['COUNT(ipaddress)'];
    echo number_format("$row[1]");
}

function TodayVisitors(){
    $Date = date("m-d-y");
    $query = "SELECT ipaddress, COUNT(ipaddress) FROM tracker WHERE date2='$Date'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row['COUNT(ipaddress)'];
    echo number_format("$row[1]");
}

function TotalCountry(){
    $query = "SELECT ipaddress, COUNT(ipaddress) FROM tracker GROUP BY country";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row['COUNT(country)'];
    echo number_format("$row[1]");
}

function PostsCount(){
    $query = "SELECT type, COUNT(id) FROM articles WHERE type='post' AND trash='0'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row['COUNT(country)'];
    echo number_format("$row[1]");
}

function RandomCode($Amount){
    $codelenght = $Amount;
    while($newcode_length < $codelenght) {
        $x=1;
        $y=3;
        $part = rand($x,$y);
        if($part==1){$a=48;$b=57;}  // Numbers
        if($part==2){$a=65;$b=90;}  // UpperCase
        if($part==3){$a=97;$b=122;} // LowerCase
        $code_part=chr(rand($a,$b));
        $newcode_length = $newcode_length + 1;
        $newcode = $newcode.$code_part;
    } return $newcode; 
}
    
function CwCategory($Article){
    $query = "SELECT * FROM articles WHERE id='$Article[category]' AND active='1' AND trash='0'"; 
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = PbUnSerial($row);
return $row; 
}
    
function Product_Ad($width, $height){
    $Session_Id = $_SESSION['sessionid'];
    $TrackerPage = $_SESSION['trackerpage'];
    $Website_Id = $_SESSION['websiteid'];
    $body ="?type=id";
    $url = 'http://www.pblast.in/prodads.php';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, '3');
    $content_Id = trim(curl_exec($ch));
    curl_close($ch);
    $body ="?id=$content_Id&img=1";
    $url = 'http://www.pblast.in/prodads.php';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, '3');
    $content_Img = trim(curl_exec($ch));
    curl_close($ch);
    $body ="?id=$content_Id&url=1";
    $url = 'http://www.pblast.in/prodads.php';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, '3');
    $content_Url = trim(curl_exec($ch));
    curl_close($ch);
    echo "<img src='$content_Img' height='$height' width='$width' alt='' /><a right:    25px; bottom:15px; class='readmore' href='$content_Url'>Shop Now</a>";
    }

function PbEncrypt($key, $Value){
    $Encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $Value    , MCRYPT_MODE_CBC, md5(md5($key))));
    return $Encrypted; }

function PbDecrypt($key, $Value){
    $Decrypted =  rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode    ($Value), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $Decrypted; }
    
function curPageURL() {
    $pageURL = 'http';
    if($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].    $_SERVER    ["REQUEST_URI"];
    }else{
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
return $pageURL;
}

function Website_Domain(){
    $Website_Ur = curPageURL();
    $str = "$Website_Ur";
    $middle = "^";
    $half = (int) ( (strlen($str) / 2) ); // cast to int incase str length is odd
    $left = substr($str, 0, $half);
    $right = substr($str, $half);
    $Website_Url_Auth = $left.$right;
    preg_match("/^(http:\/\/)?([^\/]+)/i", 
    $Website_Ur, $domain_only); 
    $Website_Url_Auth = $domain_only[2]; 
    $findme   = 'www.';
    $pos = strpos($Website_Url_Auth, $findme);
    if ($pos === false) {
        $Website_Url_Auth = $Website_Url_Auth;
    } else {
    $Website_Url_Auth = substr("$Website_Url_Auth", 4); }
    return $Website_Url_Auth;
}

function WebsiteUrlAuth(){
    $Website_Url_Auth = $_SERVER["SERVER_NAME"];
    $findme   = 'www.';
    $pos = strpos($_SERVER[SERVER_NAME], $findme);
    if ($pos === false) { $Website_Url_Auth = $Website_Url_Auth; }else { 
        $Website_Url_Auth = substr("$Website_Url_Auth", 4); }
    return $Website_Url_Auth; }

function SiteOffline($Array){ 
    $SiteStatus = $Array['sitestatus']; ?>
    <html><head><title>Website Offline</title>
    <style type="text/css">
    html {overflow: auto;}
    html, body, div, iframe {margin: 0px; padding: 0px; height: 100%; border: none;} 
    iframe {display: block; width: 100%; border: none; overflow-y: auto; overflow-x: hidden;} 
    </style></head><body>
    <iframe id="tree" name="tree" src="http://www.pblast.in/offline/?id=<?php echo $SiteStatus[websiteid]; ?>&blockie=<?php echo $SiteStatus[blockie]; ?>&noip=<?php echo $SiteStatus[noip]; ?>" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="100%" scrolling="auto"></iframe>
    <?php }

function OtarDecrypt($key, $Otar){
    $Otar = str_replace("))))==((((", "+", "$Otar");
    $Otar = str_replace("((=))", "/", "$Otar");
    $Otar = PbDecrypt($key, $Otar);
    $Otar = unserialize($Otar);
    return $Otar;
    }

function OtarEncrypt($key, $Otar){
    $Otar = serialize($Otar);
    $Otar = PbEncrypt($key, $Otar);
    $Otar = str_replace("+", "))))==((((", "$Otar");
    $Otar = str_replace("/", "((=))", "$Otar");
    return $Otar;
    }

function Pulltheme($ThemePath,$ThemeAdmin){
    $ThemePath = $ThemePath . $name[0];
    $results = scandir($ThemePath);
    foreach ($results as $result) {
        if ($result === '.' or $result === '..') continue;
            if (is_dir($ThemePath . '/' . $result)) {
                include("$ThemePath/$result/settings.php");
                $THEMESTRUCTURE['category'] = $ThemeCategoryStructure;
                $THEMESTRUCTURE['page'] = $ThemePageStructure;
                $THEMESTRUCTURE['post'] = $ThemePostStructure;
                $ThemeArray[structure] = $THEMESTRUCTURE;
                if($TEMPLATEADMINTHEME == $ThemeAdmin){
                    if($TEMPLATENAME == ""){ }else{
                        $TEMPLATENAME = Array($result, $TEMPLATENAME);
                        $ThemeArray['name'] = $TEMPLATENAME;
                        $TEMPLATENAME = "";
                    }
                }
        }
    }
    return $ThemeArray;
}

function PullPageInfo($Array){
    $Url = $Array['urlinfo']['type'];
    $Id = OtarDecrypt($key,$Url);
    $qUEry = "SELECT * FROM page_template WHERE id='$Id' AND active='1' AND trash='0'"; 
    $reSUlt = mysql_query($qUEry) or die(mysql_error());
    $row = mysql_fetch_array($reSUlt);
    $UrlUrl = $row['url'];
    $UrlType = $row['urltype'];
    $UrlId = $row['urlid'];
    $End = $row['end'];
    $Template = $row['template'];
    if($row['active'] == ""){
        $row['active'] = "0";
    }
    $query = "SELECT * FROM page_settings WHERE url='$UrlUrl' AND urltype='$UrlType' AND end='$End' AND urlid='$UrlId'"; 
    $result = mysql_query($query) or die(mysql_error());
    $RoW = mysql_fetch_array($result);
    $row['pagesettings'] = $RoW;
    $qUery = "SELECT * FROM page_structure WHERE url='$UrlUrl' AND urltype='$UrlType' AND end='$End' AND urlid='$UrlId' AND template='$Template'"; 
    $rEsult = mysql_query($qUery) or die(mysql_error());
    $rOw = mysql_fetch_array($rEsult);
    $Article = $rOw[article];
    $row['pagestructure'] = $rOw;
    $qUeRY = "SELECT * FROM page_dynamic WHERE url='$UrlUrl' AND urltype='$UrlType' AND end='$End' AND urlid='$UrlId' AND theme='$Template'"; 
    $rESUlt = mysql_query($qUeRY) or die(mysql_error());
    $ROW = mysql_fetch_array($rESUlt);
    $row['pagedynamic'] = $ROW;
    $QUeRy = "SELECT * FROM page_function WHERE url='$UrlUrl' AND type='$UrlType' AND end='$End' AND urlid='$UrlId' AND template='$Template' AND dynamic='0'"; 
    $rEsULT = mysql_query($QUeRy) or die(mysql_error());
    $rOL = mysql_fetch_array($rEsULT);
    $row['pagefunction'] = $rOL;
    $qUerY = "SELECT * FROM articles WHERE id='$Article'";
    $rEsulT = mysql_query($qUerY) or die(mysql_error());
    $rOW = mysql_fetch_array($rEsulT);
    $row['pagearticle'] = $rOW;
    return $row;
}

function SessionUser($Array){
    $AccountId = $_SESSION['accountid'];
    $Log_Session = $_SESSION['sessionid'];
    $Session_Generate = $_SESSION['sessiongenerate'];
    if($AccountId == ""){
        $User = 0;
    }else{
        $User = 1;
        $query = "SELECT * FROM login_session WHERE userid='$AccountId' AND active='1' AND session='$Log_Session' AND session_generate='$Session_Generate'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $Find_Account = $row['userid'];
        if($Find_Account == ""){
            $User = 0;
        }else{
            $User = 1;
        }
    }
    return $User;
}

function youtube_id_last_chance($link) {
     $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
     if(empty($video_id[1]))
         $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..
     $video_id = explode("&", $video_id[1]); // Deleting any other params
     $video_id = $video_id['0'];
     return $video_id;
}

function Hosting_Size($Array){
    $file_directory = './';
    $output = exec('du -sk ' . $file_directory);
    $filesize = trim(str_replace($file_directory, '', $output)) * 1024;
    $filesize = $filesize / "1048576";
}

function ReportError($Array,$Error){
}

function CommaRemoval($Content){
    $Content = str_replace("'", "--", "$Content");
    $Content = str_replace('"', '--', "$Content");
    $Content = str_replace("''", "--", "$Content");
    $Content =  mysql_real_escape_string($Content);
return $Content;  
}

function CwImgFormat($Content){
    $Content = str_replace(" ", "%20", "$Content");
return $Content;  
}

function CharacterRemoval($Content){
    $Content = str_replace(",", "-", "$Content");
    $Content = str_replace("|", "-", "$Content");
    $Content = str_replace(" ", "-", "$Content");
    $Content = str_replace("'", "-", "$Content");
    $Content = str_replace('"', '-', "$Content");
    $Content = str_replace("&", "-", "$Content");
    $Content = str_replace("#", "-", "$Content");
    $Content = str_replace("@", "-", "$Content");    
    $Content = str_replace("--", "-", "$Content");
    $Content = str_replace("---", "-", "$Content");
    $Content = str_replace("----", "-", "$Content");
    $Content = str_replace("-----", "-", "$Content");
    $Content = str_replace("------", "-", "$Content");
    $Content = str_replace("/", "-", "$Content");
    $Content = str_replace("--", "-", "$Content");
    $Content =  mysql_real_escape_string($Content);
return $Content;  
}

function PbMaxCount($Content, $Max){
    $Count = strlen($Content);
    if($Count <= $Max){
        $Count = $Count;
    }else{
        $Count = $Max;
        $Count = $Count - 3;
    }
    $charset = 'UTF-8';
    if(mb_strlen($Content, $charset) > $Count){
        $Content = mb_substr($Content, 0, $Count, $charset) . '...';
    } 
    return $Content;
}


function InstagramLatest($Array,$count){
    $InstagramInfo = $Array['InstagramInfo'];
    $access_token = $InstagramInfo['access_token'];
    $display_size = $InstagramInfo['size'];
    function fetch_data($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    if($count == ""){
        $count = 5;
    }
    if($access_token == ""){
        $access_token = $Pb_Access_Token['instagram'];
    }
    if($display_size == ""){
        $display_size = "thumbnail"; // you can choose between "low_resolution", "thumbnail" and "standard_resolution"
    }
    $result = fetch_data("https://api.instagram.com/v1/users/self/media/recent?count={$count}&access_token={$access_token}");
    $result = json_decode($result);
    $Count = "0"; 
    foreach ($result->data as $photo) {
        $img = $photo->images->{$display_size};
        $InstaPhoto[$Count]['src'] = $img->url;
        $InstaPhoto[$Count]['url'] = $photo->link;
        $Count = $Count + 1;
    }
return $InstaPhoto;
}

function PbSerialCheck($Serial){
    $Info = $Serial;
    $data = @unserialize($Serial);
    if($data !== false || $Serial === 'b:0;'){
        $Return = unserialize($Info);
    }else{
        $Return = $Info;
    }
return $Return;
}

function PbUnSerial($Content){
    if($Content != ""){
        foreach($Content as $key => $Value){
            $Value = PbSerialCheck($Value);
            $Content["$key"] = $Value;
        }
    }
return $Content;
}

function isset_get($array, $key, $default = null) {
    return isset($array["$key"]) ? $array["$key"] : $default;
}

// PULLS INFORMATION FOR GALLERY IMAGES \\
/**
 * A class that takes the pain out of the $_FILES array
 * @author Christiaan Baartse <christiaan@baartse.nl>
 */
class UploadedFiles extends ArrayObject
{
    public function current() {
        return $this->_normalize(parent::current());
    }
    public function offsetGet($offset) {
        return $this->_normalize(parent::offsetGet($offset));
    }
    protected function _normalize($entry) {
        if(isset($entry['name']) && is_array($entry['name'])) {
            $files = array();
            foreach($entry['name'] as $k => $name) {
                $files[$k] = array(
                    'name' => $name,
                    'tmp_name' => $entry['tmp_name'][$k],
                    'size' => $entry['size'][$k],
                    'type' => $entry['type'][$k],
                    'error' => $entry['error'][$k]
                );
            }
            return new self($files);
        }
        return $entry;
    }
}

function CwLimitBrowser($Array){
    $Array["browser"]["limit"] = "1";
    $Array["browser"]["types"]["Internet Explorer"] = "1";
    #$Array["browser"]["current"] = "Internet Explorer";
    $ua=getBrowser();
    $Browser_User_Agent = $ua['userAgent'];
    $Browser_Version = $ua['version'];
    $Browser_Platform = $ua['platform'];
    $Browser_Pattern = $ua['pattern'];
    $BrowserLimit = $Array["browser"]["limit"];
    $Browser_Name = $ua['name'];
    $Browser_Type = $Array["browser"]["types"];
    if($BrowserLimit == "1"){
        if($Browser_Type[$Browser_Name] == "1"){
            $View_site = "0";
            $Block_Browser = "1";
            $Browser_Block = $Browser_Name;
            $OfflineError = array();
            $OfflineError[type] = "browser"; 
            $OfflineError[name] = "$Browser_Name";
            $OfflineError[message] = "We are re-designing our website to adjust to $Browser_Name, Please access our website from another web browser. I.e. Chrome, Safari, Opera, etc";
        }else{
            $View_site = "1";
            $Block_Browser = "0";
            $Browser_Block = "";
        }
    }
$BrowserStatus = array();
$BrowserStatus['View_site'] = $View_site;
$BrowserStatus['status'] = $OfflineError;
return $BrowserStatus;
}

function CwCartTotal($Array){
    $Site_Ecommerce = $Array['shopping']['active'];
    $Cart_Session = $_SESSION['COOKIEPHPSESSID'];
    if($Site_Ecommerce == 1){
        $query = "SELECT * FROM cw_cart WHERE active='1' AND trash='0' AND session='$Cart_Session'"; 
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $Cart_Status = $row['id'];
        if($Cart_Status == ""){
            $Shopping_Cart_Empty = 1;
        }else{
            $Shopping_Cart_Empty = 0;
        }
        $Default_Shipping_Rate = "15";
        $Shopping['cartempty'] = $Shopping_Cart_Empty;
        $Shopping['cartsession'] = $_SESSION['COOKIEPHPSESSID'];
        if($Shipping_Rate == ""){
            $Shopping['shippingrate'] = $Default_Shipping_Rate;
        }else{
            $Shopping['shippingrate'] = $Shipping_Rate;
        }
    }
return $Shopping;
}

function CwMobileDetect($Array){
    $ipadk = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    if($iphone || $android || $palmpre || $ipod || $ipad || $berry == true){
        $Mobile['phone'] = 1;
        $Mobile['selected'] = 1;
    }else{
        $Mobile['phone'] = 0;
    }
    if($Mobile['selected'] == ""){ 
        $Mobile['selected'] = 0; 
    }
    $Select_View = $_SESSION['mobileview'];
    if($Select_View == desktop){
        $Mobile['phone'] = 0;
    }
    return $Mobile;
}

function getBrowser(){
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    #$bname = 'Unknown';
    #$platform = 'Unknown';
    #$version= "";
//First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
// Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }
// finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
// see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
//we will have two since we are not using 'other' argument yet
//see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version']['0'];
        }
        else {
            $version= $matches['version']['1'];
        }
    }
    else {
        $version= $matches['version']['0'];
    }
// check if we have a number
    if ($version==null || $version=="") {$version="?";}
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}

function compress_image($source_url, $destination_url, $quality) {
    $info = getimagesize($source_url);
    if($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source_url);
        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source_url);
            elseif ($info['mime'] == 'image/png')
                $image = imagecreatefrompng($source_url);
                imagejpeg($image, $destination_url, $quality);
return $destination_url;
}

function CwGallery($Array,$files){
    $Article_Id = $Array['galleryupload']['id'];
    $Rand = rand(999, 9999999999);
    if($files['gallery']){
        foreach($files['gallery'] as $file){
            $file['tmp_name'] = str_replace(" ", "", $file['tmp_name']);
            $file['name'] = str_replace(" ", "", $file['name']);
            if($file["error"] > 0) {
                $error = $file["error"];
            }else{
                if(($file["type"] == "image/gif") ||
		($file["type"] == "image/jpeg") ||
	        ($file["type"] == "image/png") ||
	        ($file["type"] == "image/jpg")){
                    $Gallery_Img = "./uploads/images/$Rand" . $file['name'];
                    $Images = $Array['siteinfo']['domain'] . "/uploads/images/$Rand" . $file['name'];
                    if($file['name'] != ""){
                        $filename = compress_image($file['tmp_name'], $Gallery_Img, 90);
                        $resizedFile = $Gallery_Img;
                        $siz = getimagesize($resizedFile);
                        list($width, $height) = getimagesize($resizedFile);
                        if($width > $height){
                            $filename = $resizedFile;
                            $width = "1275";
                            $height = "825";
                            list($width_orig, $height_orig) = getimagesize($filename);
                            $ratio_orig = $width_orig/$height_orig;
                            if ($width/$height > $ratio_orig){
                               $width = $height*$ratio_orig;
                            }else{
                               $height = $width/$ratio_orig;
                            }
                            $image_p = imagecreatetruecolor($width,$height);
                            $image = imagecreatefromjpeg($filename);
                            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                            imagejpeg($image_p, $filename, 100);
                        }else{
                            $filename = $resizedFile;
                            $width = "660";
                            $height = "860";
                            list($width_orig, $height_orig) = getimagesize($filename);
                            $ratio_orig = $width_orig/$height_orig;
                            if ($width/$height > $ratio_orig){
                               $width = $height*$ratio_orig;
                            }else{
                               $height = $width/$ratio_orig;
                            }
                            $image_p = imagecreatetruecolor($width,$height);
                            $image = imagecreatefromjpeg($filename);
                            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                            imagejpeg($image_p, $filename, 100);
                        }
                        mysql_query("INSERT INTO images (img, album) VALUES('$Images', '$Article_Id' ) ") or die(mysql_error());
                    }
                }
            }
        }
    }
}

function CwFileUpload($Array,$files){
    $Article_Id = $Array['galleryupload']['id'];
    if($files['file']){
        foreach($files['file'] as $file){
            $file['tmp_name'] = str_replace(" ", "", $file['tmp_name']);
            $file['name'] = str_replace(" ", "", $file['name']);
            if($file['error'] > 0) {
                $error = $file['error'];
    	    }else{
                if(($file['type'] == "image/gif") || 
		($file['type'] == "image/jpeg") || 
	        ($file['type'] == "image/png") || 
	        ($file['type'] == "image/jpg")){
                    $Gallery_Img = "./uploads/images/$Rand" . $file['name'];
                    $Images = $Array['siteinfo']['domain'] . "/uploads/images/$Rand" . $file['name'];
                    if($file['name'] == ""){ }else{ 
                        $filename = compress_image($file['tmp_name'], $Gallery_Img, 90);
                        mysql_query("INSERT INTO images (img, album) VALUES('$Images', '$Article_Id' ) ") or die(mysql_error());
                    }
                }
            }
        }
    }
}

function CwProfilePic($Array,$files,$Rand){
    $Article_Img = $Array['profilepic']['img'];
    if($files['profilepic']){
        foreach($files['profilepic'] as $file){
            $file['tmp_name'] = str_replace(" ", "", $file['tmp_name']);
            $file['name'] = str_replace(" ", "", $file['name']);
            if($file["error"] > 0){
                $error = $file["error"];
    	    }else{
                $FileType = $file["type"];
                $file["type"] = strtolower($FileType);
					$file['name'] = $resizedFile = str_replace(" ","_",$file['name']);
					$file['tmp_name'] = $resizedFile = str_replace(" ","_",$file['tmp_name']);
                if(($file["type"] == "image/gif") || 
				($file["type"] == "image/jpeg") || 
				($file["type"] == "image/png") || 
				($file["type"] == "image/jpg")){
                    $Gallery_Img = "./uploads/images/$Rand" . $file['name'];
                    if($file['name'] == ""){ 
                        $Article_Img = $Article_Img;
                    }else{
                        $Article_Img = $Array['siteinfo']['domain'] . "/uploads/images/$Rand" . $file['name'];
                        $filename = compress_image($file['tmp_name'], $Gallery_Img, 90);
                        $Img["loc"] = "uploads/images/$Rand" . $file['name'];
                    }
                }
            }
        }
    }
    $Img["file"] = $Article_Img;
return $Img;
}

function CwMediaFile($Array,$files,$Rand){
    $Article_Code = $Array['mediafile']['code'];
    if($files['mediafile']){
        foreach($files['mediafile'] as $file){
                        $file['name'] = str_replace(" ", "", $file['name']);
			$file['name'] = $resizedFile = str_replace(" ","_",$file['name']);
			$file['tmp_name'] = $resizedFile = str_replace(" ","_",$file['tmp_name']);
            $Media = "/uploads/media/$Rand" . $file['name'];
            if($file['name'] == ""){
                $Article_Code = $Article_Code;
            }else{
                $Article_Code = $Array['siteinfo']['domain'] . "/uploads/media/$Rand" . $file['name'];
            }
            move_uploaded_file($file['tmp_name'], $Media);
        }
    }
return $Article_Code;
}


function smart_resize_image($file,
                              $string             = null,
                              $width              = 0, 
                              $height             = 0, 
                              $proportional       = false, 
                              $output             = 'file', 
                              $delete_original    = true, 
                              $use_linux_commands = false,
  							  $quality = 100
  		 ) {
      
    if ( $height <= 0 && $width <= 0 ) return false;
    if ( $file === null && $string === null ) return false;
    # Setting defaults and meta
    $info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;
	$cropHeight = $cropWidth = 0;
    # Calculating proportionality
    if ($proportional) {
      if      ($width  == 0)  $factor = $height/$height_old;
      elseif  ($height == 0)  $factor = $width/$width_old;
      else                    $factor = min( $width / $width_old, $height / $height_old );
      $final_width  = round( $width_old * $factor );
      $final_height = round( $height_old * $factor );
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
	  $widthX = $width_old / $width;
	  $heightX = $height_old / $height;
	  $x = min($widthX, $heightX);
          // MY CORRECTIONS \\
          if($width_old == $height_old){
              $height_old = $height_old / 2;
          }
          if($width_old > $height_old){
          }
          if($width_old < $height_old){
              $height_old = $height_old / 2;
          }
          // END CORRECTIONS \\
	  $cropWidth = ($width_old - $width * $x) / 2;
	  $cropHeight = ($height_old - $height * $x) / 2;
    }
    # Loading image to memory according to type
    switch ( $info[2] ) {
      case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
      case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
      case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
      default: return false;
    }
    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info['2'] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $transparency = imagecolortransparent($image);
      $palletsize = imagecolorstotal($image);
      if ($transparency >= 0 && $transparency < $palletsize) {
        $transparent_color  = imagecolorsforindex($image, $transparency);
        $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
      }
      elseif ($info['2'] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
    # Taking care of original, if needed
    if ( $delete_original ) {
      if ( $use_linux_commands ) exec('rm '.$file);
      else @unlink($file);
    }
    # Preparing a method of providing result
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    # Writing image according to type to the output destination and image quality
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
      case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
      case IMAGETYPE_PNG:
        $quality = 9 - (int)((0.9*$quality)/10.0);
        imagepng($image_resized, $output, $quality);
        break;
      default: return false;
    }
    return true;
}

function Cw_Img_Resize($Array,$file,$Sizes,$Name){
    foreach($Sizes as $key => $value){
        $New_Img_Count = $New_Img_Count + 1;
        $resizedFile = "uploads/images/" . $Name . "-" . $value . ".png";
        $Size = $pieces = explode("-", $value);
        $Width = $Size["0"];
        $Height = $Size["1"];
		#$file['name'] = $resizedFile = str_replace(" ","_",$file['name']);
		#$file['tmp_name'] = $resizedFile = str_replace(" ","_",$file['tmp_name']);
        smart_resize_image($file , null, $Width, $Height, false , $resizedFile , false , false ,100);
        $File_Name = $Array["siteinfo"]["domain"] . "/" . $resizedFile;
        $Img["$New_Img_Count"] = $File_Name;
    }
return $Img;
}

function array_delete( $value, $array){
    $array = array_diff( $array, $value );
    return $array;
}

function CwCheckFunctionType($Type,$Row){
    if($Type == "portfolio"){
        $FunctionUrl = "Portfolio";
    }
    if($Type == "article"){
        $FunctionUrl = $Row['url'];
    }
    if($Type == "audio"){
        $FunctionUrl = "CwAudio";
    }
    if($Type == "gallery"){
        $FunctionUrl = "CwGallery";
    }
    if($Type == "video"){
        $FunctionUrl = "CwCinema";
    }
    if($Type == "service"){
        $FunctionUrl = "Services";
    }
    if($Type == "other"){
        $FunctionUrl = "Other";
    }
return $FunctionUrl;
}

function Cw_Ecommerce_Default($Array,$Article){
    if($Article['content']['newprice'] == ""){
        $Article['content']['newprice'] = $Article['content']['prodprice'];
    }
return $Article;
}

function Cw_Ecommerce_Img($Article,$Img){
    if($Img == ""){
        $Img = $Article['content']['img'];
    }
echo $Img;
}

function Cw_Ecommerce_Attribute($Value){
    $query = "SELECT * FROM cwoptions WHERE id='$Value'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $Name = $row['name'];

return $Name;
}









    function getRealIp() {
       if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  //check ip from share internet
         $ip=$_SERVER['HTTP_CLIENT_IP'];
       } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
         $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
       } else {
         $ip=$_SERVER['REMOTE_ADDR'];
       }
       return $ip;
    }

    function writeLog($where) {
    
    	$ip = getRealIp(); // Get the IP from superglobal
    	$host = gethostbyaddr($ip);    // Try to locate the host of the attack
    	$date = date("d M Y");
    	
    	// create a logging message with php heredoc syntax
    	$logging = <<<LOG
    		\n
    		<< Start of Message >>
    		There was a hacking attempt on your form. \n 
    		Date of Attack: {$date}
    		IP-Adress: {$ip} \n
    		Host of Attacker: {$host}
    		Point of Attack: {$where}
    		<< End of Message >>
LOG;
// Awkward but LOG must be flush left
    
            // open log file
    		if($handle = fopen('hacklog.log', 'a')) {
    		
    			fputs($handle, $logging);  // write the Data to file
    			fclose($handle);           // close the file
    			
    		} else {  // if first method is not working, for example because of wrong file permissions, email the data
    		
    			$to = 'ADMIN@gmail.com';  
            	$subject = 'HACK ATTEMPT';
            	$header = 'From: ADMIN@gmail.com';
            	if (mail($to, $subject, $logging, $header)) {
            		echo "Sent notice to admin.";
            	}
    
    		}
    }

    function verifyFormToken($form) {
        
        // check if a session is started and a token is transmitted, if not return an error
    	if(!isset($_SESSION[$form.'_token'])) { 
    		return false;
        }
    	
    	// check if the form is sent with token in it
    	if(!isset($_POST['token'])) {
    		return false;
        }
    	
    	// compare the tokens against each other if they are still the same
    	if ($_SESSION[$form.'_token'] !== $_POST['token']) {
    		return false;
        }
    	
    	return true;
    }
    
    function generateFormToken($form) {
    
        // generate a token from an unique value, took from microtime, you can also use salt-values, other crypting methods...
    	$token = md5(uniqid(microtime(), true));  
    	
    	// Write the generated token to the session variable to check it against the hidden field when the form is sent
    	$_SESSION[$form.'_token'] = $token; 
    	
    	return $token;
    }




function CwFileCode($WebsiteId){
    $Rand = rand("1000", "9999");
    $Code = $WebsiteId . "-" . $Rand;
return $Code;
}



function Cw_Settings($Search){
    $Query = "SELECT * FROM cwoptions WHERE type='settings' AND name='$Search' AND trash='0'";
    $Result = mysql_query($Query) or die(mysql_error());
    $Row = mysql_fetch_array($Result);
return $Row;
}

function Cw_Update_Ad($Info,$Array){
// UPDATE THE ADVERTISEMENT INFORMATION ON PBLAST.IN \\
        $Domain = $Info['domain'];
	$Ad_Secret = $Array['pblast']['secret'];
	$Info['postid'] = $Info['id'];
	$Info['adtype'] = $Info['type'];
	$Info['adinfo'] = $Info['other'];
	$Info = OtarEncrypt($Ad_Secret,$Info);
	$Method['service'] = "advertisement";
	$Method['id'] = "";
	$Method['website'] = "";
	$Request['info'] = $Info;
	$Request['appid'] = $Array['pblast']['appid'];
	$Request['method'] = $Method;
	$Request['website'] = $Domain;
	$Request = OtarEncrypt($Array['pbaccess'],$Request);
	$body ="?request=$Request";
	$url = 'http://www.pblast.in/api/request.php';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url . $body);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, '3');
	$content = trim(curl_exec($ch));
	curl_close($ch);
	unset($content);
}


function Cw_Tweet($Array,$Cw_List){
    include_once('api/twitter/twitteroauth/twitteroauth.php');

    $twitter_customer_key           = 'lW17T4icJVJgLY4lLO6LfQ';
    $twitter_customer_secret        = 'GjFDMYKKQSpKEn3qaToXM0AdyNv9uBQx0dzxdQHo';
    $twitter_access_token           = "";
    $twitter_access_token_secret    = "";

    $Cw_UserName = "parallelmagz";

    $connection = new TwitterOAuth($twitter_customer_key, $twitter_customer_secret, $twitter_access_token, $twitter_access_token_secret);
    $my_tweets = $connection->get('statuses/user_timeline', array('screen_name' => "$Cw_UserName", 'count' => $Cw_List));

return $my_tweets;
}


function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function Cw_Tracker_Validate($Value){
    if(strpos($Value,'wof') !== false){
        $Validate = "0";
    }else if(strpos($Value,'png') !== false){
        $Validate = "0";
    }else if(strpos($Value,'jpg') !== false){
        $Validate = "0";
    }else if(strpos($Value,'ico') !== false){
        $Validate = "0";
    }else if(strpos($Value,'gif') !== false){
        $Validate = "0";
    }else if(strpos($Value,'ttf') !== false){
        $Validate = "0";
    }else if(strpos($Value,'js') !== false){
        $Validate = "0";
    }else if(strpos($Value,'css') !== false){
        $Validate = "0";
    }else if(strpos($Value,'csszz') !== false){
        $Validate = "0";
    }
    if($Validate != "0"){
        $Validate = "1";
    }
return $Validate;
}

?>