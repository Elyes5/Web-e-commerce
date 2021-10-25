<!DOCTYPE html5>

<head>
<link rel="stylesheet" href="projet.css">
</head>
<body>
<form method="POST" action="projetphp.php">
<center>
<?php 
session_start();    
 if (isset($_SESSION['info']))
 {echo "<label class='result2'>Successfully Signed In</label>";
 unset($_SESSION['info']);}
 if (isset($_SESSION['erreur']))
 {echo "<label class='result3'>Invalid Login</label>";
unset($_SESSION['erreur']);}
 ?>
<div class=container>
<div class="container1">

<label For="Login" id="Login">Login</label><br>
<label For="Username">Username</label><br>
<input  type="text" placeholder="Enter Username" name="username" required><br>
<label For="Password">Password</label><br>
<input type="password" placeholder="Enter Password" name="pas" required pattern="[A-Za-z0-9]{8,20}"><br><br>
<center><input type="submit" value="Login" id="buttonlogin" ></center><a class="ResetPass" href="forgotpass.php">Forgot Password</a><br>
</div>
<div class="container2">
<a href="AboutUs.html"><img id="img1" src="logo.png"></a>
<label id="labelimg1">Info +</label>
<a href="contact us.html">
<input type="button" value="Contact Us" id="Contact"></a>
<label For="You don't have an account" id="accountcrea">You don't have an account</label>
<input type="button" value="Sign In" id="Sign" onclick="window.location.href='signup.html'" ></br>
</div>
</div>
</center>
</form>
</body>
</html>