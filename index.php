<?php  

include_once "classes/Page_Data.class.php";
$pageData = new Page_Data ;
$pageData->setTitle("Cafe Village") ;

$pageData->setCSS("<link href='css/layouts.css' rel='stylesheet' />");
$pageData->appendCSS("<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet'>");
$pageData->appendCSS("<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css'>");
$pageData->appendCSS("<link rel='preconnect' href='https://fonts.googleapis.com'>");

include_once "views/nav.php" ;
$pageData->setContent($nav) ;
echo $pageData->getCSS();
$clickNav = isset($_GET['p']) ;
if($clickNav){
    $fileLoad = $_GET['p'] ;
}
else {
    $fileLoad = 'menu' ;
}


include_once "views/$fileLoad.php";
$pageData->appendContent($info) ;

$pageData->appendScript("<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'></script>");

include "views/footer.php";
$pageData->setFooter($footer);

require "templates/page.php";
echo $page ;