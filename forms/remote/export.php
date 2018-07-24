<?php


$External_Db = $_POST["db"];









$Count = "0";
$query = "SELECT * FROM admin";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO admin(id, type, content, active, trash, name, list, category, other, access, url, theme, webid) 
	VALUES('$row[id]', '$row[type]', '$row[content]', '$row[active]', '$row[trash]', '$row[name]', '$row[list]', '$row[category]', '$row[other]', '$row[access]', '$row[url]', '$row[theme]', '$row[webid]') ")or die(mysql_error());
    $result = mysqli_query($CwDb,"UPDATE admin SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$query = "SELECT * FROM articles WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO articles(active, hits, content, date, type, id, url, trash, category, search, other, rand, feat, list, info, img, shortode, date_created, name, webid) 
	VALUES('$row[active]', '$row[hits]', '$row[content]', '$row[date]', '$row[type]', '$row[id]', '$row[url]', '$row[trash]', '$row[category]', '$row[search]', '$row[other]', '$row[rand]', '$row[feat]', '$row[list]', '$row[info]', '$row[img]', '$row[shortode]', '$row[date_created]', '$row[name]', '$row[webid]') ")or die(mysql_error());
    $result = mysqli_query($CwDb,"UPDATE articles SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM cwoptions";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO cwoptions(id, type, content, active, trash, name, list, category, webid) 
	VALUES('$row[id]', '$row[type]', '$row[content]', '$row[active]', '$row[trash]', '$row[name]', '$row[list]', '$row[category]', '$row[webid]') ")or die(mysql_error());
    $result = mysqli_query($CwDb,"UPDATE cwoptions SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM cw_ads WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysql_query("INSERT INTO cw_ads(id, name, type, feat, location, adlimit, height, width, pb, rand, info, other, active, trash, img, hits clicks webid) 
	VALUES('$row[id]', $row[name], $row[type], $row[feat], $row[location], $row[adlimit], $row[height], $row[width], $row[pb], $row[rand], $row[info], $row[other], $row[active], $row[trash], $row[img], $row[hits], $row[clicks], $row[webid] ) ")or die(mysql_error());
    $result = mysqli_query($CwDb,"UPDATE cw_ads SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");
    
    
    
$Count = "0";
$query = "SELECT * FROM cw_alerts WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO cw_alerts(id, name, active, trash, other, webid, type, user, date) 
	VALUES('$row[id]', '$row[name]', '$row[active]', '$row[trash]', '$row[other]', '$row[webid]', '$row[type]', '$row[user]', '$row[date]',) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE cw_alerts SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM cw_cart WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO cw_cart(id, active, session, trash, item, price, qty, content, webid) 
	VALUES('$row[id]', '$row[active]', '$row[session]', '$row[trash]', '$row[item]', '$row[price]', '$row[qty]', '$row[content]', '$row[webid]',) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE cw_cart SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM cw_coupon WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO cw_coupon(id, name, code, session, cart, amount, type, active, trash, webid ) 
	VALUES('$row[id]', '$row[name]', '$row[code]', '$row[session]', '$row[cart]', '$row[amount]', '$row[type]', '$row[active]', '$row[trash]', '$row[webid]',) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE cw_coupon SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM cw_model WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO cw_model(id, first_name, last_name, bio, gender, email, birthday_month, birthday_day, birthday_year, height, waist, shoe_size, dress_size, hip_size, chest_size, cup_size,  eyes, hair, ethnicity, content, other, active, trash, notes, date, img, rand, webid) 
	VALUES('$row[id]', '$row[first_name]', '$row[last_name]', '$row[bio]', '$row[gender]', '$row[email]', '$row[birthday_month]', '$row[birthday_day]', '$row[birthday_year]', '$row[height]', '$row[waist]', '$row[shoe_size]', '$row[hip_size]', '$row[dress_size]', '$row[chest_size]', '$row[cup_size]', '$row[eyes]', '$row[hair]', '$row[ethnicity]', '$row[content]', '$row[other]', '$row[active]', '$row[trash]', '$row[notes]', '$row[date]', '$row[img]', '$row[rand]', '$row[webid]') ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE cw_model SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM cw_search WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO cw_search(id, type, ref, info, content, active, trash, user, webid, type) 
	VALUES('$row[id]', '$row[type]', $row[ref]',  '$row[info]', '$row[active]', '$row[trash]', '$row[user]', '$row[webid]', '$row[type]') ")or die(mysqli_error(id, parent, title, other, active, trash, webid, type));
    $result = mysqli_query($CwDb,"UPDATE cw_search SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM cw_tags WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO cw_tags(id, name, content, active, trash, webid) 
	VALUES('$row[id]', '$row[name]', '$row[content]', '$row[active]', '$row[trash]', '$row[webid]' ) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE cw_tags SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM error_log WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO error_log(error, priority, active, comment, id, date, webid) 
	VALUES('$row[error]', '$row[priority]', '$row[active]', '$row[comment]', '$row[id]', '$row[date]', '$row[webid]', ) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE error_log SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM functions WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO functions(id, name, function, active, trash, template, webid) 
	VALUES('$row[id]', '$row[name]', '$row[function]', '$row[active]', '$row[trash]', '$row[template]', '$row[webid]') ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE functions SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM images WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO images(id, gallery, img, active, trash, album, list, url, type, name, webid) 
	VALUES('$row[id]', '$row[gallery]', '$row[img]', '$row[active]', '$row[trash]', '$row[album]', '$row[list]', '$row[url]', '$row[type]', '$row[name]', '$row[webid]') ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE images SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM info WHERE id='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO info(domain, mp, slogan, logo, status, theme, other, info, id, name) 
	VALUES('$row[domain]', '$row[mp]', '$row[slogan]', '$row[logo]', '$row[status]', '$row[theme]', '$row[other]', '$row[info]', '$row[id]', '$row[name]', ) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE info SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM login_session WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO login_session(session, userid, ipaddress, date, computerinfo, browser_name, browser_useragent, browser_version, browser_platform, browser_pattern, active, trash, country, city, state, zip, lat, lon, countrycode, timezone, session_generate, cookie, id, webid) 
	VALUES($row[session]', '$row[userid]', '$row[ipaddress]', '$row[date]', '$row[computerinfo]; '$row[browser_name]', '$row[browser_useragent]', '$row[browser_version]', '$row[browser_platform]', '$row[browser_pattern]', '$row[active]', '$row[trash]', '$row[country]', '$row[city]', '$row[state]', '$row[zip]', '$row[lat]', '$row[lon]', '$row[countrycode]', '$row[timezone]', '$row[session_generate]', '$row[cookie]', '$row[id]', '$row[webid]', ) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE login_session SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM messages WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO messages(name, subject, message, email, read, prorty, user, reciever, type, admin, date, id, trash, webid, category, other) 
	VALUES('$row[name]', '$row[subject]', '$row[message]', '$row[email]', '$row[read]', '$row[prorty]', '$row[user]', '$row[reciever]', '$row[type]', '$row[admin]', '$row[date]', '$row[id]', '$row[trash]', '$row[webid]', '$row[category]', '$row[other]') ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE messages SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM page_function WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO page_function(id, name, functino, template, page, active, trash, list, contents, rand, article, shortcode, webid) 
	VALUES('$row[id]', '$row[name]', '$row[functino]', '$row[template]', '$row[page]', '$row[active]', '$row[trash]', '$row[list]', '$row[contents]', '$row[rand]', '$row[article]', '$row[shortcode]', '$row[webid]', ) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE page_function SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM page_settings WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO cw_ads(autoplay, offline, background, secure, id, active, article, tempid, webid, template, type, img, structure) 
	VALUES('$row[autoplay]', '$row[offline]', '$row[background]', '$row[secure]', '$row[id]', '$row[active]', '$row[article]', '$row[tempid]', '$row[webid]', '$row[template]', '$row[type]', '$row[img]', '$row[structure]', ) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE cw_ads SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM page_template WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO page_template(id, name, url, active, trash, template, urltype, urlid, end, admin, article, setting, webid) 
	VALUES('$row[id]', '$row[name]', '$row[url]', '$row[active]', '$row[trash]', '$row[template]', '$row[urltype]', '$row[urlid]', '$row[end]', '$row[admin]', '$row[article]', '$row[setting]', '$row[webid]', ) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE page_template SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM subscribe WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO subscribe(id, name, email, active, trash, date, user, gender, birth, country, end-date, webid) 
	VALUES('$row[id]', '$row[name]', '$row[email]', '$row[active]', '$row[trash]', '$row[date]', '$row[user]', '$row[gender]', '$row[birth]', '$row[country]', '$row[end_date]', '$row[webid]') ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE subscribe SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM tasks WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO tasks(id, type, website, url, active, trash, info, requestid, content, user, social, rd, webid) 
	VALUES('$row[id]', '$row[type]', '$row[website]', '$row[url]', '$row[active]', '$row[trash]', '$row[info]', '$row[requestid]', '$row[content]', '$row[user]', '$row[social]', '$row[rd]', '$row[webid]', ) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE tasks SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");



$Count = "0";
$query = "SELECT * FROM tracker WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO tracker() 
	VALUES('$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]', '$row[id]') ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE tracker SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");















$Count = "0";
$query = "SELECT * FROM tracker_load WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO tracker_load() 
	VALUES('$row[id]', ) ")or die(mysql_error());
    $result = mysqli_query($CwDb,"UPDATE tracker_load SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");

$Count = "0";
$query = "SELECT * FROM tracker_new WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO tracker_new() VALUES('$row[id]', ) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE tracker_new SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");

$Count = "0";
$query = "SELECT * FROM trans WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO trans() VALUES('$row[id]', ) ")or die(mysql_error());
    $result = mysql_query($CwDb,"UPDATE trans SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");

$Count = "0";
$query = "SELECT * FROM transfer WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO transfer() VALUES('$row[id]', ) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE transfer SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");

$Count = "0";
$query = "SELECT * FROM users WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO users() VALUES('$row[id]', ) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE users SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");

$Count = "0";
$query = "SELECT * FROM ws_sessions WHERE webid='$External_Db'";
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
    $Count = $Count + 1;
    if($Count == "1"){
        include("config/externaldb.php");
    }
    mysqli_query($CwDb,"INSERT INTO ws_sessions() VALUES('$row[id]', ) ")or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE ws_sessions SET webid='1'") or die(mysqli_error());
}
    include("../config/database.php");
