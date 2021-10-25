<?php 
require_once'dbbcon.php';
session_start();
extract($_POST);
$res5=mysqli_query($conn,"INSERT INTO `panier`(`uss`, `idprod`, `qte`) VALUES ('".$_SESSION['username']."','".$cpu."',1)");
$res5=mysqli_query($conn,"INSERT INTO `panier`(`uss`, `idprod`, `qte`) VALUES ('".$_SESSION['username']."','".$gpu."',1)");
$res5=mysqli_query($conn,"INSERT INTO `panier`(`uss`, `idprod`, `qte`) VALUES ('".$_SESSION['username']."','".$ram."',1)");
$res5=mysqli_query($conn,"INSERT INTO `panier`(`uss`, `idprod`, `qte`) VALUES ('".$_SESSION['username']."','".$motherboard."',1)");
$res5=mysqli_query($conn,"INSERT INTO `panier`(`uss`, `idprod`, `qte`) VALUES ('".$_SESSION['username']."','".$harddisk."',1)");
unset($_SESSION["shopping_cart"]);
if(empty($_SESSION["shopping_cart"])) {
    $cartArray = array();
    $cartarray2= array();
    $res2=mysqli_query($conn,"SELECT * FROM `panier` WHERE `uss`='".$_SESSION['username']."'");
    for($i=0;$i<mysqli_num_rows($res2);$i++){
    $row2=mysqli_fetch_assoc($res2);
    $res3=mysqli_query($conn,"SELECT * FROM `produit` WHERE `idprod`='".$row2['idprod']."'");
    $row3=mysqli_fetch_assoc($res3);
    $cartArray2['name']=$row3['nomprod'];
        $cartArray2['code']=$row3['idprod'];
        $cartArray2['price']=$row3['prix'];
        $cartArray2['quantity']=$row2['qte'];
        $cartArray2['image']=$row3['image'];
    $cartArray[$row3['idprod']]=$cartArray2 ;
    }
    $_SESSION["shopping_cart"] = $cartArray;
    } 

header("location:cart.php");
?>
