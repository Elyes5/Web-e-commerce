<!DOCTYPE html>
<html lang="en">
<head>
    <style>
            .Modif{
    color:rgb(40, 155, 40);
    font-family:new;
    display:inline-block;
    animation:colorchange 5s infinite;
    }
    @keyframes colorchange{
        0%
        {
        color:rgb(26,25,25);
        }
        50%{
        color:rgb(40, 155, 40);
        }
        75%{
        color:rgb(40, 155, 40);
        }
        100%
        {
        color:rgb(40, 155, 40);
        }
    }
    .Modif1{
    color:rgb(40, 155, 40);
    font-family:new;
    display:inline-block;
    animation:colorchange2 5s infinite;
    }
    @keyframes colorchange2{
        0%
        {
        color:rgb(26,25,25);
        }
        50%{
        color:red;
        }
        75%{
        color:red;
        }
        100%
        {
        color:red;
        }
    }
     </style>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="listeproduit1.css" type="text/css">
</head>
<body>
<?php
require_once'dbbcon.php';
session_start();
?>
<a href="listecommande.php" class="refprecedent"><img src="fleche.jpg" class="precedent" width="25px"></a>
<a href="listecommande.php" class="Precedent2">Precedent</a>
<a href="ajoutproduit.php" class="add"><img src="ButtonAdd.png" class="imgadd"></a>
<center>    <?php if (isset($_SESSION['test10'])){
        echo "<p class='Modif'> Modification Realisee Avec Succes </p>";
        unset($_SESSION['test10']);}
        ?>
    </center>
    <center><?php if (isset($_SESSION['test11'])){
        echo "<p class='Modif'> Ajout Realise Avec Succes </p>";
        unset($_SESSION['test11']);}
        ?>
    </center>
    <center><?php if (isset($_SESSION['test12'])){
        echo "<p class='Modif1'> Suppression Realisee Avec Succes </p>";
        unset($_SESSION['test12']);}
        ?>
    </center>

<table border="1" >
<tr>
<th></th>
<th>nom produit</th>
<th>prix</th>
<th>marque</th>
<th>description</th> 
<th>Modification</th>
<th>Suppression</th>  
</tr>
<?php 
$sql="SELECT * FROM `produit` ";
$result = mysqli_query($conn,$sql);
for($i=0;$i<mysqli_num_rows($result);$i++){
    $data=mysqli_fetch_assoc($result);
?>
<tr>
<td>
<img src="<?php print $data['image']; ?>" height='104' width='104' >
</td>
<td>
<?php print $data['nomprod']; ?>
</td>
<td>
<?php print $data['prix']; ?>
</td>
<td>
<center><?php print $data['Marque']; ?></center>  
</td>
<td>
<?php print $data['desc']; ?>
</td>
<td class="modif">
<a href="mprod.php?id='<?php print $data['idprod'] ?>' "><img src="Update.png" width="50px" class="update"></a><br></td>
<td><a href="delete.php?id='<?php print $data['idprod'] ?>' "><img src="delete.png" width="50px" class="delete"></a></td>
</tr>
<?php } ?>


</table>
</body>
</html>