<?php
session_start(); 

if ($_SESSION['authenticated']!==true || !isset($_SESSION['authenticated']))
{
    header('Location:index.php?p=login');
    exit;
}

include "conn.php";
if (isset($_POST["pd_id"]) && isset($_POST["pd_qty"]))
{
    $pd_id = $_POST["pd_id"];
    $pd_qty = $_POST["pd_qty"];

    if (!isset($_SESSION["order"]))
    {
        $_SESSION["order"] = [];
    }
    if(!isset($_SESSION["order"][$pd_id]))
    {
        $_SESSION["order"][$pd_id] = 0;
    }

    $_SESSION["order"][$pd_id] += $pd_qty;
}
$total_cost = 0;
$subtotal = 0;

// echo "<pre>";
// print_r($_SESSION["order"]);
// echo "</pre>";

$info =
"
<style>
table td{
text-alignment : center;
}
table img{
    margin:0;
    width:100px;
}
</style>";

$info .= "
<table class='table table-info'>
    <thead>
        <tr>
             <th></th>
             <th>Name</th>
             <th>Quantity</th>
             <th>Price</th>        
             <th>Subtotal</th>
             <th></th>         
        </tr>
    </thead>
        
    <tbody>";
    foreach ($_SESSION["order"] as $pd_id=>$pd_qty):
        $sql = "SELECT * FROM products WHERE pd_id = $pd_id";
        $res = mysqli_query($conn,$sql);
        $products = $res->fetch_array();
        
            $pd_price = $products['pd_price'];
            $subtotal = $pd_price*$pd_qty;
            $total_cost += $subtotal;
        // echo "<pre>";
        // print_r($products);
        // echo "</pre>";
    $info .="
    <tr>
        <td><img src='imgs/". $products['pd_img']."'></td>
        <td>".$products['pd_name']."</td>
        <td>
        <form method='post' action='index.php?p=update'>
            <input type='hidden' name='update' value='".$pd_id."'>
            <input type='number' name='pd_qty' min=0 value='".$pd_qty."'>
            <button type='submit' class='btn btn-success'>Update</button>
        </form>
        </td>
        <td>".$products['pd_price']."</td>
        <td>".$products['pd_price']*$pd_qty."</td>
        <td>
        <form method='post' action='index.php?p=remove'>
            <input type='hidden' name='remove' value='".$pd_id."'>
            <input type='submit'  class='btn btn-danger'  value='Remove'>
        </form>
        </td>
    </tr>";
    
    endforeach;

$info .= "
        <tr>
        <td colspan='4' align='right'>Total</td>
        <td>".$total_cost."</td>
        <td><a class='btn btn-primary' href='#'>Purchase</a></td>
        </tr>";
$info .= "</tbody></table>";