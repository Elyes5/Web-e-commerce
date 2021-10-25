<?php 
session_start();
require_once'dbbcon.php';
$sql3="UPDATE `commande` SET `statut`='validée' WHERE idcommande='".$_GET['idc']."'";
$result3 = mysqli_query($conn,$sql3);