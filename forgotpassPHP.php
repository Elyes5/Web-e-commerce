<?php
session_start();
require_once'dbbcon.php';
if($_POST){
	extract($_POST);
	$sql="SELECT * FROM `clients` where uss='".$username."'";
     $res = mysqli_query($conn,$sql);
     $row=mysqli_fetch_assoc($res);
     $random=rand(1000,9999);
     $to= $row['mail'];
     $subject  = "your password reset code";
     $message  =$random;
     mail($to, $subject, $message);
     $_SESSION['reset']=$random;
     $_SESSION['pass']=$row['pass'];
     $_SESSION['mail']=$row['mail'];
     $_SESSION['username']=$row['uss'];
     $_SESSION['i']=1;
     header('location:reset.php');

 }

