<?php
 require_once'dbbcon.php';
session_start();
$_SESSION['username']=null;
session_destroy();
header("location:essai.php");
?>