<?php
session_start();
require_once'dbbcon.php';
$sql3="UPDATE `commande` SET `statut`='annulee' WHERE idcommande='".$_GET['idc']."'";
$result3 = mysqli_query($conn,$sql3);
$sql="SELECT f.idprod,f.qte from commande c,facture f where c.idcommande=f.idcommande and c.idcommande='".$_GET['idc']."' ";
$result = mysqli_query($conn,$sql);
for($i=0;$i<mysqli_num_rows($result);$i++){
$data=mysqli_fetch_array($result);
$sql2="UPDATE `produit` SET `qte`=`qte`+'".$data[1]."' WHERE idprod='".$data[0]."'";
$result2 = mysqli_query($conn,$sql2);
}
if(isset($_SESSION['username'])){
    header("location:cart.php");
    }else{
        header("location:listecommande.php");   
    }
?>