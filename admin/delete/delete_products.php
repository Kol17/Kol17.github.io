<?php
include "../db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM products WHERE pd_id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location:../products.php?msg=deleted");
} else {
  echo "Failed: " . mysqli_error($conn);
}