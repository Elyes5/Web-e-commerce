<?php
 require_once'dbbcon.php';
 session_start();
if (isset($_SESSION['username'])){
if(isset($_GET['idprod'])){
    $idprod=$_GET['idprod'];
}
elseif (isset($_SESSION['idprod'])){
    $idprod=$_SESSION['idprod'];
}
$sql = "INSERT INTO `panier`(`uss`, `idprod`, `qte`) VALUES ('".$_SESSION['username']."','".$idprod."','1')";
$result = mysqli_query($conn,$sql);
if($result)
{
    header("location:pan.php");
}
else
{
  
  header("location:welcome.php");
}
}
else{
    header("location:projet.php");
}
?>