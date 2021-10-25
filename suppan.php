<?php
session_start();
require_once'dbbcon.php';
if(!empty($_SESSION["shopping_cart"])) {
		unset($_SESSION["shopping_cart"][$_GET['code']]);
		$sql="DELETE FROM `panier` WHERE `idprod`='".$_GET['code']."' and uss='".$_SESSION['username']."' ";
		$result = mysqli_query($conn,$sql);
}
if(empty($_SESSION["shopping_cart"]))
		{unset($_SESSION["shopping_cart"]);
		}
if (isset($_SESSION['username'])){
	unset($_SESSION["shopping_cart"]);
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
                }
				else{
					echo "<h3>Your cart is empty!</h3>";
					} 


header("location:cart.php");
?>