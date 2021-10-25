<?php
require_once'dbbcon.php';
$sql="SELECT * FROM `panier` where uss=.$_SESSION[username]. " ;
$result = mysqli_query($conn,$sql);
$nb=mysqli_num_rows($result);
?>