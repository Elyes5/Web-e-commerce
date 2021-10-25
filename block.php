<?php
require_once'dbbcon.php';

$identity=$_GET['id'];
$sql = "UPDATE `clients` SET `statue`='active' where `uss`=$identity";
echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn)>0){
	header('location:user.php');
}
else{
	echo "not updated";
	exit();
}
?>