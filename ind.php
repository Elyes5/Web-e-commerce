<?php

session_start();
require_once'dbbcon.php';

?>
<html>
<head>

<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}

$result = mysqli_query($conn,"SELECT * FROM `produit`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action='pan.php?code=".$row['idprod']."'>
			  <input type='hidden' name='code' value=".$row['idprod']." />
			  <div class='image'><img src='".$row['image']."' /></div>
			  <div class='name'>".$row['nomprod']."</div>
		   	  <div class='price'>$".$row['prix']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
        }
?>


</div>
</body>
</html>