<?php
 require_once'dbbcon.php';
if(isset($_POST['rech'])){
    $p= $_POST['rech'];
    $sql1 = "SELECT idcat FROM ctategorie where nomcat='".$p."' ";
    $result1 = mysqli_query($conn,$sql1);
    if( mysqli_num_rows($result1)>0){
        $data=mysqli_fetch_assoc($result1);
        $nomcat=$data['idcat'];
    }
    else
    {
        $nomcat=$p;
    }
    $sql = "SELECT nomprod FROM produit where nomprod like '".$nomcat."'  or idcat='".$nomcat."' or idprod='".$p."' ";
$result = mysqli_query($conn,$sql);
$data1=mysqli_fetch_assoc($result);
if( mysqli_num_rows($result)>0){

    session_start();
    $_SESSION["nomprod"]=$data1["nomprod"];
    header("location:produit.php");
}
else{
    echo "serch again";
}
}
else
{
    function function_alert($message) {
        echo "<script>alert('$message');</script>";
    }
    function_alert("ecrire dans la barre de rechrche ");
}
?>