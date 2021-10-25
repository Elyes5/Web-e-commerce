<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleessai3.css?version=51">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Recherche Par Marque</title>
    <style>
       @font-face {
            font-family:new;
            src: url('fontdownload2.ttf');
        }
        h1,h3,p,h5{
        color:white;
        font-family:new;
        }
        .nondisp::after{
        content:'';
        position:absolute;
        width:0%;
        height:0.175rem;
        left:0;
        bottom:0;
        background-color:red;
        transition:1s;
        }
        .nondisp:hover::after{
        width:100%;
        cursor:pointer;
        }
        .disp::after{
        content:'';
        position:absolute;
        width:0%;
        height:0.175rem;
        left:0;
        bottom:0;
        background-color:green;
        transition:1s;
        }
        .disp:hover::after{
        width:100%;
        cursor:pointer;
        }
        .disp{
        color:rgb(27, 199, 27);
        font-family:new;
        font-size:20px;
        display:inline-block;
        margin-top:0px;
        margin-bottom:-10px;
        position:relative;
        }
        .nondisp{
        color:red;
        font-family:new;
        font-size:20px;
        display:inline-block;
        margin-top:0px;
        margin-bottom:30px;
        position:relative;
        }
        button{
            border:none;
            height: 30px;
            background-color:black;
            transition:1s;
        }
        button:hover{
        color:black;
        background-color:white;
        }
        td{
        border:1px solid white;
        width:70%;
        height:30%;
        }
        #all{
        width:60%;
        margin-left:20%;
        margin-right:20%;
        }
        button:hover{
            cursor:pointer;
        }
        .row1{
                width:10%;
                height: 100px;
                float:left;
                position:relative;
                left:30%;
            }
        .row3 {
                width:90%;
                height: 100px;
                padding-bottom:10%;
            }
        button{
        background-color:black;
        color:white;
        font-family:new;
        border-radius:20px;
        }
            background-color:green;
        }
        .row3 *{
            display: inline-block;
        }
        .imgprod{
            width:250px;
            height:300px;
        }
        body{
        background-color:rgb(26,25,25);
        position:relative;
        }
        .imageedit{
        width:500px;
        }
        .textedit{
        width:500px;
        }
        #tab2 td{
        text-align:center;
        }
        
        #tab1{
        float:left;
        border-spacing:0px;
        
        border-radius:15px;
        }
        input[type="radio"]{
        float:right;
        
        }
        label{
        color:white;
        font-family:new;
        }
        .left{
        width:300px;
        float:left;
        }
        #tab1 td{
        width:10px;
        background-color:rgb(105,105,105);
        border:solid  1px   rgb(105,105,105);
        }
        #tab2{
        display:flex;
        justify-content:center;
        align-items:center;
        
        }
        .labelclass{
        padding-right:150px;

        }
    </style>
</head>
<body>
<header>
<?php
session_start(); 
require_once'dbbcon.php';  
if (isset($_SESSION['username'])){
    unset($_SESSION["shopping_cart"]);
if(empty($_SESSION["shopping_cart"])) {
    $cartArray = array();
    $cartarray2= array();
    $res2=mysqli_query($conn,"SELECT * FROM `panier` WHERE `uss`='".$_SESSION['username']."'");
    for($i=0;$i<mysqli_num_rows($res2);$i++){
    $row2=mysqli_fetch_assoc($res2);
    $res3=mysqli_query($conn,"SELECT * FROM `produit` WHERE `idprod`='".$row2['idprod']."'");
    $row3=mysqli_fetch_assoc($res3);
    $cartArray2['name']=$row3['nomprod'];
        $cartArray2['code']=$row3['idprod'];
        $cartArray2['price']=$row3['prix'];
        $cartArray2['quantity']=$row2['qte'];
        $cartArray2['image']=$row3['image'];
    $cartArray[$row3['idprod']]=$cartArray2 ;
    }
    $_SESSION["shopping_cart"] = $cartArray;
    } } 
    if(!empty($_SESSION["shopping_cart"])){
        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    }
    else {
        $cart_count=0;
    }
        ?>
        <div class="cart_div">
        <a href="cart.php">
        <img src="cart-icon.png" /> Cart
        <span><?php echo $cart_count; ?></span></a>
        </div>
<form method="post" action="rech.php" id="form">        
<div id="ser">
<input type="text" list="rech" name="rech" id="reche">
<datalist id="rech">
<?php           
$sql="SELECT nomprod FROM produit";
$result = mysqli_query($conn,$sql);
for ($i=0;$i<mysqli_num_rows($result);$i++)
{ $data=mysqli_fetch_assoc($result);
 ?>
<option value="<?php print $data['nomprod']?>">
<?php } ?>
</datalist>
<button type="submit" id="btnn"><img src="reche.png" height="32"  /></button>
</form>
</header>
    <nav id="nav">                       
        <ul class="menu">
        <?php       
        $sql = "SELECT * FROM typecat ";
        $result = mysqli_query($conn,$sql);
        for ($i=0;$i<mysqli_num_rows($result);$i++)
         { $data=mysqli_fetch_assoc($result);
        ?>
        <li class="color"><a><?php print $data['nomtype'] ?></a>
        <ul>
        <?php
        $sql1 = "SELECT * FROM ctategorie where nomtype='".$data['nomtype']."' ";
        $result1 = mysqli_query($conn,$sql1);
        for ($j=0;$j<mysqli_num_rows($result1);$j++)
         { $data1=mysqli_fetch_assoc($result1);
        ?>
        <li class="cat"><a href="rechcat.php?nomcat=<?php echo $data1['nomcat'] ?>" ><?php print $data1['nomcat']; } ?></a></li></li>
        </ul>
            <?php } ?>
        </ul>
        <div class="Buttons">
        <?php
        if (isset($_SESSION['username'])){
        ?>
        <span class='Welcome'>Welcome  </span>  
        <a class='uss' href='modif.php'><?php print $_SESSION["username"] ; ?></a> 
        <a href="logout.php" id="SignIn" >log out</a>
        <?php } else{ ?>
        <a id='Login' href='projet.php'>Login</a> 
        <a id='SignIn' href='signup.html'>Sign In</a>
        <?php }?>
    </div>
</nav>
<?php
if(isset($_SESSION['categorie'])){
     $marque=$_GET['marque'];
    $sql1 = "SELECT `idcat`,`nomcat` FROM ctategorie where nomcat='".$_SESSION['categorie']."'";
    $result1 = mysqli_query($conn,$sql1);
    if( mysqli_num_rows($result1)>0){
        $data1=mysqli_fetch_assoc($result1);
        $idcat=$data1['idcat'];
        $nomcat=$data1['nomcat'];
        ?>
        <h1>toutes nos categories de produits: <?php print $nomcat  ?></h1>
           <form action='' method='GET'>
           <?php
            
            $sql="select Marque from produit group by marque;";
            $result = mysqli_query($conn,$sql);
            if( mysqli_num_rows($result)>0){
                echo "<table id='tab1'>";
                while ($row=mysqli_fetch_assoc($result))
            {?>
         <tr><td><input type='radio' name='marque' value='<?php echo $row['Marque']; ?>'></td>
            <td class='labelclass'><p><?php echo $row['Marque']; ?></p></td></tr>

            <?php }} ?>
        <tr><td colspan='2'><input type="submit" value="Confirmer"></tr></td>
            
        </table>
        </form>
        <?php
    }
    $sql = "SELECT `idprod`, `nomprod`, `idcat`, `prix`, `qte`, `image`, `desc` FROM `produit`  WHERE  `idcat`='".$idcat."'  AND marque='".$marque."'";
$result = mysqli_query($conn,$sql);
$z=mysqli_num_rows($result);
if( mysqli_num_rows($result)>0){
    
    echo "<table id='tab2'>";
    for ($i=0;$i<mysqli_num_rows($result);$i++)
    { 
        $data=mysqli_fetch_assoc($result);
        
   ?>
    
   
    <tr><td class="imageedit"><a href="produit.php?nomprod=<?php print $data['nomprod']  ?>"><img class="imgprod" src="<?php print $data['image'] ; ?>"></a></td>
   <td class="textedit">
    <h3><?php print $data['nomprod']  ?></h3>
    <p>reference:<?php print $data['idprod'] ?></p>
            <h3>price:</h3>
            <h5><?PHP print $data['prix'] ;  ?> DT</h5>
            <h3>disponibilite:</h3>
            <?php 
            if ($data['qte']>0){
                $ch='disponible';
                echo "<h5 class='disp'>".$ch."</h5><br>";
            }
            else
            {
                $ch='non disponible';
                echo "<h5 class='nondisp'>".$ch."</h5><br>";
            }
            ?>
            <?php 
            if (isset($_SESSION['username'])){
                $sql2="SELECT * FROM `panier` WHERE uss='".$_SESSION['username']."' and idprod='".$data['idprod']."' "; 
                $result2 = mysqli_query($conn,$sql2);
                if(mysqli_num_rows($result2)>0){ ?>
                 <button onclick="window.location.href = 'pan.php?uss=<?php echo $_SESSION['username']; ?>'">deja dans vos panier</button></td></tr>
               <?php
                }
                else{
                 if ($ch=='disponible'){
                 ?>
                  <br><br>
                 <button onclick="window.location.href = 'pan.php?code=<?php print $data['idprod']; ?>'">Ajouter au panier</button></td></tr>
                 <?php }
                 else
                 { ?>
                 <button  disabled>non disponible</button></td></tr>
                  <?php }
                 
             }
             }
                else{
             ?>
             
             <button onclick="window.location.href ='pan.php?code=<?php print $data['idprod']; ?>'">LOGIN</button></td></tr>
             <?php } ?>
        <?php }} ?>
                

<?php 
}
else
{
    function function_alert($message) {
        echo "<script>alert('$message');</script>";
    }
    function_alert("choisir parmi les categorie");
}
?>
  </table> 
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <?php if ($z==0) echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>" ; 
  if ($z==1) echo "<br><br><br><br><br><br><br><br><br><br><br>" ?><hr>
  <?php include 'footer.php'; ?>
</body>
</html>