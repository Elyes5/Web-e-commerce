<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab+Highlight:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

<link rel="stylesheet" href="TarrgetExpandedItalic-3EjZ.otf">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
<meta charset="UTF-8">
<link rel="stylesheet" href="contact us1.css">
</head>
<center>
<body>
<?php 
require_once 'dbbcon.php';
if (isset($_POST['rate'])){
$rate=$_POST["rate"];
$sql="INSERT into feedbackstar(feedback) VALUES ('".$rate."')";
$result=mysqli_query($conn,$sql);
}



?>

<form method="post" action="feedback.php">
<div class="container">
<div class="container1">
<label for="Subject">Subject</label><br>
<input type="text" name="subject" placeholder="Enter The Subject" required><br>
<label for="Customer Email">E-mail</label><br>
<input type="email" name="emailadress" placeholder="Enter Your E-mail Adress" required><br>
<label for="problem encountered">Problem Encountered</label><br>
<textarea name="problem" placeholder="Enter The Problem You Encountered" required></textarea><br><br>
<input type="submit" name="submit1" value="submit">
</div>
</form>
<form method="post" action='contact us.php'>
<div class="container2">
<label for="result" class="result">Thank You For Giving Us Your Feedback !</label>
<label for="feedback" class=feedback>Give us your feedback !</label>
<div class=center>
<input type="radio" id="five" name="rate" class="click" value="5">
<label for="five" id="star1" class="star">★</label> 
<input type="radio" id="four" name="rate" class="click" value="4">
<label for="four" id="star2" class="star">★</label> 
<input type="radio" id="three" name="rate" class="click" value="3">
<label for="three" id="star3" class="star">★</label> 
<input type="radio" id="two" name="rate" class="click" value="2">
<label for="two" id="star4" class="star">★</label> 
<input type="radio" id="one" name="rate" class="click" value="1" checked>
<label for="one" id="star5" class="star">★</label>
<div class="message">
<label for="onestar" id="onestar">1/5</label> 
<label for="twostar" id="twostar">2/5</label>
<label for="threestar" id="threestar">3/5</label> 
<label for="fourstar" id="fourstar">4/5</label>
<label for="fivestar" id="fivestar">5/5</label>
<button type="submit" class="imgfleche" onclick="myfunction()" style="background-color:black;">&#x27A4;</button>
</div>
</div>
</div>
</form>
</div>


</body>
</center>
<script>
    function myfunction()
    {document.getElementsByClassName("feedback")[0].style.display="none";
    document.getElementsByClassName("star")[0].style.display="none";
    document.getElementsByClassName("star")[1].style.display="none";
    document.getElementsByClassName("star")[2].style.display="none";
    document.getElementsByClassName("star")[3].style.display="none";
    document.getElementsByClassName("star")[4].style.display="none";
    document.getElementsByClassName("imgfleche")[0].style.display="none";
    document.getElementById("onestar").style.display="none";
    document.getElementById("twostar").style.display="none";
    document.getElementById("threestar").style.display="none";
    document.getElementById("fourstar").style.display="none";
    document.getElementById("fivestar").style.display="none";
    document.getElementsByClassName("result")[0].style.display="inline-block";

    }
    </script>
</html>