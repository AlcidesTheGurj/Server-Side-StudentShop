<!DOCTYPE html>
<?php
 require ('utilities.php');
?>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style1.css" /><!-- link to the stylesheet -->
        <title>Register</title>
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
			<li class="navList"><a href="register.php">Sign Up</a> </li>
        </ul>
    </nav>
</header>

<!--Hidden navigation list for burger menu-->
<ul class="hiddenNav" id="hiddenNav">
    <li class="hiddenList"><a href="index.php">Home</a></li> <!-- each list item contains a link (marked by the anchor tag -->
    <li class="hiddenList"><a href="products.php">Products</a> </li>
    <li class="hiddenList"><a href="cart.php">Cart</a> </li>
	<li class="hiddenList"><a href="register.php">Sign Up</a> </li>
</ul>



<!-- main content -->
	<div class="register">
	<h1>Sign up</h1>
            <form action="handleRegister.php" method="POST">
                <label for="full_name">Full name<br></label>
				<input type="text" id ="full_name" name="username" required>
				<br>
				<br>
				<label for ="email">Email<br></label>
                <input type="email" id ="email" name="email">
				<br>
				<br>
                <label for="password">Password <input type="checkbox" onclick="showFunction()"><br></label>
				<input type="password"id="password"name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
				<br>
				<br>
                <label for ="confirm">Confirm password<br></label>
				<input type="password" id="confirm" name="password" title="Passwords need to match" required>
				<br>
				<br>
				<div id="message">
				  <h3>Password must contain the following:</h3>
				  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
				  <p id="capital" class="invalid">An <b>uppercase</b> letter</p>
				  <p id="number" class="invalid">A <b>number</b></p>
				  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
				  <p id="match" class="invalid">Passwords need to <b>match</b></p>
				</div>
				<label for="address">Address<br></label>
                <input type="text" id = "address" name="address">
				<br>
				<br>
                <input class="submitButton" onclick = "validate()" type="submit" name="submitUser" value="Sign up!">
            </form>
    </div>
<?php
if(isset($_GET["register"])){
		echo "<p id ='status-msg' style='color:green;text-align:center;'>You have registered successfully</p>";
}

?>
<script>
//Large parts of password validation and show password functionality implemented from W3schools, 
//password validation link: https://www.w3schools.com/howto/howto_js_password_validation.asp
//show password link: https://www.w3schools.com/howto/howto_js_toggle_password.asp
//password to check

let passwordInput = document.getElementById("password");
let confirmInput = document.getElementById("confirm");

let letter = document.getElementById("letter");
let capital = document.getElementById("capital");
let number = document.getElementById("number");
let length = document.getElementById("length");
let match = document.getElementById("match");

// Show message box when password or confirm password field is clicked
passwordInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

confirmInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// Hide message box when user clicks elsewhere
passwordInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

confirmInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts typing
passwordInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(passwordInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } 
  else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(passwordInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } 
  else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(passwordInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } 
  else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(passwordInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } 
  else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

//confirm password
confirmInput.onkeyup = function(){
	if(passwordInput.value == confirmInput.value){
		match.classList.remove("invalid");
		match.classList.add("valid");
		
		confirmInput.setCustomValidity('');
		
		}
	else{
		match.classList.remove("valid");
		match.classList.add("invalid");
		
		confirmInput.setCustomValidity('Passwords need to match');
	}
}

//show password function
function showFunction() {
  var password = document.getElementById("password");
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
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
</body>
</html>