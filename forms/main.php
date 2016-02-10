<?php
include("api/pblast/include.php");


$Get_Type = strtolower($_GET['type']);
$Get_Id = strtolower($_GET['id']);
$Get_Url = strtolower($_GET['url']);
$Get_End = strtolower($_GET['end']);


if($Get_Type == "login"){
    include("forms/login.php");
}

if($Get_Type == "deletearticle"){
    include("forms/deletearticle.php");
}

if($Get_Type == "logout"){
    include("forms/logout.php");
}

if($Get_Type == "editarticle"){
    include("forms/editarticle.php");
}

if($Get_Type == "editaccess"){
    include("forms/editaccess.php");
}

if($Get_Type == "cwaccess"){
    include("forms/cwaccess.php");
}

if($Get_Type == "edituser"){
    include("forms/edituser.php");
}

if($Get_Type == "editad"){
    include("forms/editad.php");
}

if($Get_Type == "editpage"){
    include("forms/editpage.php");
}

if($Get_Type == "offline"){
    include("forms/offline.php");
}

if($Get_Type == "articles"){ 
    include("forms/article.php"); 
}

if($Get_Type == "attributes"){ 
    include("forms/attributes.php"); 
}

if($Get_Type == "subscribe"){ 
    include("forms/subscribe.php"); 
}

if($Get_Type == "category"){ 
    include("forms/category.php"); 
}

if($Get_Type == "menu"){ 
    include("forms/menu.php"); 
}

if($Get_Type == "pages"){ 
    include("forms/pages.php"); 
}

if($Get_Type == "functions"){
    include("forms/functions.php");
}

if($Get_Type == "delete"){ 
    include("forms/delete.php"); 
}

if($Get_Type == "settings"){ 
    include("forms/settings.php"); 
}

if($Get_Type == "client"){ 
    include("forms/client.php"); 
}

if($Get_Type == "contact"){ 
    include("forms/contact.php"); 
}

if($Get_Type == "pblast"){ 
    include("api/pblast/connect.php"); 
}

if($Get_Type == "X-editable"){ 
    include("api/X-editable/post.php"); 
}

if($Get_Type == "products"){ 
    include("forms/product.php"); 
}

if($Get_Type == "users"){ 
    include("forms/user.php"); 
}

if($Get_Type == "paypal"){ 
    include("api/paypal/main.php"); 
}

if($Get_Type == "comment"){ 
    include("forms/comment.php"); 
}

if($Get_Type == "advertisement"){ 
    include("forms/ads.php"); 
}

if($Get_Type == "copy"){
    if($Get_Id == "product"){
        include("forms/copyproduct.php");
    }
    if($Get_Id == "article"){
        include("forms/copyarticle.php");
    }
}



if($Get_Type == "cwfile"){ include("forms/cwfile.php"); }
if($Get_Type == "cart"){ include("forms/cart.php"); }
if($Get_Type == "register"){ include("forms/register.php"); }
if($Get_Type == "payment"){ include("forms/payment.php"); }
if($Get_Type == "tickets"){ include("forms/tickets.php"); }

?>