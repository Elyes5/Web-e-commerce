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