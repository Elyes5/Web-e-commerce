<!DOCTYPE html> 
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />   
<link rel="stylesheet" href="styleessai3.css?version=51">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Main Page</title>
<meta charset="UTF-8">
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
<div class="slidershow">
<div class="slides">
<input type="radio" name="rad" id="img1" checked>
<input type="radio" name="rad" id="img2" >
<input type="radio" name="rad" id="img3" >
<input type="radio" name="rad" id="img4" >
<input type="radio" name="rad" id="img5" >
<?php 
$sql2="SELECT * FROM `produit` where idprod>=1127";
$result2 = mysqli_query($conn,$sql2);
for ($i=0;$i<=4;$i++)
 { $data2=mysqli_fetch_assoc($result2);
    ?>
<div class="slide" id="im<?php print $i ?>"><a href="produit.php?nomprod=<?php print $data2['nomprod']; ?>"><img src="<?php print $data2['image']; ?>"></a></div>
<?php } ?>
</div>
<div class="pass">
<label for="img1" class="slider"></label>
<label for="img2" class="slider"></label>
<label for="img3" class="slider"></label>
<label for="img4" class="slider"></label>
<label for="img5" class="slider"></label>
</div>
</div>
<div id="groupchat">
<input type="checkbox" id="box" hidden>
<label id="chat" for="box"><</label>
<div id="openchat">
Need some help?<br>You can contact the admin here using your email to get some piece of information concerning the products.<br>You will receive the answer on your e-mail account.
<a name="submitinfo" class="submitinfo" href="Contact Us.html" style="text-decoration:'none'">▶</a>
</div>
</div>
<center><h2 id="heading1">OUR BEST COMPUTERS</h2></center>
<?php 
$sql3="SELECT * FROM `produit` where idcat=6 or idcat=7 ";
$result3 = mysqli_query($conn,$sql3);
$k=1;
for ($i=1;$i<=4;$i++,$k=$k+2)
 { $data3=mysqli_fetch_assoc($result3);
    if ($i<=5){
        $j=$i;
    }
    if ($j>4){
        $j=1;
        $k=1;
    }
    elseif ($i>5)
    {
        $j++;
    }  
    if ($j==1){
        ?> <div class="anim1"><div class="animation"><p>Discover</p></div> <?php
    }
    ?>
<div class="image">
<div class="PC<?php print $j; ?>">
<a href="produit.php?nomprod=<?php print $data3['nomprod']; ?>"><img src="<?php print $data3['image']; ?>" class="imagedown" id="imagepc<?php  print $j; ?>" onmouseover="myfunction<?php print $k-1; ?>()" onmouseout="myfunction<?php print $k; ?>()"></a>
<label id="labelPC<?php  print $j; ?>"><?php print $data3['nomprod']; ?></label>
</div>
</div>
<?php if($j==4 || $i==4) {?> </div> <?php } }?>
<center><h2 id="heading2">OUR BEST HARDWARE</h2></center>
<?php 
$sql3="SELECT * FROM `produit` where idcat>=1 and idcat<=5 ";
$result3 = mysqli_query($conn,$sql3);
$k=1;
for ($i=1;$i<=4;$i++,$k=$k+2)
 { $data3=mysqli_fetch_assoc($result3);
    if ($i<=5){
        $j=$i;
    }
    if ($j>4){
        $j=1;
        $k=1;
    }
    elseif ($i>5)
    {
        $j++;
    }  
    if ($j==1){
        ?> <div class="anim1"> <?php
    }
    ?>
<div class="image">
<div class="HW<?php print $j; ?>">
<a href="produit.php?nomprod=<?php print $data3['nomprod']; ?>"><img src="<?php print $data3['image']; ?>" class="imagedown" id="imagehw<?php  print $j; ?>" onmouseover="myfnc<?php print $k; ?>()" onmouseout="myfnc<?php print $k+1; ?>()"></a>
<label id="labelHW<?php  print $j; ?>"><?php print $data3['nomprod']; ?></label>
</div>
</div>
<div class="animation1"><p>Discover</p></div>
<?php if($j==4 || $i==4) {?> </div> <?php } }?>
   

    <center><h2 id="heading3">OUR BEST SCREENS</h2></center>
    <?php 
$sql3="SELECT * FROM `produit` where idcat>=8 and idcat<=10 ";
$result3 = mysqli_query($conn,$sql3);
$k=1;
for ($i=1;$i<=4;$i++,$k=$k+2)
 { $data3=mysqli_fetch_assoc($result3);
    if ($i<=5){
        $j=$i;
    }
    if ($j>4){
        $j=1;
        $k=1;
    }
    elseif ($i>5)
    {
        $j++;
    }
    if ($j==1){
        ?> <div class="anim1"> <?php
    }  
    ?>
<div class="image">
<div class="HC<?php print $j; ?>">
<a href="produit.php?nomprod=<?php print $data3['nomprod']; ?>"><img src="<?php print $data3['image']; ?>" class="imagedown" id="imageecran<?php  print $j; ?>" onmouseover="myfonc<?php print $k; ?>()" onmouseout="myfonc<?php print $k+1; ?>()"></a>
<label id="labelHSC<?php  print $j; ?>"><?php print $data3['nomprod']; ?></label>
</div>
</div>
<div class="animation2"><p>Discover</p></div>
<?php if($j==4 || $i==4) {?> </div> <?php } }?>



        

        <p id="Localisation">Our Location</p>
        <div class="Localisation2">
            <input type="checkbox" id="radio1" hidden>
        <img id="Defiler" src="defiler.png" onclick="show()">
       </div>
<div id="map"></div>
<h3>Not Satisfied Enough !</h3>
<p id="create">You can also customize your own computer with the components of your choice. Click on the image below</p>
<div id="customize">
<input type="checkbox" id="radio2" hidden>
<img id="Defiler1" src="defiler.png" onclick="show1()"><br>
<a href="montage.php"><img id="custompc" src="Custompc.jpg"></a>
<h3>POWERED BY</h3>
</div>
<center>
<div class="Ourpartners">
    
    <img class="PARTNERS" src="brand1.jpg">
    <img class="PARTNERS" src="brand2.jpg">
    <img class="PARTNERS" src="brand3.jpg">
    <img class="PARTNERS" src="brand4.jfif">
    <img class="PARTNERS" src="brand5.jpg">
    </div>
</center>
<footer>
<div class="social-menu">
    <ul>
      <li><a href="https://www.facebook.com/profile.php?id=100067044413711"><i class="fa fa-facebook"></i></a></li>
      <li><a href=""><i class="fa fa-twitter"></i></a></li>
      <li><a href=""><i class="fa fa-youtube"></i></a></li>
      <li><a href=""><i class="fa fa-linkedin"></i></a></li>
    </ul>
  </div>
<center>    
<div id="decoration">
<div class="image1">
<img class="decoration1" src="argent.jpg"><br>
<label class="labelimage1">Best Prices In Tunisia</label>
</div>
<div class="image1">
<img class="decoration1" src="delivery.jpg"><br>
<label class="labelimage1">The Delivery Does Not Exceed 24 Hours</label>
</div>
<div class="image1">
<img class="decoration1" src="marker.png"><br>
<label class="labelimage1">Multiple Shops Available Covering All The Country</label>
</div>
<div class="image1">
<img class="decoration1" src="time.jpg"><br>
<label class="labelimage1">Open Everyday From 8AM To 5PM</label>
</div>
</div>
</center>
<div class="footerdiv">
<div id="firstul">
<ul >
<li id="global">GLOBAL INFORMATIONS</li>
<li><a href="AboutUs.html">◍About Us</a></li>
<li><a href="TermsOfUse">◍Terms Of Use</a></li>
<li><a href="Contact Us.php">◍Contact Us</a></li>
</ul>
</div>
<div id="secondul">
<ul>
<li id="globalacc">MY ACCOUNT</li>
<li><a <?php if (isset($_SESSION['username'])) echo "href='cart.php'"; else echo "href='projet.php'" ;?>>◍Orders</a></li>
<li><a <?php if (isset($_SESSION['username'])) echo "href='modif.php'"; else echo "href='projet.php'" ;?>>◍Personnal Information</a></li>
</ul>
</div>
</div>
</footer>

    <script>
        function initMap(){
            var location = {lat:36.8615, lng : 10.189};
            var map=new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: location
            });
            var marker = new google.maps.Marker({
				position: location,
				map: map

			})
        }

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABcUgczRUJG70i3TtLOTH6YEdIplGiaaY&callback=initMap"type="text/javascript">
    
    </script>
           <script>
            function show(){
            document.getElementById("radio1").click();
            if(document.getElementById("radio1").checked==true)
            {
            document.getElementById("map").style.transition="width 2s,height 2s";
            document.getElementById("map").style.height="500px";
            document.getElementById("map").style.width="100%";
            }
            else
            {document.getElementById("map").style.transition="width 2s,height 2s";
            document.getElementById("map").style.height="0px";
            document.getElementById("map").style.width="0px";
            }
            }
            function show1(){
                document.getElementById("radio2").click();
            if(document.getElementById("radio2").checked==true)
            {
            document.getElementById("custompc").style.transition="width 2s";
            document.getElementById("custompc").style.width="100%";
            }
            else
            {document.getElementById("custompc").style.transition="width 2s";
            document.getElementById("custompc").style.width="0%";
            }
            }
           </script>
    </body>
<script>
    function myfunction0(j)
    {document.getElementsByClassName("animation")[0].style.display="block";
    document.getElementsByClassName("animation")[0].style.position="absolute";
    document.getElementsByClassName("animation")[0].style.left="0%";
    }
    function myfunction1()
    {document.getElementsByClassName("animation")[0].style.display="none";
    
    }
    function myfunction2()
    {document.getElementsByClassName("animation")[0].style.display="block";
    document.getElementsByClassName("animation")[0].style.position="absolute";
    document.getElementsByClassName("animation")[0].style.left="25%";
    }
    function myfunction3()
    {document.getElementsByClassName("animation")[0].style.display="none";
    }
    function myfunction4()
    {document.getElementsByClassName("animation")[0].style.display="block";
    document.getElementsByClassName("animation")[0].style.position="absolute";
    document.getElementsByClassName("animation")[0].style.left="50%";
    }
    function myfunction5()
    {document.getElementsByClassName("animation")[0].style.display="none";
    }
    function myfunction6()
    {document.getElementsByClassName("animation")[0].style.display="block";
    document.getElementsByClassName("animation")[0].style.position="absolute";
    document.getElementsByClassName("animation")[0].style.left="75%";
    }
    function myfunction7()
    {document.getElementsByClassName("animation")[0].style.display="none";
    }
    function myfnc1()
    {document.getElementsByClassName("animation1")[0].style.display="block";
    document.getElementsByClassName("animation1")[0].style.position="absolute";
    document.getElementsByClassName("animation1")[0].style.left="0%";
    }
    function myfnc2()
    {document.getElementsByClassName("animation1")[0].style.display="none";
    
    }
    function myfnc3()
    {document.getElementsByClassName("animation1")[0].style.display="block";
    document.getElementsByClassName("animation1")[0].style.position="absolute";
    document.getElementsByClassName("animation1")[0].style.left="25%";
    }
    function myfnc4()
    {document.getElementsByClassName("animation1")[0].style.display="none";
    }
    function myfnc5()
    {document.getElementsByClassName("animation1")[0].style.display="block";
    document.getElementsByClassName("animation1")[0].style.position="absolute";
    document.getElementsByClassName("animation1")[0].style.left="50%";
    }
    function myfnc6()
    {document.getElementsByClassName("animation1")[0].style.display="none";
    }
    function myfnc7()
    {document.getElementsByClassName("animation1")[0].style.display="block";
    document.getElementsByClassName("animation1")[0].style.position="absolute";
    document.getElementsByClassName("animation1")[0].style.left="75%";
    }
    function myfnc8()
    {document.getElementsByClassName("animation1")[0].style.display="none";
    }
    function myfonc1()
    {document.getElementsByClassName("animation2")[0].style.display="block";
    document.getElementsByClassName("animation2")[0].style.position="absolute";
    document.getElementsByClassName("animation2")[0].style.left="0%";
    }
    function myfonc2()
    {document.getElementsByClassName("animation2")[0].style.display="none";
    
    }
    function myfonc3()
    {document.getElementsByClassName("animation2")[0].style.display="block";
    document.getElementsByClassName("animation2")[0].style.position="absolute";
    document.getElementsByClassName("animation2")[0].style.left="25%";
    }
    function myfonc4()
    {document.getElementsByClassName("animation2")[0].style.display="none";
    }
    function myfonc5()
    {document.getElementsByClassName("animation2")[0].style.display="block";
    document.getElementsByClassName("animation2")[0].style.position="absolute";
    document.getElementsByClassName("animation2")[0].style.left="50%";
    }
    function myfonc6()
    {document.getElementsByClassName("animation2")[0].style.display="none";
    }
    function myfonc7()
    {document.getElementsByClassName("animation2")[0].style.display="block";
    document.getElementsByClassName("animation2")[0].style.position="absolute";
    document.getElementsByClassName("animation2")[0].style.left="75%";
    }
    function myfonc8()
    {document.getElementsByClassName("animation2")[0].style.display="none";
    }
    </script>


</html>
