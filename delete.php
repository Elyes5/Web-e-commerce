<?php
session_start();
require_once'dbbcon.php';
$identity=$_GET['id'];
echo "$identity";
$sql="DELETE FROM `produit` WHERE idprod=".$identity."";
$result = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn)>0){
	echo "deleted";
	header("location:listprod.php");
	$_SESSION['test12']='';
}
else{
	echo "not deleted";
}


?>