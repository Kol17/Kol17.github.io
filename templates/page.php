<?php 
$page = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>" ;
$page .= $pageData->getTitle() ;
$page .= "</title>"; 
$page .= $pageData->getCSS() ;
$page .= $pageData->getEmbeddedStyle();
$page .= "</head><body>" ;
$page .= $pageData->getContent() ;
$page .= $pageData->getScript();
$page .= "<footer>";
$page .= $pageData->getFooter();
$page .= "</footer>";
$page .= "</body></html> " ;


    