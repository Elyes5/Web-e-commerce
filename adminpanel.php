<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="adminpanel1.css">
</head>
<body>
<?php
require_once'dbbcon.php';
session_start();
?>
<header>
<a href="listprod.php" class="rotation">Gestion Des Produits</a>
<a href="listecommande.php" class="translation">Gestion Des Commandes</a>
<a href="user.php" class="translation2">Gestion Des Clients</a>
<img src="logo.png" class="logo">
<?php echo '<div class="welcome">Welcome '.$_SESSION['admin']['adminid'].'</div>' ?>
<?php echo '<div class="welcome2">Welcome '.$_SESSION['admin']['adminid'].'</div>' ?>
</header>
<?php $sql='SELECT AVG(feedback) as AVGfeedback from feedbackstar'; 
$result=mysqli_query($conn,$sql); 
$data6=mysqli_fetch_assoc($result);?>

<center>
<table id="tablefeedback">
<tr>
<td colspan="4" class="edit"><div class="edit1">Feedback Table</div><div class="star">★</div></td>
</tr>
<tr><td colspan="4" style="text-align:center"><p id="edit5">MOYENNE DU FEEDBACK : <?php echo $data6['AVGfeedback']."★";?></p></td></tr>
<?php 
$sql="SELECT * FROM `feedback` ";
$result = mysqli_query($conn,$sql);
for($i=0;$i<mysqli_num_rows($result);$i++){
    $data=mysqli_fetch_assoc($result);
?>
<tr>
<td>
you have a feedback with subject <br>
<?php print $data['subject']; ?>
</td>
<td>
with problem: <br>
<?php print $data['problem']; ?>
</td>
<td>
from our client: <br>
<?php print $data['mail']; ?>
</td>
<td>
if you want to answer it 
<form action="" method='POST'>
<input type="text" name='an<?php print $i ?>'  placeholder='answer...' > 
<input type="submit" value='send'>
</form> 
</td>
</tr>
<a href="logoutadmin.php" style="Color:white;text-decoration:none;font-family:new2;display:inline-block;border:1px solid white;padding:3px;position:relative;left:1075px;top:-60px;">Log Out</a>
<?php
if (isset($_POST['an'.$i])){
$to       = $data['mail'];
$subject  = $data['subject'];
$message  = $_POST['an'.$i];
mail($to, $subject, $message);
$sql2="DELETE FROM `feedback` WHERE id='".$data['id']."' ";
$result2= mysqli_query($conn,$sql2);
}}  ?>

</table>
</center>
</body>
</html>