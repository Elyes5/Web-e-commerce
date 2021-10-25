<style>
@font-face {
    font-family:new ;
    src: url("Fontdownload2.ttf");

}
form{
font-family:new;}
h1{
font-family:new;
}
}
</style>
<?php
session_start();
require_once'dbbcon.php';
        $identity=$_GET['id'];
        $sql2="SELECT * FROM `produit` WHERE idprod=".$identity."";
        $result = mysqli_query($conn,$sql2);
        if( mysqli_num_rows($result)>0){
           $data2=mysqli_fetch_assoc($result);
           $_SESSION['id_prod']=$data2['idprod'];
          }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>modifier produit</title>
 <style>
     form{
         background-color: rgb(100, 98, 98);
        width: 30%;
        position: relative;
        margin-left: 35% ;
        color: white;
       background-color: black;
    } 
     
     label,input,select,textarea{
         display: block;
         border: none;
         width: 97%;
         margin-right: 0px;
         margin-left: 6px;

     }
     input,select,textarea{
        border-bottom:3px solid;
        border-color:red;
     }
     input:valid,select:valid,textarea{
        border-bottom:3px solid;
        border-color: green;
     }
     input,select,textarea{
         height: 50px;
         background-color: rgb(214, 211, 205);
         border-radius: 10px;
     }
     input[type="submit"],input[type="reset"]{
            display: inline-block;
            width: 20%;
            background-color: white;
            color: black;
            text-shadow: 1px 1px 1px rgb(214, 208, 208);
            opacity: 0.9;
            
        }
        input[type="submit"]{
            margin-left: 30%;
        }
        input[type="submit"]:hover,input[type="reset"]:hover{
            opacity: 1;
            box-shadow: inset -2px -2px 3px rgba(255, 255, 255, .6),
                inset 2px 2px 3px rgba(0, 0, 0, .6);
            cursor: pointer;
        }
        input[type="file"]:hover{
            cursor: pointer;
        }
        body{
    background-image: url("cameraman.jpg");
    background-size:cover;
    animation:slide 20s infinite;
    }
    @keyframes  slide {
    25%
    {
    background-image:url("imageecranjpg.jpeg")
    }
    50%
    {
    background-image:url("unitecentrale.jpg")
    }
    75%
    {
    background-image:url("images.jpg")
    }
    100%
    {
        background-image:url("cameraman.jpg")
    }    
    }
    header{
        font-family: 'Dancing Script', cursive;
       font-size:17px;
       color: white;
       text-align: center;
    }
    #Modif{
    color:rgb(40, 155, 40);
    font-family:new;
    animation:colorchange 5s infinite;
    }
    @keyframes colorchange{
        0%
        {
        color:black;
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
     
 </style>
</head>
<body>
    <header><h1>modifier Produit</h1></header>
<form method="post" action="modifprodPHP.php">
    <label for="nomprod">Nom Produit</label>
    <input type="text" placeholder="entrez le nom de produit ici..." name="nomprod" value="<?php print $data2['nomprod']; ?>" required>
    <label for="cat">Choisir La Categorie De Produit</label>
    <select name="cat"  required>
        <?php 
        require_once'dbbcon.php';
        $sql="SELECT * FROM `ctategorie`";
        $result = mysqli_query($conn,$sql);
        for ($i=0;$i<mysqli_num_rows($result);$i++)
        { 
            $data=mysqli_fetch_assoc($result);
            
       ?>
        <option value="<?php print $data['nomcat'] ?>"><?php print $data['nomcat'] ?></option>
        <?php  }?>
        
    </select>
    <label for="prix">Prix</label>
    <input type="number" name="prix" placeholder="prix" value="<?php print (int)$data2['prix']; ?>" required>
    <label for="img">Image De Produit</label>
    <input type="file" name="img" value="<?php print $data2['image']; ?>" required >
    <label for="qte">Quantité</label>
    <input type="number" name="qte" placeholder="Quantité" value="<?php print (int)$data2['qte']; ?>" required>
    <label for="Marque">Marque</label>
    <input type="text" name="Marque" placeholder="Marque" value="<?php print $data2['Marque']; ?>" required>
    <label for="imagemarque">Image De La Marque</label>
    <input type="file" name="imagemarque" placeholder="Marque" value="<?php print $data2['imagemarque']; ?>"  required>
    <label for="desc">Ajoutez La Description De Votre Produit</label>
    <input type="textarea" cols="30" rows="10" name="desc"   required placeholder="detailles..." value="<?php print $data2['desc']; ?>"  required>
    <label for="Lien">Video</label>
    <input type="text" name="Lien" placeholder="Lien" value="<?php print $data2['video']; ?>">
    <label for="fiche">Fiche Technique</label>
    <input type="file" name="fiche" placeholder="Fiche Technique">
    <div class="btn">
        <input type="submit" value="update" id="sb">
        <input type="reset" value="Annuler" id="an">
    </div> 
    

    
</form>
</body>
</html>