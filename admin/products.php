<?php 
session_start();
include_once "db_conn.php";

$sql = "SELECT * FROM admins WHERE adm_id = 1";
$result = mysqli_query($conn, $sql);
$adm = mysqli_fetch_assoc($result);


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
if (isset($_GET["msg"])) {
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
        <h1 class="mt-5 text-center">Available Products</h1>
        <a href="add/add_products.php" class="btn btn-dark mb-3">Add New</a>
        <table class="table table-hover text-center text-light">
            <thead class="table-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><img src='../imgs/<?php echo $row["pd_img"] ?>'></td>
            <td><?php echo $row["pd_id"] ?></td>            
            <td><?php echo $row["pd_name"] ?></td>
            <td><?php echo $row["pd_price"] ?></td>
            <td><?php echo $row["description"] ?></td>
            <td>
              <a href="edit/edit_products.php?id=<?php echo $row["pd_id"] ?>" ><button class='btn btn-info'>Edit</button></a>
              <a href="delete/delete_products.php?id=<?php echo $row["pd_id"] ?>"><button class='btn btn-danger'>Delete</button> </a>
            </td>
          </tr>
        <?php
        }
        ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</body>
</html>