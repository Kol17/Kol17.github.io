<?php
session_start();

if (isset($_POST['update'])) {
    $pd_id = $_POST['update'];
    $pd_qty = $_POST['pd_qty'];
    $_SESSION["order"][$pd_id] = $pd_qty;
}
header('Location:index.php?p=orders');
