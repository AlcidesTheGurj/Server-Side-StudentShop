<!DOCTYPE html>
<?php
 require ('utilities.php');
?>
<script>
 var session = '<?php echo $_SESSION["status"];?>';
</script>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style1.css" /> <!-- link to the stylesheet -->

    <title>Products</title>
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

<!-- search product -->
<div class = "searchCriteria">
 <form action="" method="GET">
 <input type="text" name="search" placeholder = "Search">
 <br>
<input class="submitButton" type="submit" name="searchProduct" value="Search">
</form>
</div>

<!-- search product buttons -->
<div class = "searchCriteriaButtons">
 <form action="" method="GET">
 <input class="submitButton" type="submit" name="*" value="All">
<input class="submitButton" type="submit" name="Hoodies" value="hoodie">
<input class="submitButton" type="submit" name="Jumpers" value="jumper">
<input class="submitButton" type="submit" name="Tshirts" value="tshirt">
</form>
</div>

<!--Return to top-->
<p id="return"><a href="#myNavId">top</a></p>

<!-- All products-->
</div>
             <?php
					// if user searched something
					if(isset($_GET["search"])){
						$search = $_GET["search"];
						$sql="SELECT * FROM tbl_products WHERE product_title LIKE '%".$search."%'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
					}
					// if user pressed hoodies button
					else if (isset($_GET["Hoodies"])){
						$search = $_GET["Hoodies"];
						$sql="SELECT * FROM tbl_products WHERE product_title LIKE '%".$search."%'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
					}
					// if user pressed Jumpers button
					else if (isset($_GET["Jumpers"])){
						$search = $_GET["Jumpers"];
						$sql="SELECT * FROM tbl_products WHERE product_title LIKE '%".$search."%'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
					}
					// if user pressed Tshirts button
					else if (isset($_GET["Tshirts"])){
						$search = $_GET["Tshirts"];
						$sql="SELECT * FROM tbl_products WHERE product_title LIKE '%".$search."%'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
					}
					//user didn't search anything or pressed all products
					else {
					   $sql="SELECT * FROM tbl_products";
					   $result = $conn->query($sql);
					   $row = $result->fetch_assoc();
					}
					
					echo "<div class='clothes'>";
					//print out products
					foreach($result as $row){
                        $image = $row['product_image'];
                        $desc = $row['product_desc'];
                        $name = $row['product_title'];
                        $price = $row['product_price'];
                        $type = $row['product_type'];
						$id = $row['product_id'];
                     
                        echo "<div class='image'> ";
                        echo "<img src = '".$image."'";
                        echo " width ='200' height='200' alt='logo' id='newImage'>";
                        echo "<div class='productText'>";
                        echo "<h2>";
                        echo $name;
                        echo "</h2>";
                        echo "<br>";
                        echo "<p class='description'>";
                        echo $desc;
                        echo "<br>";
                        echo "<a href=item.php?id=".$id.">";
                        echo "Read more";
                        echo "</a>";
                        echo "</p>";
                        echo "<p>";
                        echo "<b>";
                        echo $price;
                        echo "</b>";
                        echo "</p>";
                        echo "<div class = 'buyButton'>";
                        echo '<button type="button" onclick="addFunction(\'' . $id. '\',\'' . $name. '\',\'' . $price. '\',\'' . $image. '\'';
                        echo ')">Buy';
                        echo "</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                   }
                   echo "</div>";
            ?>

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


<script src="local.js"></script>
</body>
</html>