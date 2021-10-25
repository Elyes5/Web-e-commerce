<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="listecommande1.css" type="text/css">
</head>
<body>
<center>
<?php
require_once'dbbcon.php';
session_start();
?>
<header>

<a href="listprod.php" class="rotation">Gestion Des Produits</a>
<center><a href="listecommande.php" class="translation">Gestion Des Commandes</a></center>
<a href="user.php" class="translation2">Gestion Des Clients</a>
<a href="adminpanel.php"><img src="logo.png" class="logo"></a>
<?php echo '<div class="welcome">Welcome '.$_SESSION['admin']['adminid'].'</div>' ?>
<?php echo '<div class="welcome2">Welcome '.$_SESSION['admin']['adminid'].'</div>' ?>
</header>
<table>
<td colspan="6"><center><h1>TOUTES LES COMMANDES</h1></center></td>
</tr>
<?php
$res1=mysqli_query($conn,"SELECT f.idcommande,p.image,p.nomprod,f.qte,c.statut,c.date FROM commande c,produit p,facture f WHERE  c.idcommande=f.idcommande and f.idprod=p.idprod ");
for($i=0;$i<mysqli_num_rows($res1);$i++){
  $data1=mysqli_fetch_array($res1);
?>
<tr>
<td colspan='2'>
<img src="<?php print $data1[1]; ?>" width="104" height="104" >
</td>
<td colspan='4'>
<?php print $data1[2]; ?><br>
commande n° <?php print $data1[0]; ?><br>
quantite: <?php print $data1[3]; ?><br>
<?php if ($data1[4]=="en cours")
 print "<label style='color:orange;'>".$data1[4]."</label>"; 
 elseif ($data1[4]=="annulee")
 print "<label style='color:red;'>".$data1[4]."</label>"; 
 elseif ($data1[4]=="validee")
 print "<label style='color:rgb(37, 223, 37);'>".$data1[4]."</label>"; 
 ?><br>
le <?php print $data1[5]; ?><br>
</td>
<td>
<a href="affichecommande.php?com=<?php print $data1[0]; ?> "><img src="details.png" width="30px" height="30px" class="translateimg"></a> 
</td>
</tr>
<?php } ?>
</tbody>
</table>
</center>	
</body>
</html>