<?php
function Advertisement($width, $height, $Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $Session_Id = $_SESSION['sessionid'];
    $TrackerPage = $_SESSION['trackerpage'];
    $Website_Id = $_SESSION['websiteid'];
    $body ="?width=$width&height=$height&user=$Website_Id&session=$Session_Id&url=$TrackerPage&website=";
    $url = 'http://www.pblast.in/ads.php';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, '3');
    $content = trim(curl_exec($ch));
    curl_close($ch);
    echo $content;
}

function TotalVisitors($Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $query = "SELECT ipaddress, COUNT(ipaddress) FROM tracker WHERE admin!='1' AND webid='$WebId'"; 
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row['COUNT(ipaddress)'];
    echo number_format("$row[1]");
}

function OrderTotal($Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $query = "SELECT id, COUNT(id) FROM trans WHERE active='1' AND trash='0' AND webid='$WebId'"; 
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row['COUNT(id)'];
    echo number_format("$row[1]");
}

function MonthlyVisitors($Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $Date = date("m.y");
    $query = "SELECT ipaddress, COUNT(ipaddress) FROM tracker WHERE date3='$Date' AND admin!='1' AND webid='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row['COUNT(ipaddress)'];
    echo number_format("$row[1]");
}

function TodayVisitors($Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $Date = date("m-d-y");
    $query = "SELECT ipaddress, COUNT(ipaddress) FROM tracker WHERE date2='$Date' AND admin!='1' AND webid='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row['COUNT(ipaddress)'];
    echo number_format("$row[1]");
}

function LiveVisitor($Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $query = "SELECT id, COUNT(id) FROM ws_sessions WHERE active='1' AND webid='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row['COUNT(id)'];
    echo number_format("$row[1]");
}

function TotalCountry($Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $query = "SELECT ipaddress, COUNT(ipaddress) FROM tracker GROUP BY country WHERE admin!='1' AND webid='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row['COUNT(country)'];
    echo number_format("$row[1]");
}

function PostsCount($Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $query = "SELECT type, COUNT(id) FROM articles WHERE type='post' AND trash='0' AND webid='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row['COUNT(country)'];
    echo number_format("$row[1]");
}

function RandomCode($Amount){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
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

function Category($Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $Article = $Array['dynamicarticle'];
    $query = "SELECT * FROM articles WHERE id='$Article[category]' AND active='1' AND trash='0' AND webid='$WebId'"; 
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    return $row; 
}

function Product_Ad($width, $height, $Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
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
    return $Encrypted;
}
function PbDecrypt($key, $Value){
    $Decrypted =  rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode    ($Value), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $Decrypted;
}
function curPageURL(){
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
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
    if($pos === false){
        $Website_Url_Auth = $Website_Url_Auth;
    }else{ 
        $Website_Url_Auth = substr("$Website_Url_Auth", 4);
    }
return $Website_Url_Auth;
}

function SiteOffline($Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $SiteStatus = $Array['sitestatus']; ?>
    <html><head><title>Website Offline</title>
    <style type="text/css">
    html {overflow: auto;}
    html, body, div, iframe {margin: 0px; padding: 0px; height: 100%; border: none;} 
    iframe {display: block; width: 100%; border: none; overflow-y: auto; overflow-x: hidden;} 
    </style></head><body>
    <iframe id="tree" name="tree" src="http://www.pblast.in/offline/?id=<?php echo $SiteStatus[websiteid]; ?>&blockie=<?php echo $SiteStatus[blockie]; ?>&noip=<?php echo $SiteStatus[noip]; ?>" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="100%" scrolling="auto"></iframe>
    <?php
}

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
    if($ThemePath == ""){
        $ThemePath = "../../../theme/";
    }
    $results = scandir($ThemePath);
    foreach ($results as $result){
        if($result === '.' or $result === '..') continue;
            if(is_dir($ThemePath . '/' . $result)) {
                $Name = $result;
                include("$ThemePath/$result/settings.php");
                if($TEMPLATEADMINTHEME == $ThemeAdmin){
                    if($TEMPLATENAME == ""){ }else{
                        $TEMPLATENAME = Array($Name, $TEMPLATENAME, $TEMPLATEID);
                        $ThemeArray[] = $TEMPLATENAME;
                        $TEMPLATENAME = "";
                    }
                }
        }
    }
return $ThemeArray;
}

function PullPageInfo($Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $Url = $Array['urlinfo']['type'];
    $Id = OtarDecrypt($Array['key'],$Url);
    $qUEry = "SELECT * FROM page_template WHERE id='$Id' AND trash='0' AND webid='$WebId'"; 
    $reSUlt = mysql_query($qUEry) or die(mysql_error());
    $row = mysql_fetch_array($reSUlt);
        $UrlUrl = $row['url'];
        $UrlType = $row['urltype'];
        $UrlId = $row['urlid'];
        $End = $row['end'];
        $Template = $row['template'];
        $Article = $row['article'];
    if($row['active'] == ""){
        $row['active'] = "0";
    }
    $query = "SELECT * FROM page_settings WHERE article='$Article' AND tempid='$row[id]' AND webid='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $RoW = mysql_fetch_array($result);
    $row['pagesettings'] = $RoW;
    $QUeRy = "SELECT * FROM page_function WHERE page='$Article' AND template='$Template' AND webid='$WebId'";
    $rEsULT = mysql_query($QUeRy) or die(mysql_error());
    $rOL = mysql_fetch_array($rEsULT);
    $row['pagefunction'] = $rOL;
    $qUerY = "SELECT * FROM articles WHERE id='$Article' AND webid='$WebId'";
    $rEsulT = mysql_query($qUerY) or die(mysql_error());
    $rOW = mysql_fetch_array($rEsulT);
    $row['pagearticle'] = $rOW;
return $row;
}

function SessionUser($Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $AccountId = $_SESSION['accountid'];
    $Log_Session = $_SESSION['sessionid'];
    $Session_Generate = $_SESSION['sessiongenerate'];
    if($AccountId == ""){
        $User = 0;
    }else{
        $User = 1;
        $query = "SELECT * FROM login_session WHERE userid='$AccountId' AND active='1' AND session='$Log_Session' AND session_generate='$Session_Generate' AND webid='$WebId'";
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
    $video_id = $video_id[0];
return $video_id;
}

function Hosting_Size($Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $file_directory = '../';
    $output = exec('du -sk ' . $file_directory);
    $filesize = trim(str_replace($file_directory, '', $output)) * 1024;
    $q = mysql_query("SHOW TABLE STATUS");  
    $size = 0;  
    while($row = mysql_fetch_array($q)) {  
        $DbSize += $row["Data_length"] + $row["Index_length"];  
    }
    $filesize = $filesize + $DbSize;
    $HostingInfo['sizetype'] = byteFormat($filesize, "");
    $filesize = $filesize / "1073741824";
    $filesize = number_format("$filesize",2);
    $HostingInfo['size'] = $filesize;
    $HostingInfo['max'] = $Array['hosting']['max'];
    $HostingInfo['percent'] = $filesize / $Array['hosting']['max'];
    $HostingInfo['percent'] = $HostingInfo['percent'] * "100";
return $HostingInfo;
}

function byteFormat($bytes, $unit = "", $decimals = 2) {
	$units = array('B' => 0, 'KB' => 1, 'MB' => 2, 'GB' => 3, 'TB' => 4, 
			'PB' => 5, 'EB' => 6, 'ZB' => 7, 'YB' => 8);
	$value = 0;
	if ($bytes > 0) {
		// Generate automatic prefix by bytes 
		// If wrong prefix given
		if (!array_key_exists($unit, $units)) {
			$pow = floor(log($bytes)/log(1024));
			$unit = array_search($pow, $units);
		}
		// Calculate byte value by prefix
		$value = ($bytes/pow(1024,floor($units[$unit])));
	}
	// If decimals is not numeric or decimals is less than 0 
	// then set default value
	if (!is_numeric($decimals) || $decimals < 0) {
		$decimals = 2;
	}
	// Format output
	return sprintf('%.' . $decimals . 'f <b>'.$unit . "</b>", $value);
}

function CommaRemoval($Content){
    $Content = str_replace("'", "", "$Content");
    $Content = str_replace('"', '', "$Content");
return $Content;  
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

function CwOrganize($Content,$Array){
    $Content = PbUnSerial($Content);
    $Content = PbFilter($Content);
    #$Content = CwFilterImg($Content,$Array);
return $Content;
}

function CwFilterImg($Content,$Array){
    $Sizes = $Array["postimagessizes"];
    if($Content["type"] == "post-product"){
        $Sizes = $Array["productimages"];
    }
    $Count = count($Sizes);
    $Count = $Count - "1";
    $ncount = "0";
    if(is_array($Content["img"])){
        $ActualCount = count($Content["img"]);
        $ActualCount = $ActualCount - "1";
        foreach($Content as $key => $value){
            if($value == ""){
                $Content["key"] = $Content["content"]["img"];
            }
            if($Count != $ActualCount){
                while($ncount <= $Sizes){
                    if($Content["img"]["$ncount"] == ""){
                        $NewImg["$ncount"] = $Content["content"]["img"];
                    }else{
                        $NewImg["$ncount"] = $Content["img"]["$ncount"];
                    }
                    $ncount = $ncount + 1;
                }
            }
        }
    }else{
        while($ncount <= $Sizes){
            $NewImg["$ncount"] = $Content["content"]["img"];
            $ncount = $ncount + 1;
        }
    }
    $Content["img"] = $NewImg;
return $Content;
}

function CwFilerAddress($Type,$Content){
    if(is_array($Content["$Type"])){
        if(is_array($Content["$Type"]["address"])){
            if($Content["$Type"]["address"]["6"] == ""){
                $Content["$Type"]["address"]["6"] = "N/A";
            }
            if($Content["$Type"]["address"]["company"] == ""){
                $Content["$Type"]["address"]["company"] = $Content["$Type"]["company"];
            }
        }
    }
return $Content;
}

function PbFilter($Content){
    $Content = CwFilerAddress("other",$Content);
    $Content = CwFilerAddress("info",$Content);
    if($Content["type"] == "post-event"){
        if($Content["content"]["external"] == ""){
            $Content["content"]["tickets"] = "/$_GET[url]/$Content[url]";
        }else{
            $Content["content"]["tickets"] = $Content["content"]["external"];
        }
    }
    if($Content["other"]["artist"] != ""){
        $Content["other"]["artist"] = str_replace('%-', '', $Content["other"]["artist"]);
        $Content["other"]["artist"] = str_replace('-%', '', $Content["other"]["artist"]);
    }
return $Content;
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
    return isset($array['$key']) ? $array['$key'] : $default;
}

function cw_array_set($Array){
    foreach($Array as $key){
        if(is_array($key)){
            foreach($key as $topk => $top){
                if(is_array($topk)){
                    foreach($topk as $bttmk => $bttm){
                        $topk['$bttmk'] = isset_get($topk, $bttmk);
                    }
                    $key['$topk'] = isset_get($key, $topk);
                }else{
                    $key['$topk'] = isset_get($key, $topk);
                }
            }
            $Array['$topk'] = $key;
        }else{
            $Array['$key'] = isset_get($Array, $key);
        }
    }
return $Array;
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
    $BrowserLimit = $Array["browser"]["limit"];
    $Browser_Name = $Array["browser"]["current"];
    if($BrowserLimit == ""){
        if($BrowserLimit[$Browser_Name] == "1"){
            $View_site = "0";
            $Block_Browser = "1";
            $Browser_Block = $Browser_Name;
        }else{
            $View_site = "1";
            $Block_Browser = "0";
            $Browser_Block = "";
        }
    }
}

function CwCartTotal($Cart){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $query = "SELECT * FROM cw_cart WHERE active='1' AND trash='0' AND session='$Cart'";
    $result = mysql_query($query) or die(mysql_error());
    while($row = mysql_fetch_array($result)){
        $CwCart['id'] = $row['id'];
        $CwCart['session'] = $row['session'];
        $CwCart['cart'] = $row['cart'];
        $CwCart['item'] = $row['item'];
        $CwCart['user'] = $row['user'];
        $CwCart['qty'] = $row['qty'];
        $CwCart['active'] = $row['active'];
        $CwCart['trash'] = $row['trash'];
        $CwCart['other'] = $row['other'];
        $CwCart['price'] = $row['price'];
        $CwCart['other'] = unserialize($CwCart['other']);
        $CwTotal = $row['price'] * $row['qty'];
        $CwCartSubTotal = $CwCartSubTotal + $CwTotal;
        $CartCount = $CartCount + 1;
    }
    $Shopping['total'] = $CwCartSubTotal;
    $Shopping['count'] = $CartCount;
return $Shopping;
}

function CwMobileDetect($Array){
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    if($iphone || $android || $palmpre || $ipod || $berry == true){
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
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
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
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
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

function CwUserAccess($Access){
    if($Access == "0"){
        $Access = "Developer";
    }
    if($Access == "1"){
        $Access = "Super Administrator";
    }
    if($Access == "2"){
        $Access = "Administrator";
    }
    if($Access == "3"){
        $Access = "Moderator";
    }
    if($Access == "4" OR $Access == ""){
        $Access = "Registered User";
    }
    return $Access;
}

function CwUserStatus($Status){
    if($Status == "0"){
        $Status = "Suspended";
    }
    if($Status == "1"){
        $Status = "Active";
    }
    if($Status == "2" OR $Status == ""){
        $Status = "Limited";
    }
    if($Status == "3"){
        $Status = "Pending";
    }
    return $Status;
}

function StatusName($Status){
    if($Status == "0"){
        $Status = "In-Active";
    }
    if($Status == "1"){
        $Status = "Active";
    }
    return $Status;
}

function getRealIp() {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  //check ip from share internet
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
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

function Cw_Settings($Search, $Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $Query = "SELECT * FROM cwoptions WHERE type='settings' AND name='$Search' AND trash='0'";
    $Result = mysql_query($Query) or die(mysql_error());
    $Row = mysql_fetch_array($Result);
return $Row;
}

function Settings_Name_Filter($Name){
    $Name = str_replace("_", " ", "$Name");
	$Name = ucwords(strtolower($Name));
	return $Name;
}

function Cw_Load_Avg($Page,$Date,$Other,$Array){
    if($Array["manual_webid"] == ""){
        $WebId = $Array['webid'];
    }else{
        $WebId = $Array["manual_webid"];
    }
    $Query = "SELECT * FROM tracker_load WHERE webid='$WebId'";
    $Result = mysql_query($Query) or die(mysql_error());
    while($Row = mysql_fetch_array($Result)){
        $Speed = $Speed + $Row['loadtime'];
        $Count = $Count + 1;
    }
    $Load = $Speed / $Count;
    $Load = number_format($Load,3) . " Sec";
return $Load;
}

function CwOrderStatus($Value){
    if($Value == "0"){ $Value = "Awaiting Payment"; }
    if($Value == "1"){ $Value = "Processing Order"; }
    if($Value == "2"){ $Value = "Preparing Shipment"; }
    if($Value == "3"){ $Value = "Shipped"; }
    if($Value == "4"){ $Value = "Delivered"; }
    if($Value == "5"){ $Value = "Customer Response Needed"; }
    if($Value == "6"){ $Value = "Order Canceled"; }
    if($Value == "7"){ $Value = "Refund Issued"; }
return $Value;
}

function ReportError(){
}

function Cw_Quick_Info($Type,$WebId,$Id,$Array){
    $query = "SELECT * FROM $Type WHERE id='$Id' AND webid='$WebId'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$row = CwOrganize($row,$Array);
return $row;
}
?>