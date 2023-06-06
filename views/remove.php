<?php
session_start();
if (isset($_POST['remove'])) {
    $pd_id = $_POST['remove'];
    unset($_SESSION['order'][$pd_id]);
}
header('Location:index.php?p=orders');