<?php
session_start();
require_once'dbbcon.php';
if(isset($_POST['username'])){
$us = $_POST['username'];
$ps= $_POST['pas'];
$sql = "SELECT* FROM clients where uss='".$us."' and pass='".$ps."' ";
$result = mysqli_query($conn,$sql);

if( mysqli_num_rows($result)>0){

    
    $_SESSION["username"]=$us;

    header("location:essai.php");

}
else{
 $_SESSION['erreur']="Login Failed";
 header('location:projet.php');
}

}
?>