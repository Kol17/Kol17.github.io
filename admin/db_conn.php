<?php
// Establish a connection
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'cafe_db'
);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
