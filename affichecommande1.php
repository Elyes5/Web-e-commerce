<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" type="text/css" href="affichecommande.css">
</head>
<body>
    <a href="cart.php"><img src="fleche.jpg" class=rotation></a><p>Precedent</p>
    <center>
    <table width=500px>
    <tr><td class="comm" colspan="4"><center><h1 class="heading1">commandes</h1></center><img src="delivery2.png" class="delivery"></td></tr>
    <tr>
    <?php 
    session_start();
    require_once'dbbcon.php';
    if(isset($_SESSION['username'])){ ?>
    
    <?php } ?>
    <th class="detail" colspan="3">
       
    <center>Detail de la Commande</th></center>
    </tr>
    <?php
$res1=mysqli_query($conn,"SELECT f.idcommande,p.image,p.nomprod,f.qte,c.statut,c.date,p.prix,c.prixtot,p.qte,P.idprod,c.uss FROM commande c,produit p,facture f WHERE c.idcommande=f.idcommande and f.idprod=p.idprod  and c.idcommande=f.idcommande and c.idcommande='".$_GET['com']."' ");
$data1=mysqli_fetch_array($res1);
 $tot=$data1[7];
 $uss=$data1[10]; 
 ?>
<tr>
    <td colspan='2'>Commande n° <?php print $data1[0]; ?><br>
    article <?php print mysqli_num_rows($res1) ?><br>
    effectuee le <?php print $data1[5]; ?><br>
    total : <?php print $data1[7]; ?> DT
    
</td>
<td class="button2">
<?php if($data1[4]=='en cours'){ ?>
<center><button onclick="window.location.href ='annuler.php?idc=<?php print $data1[0]; ?>'">annuler la Commande</button></center>
<?php 
if (isset($_SESSION['admin'] ['adminid'])){
    ?>
    <button class="buttonval" onclick="window.location.href ='facture.php?idc=<?php print $data1[0]; ?>'">valider la commande</button>


<?php }} ?>
<?php if($data1[4]=='validee'){ ?>
    <button onclick="window.location.href ='facture.php?idc=<?php print $data1[0]; ?>'">visualiser facture</button>
<?php } ?>
</td>
</tr>
<tr>
    <th colspan="3" ><center>Article dans vos commandes</center></th>
</tr>
<?php 
for($i=0;$i<mysqli_num_rows($res1);$i++){
    
?>
    <tr>
    <td>
    <?php if ($data1[4]=='en cours') 
    echo '<p class="en_cours">'.$data1[4].'</p><br>'; 
     elseif ($data1[4]=='validee') 
     echo '<p class="Confirmer">'.$data1[4].'</p><br>';
    elseif ($data1[4]=='annulee') 
     echo '<p class="Annuler">'.$data1[4].'</p><br>'; ?>
    le <?php print $data1[5]; ?><br>
    <img src="<?php print $data1[1] ?>" width="104" height="104" >
    </td>
    <td class=>
    <?php print $data1[2]; ?><br>
    quantite:<?php print $data1[3]; ?><br>
    <?php print $data1[6]; ?> DT<br>
    </td>
    <td class="button1">
    <?php if($data1[8]> 0){
        if(isset($_SESSION['username'])){
     ?>
        <center><button onclick="window.location.href = 'pan.php?code=<?php print $data1[9]; ?>'">Commander a nouveau</button></center>
            
   <?php }} ?>
    </td>
    </tr>
<?php $data1=mysqli_fetch_array($res1); } ?> 
<tr>
<th class="paiement" colspan="2" > Paiement </th>
<th class="livraison" colspan="1"> Livraison </th>
</tr>
<tr>
<td colspan="2">
<b class="bold">methode de Paiement :
</b>
paiement a la livraison
</td>
<td>
<b class="bold">methode de livraison :</b>
livraison standard
</td>
</tr>
<tr>
<td colspan="2">
<b>livraison:</b>
<?php 
if($tot>=1000){
    echo" gratuit";
}
else
{
    $tot=$tot+7;
    echo"7 DT";
}
?>
<br>
<b>total:  </b><?php print $tot; ?> DT
</td>
<td>
<?php
$res=mysqli_query($conn,"SELECT adr FROM clients where uss='".$uss."' ");
$data=mysqli_fetch_assoc($res); ?>
<center><b>adresse :</b> <br> <?php print $data['adr']; ?></center>
</td>
</tr>
    </table>
</center>
</body>
</html>