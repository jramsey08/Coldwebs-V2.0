<?php 
/**
 * twitter_go.php -- users opens it and gets redirected to twitter.com
 */

    require (dirname(__FILE__) . '/twoauth/twitterOAuth.php');

    $consumer_key = '123abcd';
    $consumer_secret = '1234567890';



    $to = new TwitterOAuth($consumer_key, $consumer_secret);

    $tok = $to->getRequestToken();

    $token = $tok['oauth_token'];
    $secret = $tok['oauth_token_secret'];
    $time = $_SERVER['REQUEST_TIME'];

    //temporary things, i will need them in next function, so i put them in cookie
    setcookie("ttok", $token, $time + 3600 * 30, '/'); //,'.domain.com'); //migh need to add domain if got problems
    setcookie("tsec", $secret, $time + 3600 * 30, '/'); //,'.domain.com');

    $request_link = $to->getAuthorizeURL($token);

    //die($request_link);
    header('Location: ' . $request_link);


?>

<?php 
    /**
     * twitter_back.php  -- users gets redirected here from twitter (if user allowed you app)
     * you can specify this url in https://dev.twitter.com/
     */

        require (dirname(__FILE__) . 'twitteroauth/twitterOAuth.php');

$customer_key           = 'lW17T4icJVJgLY4lLO6LfQ';
$customer_secret        = 'GjFDMYKKQSpKEn3qaToXM0AdyNv9uBQx0dzxdQHo';


        $oauth_token = $_GET['oauth_token'] //  http://domain.com/twitter_back.php?oauth_token=MQZFhVRAP6jjsJdTunRYPXoPFzsXXKK0mQS3SxhNXZI&oauth_verifier=A5tYHnAsbxf3DBinZ1dZEj0hPgVdQ6vvjBJYg5UdJI

        #if(!isset($_COOKIE['ttok'])){
           # die('no cookie, no party');
        #}
        $ttok = $_COOKIE['ttok'];
        $tsec = $_COOKIE['tsec'];


        $to = new TwitterOAuth($consumer_key, $consumer_secret, $ttok, $tsec);
        $tok = $to->getAccessToken();
        if(!isset($tok['oauth_token'])) {
            die('try again!');
        }
        $btok = $tok['oauth_token'];
        $bsec = $tok['oauth_token_secret'];



        $to = new TwitterOAuth($consumer_key, $consumer_secret, $btok, $bsec);
        $content = $to->OAuthRequest('http://twitter.com/account/verify_credentials.xml');
        $user = simplexml_load_string($content);
        $userid = $user->id . ''; //typecast to string
        $screen_name = $user->screen_name . '';



        //delete temp. cookies
        setcookie("ttok", '', 0, '/');
        setcookie("tsec", '', 0, '/');


        /**
         * at this point you have everything on this user
         */
         print_r($user);
 ?>