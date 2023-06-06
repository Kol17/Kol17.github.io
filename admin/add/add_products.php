<?php
include "../db_conn.php";

$sql = "SELECT * FROM admins WHERE adm_id = 1";
$result = mysqli_query($conn, $sql);
$adm = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $cat_id = $_POST["cat_id"];
    $pd_img = $_POST["pd_img"];
    $pd_name = $_POST["pd_name"];
    $pd_price = $_POST["pd_price"];
    $description = $_POST["description"];

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
//execute query
$sql = "INSERT INTO `products`(`cat_id`, `pd_name`, `pd_price`, `pd_img`) VALUES ($cat_id,'$pd_name','$pd_price','$pd_img')";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location:../products.php?msg=added");
 } else {
    echo "Failed: " . mysqli_error($conn);
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>Add products</title>
</head>
<body>

<nav>
    <div class="profile text-center">
        <h1>Admin Panel</h1>
        <h3><?php echo $adm['adm_name'] ?></h3><hr/>
    </div>
    <div class="control">
    <ul class="mt-3">
        <p><a href="../dashboard.php" class='btn bg-info'>Dashboard</a></p>
        <p><a href="../products.php" class='btn bg-info'>Menu List</a></p>
        <p><a href="../categories.php" class='btn bg-info'>Categories</a></p>
        <p><a href="../users.php" class="btn bg-info">Users</a></p>
        <p><a href="../adminlogout.php" class="btn bg-info">Logout <i class='bi bi-box-arrow-in-right'></i></a></p>
    </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="text-center mb-4">
            <h3 class='mt-3'>Add New Products</h3>
    </div>
    <form class="container d-flex justify-content-center" action="" method="post" style="width:50vw;min-width:300px;" enctype="multipart/form-data">
    <div class="row mb-3">
    <div class="col">
        <label class="form-label">Category:</label>
        <input type="number" class="form-control" name="cat_id" value=1 min=1>
    </div> 
    <div class="col">
        <label class="form-label">Select Image</label>
        <input type="file" class="form-control" name="pd_img" accept='image/*'>
    </div>
    <div class="col">
        <label class="form-label">Product Name:</label>
        <input type="text" class="form-control" name="pd_name">
    </div> 
    <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="pd_price" step="0.01">
    </div> 
    <div class="form-group mb-3">
        <label class="form-label">Description:</label>
        <input type="text"  class="form-control" name="description">
    </div>
    <div>
        <button type="submit" class="btn btn-success" name="submit">Save</button>
        <a href="products.php?msg=added" class="btn btn-danger">Cancel</a>
    </div>
    </form>
</div>
</body>
</html>