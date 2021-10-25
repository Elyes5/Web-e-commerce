<?php
 require_once'dbbcon.php';
if(isset($_POST['username'])){
$us = $_POST['username'];
$ps= $_POST['pas'];
$no=$_POST['name'];
$pas2=$_POST['pas2'];
$sexe=$_POST['r'];
$adresse=$_POST['adresse'];
$mail=$_POST['mail'];
$dn=$_POST['Dness'];
if ($ps==$pas2)
{
$sql = "INSERT INTO `clients`(`fullname`, `adr`, `mail`, `pass`, `Dness`, `uss`, `sexe`) VALUES ('".$no."','".$adresse."','".$mail."','".$ps."','".$dn."','".$us."','".$sexe."')";
$result = mysqli_query($conn,$sql);
if($result)
{
    header("location:projet.php");
}
else
{
  
  header("location:signup.html");
}
}
else
{
  
  header("location:signup.html");
}
}
?>