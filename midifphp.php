<?php
 require_once'dbbcon.php';
if(isset($_POST['username'])){
$ps= $_POST['pas'];
$no=$_POST['name'];
$adresse=$_POST['adresse'];
$mail=$_POST['mail'];
$sexe=$_POST['r'];
$pas2=$_POST['pas2'];
$dn=$_POST['Dness'];
$us = $_POST['username'];
if ($ps==$pas2)
{
$sql = "UPDATE `clients` SET `fullname`='".$no."'  ,`adr`='".$adresse."',`mail`='".$mail."',`pass`='".$ps."',`Dness`='".$dn."',`sexe`='".$sexe."' where`uss`='".$us."'";
$result = mysqli_query($conn,$sql);
$res=mysqli_affected_rows($conn);
if($res>0)
{
   
    header("location:welcome.php");
    
}
else
{
    echo "mochkel";
}
}
else
{
  header("location:modif.php");
}
}
?>