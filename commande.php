<?php 
require_once'dbbcon.php';
$sql="SELECT * FROM `panier` where uss='".$_GET['code']."'";
$result = mysqli_query($conn,$sql); 
$date = date('Y-m-d H:i:s');
$ch='en cours';
$sql2="INSERT INTO `commande`(`uss`,`prixtot`,`date`,`statut`) VALUES ('".$_GET['code']."','".$_GET['tot']."','".$date."','".$ch."')";
$result2 = mysqli_query($conn,$sql2);
$res1 = mysqli_query($conn,"SELECT * FROM `commande` WHERE `uss`='".$_GET['code']."'");
mysqli_data_seek($res1, mysqli_num_rows($res1)-1);
$row = mysqli_fetch_assoc($res1); 
$com1=array();
$com=array();
for($i=0;$i<mysqli_num_rows($result);$i++){
$data=mysqli_fetch_assoc($result);
$sql5="INSERT INTO `facture`(`idcommande`, `idprod`,`qte`) VALUES ('".$row['idcommande']."','".$data['idprod']."','".$data['qte']."') ";
$result5=mysqli_query($conn,$sql5);
$sql4="SELECT * FROM `produit` WHERE `idprod`='".$data['idprod']."'";
$result4=mysqli_query($conn,$sql4);
$data1=mysqli_fetch_assoc($result4);
$com1['name']=$data1['nomprod'];
        $com1['prix']=$data1['prix'];
        $com1['qte']=$data['qte'];
        $com1['image']=$data1['image'];
    $com[$i]=$com1 ;
$sql1="DELETE FROM `panier` WHERE uss='".$_GET['code']."' and idprod='".$data['idprod']."'";
$sql3="UPDATE `produit` SET `qte`=`qte`-'".$data['qte']."' WHERE idprod='".$data['idprod']."'";
$result3 = mysqli_query($conn,$sql3);
$result1 = mysqli_query($conn,$sql1);
}
session_start();
$_SESSION['com']=$com;
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
header('location:cart.php');
?>

