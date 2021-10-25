<!DOCTYPE html5>
<head>
	
<link rel="stylesheet" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab+Highlight:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" href="projet.css">
</head>
<body>
<form method="post" action="forgotpassPHP.php">
<center>
<div class=divsucc>
<label class="result2">

</label>
</div>
<div class=container>
<div class="container1">
<label For="Login" id="Login">RESET PASSWORD</label><br>
<label For="Username">Username</label><br>
<input type="text" placeholder="Enter Username" name="username" required><br>
<input type="submit" value="RESET PASSWORD" id="buttonlogin"><br>
</div>
<div class="container2">
<img id="img1" src="logo.png">
<label id="labelimg1">Info +</label>
<a href="contact us.html">
<input type="button" value="Contact Us" id="Contact"></a>
<label For="You don't have an account" id="accountcrea">You don't have an account</label>
<div class="erreur">
</div>
<input type="button" value="Sign In" id="Sign" onclick="window.location.href='signup.php'"></br>
</div>
</div>
</center>
</form>
</body>
</html>