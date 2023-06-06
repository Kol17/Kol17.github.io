<?php
include "../db_conn.php";
$id = $_GET["id"];

$sql = "SELECT * FROM admins WHERE adm_id = 1";
$result = mysqli_query($conn, $sql);
$adm = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
    $cat_name = $_POST["cat_name"];

    $sql = "UPDATE `categories` SET `cat_name`='$cat_name' WHERE cat_id = $id";
    $result = mysqli_query($conn, $sql);
  
    if ($result) {
      header("Location:../categories.php?msg=edited");
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
            <h3 class='mt-3'>Edit Categories</h3>
    </div>
    <form class="container p-5 justify-content-center" action="" method="post" style="width:50vw;min-width:300px;" enctype="multipart/form-data">

    <div class="row">
        <label class="form-label">Category name</label>
        <input type="text" class="form-control" name="cus_name">
    </div> 
    
    <div class="mt-3">
        <button type="submit" class="btn btn-success" name="submit">Save</button>
        <a href="categories.php?msg=added" class="btn btn-danger">Cancel</a>
    </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>