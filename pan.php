<?php

session_start();
require_once'dbbcon.php';
if(isset($_SESSION['username'])){
if (isset($_GET['code']) && $_GET['code']!=""){
$code = $_GET['code'];
$result = mysqli_query($conn,"SELECT * FROM `produit` WHERE `idprod`='$code'");
$row = mysqli_fetch_assoc($result); 
$res4=mysqli_query($conn,"SELECT * FROM panier WHERE uss='".$_SESSION['username']."' AND idprod='".$code."' ");
if (mysqli_num_rows($res4)==0){
$res5=mysqli_query($conn,"INSERT INTO `panier`(`uss`, `idprod`, `qte`) VALUES ('".$_SESSION['username']."','".$code."',1)");
$cartArray = array();
$cartarray2= array();
$cartArray2['name']=$row['nomprod'];
    $cartArray2['code']=$row['idprod'];
    $cartArray2['price']=$row['prix'];
    $cartArray2['quantity']=1;
    $cartArray2['image']=$row['image'];
$cartArray[$row['idprod']]=$cartArray2 ;
}

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
}else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	}

}
header("location:cart.php");
}
else {
    header("location:projet.php");
}
?>