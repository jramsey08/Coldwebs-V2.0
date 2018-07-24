<?php
include("api/pblast/include.php");

$Get_Type = strtolower($_GET['type']);
$Get_Id = strtolower($_GET['id']);
$Get_Url = strtolower($_GET['url']);
$Get_End = strtolower($_GET['end']);


switch ($Get_Type) {
    case "admin":
        include("forms/admin/main.php");
        break;
    case "login":
        include("forms/login.php");
        break;
    case "wishlist":
        include("forms/wishlist.php");
        break;
    case "deletearticle":
        include("forms/delete/deletearticle.php");
        break;        
    case "ecommerce":
        include("forms/ecommerce/main.php");
        break;               
    case "useraccess":
        include("forms/useraccess.php");
        break;               
    case "logout":
        include("forms/logout.php");
        break;               
    case "editarticle":
        include("forms/edit/editarticle.php");
        break;    
    case "editalert":
        include("forms/edit/editalert.php");
        break;    
    case "cwaccess":
        include("forms/cwaccess.php");
        break;               
    case "editaccess":
        include("forms/edit/editaccess.php");
        break;               
    case "edituser":
        include("forms/edit/edituser.php");
        break;               
    case "editad":
        include("forms/edit/editad.php");
        break; 
    case "siteswitch":
        include("forms/siteswitch.php");
        break;               
    case "hostedsites":
        include("forms/hostedsites.php");
        break;               
    case "tickets":
        include("forms/tickets.php");
        break;               
    case "payment":
        include("forms/payment.php");
        break;               
    case "register":
        include("forms/register.php");
        break;               
    case "cart":
        include("forms/cart.php");
        break;               
    case "reset":
        include("forms/reset.php");
        break;               
    case "social":
        include("forms/social.php");
        break;               
    case "cwfile":
        include("forms/cwfile.php");
        break;               
    case "editsocial":
        include("forms/edit/editarticle.php");
        break;               
    case "inbox":
        include("forms/inbox.php");
        break;               
    case "socialmedia":
        include("forms/socialmedia.php");
        break;               
    case "edituseraccess":
        include("forms/edit/edituseraccess.php");
        break;               
    case "edittrans":
        include("forms/edit/edittrans.php");
        break;               
    case "advertisement":
        include("forms/ads.php");
        break;               
    case "my-info":
        include("forms/myinfo.php");
        break;               
    case "order":
        include("forms/order.php");
        break;               
    case "comment":
        include("forms/comment.php");
        break;               
    case "paypal":
        include("api/paypal/main.php"); 
        break;               
    case "users":
        include("forms/user.php");
        break;               
    case "products":
        include("forms/product.php");
        break;               
    case "x-editable":
        include("api/X-editable/post.php"); 
        break;               
    case "pblast":
        include("api/pblast/connect.php");
        break;               
    case "contact":
        include("forms/contact.php");
        break;               
    case "client":
        include("forms/client.php");
        break;               
    case "settings":
        include("forms/settings.php");
        break;               
    case "functions":
        include("forms/functions.php");
        break;               
    case "pages":
        include("forms/pages.php");
        break;               
    case "menu":
        include("forms/menu.php");
        break;               
    case "category":
        include("forms/category.php");
        break;               
    case "subscribe":
        include("forms/subscribe.php");
        break;               
    case "attributes":
        include("forms/attributes.php");
        break;               
    case "articles":
        include("forms/article.php");
        break;               
    case "blog":
        include("forms/article.php");
        break;               
    case "offline":
        include("forms/offline.php");
        break;               
    case "editpage":
        include("forms/edit/editpage.php");
        break;
    case "editadmin":
        include("forms/edit/editadmin.php");
        break; 
    case "":
        header("Location: http://$Website_Url_Auth/");
        break;
}

if($Get_Type == "delete"){ 
    if($Get_Id == "cart"){
        include("forms/delete/deletecart.php"); 
    }else{
        include("forms/delete/delete.php"); 
    }
}
if($Get_Type == "copy"){
    if($Get_Id == "product"){
        include("forms/copyproduct.php");
    }
    if($Get_Id == "article"){
        include("forms/copyarticle.php");
    }
}

?>