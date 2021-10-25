<?php

session_start();
require_once'dbbcon.php';
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] == $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        $sql1="UPDATE `panier` SET `qte`='".$_POST["quantity"]."' WHERE  `uss`='".$_SESSION['username']."' and `idprod`='".$_POST["code"]."'  ";
        $result1 = mysqli_query($conn,$sql1);
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<html>
<head>
<title></title>
<link rel='stylesheet' href='cart2.css?version=52' type='text/css' media='all' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>
<?php
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
        <div class="cart_div1">
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
<div style="width:700px; margin:50 auto;">

<h2>Shopping Cart</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])){
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php">
<img src="cart-icon1.jpg" class="imgcart"/> Cart
<span><?php echo $cart_count; ?></span></a>
</div>
<div class="company_div">
        <a href="essai.php"><img src="logo.png" class="logo"/></a>
        <a href="essai.php" class="Infoplus">Info+</a>
</div>
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<th></th>
<th>ITEM NAME</th>
<th>QUANTITY</th>
<th>UNIT PRICE</th>
<th>ITEMS TOTAL</th>
<th></th>
</tr>	
<?php	
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td class='border'><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
<td class='border'><?php echo $product["name"]; ?><br />
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />

</td>
<td class='border'>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<?php
$sql="SELECT * FROM `produit` WHERE `idprod`='".$product['code']."' ";
$result = mysqli_query($conn,$sql);
$data=mysqli_fetch_array($result);
for($j=1;$j<=$data['qte'];$j++) { ?>
<option <?php if($product['quantity']==$j) {echo "selected";}?> value="<?php print $j ; ?>"><?php echo $j ?></option>
<?php } ?>
</select>
</form>
</td>
<td class='border'><?php echo $product["price"]."DT"; ?></td>
<td class='border'><?php echo $product["price"]*$product['quantity']."DT"; ?></td>
<td class='border'><a href="suppan.php?code=<?php print $product["code"]; ?>" class='remove'><img src="supp.jpg" height='22' class="suppimg"/></a></td>
</tr>
<?php
$total_price += ($product["price"]*$product['quantity']);
}
?>
<tr>
<td colspan="6" align="right">
<strong><label class="left">TOTAL</label> <label class="valeur"><?php echo $total_price.' DT'; ?></label></strong>
</td>
</tr>
<tr>
<td colspan='6'>
<?php if($total_price!=0){ ?>
<center><button onclick="window.location.href ='commande.php?code=<?php print $_SESSION['username']; ?>&tot=<?php print $total_price ?>'">Valider Commande</button></center>
<?php }else{
  ?>
  <center><button onclick="window.location.href ='essai.php'">choisir des produits d'abord</button></center>
<?php } ?>
</td>
</tr>
<tr>
<td colspan="6" height="100px"><center>VOS COMMANDES</center></td>
</tr>
<?php
$res1=mysqli_query($conn,"SELECT f.idcommande,p.image,p.nomprod,f.qte,c.statut,c.date FROM commande c,produit p,facture f WHERE c.uss='".$_SESSION['username']."' and c.idcommande=f.idcommande and f.idprod=p.idprod ");
for($i=0;$i<mysqli_num_rows($res1);$i++){
  $data1=mysqli_fetch_array($res1);
?>
<tr>
<td colspan='1'>
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
 ?>
 
 <br>
le <?php print $data1[5]; ?><br>
</td>
<td>
<a href="affichecommande2.php?com=<?php print $data1[0]; ?> "><img src="details.png" width="30px" height="30px" class="translateimg"></a>
</td>
</tr>
<?php } ?>
</tbody>
</table>			
  <?php
}
else{
  ?>
	<h3>Your cart is empty! <br><br> you should <a href='projet.php'>LOGIN</a></h3>
  <?php
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
</div>
</div>
<hr>
<?php include 'footer.php'; ?>
</body>
</html>