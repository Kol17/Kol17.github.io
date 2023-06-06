<?php
include "../db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM customers WHERE cus_id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location:../users.php?msg=deleted");
} else {
  echo "Failed: " . mysqli_error($conn);
}