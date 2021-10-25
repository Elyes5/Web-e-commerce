<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>user</title>
    <link href="user.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php session_start() ?>    
<header>
<a href="listprod.php" class="rotation">Gestion Des Produits</a>
<center><a href="listecommande.php" class="translation">Gestion Des Commandes</a></center>
<a href="user.php" class="translation2">Gestion Des Clients</a>
<a href="adminpanel.php"><img src="logo.png" class="logo"></a>
<?php echo '<div class="welcome">Welcome '.$_SESSION['admin']['adminid'].'</div>' ?>
<?php echo '<div class="welcome2">Welcome '.$_SESSION['admin']['adminid'].'</div>' ?>
</header>
<center>
<table border="1">
<?php 
require_once'dbbcon.php';
$sql="SELECT * FROM `clients` ";
$result = mysqli_query($conn,$sql);
for($i=0;$i<mysqli_num_rows($result);$i++){
    $data=mysqli_fetch_assoc($result);
?>
<tr>
<td>
username <br>
<?php print $data['uss']; ?>
</td>
<td>
E-MAIL <br>
<?php print $data['mail']; ?>
</td>
<td>
fullname: <br>
<?php print $data['fullname']; ?>
</td>
<td>
statut: <br>
<?php print $data['statue']; ?>
</td>
<td width=100px class="acc">
 
<?php if ($data['statue']=='active'){ ?>
	 <a class="block" href="activate.php?id='<?php print $data['uss'] ?>' ">block</a><br>
<?php } ?>
<?php
if ($data['statue']=='blocked') { ?>
	<a class="activate" href="block.php?id='<?php print $data['uss'] ?>' ">activer</a><br>
<?php } ?>

</td>
</tr>
<?php } ?>
</table>
</center>
</body>
</html>