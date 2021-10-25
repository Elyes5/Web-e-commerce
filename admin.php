<!DOCTYPE html5>
<style>
.site-title img {
 max-height: 100px;
 max-width: 400px;
}
</style>
<head>
<title>
Admin</title>
<link rel = "icon" href = "logo.png" class="site-title">

    </head>
	<?php
	
	session_start();

	
$servername = "localhost";
$username1 = "root";
$password = "";
$msg="";
// Create connection
$conn = mysqli_connect($servername, $username1, $password,'info+db');
if(isset($_POST['username'])){
$us = $_POST['username'];
$ps= $_POST['pas'];
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT* FROM admin where adminid='".$us."' and adminpass='".$ps."'";
$result = mysqli_query($conn,$sql);
if( mysqli_num_rows($result)>0){
header('location:adminpanel.php');
$row= $result->fetch_assoc();
$_SESSION['admin']=$row;

}
else{
$msg="invalid login";
}
}
?>
<link rel="stylesheet" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab+Highlight:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" href="projet.css">
</head>
<body>
<form method="post" action="#">
<center>

<div class=container>
<div class="container1">
<label For="Login" id="Login">admin pannel login</label><br>
<label For="Username">Username</label><br>
<input type="text" placeholder="Enter Username" name="username" required><br>
<label For="Password">Password</label><br>
<input type="password" placeholder="Enter Password" name="pas" required pattern="[A-Za-z0-9]{8,20}"><br><br>
<input type="submit" value="Login" id="buttonlogin"><br>
</div>
<div class="container2">
<img id="img1" src="logo.png">
<label id="labelimg1">Info +</label>
<div class="erreur"> 
  <h3 style="color:white;font-family:'new', cursive; "><?php  echo  $msg; ?> </h3> 
</div>
</div>
</div>
</center>
</form>
</body>
</html>