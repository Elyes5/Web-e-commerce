<?php
session_start();
require_once'dbbcon.php';

if($_POST){
	extract($_POST);
	$sql = "INSERT INTO `clients`(`fullname`, `adr`, `mail`, `pass`, `Dness`, `uss`,`sexe`) VALUES ('".$name."','".$adresse."','".$mail."','".$pas."','".$Dness."','".$username."','".$r."')";
	print $sql;
	//executer
	$res = mysqli_query($conn,$sql);
	//read results
	if($res){
		$_SESSION['info']="you just signed in please log in !";
		header('location:projet.php');
	}
	else{
		echo "erreur";
	}

$conn->close();
}

