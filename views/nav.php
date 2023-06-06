<?php 
$nav = "
    <div class='banner'>
        <div class='banner_logo'>
        <img src='imgs/logo1.png' alt='coffe-shop-logo'>
        </div>
    </div>
";
// $fileLoad = $_GET['p'];
// if( $fileLoad!== 'login' &&  $fileLoad !== 'register'){
    $nav .= "<nav>
    <a href='index.php?p=menu'>Menu</a>
    <a href='index.php?p=orders'>Order<i class='bi bi-cart4'></i></a>
    <a href='index.php?p=logout'>Logout<i class='bi bi-box-arrow-in-right'></i></a>
    </nav>
";
// }

    