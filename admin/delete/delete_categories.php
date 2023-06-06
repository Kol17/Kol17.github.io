<?php
include "../db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM categories WHERE cat_id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location:../categories.php?msg=deleted");
} else {
  echo "Failed: " . mysqli_error($conn);
}