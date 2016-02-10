<?php
include_once('twitteroauth/twitteroauth.php');

$twitter_customer_key           = 'lW17T4icJVJgLY4lLO6LfQ';
$twitter_customer_secret        = 'GjFDMYKKQSpKEn3qaToXM0AdyNv9uBQx0dzxdQHo';
$twitter_access_token           = "";
$twitter_access_token_secret    = "";


$Cw_UserName = "promotercenter";

$connection = new TwitterOAuth($twitter_customer_key, $twitter_customer_secret, $twitter_access_token, $twitter_access_token_secret);
$my_tweets = $connection->get('statuses/user_timeline', array('screen_name' => "$Cw_UserName", 'count' => 3));

$Cw_Tweet_Id = "";
$Cw_Tweet_Content = "";
$Cw_Tweeet_Date = "";
$Cw_Tweet_Link = "";
$Cw_Tweet_User = "";

print_r($my_tweets);
?>