<!DOCTYPE html5>
<head>

<link rel="stylesheet" href="https://fonts.gstatic.com/%22%3E">
<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.gstatic.com/%22%3E">
<link rel="stylesheet" href="https://fonts.gstatic.com/%22%3E">
<link rel="stylesheet" href="https://fonts.gstatic.com/%22%3E">
<link rel="stylesheet" href="reset.css">
</head>
<body>
<form method="post" action="">
<center>
<?php 
session_start();
require_once'dbbcon.php';
    $i=$_SESSION['i'];
if(!empty($_POST['code'])){
    if($_POST['code']==$_SESSION['reset']){
        $to=$_SESSION['mail'];
        $subject  = "your password reset code";
        $message  ='Your password is <br>'.$_SESSION['pass'];
        mail($to, $subject, $message);
        header('location:projet.php');
    }
    else{
        if($i==3){
            $sql="UPDATE `clients` SET `statue`='blocked' WHERE uss='".$_SESSION['username']."' ";
            $res = mysqli_query($conn,$sql);
            header('location:signup.html');
        }
        else{
            ?>
            <center><label class="invalid">code invalide <?php print 3-$i ; ?> tentatives restantes</label></center>
            <?php
            $_POST['code']='';
        }
    }
    $_SESSION['i']++;
}?>
<div class=container>
<div class="container1">
<label For="Login" id="Login">RESET PASSWORD</label><br>
<label For="code">MAIL CODE</label><br>
<input type="text" placeholder="Enter Code" name="code" required pattern="[0-9]{4}"><br>
<input type="submit" value="RESET PASSWORD" id="buttonlogin"><br>
</div>
<div class="container2">
<img id="img1" src="logo.png">
<label id="labelimg1">Info +</label>
<a href="contact us.html">
<input type="button" value="Contact Us" id="Contact"></a>
<label For="You don't have an account" id="accountcrea">Vous n'avez Pas De Compte</label>
<div class="erreur">
</div>
<input type="button" value="Sign In" id="Sign" onclick="window.location.href='signup.php'"></br>
</div>
</div>
</center>
</form>
</body>
</html>