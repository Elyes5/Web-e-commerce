<?php
session_start();
 require_once'dbbcon.php';
if(isset($_POST['cat'])){
$cat = $_POST['cat'];
$prix= $_POST['prix'];
$name=$_POST['nomprod'];
$img=$_POST['img'];
$qte=$_POST['qte'];
$desc=$_POST['desc']; 
$Marque=$_POST['Marque'];
$imagemarque=$_POST['imagemarque']; 
$fiche=$_POST['fiche'];
$Lien=$_POST['Lien'];
$sql1="SELECT * FROM `ctategorie` where nomcat='".$cat."'";
$result1 = mysqli_query($conn,$sql1);
$data=mysqli_fetch_assoc($result1);
$sql = "INSERT INTO `produit`( `nomprod`, `idcat`, `prix`, `qte`, `image`, `desc`, `Marque`, `imagemarque`,`fiche`,`video`) VALUES ('".$name."','".$data['idcat']."','".$prix."','".$qte."','".$img."','".$desc."','".$Marque."','".$imagemarque."','".$fiche."','".$Lien."')";
$result = mysqli_query($conn,$sql);
if($result)
{   
    header("location:listprod.php");
    $_SESSION['test11']='';

}
else
{
  
  header("location:ajoutproduit.php");
}
}
else
{
  
  header("location:admin.php");
}

?>