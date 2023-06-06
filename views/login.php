<?php 
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{  
        include 'conn.php';
        //Retrieve customer name and password from login form 
        $cus_name = $_POST['cus_name'];
        $cus_pw = $_POST['cus_pw'];
        
    // Validation of customer name and password
        $sql =  "SELECT * FROM `customers` 
        WHERE cus_name = '$cus_name' and cus_pw = '$cus_pw' ";
        $res = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($res);

        if($num>0){
            $_SESSION['authenticated'] = true;
            $_SESSION['cus_name'] = $cus_name;
            header("Location: index.php?user=$cus_name");
            exit;
        }  
        else{
            $_SESSION['authenticated'] = false;
            echo "Invalid username or password";
        }
}

$info = "
<div class='cus_login'>
<form method='post' action=''>
    <h2 class='text-center'>Login</h2>
    <label for='cus_name'>Name</label>
    <input type='text' name='cus_name'  placeholder='Enter user name'>
    <label for='cus_pw'>Password</label>
    <input type='password' name='cus_pw' placeholder='Enter password'>

    <div class='button'>
        <button type='submit' class='btn btn-primary' name='submit-login'>Login</button>
        <button type='reset' class='btn btn-warning' name='reset-login'>Remove</button>
    </div>
    <a href='index.php?p=register'>No accounts? Create one here</a>
</form>
</div>
";