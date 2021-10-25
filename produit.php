<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Produit</title>
    <link rel="stylesheet" type="text/css" href="styleessai3.css?version=51">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @font-face {
            font-family:new;
            src: url('fontdownload2.ttf');
        }
        .imagemarque{
        width:50%;
        height:50%;
        }
        .ref{
        color:white;
        font-family:new;
        text-align:center;
        }
        .disp{
        color:rgb(27, 199, 27);
        position:relative;
        text-decoration:none;
        display:inline-block;
        }
        .disp::after{
        content:'';
        position:absolute;
        background-color:rgb(27, 199, 27);
        width:0%;
        height:5px;
        bottom:0;
        left:0;
        transition:1s;
        }
        .disp:hover::after{
        width:100%;
        }
        .nondisp{
        color:red;
        position:relative;
        text-decoration:none;
        display:inline-block;
        }
        .nondisp::after{
        content:'';
        position:absolute;
        background-color:red;
        width:0%;
        height:5px;
        bottom:0;
        left:0;
        transition:1s;
        }
        .nondisp:hover::after{
        width:100%;
        }
        p{
        color:white;
        font-family:new;
        text-decoration:underline;
        }
        div{
        color:white;
        font-family:new;
        }
        body{
        background-color:rgb(26,25,25);
        width:100%;
        height:100%;
        }
        .edit{
        color:white;
        }
        h1,a{
        color:white;
        font-family:new;
        }
        #row1 {
                float:left; 
                width:30%;
                height:100%;
            }
            #row2{
                float:left; 
                width:30%;
                height:70%;
            }
            #row3{
                float:right;
                width:20%;
                padding:2%;
                text-align:center;
                margin-right:10%;
                background-color:rgb(44, 44, 44);
             }
        .imgprod{
            width: 80%;
            height:350px;
        }
        button{
            border-radius:15px;
            height: 30px;
            color:white;
            background-color:black;
            font-weight:bold;
            font-family:new;


        }
        button:hover{
            cursor:pointer;
        }
        #row5,#row6{
 
        }
        td{
        text-decoration:underline;
        cursor:pointer;
        }
        .small
        {width:15%;
        border-right:solid 1px white}
        .big{
        width:85%;
        }
        .fichetech{
        width:80%;
        height:550px;
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
        <div class="company_div">
        <a href="essai.php"><img src="logo.png" class="logo"/></a>
        <a href="essai.php" class="Infoplus">Info+</a>
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
        if (isset($_GET["nomprod"]))
        {
            $nomprod=$_GET['nomprod'];
        }
        elseif (isset($_SESSION["nomprod"])) {
            $nomprod=$_SESSION['nomprod'];
        }
            $sql="SELECT `idprod`, `nomprod`, `idcat`, `prix`, `qte`, `image`, `desc`,`desc`,`marque`,`imagemarque`,`fiche`,`video` FROM `produit` WHERE nomprod='".$nomprod."' ";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result)>0)
           { $data=mysqli_fetch_assoc($result);
             $sql1="SELECT * FROM `ctategorie` where idcat='".$data['idcat']."'";
             $result1 = mysqli_query($conn,$sql1);
             $data1=mysqli_fetch_assoc($result1);
            ?>
    <div>
    <h1><?php print $data['nomprod']  ?> | <?php print $data1['nomcat']  ?></h1>
    <p class="ref">reference:<?php print $data['idcat'] ?></p>
    </div>
        <div id="row1">
            <img src="<?php print $data['image'] ; ?>" class="imgprod">
        </div>
        <div id="row2">
           <h1> description</h1>
            <?php print $data['desc'] ; ?>
        </div>
        <div id="row3">
            <h1>price :</h1>
            <h3><?php print $data['prix'].".000 DT" ;  ?></h3>
            <h1>disponibilite :</h1>
            <?php 
            if ($data['qte']>0){
                $ch='disponible';
                echo '<h3 class="disp">'.$ch.'</h3><br>';
            }
            else
            {
                $ch='non disponible';
                echo '<h3 class="nondisp">'.$ch.'</h3><br>';
            }
            ?>
            
            
            <?php
            if (isset($_SESSION['username'])){
               $sql2="SELECT * FROM `panier` WHERE uss='".$_SESSION['username']."' and idprod='".$data['idprod']."' "; 
               $result2 = mysqli_query($conn,$sql2);
               if(mysqli_num_rows($result2)>0){ ?>
                <button onclick="window.location.href = 'pan.php?uss=<?php echo $_SESSION['username']; ?>'">deja dans votre panier</button>
              <?php
               }
               else{
                if ($ch=='disponible'){
                ?>
                <button onclick="window.location.href = 'pan.php?code=<?php print $data['idprod']; ?>'">Ajouter au panier</button>
                <?php }
                else
                { ?>
                <button  disabled>non disponible</button>
                 <?php }
                
            }
            }
               else{
            ?>
            <button onclick="window.location.href ='pan.php?code=<?php print $data['idprod']; ?>'">LOGIN</button>
            <?php } ?>

        </div>
        
        <?php  } ?>
               </hr>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php if (!(is_null($data['video']))) { ?>
            <embed style="width: 100%; height: 450px;" src='<?php print $data['video'] ?>'>
            <?php } ?>
       <table>
        <tr><td class="small"><p onclick="fctclick1()">Brand</p></td><td class="big"><p onclick="fctclick2()">Technical Sheet </p> </td></tr>
        <tr><td class="small"><div id="row5">
        <input type="checkbox" id="box1" checked hidden>
            <img class="imagemarque" src="<?php print $data['imagemarque'] ; ?>">
        </div>
    </td><td class="big"> <div id="row6">
    <input type="checkbox" id="box2" hidden>
            <?php if (!(is_null($data['fiche']))) { ?>
            
            <img class="fichetech" src="<?php print $data['fiche'] ; ?>">
            <?php } ?>
            <?php if (is_null($data['fiche'])) { ?>
            <p class="edit">Pas de specification</p>
            <?php } ?> 
        </div></td></tr>       
    </table>
        <script>
        function fctclick1()
        {  document.getElementById("box1").click();
            if(document.getElementById("box1").checked==true)
            {
            document.getElementById("row5").style.display="inline-block";
            }
            else
            {document.getElementById("row5").style.display="none";}
        }
        function fctclick2()
        {  document.getElementById("box2").click();
            if(document.getElementById("box2").checked==true)
            {
            document.getElementById("row6").style.display="inline-block";
            }
            else
            {document.getElementById("row6").style.display="none";}
        }
        </script>
        <br><br><br><br><br><br><hr>
  <?php include 'footer.php'; ?>
</body>
</html>