<!DOCTYPE html>
<?php
 require ('utilities.php');
?>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">    <link rel="stylesheet" type="text/css" href="style1.css" /><!-- link to the stylesheet -->
    <title>Cart</title>
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
            <li class="navList"><a href="index.php">Home</a></li> <!-- each list item contains a link (marked by the anchor tag -->
            <li class="navList"><a href="products.php">Products</a> </li>
            <li class="navList"><a href="cart.php">Cart</a> </li>
			<li class="navList" id="logout"><a href="register.php" id="logout-link">Sign Up</a> </li>
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

<!--Cart content-->
<div class="cartHeader">
<h2>
    Shopping cart
</h2>
	<p id='personal-msg'><strong>In order to checkout the cart you first need to log in!</strong></p>
</div>

<div id="cartText">
<div>Item</div>
    <div>Product</div>
</div>
<div id="products"></div>

<div class = "cartLinks">
<div id="clearCart">
<a href="" onclick="clearCart()">
    Clear cart
</a>
</div>
	<div id='checkout'>
		<form method="GET" id="checkoutForm" action="handleCheckout.php">
			<input class="startButton" type="submit" name="checkout" value="checkout!" onclick="clearCart()">
		</form>
</div>
<?php
if(isset($_GET["checkoutStatus"])){
	echo "<p id ='status-msg' style='color:green;text-align:center;'>Order placed successfully</p>";
}
?>
</div>

 <?php
	//if email and password where entered
	if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = $_POST["email"];
 	$pass = $_POST["password"];
	
	//retrieve password associated with this email and verify
	$sql = "SELECT user_pass FROM tbl_users WHERE user_email = '".$email."'";
	$result = $conn->query($sql);
	$encrypted_pass = $result->fetch_assoc();
	$check_pass = password_verify($pass,$encrypted_pass["user_pass"]);
	//echo $check_pass;
	//echo $encrypted_pass["user_pass"];
 	$sql="SELECT * FROM tbl_users WHERE user_email ='" .$email. "'";
			$result = $conn->query($sql);
			
			//if password is verified output success message, change session variable
			if($check_pass == 1){
				$row = $result->fetch_assoc();
				echo "<p id ='status-msg' style='color:green;text-align:center;'>Login successful</p>";
				$_SESSION["status"] = "logged-in";
				$_SESSION["logged-user"] = $row["user_full_name"];
				$_SESSION["logged-user-id"] = $row["user_id"];
				//echo $_SESSION["status"];
			}
		//if passwords don't match login failed
		else{
			echo "<p id='status-msg' style='color:red;text-align:center;'>User not registered or wrong credentials.</p>";
			    unset($_SESSION["status"]);
			//echo $_SESSION["status"];
		}
	}
 ?>
 
 <!-- main content -->
	<div id = 'register' class="register">
	<h1>Log in</h1>
            <form action="" method="POST">
				<p>Email</p>
                <label><input type="email" name="email"></label>
				<br>
				<p>Password</p>
                <label><input type="password" name="password" required></label>
				<br>
                <input class="startButton" type="submit" name="submitPlayer" value="Log in!">
            </form>
    </div>

<script>

//check php session variable and hide login screen accordingly
 var session = '<?php echo $_SESSION["status"];?>';
 var user = '<?php echo $_SESSION["logged-user"];?>';
 
 let checkout = document.getElementById("checkout");
 let status = document.getElementById("register");
 document.getElementById("personal-msg");
 //console.log(user);
 //console.log(status);
 if(session == "logged-in"){
        status.className = "register_hide";
		document.getElementById("personal-msg").innerHTML = "Welcome "+user+", the items you've added to your shopping cart are:";
		
		checkout.style.display = "block";
}
else{
	status.className = "register";
	checkout.style.display = "none";	
}

 </script>


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
<script src="localProduct.js"></script>
</body>
</html>