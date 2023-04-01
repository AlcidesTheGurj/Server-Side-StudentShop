<!DOCTYPE html>
<?php
 require ('utilities.php');
?>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style1.css" /><!-- link to the stylesheet -->
    <title>Home</title>
</head>
<body>
<script>
 var session = '<?php echo $_SESSION["status"];?>';
</script>
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
    <!--Navigation List-->
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
    <li class="hiddenList"><a href="index.php">Home</a></li>
    <li class="hiddenList"><a href="products.php">Products</a> </li>
    <li class="hiddenList"><a href="cart.php">Cart</a> </li>
	<li class="navList" id="hidden-logout"><a href="register.php" id="logout-link">Sign Up</a> </li>
</ul>

<h1 style="text-align: center">
    Offers
</h1>
<?php
			$servername = "localhost";
			$user = "itchanturia";
			$pass = "Wuva2DDh";
			$dbname = "itchanturia";

			//create connection
			$conn = new mysqli($servername,$user,$pass,$dbname);

			//check connection
                if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
        }

        $sql="SELECT * FROM tbl_offers";

    //echo $sql;

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo "<div class='offers'>";
    foreach($result as $row){
        echo "<div>";
        echo "<h2>" . $row['offer_title'] . "</h2>";
        echo "<p>" . $row['offer_dec'] . "</p>";
        echo "</div>";
    }
    echo "</div>";
    //echo '<p>User id:' . $row['user_id'] . ' </p>';
    //echo '<p>Username:' . $row['user_full_name'] . '</p>';


    ?>
<!--Content of the page with 1 iframe and 1 video-->
<div class="content" >
    <h1>
        Where opportunity Creates Success
    </h1>
    <p>Every student at The University of Central Lancashire is automatically a member of the Students's Union.<br>
        We're here to make life better for students - inspiring you to succeed and achieve your goals.<br>
    </p>
        <p>Everything you need to know about UCLan's Students' Union. Your membership starts here.
    </p>
    <h2>
        Together
    </h2>
<video class="video" width="900" height="350" controls><source src="UCLan%20together.mp4" type="video/mp4">
    Your browser lacks support for the video tag.
</video>
    <h2>Join our global community</h2>
    <iframe class="video" width="900" height="350" src="https://www.youtube.com/embed/i2CRunZv9CU" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
 <script src="local.js"></script> <!--external javascript-->
</body>
</html>