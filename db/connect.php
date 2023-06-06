<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "cafe_db";

// Execute connection and check connection
$conn = new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
    die("Connection failed :".$conn->connect_error);
}
