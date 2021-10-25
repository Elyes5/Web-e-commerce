<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>produit</title>
    <?php
        require_once'dbbcon.php';
        ?>
</head>
<body>
    <div>
    <h1>Produit</h1>
    <div>

    </div>
    <p>
        <h1>description</h1>
        <?php 
        start_session();
        if (isset($_session['prod'])) {
            $sql="SELECT* FROM produit where idprod='".$_session['prod']."' ";
            $result = mysqli_query($conn,$sql);
            $data=mysqli_fetch_assoc();
            ?>
        <div>
    <h1>Produit</h1>
    <div>
      <?php print $data['image'] ; ?>
    </div>
    <p> la secription est : <?php print $data['desc']; ?>  </p>
        



    </div>
    <div>
    <h1>Price</h1>
            
    <p> <?PHP print $data['prix']; }?> </p>
    </div>
</body>
</html>