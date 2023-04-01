<!DOCTYPE html>
<?php
 require ('utilities.php');
?>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style1.css" /><!-- link to the stylesheet -->
        <title>Page Not Found</title>
</head>
<body>
<header>
    <!-- header bar that is going to appear at the top of the screen -->
    <div class="logo"><img src="uclan.png" alt="UCLan logo">
        <span id="shopText"><b>Student Shop</b></span>
    </div>

    <!--Burger Menu-->
    <div>
        <button id="burgerButton" onclick="menuFunction()">
        </button>
        <ul class="myMenu">
            <li class="menuList"></li>
            <li class ="menuList"></li>
            <li class ="menuList"></li>
        </ul>
    </div>

    <!-- Navigation list-->
    <nav>
        <ul class="myNav" id="myNavId">
            <li class="navList"><a href="index.php">Home</a></li>
            <li class="navList"><a href="products.php">Products</a> </li>
            <li class="navList"><a href="cart.php">Cart</a> </li>
			<li class="navList" id="logout"><a href="register.php">Sign Up</a> </li>
        </ul>
    </nav>
</header>

<!--Hidden navigation list for burger menu-->
<ul class="hiddenNav" id="hiddenNav">
    <li class="hiddenList"><a href="index.php">Home</a></li> <!-- each list item contains a link (marked by the anchor tag -->
    <li class="hiddenList"><a href="products.php">Products</a> </li>
    <li class="hiddenList"><a href="cart.php">Cart</a> </li>
	<li class="navList" id="hidden-logout"><a href="register.php" id="logout-link">Sign Up</a> </li>
</ul>

<div class ="404content" style="margin: 50px auto 50px auto; max-width:600px;">
<h1>SORRY,<br>
	The page you are looking for doesn't exist</h1>
<h2>Try again or go <a href='index.php'>back to homepage</a></h2>

</div>


<!--The footer-->
<div class="footer">
    <div  class="footerText">
        <p>
            <span class="heading"><b>Links</b></span>
            <br>
            <br>
            <a href="https://www.uclansu.co.uk/">Students' Union</a>
        </p>
    </div>
    <div class="footerText">
        <p>
            <span class="heading"><b>Contact</b></span>
            <br>
            <br>
            Email: suinformation@uclan.ac.uk
            <br>
            Phone: 01772 89 3000
        </p>
    </div>
    <div class="footerText">
        <p>
            <span class="heading"><b>Location</b></span>
            <br>
            <br>
            University of Central Lancashire Students' Union.
            Fylde Road, Preston PR1 7BY
            Registered in England
            Company Number: 7623917
            Registered Charity Number: 1142516
        </p>
    </div>
</div>

<!-- external scripts -->
<script src="local.js"></script>
</body>
</html>