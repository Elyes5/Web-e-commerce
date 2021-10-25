<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="montage.css?version=51">
    <title>Document</title>
</head>
<style>
    
}
</style>
<body>
    
    <?php
    require_once'dbbcon.php';
    $sql="SELECT `idprod`, `nomprod`, `idcat`, `prix`, `qte`, `image`, `desc` FROM `produit` WHERE idcat>=1 and idcat<=5 ";
    $result = mysqli_query($conn,$sql);
    ?>
    <form method="post" action='mt.php' >
    <table>
    <tr>
    <th>MOTHERBOARD</th>
    </tr>
    <?php
    for ($i=0;$i<mysqli_num_rows($result);$i++)
    { 
        $data=mysqli_fetch_assoc($result);
        if ($data['idcat']==2 && $data['qte']>0){
            ?>
            <tr>
            <td>
            <label for='m<?php print $i; ?>' ><a href='produit.php?nomprod=<?php print $data['nomprod']; ?>' ><img src="<?php print $data['image']; ?>" width="50"><?php print $data['nomprod']; ?></a></label>
            </td>
            <td>
            <input type="radio" id="m<?php print $i; ?>" name="motherboard" value="<?php print $data['idprod']; ?>">
            </td>
            </tr>

       <?php  } }
        
   ?>
       <tr>
    <th>CPU</th>
    </tr>
    <?php
    mysqli_data_seek($result, 0);
    for ($i=0;$i<mysqli_num_rows($result);$i++)
    { 
        $data=mysqli_fetch_assoc($result);
        if ($data['idcat']==3 && $data['qte']>0){
            ?>
            <tr>
            <td>
            <label for='c<?php print $i; ?>' ><a href='produit.php?nomprod=<?php print $data['nomprod']; ?>' ><img src="<?php print $data['image']; ?>" width="50"><?php print $data['nomprod']; ?></a></label>
            </td>
            <td>
            <input type="radio" id="c<?php print $i; ?>" name="cpu" value="<?php print $data['idprod']; ?>">
            </td>
            </tr>

       <?php  } }
        
   ?>
     <tr>
    <th>GPU</th>
    </tr>
    <?php
    mysqli_data_seek($result, 0);
    for ($i=0;$i<mysqli_num_rows($result);$i++)
    { 
        $data=mysqli_fetch_assoc($result);
        if ($data['idcat']==4 && $data['qte']>0){
            ?>
            <tr>
            <td>
            <label for='g<?php print $i; ?>' ><a href='produit.php?nomprod=<?php print $data['nomprod']; ?>' ><img src="<?php print $data['image']; ?>" width="50"><?php print $data['nomprod']; ?></a></label>
            </td>
            <td>
            <input type="radio" id="g<?php print $i; ?>" name="gpu" value="<?php print $data['idprod']; ?>">
            </td>
            </tr>

       <?php  } }
        
   ?>
     <tr>
    <th>RAM</th>
    </tr>
    <?php
    mysqli_data_seek($result, 0);
    for ($i=0;$i<mysqli_num_rows($result);$i++)
    { 
        $data=mysqli_fetch_assoc($result);
        if ($data['idcat']==1 && $data['qte']>0){
            ?>
            <tr>
            <td>
            <label for='r<?php print $i; ?>' ><a href='produit.php?nomprod=<?php print $data['nomprod']; ?>' ><img src="<?php print $data['image']; ?>" width="50"><?php print $data['nomprod']; ?></a></label>
            </td>
            <td>
            <input type="radio" id="r<?php print $i; ?>" name="ram" value="<?php print $data['idprod']; ?>">
            </td>
            </tr>

       <?php  } }
        
   ?>
     <tr>
    <th>HARD DISK</th>
    </tr>
    <?php
    mysqli_data_seek($result, 0);
    for ($i=0;$i<mysqli_num_rows($result);$i++)
    { 
        $data=mysqli_fetch_assoc($result);
        if ($data['idcat']==5 && $data['qte']>0){
            ?>
            <tr>
            <td>
            <label for='h<?php print $i; ?>' ><a href='produit.php?nomprod=<?php print $data['nomprod']; ?>' ><img src="<?php print $data['image']; ?>" width="50"><?php print $data['nomprod']; ?></a></label>
            </td>
            <td>
            <input type="radio" id="h<?php print $i; ?>" name="harddisk" value="<?php print $data['idprod']; ?>">
            </td>
            </tr>

       <?php  } }
        
   ?>
   <tr>
   <td><br><br><br>
        <input type='submit' value="Ajouter Au Panier" >
   </td>
   <td><br><br><br>
        <input type='reset' value="Annuler" >
   </td>
   </tr>
   <tr>
   <td colspan='2'><center>
   <br><br>
        Assemblage gratuit !<br><br><br>
        </center>
   </td>
   </tr>
   
        </table>
</body>
</html>