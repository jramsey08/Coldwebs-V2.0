<?php 

$url = 'http://thehyst.com/cron/session.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url . $body);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, '3');
$content = trim(curl_exec($ch));
curl_close($ch);

?>




