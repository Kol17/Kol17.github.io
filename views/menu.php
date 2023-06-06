<?php  
session_start();
while ($_SESSION['authenticated']!==true || !isset($_SESSION['authenticated']))
{
    header('Location:index.php?p=login');
    exit;
}
$info ="
<style>
    body{
        overflow-x :hidden;
    } 
    ul li{
        list-style-type: none;
        margin-top : 30px;
    }
    ul a{
        text-decoration: none;
        color: rgb(124,94,78);
        font-family: 'Caveat', cursive;
        font-size: 20px;
        display:block;
    }
    h3{
        font-family: 'Caveat', cursive;
    }
    .section{
        display:flex;
        flex-wrap:wrap;
    }
    .container{
        width :23%;
        height:25rem;
        margin :1rem 4rem;
        padding-top:0;
        background-color: rgb(219,193,172);
        color: rgb(96,35,32);
        border-radius :10px 50px 10px 60px;
        text-align: center;
    }
    .container{
        font-size:1rem;
    }
    .container h3{
        font-size:1.5rem;
    }
    .section .container img {
        width: 60%;
        height:53%;
        margin-top:10px;
        border:10px solid rgb(91, 88, 49);
    }
    .container:hover{
        transform: scale(1.1);
    }
    .container{
            transition: 1s;
    }
    
    </style>
";

include "conn.php";

// Execute query
$cat_query = "SELECT * FROM categories";

$res1 = $conn->query($cat_query);

// pagination //

// how many result you want per page
$record_per_page = 6;
// number of records stored
$all = "SELECT * FROM products ";
$res2 = $conn->query($all);
$num_of_rows = mysqli_num_rows($res2);
$num_of_pages = ceil($num_of_rows/$record_per_page);

// echo $num_of_rows;
// echo $num_of_pages;
// determine which page visitors is currently on
if(!isset($_GET['page'])){
    $page = 1;
}
else{
    $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the result displayed
$start_page = ($page-1)*$record_per_page;

// retieve selected results from database and display
$pg_sql = 'SELECT * FROM `products` LIMIT '.$start_page.','.$record_per_page;
$pg_res = mysqli_query($conn,$pg_sql);
// echo "<pre>";
// print_r($pg_res);
// echo "</pre>";



$info .= "<div class='section'>";
$info .= " <div class='alert alert-primary alert-dismissible fade show w-75 mt-3 text-center' role='alert' style='margin-left:10%;'>
Welcome <strong>".$_SESSION['cus_name']."</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";

while ($row = $pg_res->fetch_array())
{
    $info .= "<div class='container'>
            <form action='index.php?p=orders' method='post'>
            <img src='imgs/".$row['pd_img']."'>
            <h3>".$row['pd_name']."</h3>
            <p> Price :".$row['pd_price']."</p>
            <input type='hidden' name='pd_id' value=".$row['pd_id'].">
            <p>Qty : <input type='number' name='pd_qty' min='0' value=1></p>
            <input type='submit' class='btn btn-warning' name='submit_order' value='Order'>
            </form>
            </div>";
}
// Display pages per link
$info .= "</div><class='page_nav'><ul class='pagination pagination-lg justify-content-center'>";
for($page=1; $page<=$num_of_pages; $page ++){
    $info .=  "<li class='page-item'><a class='page-link' href=index.php?page=".$page.">".$page."</a></li>";
}
$info .= "</ul></div>";
