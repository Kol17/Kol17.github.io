<?php 
session_start();

$_SESSION['authenticated'] = false;
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    include "db_conn.php";
    // Retrieve username and password from login form
    $adm_name = $_POST['adm_name'];
    $adm_pw = $_POST['adm_pw'];

    $sql = "SELECT * FROM `admins` WHERE adm_name = '$adm_name' and adm_pw = '$adm_pw'";
    $res = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($res);

    // Check the username and password are correct
    if ($num>0)
    {   
        $_SESSION['authenticated'] = true;
        $_SESSION['adm_name'] = $adm_name;
        header('Location:dashboard.php?');
        exit;
    }
    else
    {
        $_SESSION['authenticated'] = false;
        echo "
    <div class='alert alert-info alert-dismissible fade show w-50 mt-3 text-center' role='alert' style='margin-left:25%;'>
    <strong> Invaid username or password </strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
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
<style>
body{
    display:inline;
}
.item{
    padding:10px 10px;
    margin:5px 5px;
}
.item label{
    width: 30%;
}
</style>
<div class='adm_login'>
<form method='post' action=''>
    <h2>Admin Login</h2>

    <div class="item">
    <label for='adm_name'>Name</label>
    <input type='text' name='adm_name' id='adm_name' placeholder='Enter full name'>
    </div>

    <div class="item">
    <label for='adm_pw'>Password</label>
    <input type='password' name='adm_pw' id='adm_pw' placeholder='Enter password'>
    </div>

    <div class='button mt-3 mb-3'>
        <button type='submit' class='btn btn-primary mr-3' name='submit-login'>Submit</button>
        <button type='reset' class='btn btn-warning' name='reset-login'>Remove</button>
    </div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>