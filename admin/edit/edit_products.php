<?php
include "../db_conn.php";
$id = $_GET["id"];

$sql = "SELECT * FROM admins WHERE adm_id = 1";
$result = mysqli_query($conn, $sql);
$adm = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
    $pd_img = $_POST['pd_img'];
    $pd_name = $_POST['pd_name'];
    $pd_price = $_POST['pd_price'];
    $description = $_POST['description'];
  
    $sql = "UPDATE `products` SET `pd_name`='$pd_name',`pd_price`='$pd_price',`description`='$description',`pd_img`='$pd_img'  WHERE pd_id = $id";
    $result = mysqli_query($conn, $sql);
  
    if ($result) {
      header("Location:../products.php?msg=edited");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>Edit products</title>
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
            <h3>Edit Product Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

    <?php
    $sql = "SELECT * FROM products WHERE pd_id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <form class="container d-flex justify-content-center" action="" method="post" style="width:50vw;min-width:300px;">
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="pd_img" accept='image/*' value="<?php echo $row["pd_img"]; ?>" enctype='multipart/form-data'>
        </div>
    <div class="col">
            <label class="form-label">Product Name:</label>
            <input type="text" class="form-control" name="pd_name" value="<?php echo $row["pd_name"]; ?>">
    </div> 
    <div class="mb-3">
            <label class="form-label">Price:</label>
            <input type="number"  class="form-control" name="pd_price" value="<?php echo $row["pd_price"]; ?>" step=".01" >
    </div> 
    <div class="form-group mb-3">   
    <label class="form-label">Description:</label>
            <input type="text"  class="form-control" name="description" value="<?php echo $row["description"]; ?>" >
    </div>
    <div>
        <button type="submit" class="btn btn-success" name="submit">Save</button>
        <a href="../products.php" class="btn btn-danger">Cancel</a>
    </div>
    </form>
</div>

        
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>