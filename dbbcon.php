<?php
$servername = "localhost";
$username1 = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username1, $password,'info+db');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
?>