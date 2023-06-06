<?php
include "../db_conn.php";
$user = 0;

$sql = "SELECT * FROM admins WHERE adm_id = 1";
$result = mysqli_query($conn, $sql);
$adm = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) 
{
    $cus_name = $_POST["cus_name"];
    $cus_ph = $_POST["cus_ph"];
    $cus_em = $_POST["cus_em"];
    $cus_pw = $_POST["cus_pw"];
    $cus_pw_re = $_POST["cus_pw_re"];

//execute query
$sql = "SELECT * FROM customers
        WHERE cus_name = '$cus_name';";
$check = mysqli_query($conn,$sql);

if($check){
    $num = mysqli_num_rows($check);
    if($num != 0){
        $user = 1;
    }
    else{
        $user = 0;
        $query = "INSERT INTO `customers`(`cus_name`, `cus_ph`, `cus_em`, `cus_pw`, `cus_pw_re`) VALUES 
                ('$cus_name','$cus_ph','$cus_em','$cus_pw','$cus_pw_re')";
        $res = mysqli_query($conn,$query);
        if($res){
            header("Location:../users.php?msg=added");
        }
        else{
            die(mysqli_error($conn));
        }
    }
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
<?php if($user==1){ ?> 
    <div class='alert alert-danger alert-dismissible fade show w-50 mt-3 text-center' role='alert' style='margin-left:25%;'>
    <strong>Sorry! Users has already been taken </strong>Please enter other name
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
<?php } ?> 
    <div class="text-center mb-4">
            <h3 class='mt-3'>Add New Users</h3>
    </div>
    <form class="container p-5 justify-content-center" action="" method="post" style="width:50vw;min-width:300px;" enctype="multipart/form-data">

    <div class="row">
        <label class="form-label">Full name</label>
        <input type="text" class="form-control" name="cus_name">
    </div> 
    <div class="row">
        <label class="form-label">Phone :</label>
        <input type="text" class="form-control" name="cus_ph">
    </div>
    <div class="row">
        <label class="form-label">Email :</label>
        <input type="email" class="form-control" name="cus_em">
    </div> 
    <div class="row">
            <label class="form-label">Password :</label>
            <input type="password" class="form-control" name="cus_pw">
    </div> 
    <div class="row">
        <label class="form-label">Re-Password :</label>
        <input type="password"  class="form-control" name="cus_pw_re">
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-success" name="submit">Save</button>
        <a href="users.php?msg=added" class="btn btn-danger">Cancel</a>
    </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>