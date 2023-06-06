<?php 
session_start();
if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] == false){
    header('location:index.php');
    exit;
}
include_once "db_conn.php";

$sql = "SELECT * FROM admins WHERE adm_id = 1";
$result = mysqli_query($conn, $sql);
$adm = mysqli_fetch_assoc($result);

$pd_query = "SELECT * FROM products";
$pd_res = mysqli_query($conn,$pd_query);

$cat_query = "SELECT * FROM categories";
$cat_res = mysqli_query($conn,$cat_query);

$adm_query = "SELECT * FROM admins";
$adm_res = mysqli_query($conn,$adm_query);

$user_query = "SELECT * FROM customers";
$user_res = mysqli_query($conn,$user_query);

$order_query = "SELECT * FROM orders";
$order_res = mysqli_query($conn,$order_query);

function showAlert($msg, $alert_type)
        {
            echo '<div class="alert ' . $alert_type . ' alert-dismissible fade show" role="alert">
        ' . $msg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
</head>
<body>
    
<nav>
<div class="profile text-center">
        <h1>Admin Panel</h1>
        <h3><?php echo $adm['adm_name'] ?></h3><hr/>
    </div>
    <div class="control">
    <ul class="mt-3">
        <p><a href="dashboard.php" class='btn bg-info'>Dashboard</a></p>
        <p><a href="products.php" class='btn bg-info'>Menu List</a></p>
        <p><a href="categories.php" class='btn bg-info'>Categories</a></p>
        <p><a href="users.php" class="btn bg-info">Users</a></p>
        <p><a href="adminlogout.php" class="btn bg-info">Logout <i class='bi bi-box-arrow-in-right'></i></a></p>
    </ul>
    </div>
</nav>
<div class="container-fluid">
<?php  
if (isset($_GET["msg"]))
 {
    $msg = $_GET["msg"];
    if ($msg == "added") {
        showAlert("User Added Successfully!", "alert-success");
    } else if ($msg == "edited") {
        showAlert("Record Edited Successfully!", "alert-info");
    } else if ($msg == "deleted"){
        showAlert("Record Deleted Successfully!", "alert-danger");
    }
}
?>
    <div class="row mt-5">
        <h1 class='text-center'>Admin Dashboard</h1>
    </div>
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media d-flex">
                    <img class='mr-3 p-3 rounded float-left' src='../imgs/menu_icon.png'>

                    <div class="media-body media-text-right mt-5 ms-5">
                    <h2>
                    <?php
                    $num_of_products = mysqli_num_rows($pd_res);
                    echo $num_of_products; ?>
                    </h2>
                    <p>Products</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-30">
                <div class="media d-flex">
                    <img class='mr-3 p-3 rounded float-left' src='../imgs/cat_icon.png'>

                    <div class="media-body media-text-right mt-5 ms-5">
                    <h2>
                    <?php
                    $num_of_cat = mysqli_num_rows($cat_res);
                    echo $num_of_cat; ?>
                    </h2>
                    <p>Menu Categories</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-30">
                <div class="media d-flex">
                    <img class='mr-3 p-3 rounded float-left' src='../imgs/admin_icon.png'>

                    <div class="media-body media-text-right mt-5 ms-5">
                    <h2>
                    <?php
                    $num_of_admins = mysqli_num_rows($adm_res);
                    echo $num_of_admins; ?>
                    </h2>
                    <p>Admins</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-30">
                <div class="media d-flex">
                    <img class='mr-3 p-3 rounded float-left' src='../imgs/user_icon.png'>

                    <div class="media-body media-text-right mt-5 ms-5">
                    <h2>
                    <?php
                    $num_of_users = mysqli_num_rows($user_res);
                    echo $num_of_users; ?>
                    </h2>
                    <p>Users</p>
                    </div>
                </div>
            </div>
        </div>

        </div>
         
        <!-- <div class="row mt-5">
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media d-flex">
                    <img class='mr-3 p-3 rounded float-left' src='../imgs/order_icon.png'>

                    <div class="media-body media-text-right mt-5 ms-5">
                    <h2>
                    <?php
                    $num_of_orders = mysqli_num_rows($order_res);
                    echo $num_of_orders; ?>
                    </h2>
                    <p>Orders</p>
                    </div>
                </div>
            </div>
        </div>
        </div> -->
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>