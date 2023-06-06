<?php 
$user = 0;
$success = 0;

if($_SERVER['REQUEST_METHOD']=='POST')
{
include 'conn.php';
    
    $cus_name = $_POST["cus_name"];
    $cus_ph = $_POST["cus_ph"];
    $cus_em = $_POST["cus_em"];
    $cus_pw = $_POST["cus_pw"];
    $cus_pw_re = $_POST["cus_pw_re"];

    $query1 = "SELECT * FROM `customers` 
                WHERE `cus_name`= '$cus_name' ";
    $check =   mysqli_query($conn,$query1);

    if($check){
        $num = mysqli_num_rows($check);
        if($num != 0){
            $user = 1;
        }
        else{
            $query2= "INSERT INTO `customers`(`cus_name`, `cus_ph`, `cus_em`, `cus_pw`, `cus_pw_re`) VALUES 
                    ('$cus_name','$cus_ph','$cus_em','$cus_pw','$cus_pw_re')";
            $res = mysqli_query($conn,$query2);
            if($res){
                $success = 1 ;
            }
            else{
                die(mysqli_error($conn));
            }
        }
    }
    else{
        die(mysqli_error($conn));
    }
}
if($user){
    $info = "
    <div class='alert alert-danger alert-dismissible fade show w-50 mt-3 text-center' role='alert' style='margin-left:25%;'>
    <strong>Sorry! Users has already been taken </strong>Please enter other name
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
if($success){
    $info = "
    <div class='alert alert-success alert-dismissible fade show w-50 mt-3 text-center' role='alert' style='margin-left:25%;'>
    <strong>Registration Succeed !</strong>Please login to enter 
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";  
}
    

$info = "
<div class='cus_reg'>
<form action='' method='post'>
<h2 class='text-center'>Registration</h2>
<label for='cus_name'> User name </label>
<input type='text' id='cus_name' name='cus_name' placeholder='Enter user name'>

<label for='cus_ph'> Phone number </label>
<input type='text' id='cus_ph' name='cus_ph' placeholder='Enter phone number'>

<label for='cus_em'> Email </label>
<input type='email' id='cus_em' name='cus_em' placeholder='Enter email'>

<label for='cus_pw'> Password </label>
<input type='password' id='cus_pw' name='cus_pw' placeholder='Create a password' min='8'>

<label for='cus_pw_re'> Confirm Password </label>
<input type='password' id='cus_pw_re' name='cus_pw_re' placeholder='Retype to confirm your password' min='8'>

<div class='button'>
<button type='submit' class='btn btn-primary' name='submit-registration'>Register</button>
<button type='reset'  class='btn btn-warning' name='reset-registration'>Clear</button>  
</div>
<a href='index.php?p=login'>Already registerd?Login here</a>
</form>
</div>
";