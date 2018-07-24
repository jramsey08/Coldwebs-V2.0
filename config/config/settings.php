<?php
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// COLDWEBS SETTINGS.PHP FILE USED TO SET ALL SITE SETTINGS. THIS FILE IS VERY ESSENTIAL TO THE FUNCTION OF THIS     //
// WEBSITE AND ANY CHANGES SHOULD ONLY BE MADE BY THOSE WHO ARE FAMILIAR TO THE COLDWEBS CONTENT MANAGEMENT SYSTEM   //
// CODING STRUCTURE. TO ENSURE YOUR SITE IS FULLY SAFE PLEASE ENROLL YOUR SITE AT COLDWEBS.COM TO ENSURE YOUR        //
// WEBSITE IN MONITORED DAILY AGAINST ALL THREATS AND ARE RECEIVING ALL NEEDED UPDATES.                              //
// AUTHOR: CEO, JUBAR D. RAMSEY     "VISIT COLDWEBS.COM TO BECOME A COLDWEBS CMS PLATFORM DEVELOPER."                //
// FILE VERSION 2.2 LAST UPDATED ON 2014-12-7                                                                        //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 

if($Website_Db_Setup == "" OR $Website_Db_Setup == "0" OR $Website_Offline == "1"){
}else{

// LOAD USER ACCOUNT INFORMATION \\
    include(ROOTPATH . "/userinfo.php");

// INCLUDES THE ADMIN ACCESS \\
    $GeneralSite = "1";
    include(ROOTPATH . "/access.php");

// INCLUDE PROMOTERBLAST API INFORMATION \\ 
    require_once(CWROOT . "/api/pblast/config.php");

// STORES ALL SESSION INFORMATION \\
    $Array['fullsession'] = $_SESSION;
    
// COLD WEB MODULE TAKEOVER \\
    $CwPack = 0;
    include(CWROOT . "/api/coldwebs/cwads/config/functions.php");

// OBTAIN CURRENT SHOPPING CART TOTAL \\
    #$Cw_Cart = CwCartTotal($Array);

// LOAD MOBILE THEME IF POSSIBLE \\
    $Mobile = CwMobileDetect($Array);

// LOAD BROWSER INFORMATION \\
    $ua=getBrowser();
    $Browser_User_Agent = $ua['userAgent'];
    $Browser_Name = $ua['name'];
    $Browser_Version = $ua['version'];
    $Browser_Platform = $ua['platform'];
    $Browser_Pattern = $ua['pattern'];

// DETECT ANY ACTIVE CWPACK APPLICATION \\
    require_once(ROOTPATH . "/loadcwpack.php");

// LOAD ALL PBLAST SETTINGS \\
   require_once(CWROOT . "/api/pblast/include.php");

// Total Article Count \\
   require_once(ROOTPATH . "/totalCount.php");

// DETECT ANY ERROR LOGS \\
    #require_once(CWROOT . "error_log.php");

// PULL SHOPPING CART INFORMATION \\
    #include(ROOTPATH . "/cart.php");

// WEBSITE SUBSCRIPTION WINDOW \\
    include(ROOTPATH . "/subscribe.php");

// WEBSITE SOCIAL PROFILE INFO \\
    include(ROOTPATH . "/social.php");

// WEBSITE E-COMMERCE SETTINGS \\
    include(ROOTPATH . "/ecommerce.php");

}