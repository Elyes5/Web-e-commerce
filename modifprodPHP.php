<?php
session_start();
require_once'dbbcon.php';
$id=$_SESSION['id_prod'];
if($_POST){
	extract($_POST);
$sql = "UPDATE `produit` SET `nomprod`='".$nomprod."',`prix`=".$prix.",`qte`=".$qte.",`image`='".$img."',`Marque`='".$Marque."',`imagemarque`='".$imagemarque."',`desc`='".$desc."',`video`='".$Lien."',`fiche`='".$fiche."' where `idprod`=".$id."";
$result = mysqli_query($conn,$sql);
$res=mysqli_affected_rows($conn);
if($res>0)
{
    header("location:listprod.php");
    $_SESSION['test10']='';
}
else
{
    exit();
}



}
?>