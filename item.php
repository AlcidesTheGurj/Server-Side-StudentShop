<!DOCTYPE html>
<?php
 require ('utilities.php');
?>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style1.css" /><!-- link to the stylesheet -->
        <title>item</title>
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


<!--Read more content-->
<?php
	$id = $_GET["id"];
	$sql="SELECT * FROM tbl_products WHERE product_id = '".$id."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$image = $row['product_image'];
    $desc = $row['product_desc'];
	$name = $row['product_title'];
	$price = $row['product_price'];
	//$type = $row['product_type'];
	echo "<div id='object'>";
	echo "<img src='";
	echo $image;
	echo "'width ='700' height='700' alt='logo' id='sessionImage'>";
	echo  "<div class='sessionProductText'>";
	echo   "<h2>".$name;
	echo  "<br>";
	echo  "</h2>";
	echo  "<br>";
	echo "<p class='sessionText'>'".$desc."'</p>";
	echo  "<p><b>".$price."</b></p>";
	echo  "<div class='buyButton'>";
	echo '<button type="button" onclick="addFunction(\'' . $id. '\',\'' . $name. '\',\'' . $price. '\',\'' . $image. '\'';
    echo ')">Buy';
    echo "</button>";
	echo  "</div>";
	echo  "</div>";
	echo  "</div>";
	
	$sql="SELECT * FROM tbl_reviews WHERE product_id = ".$id."";
	$result = $conn->query($sql);
	$sum = 0;
			if($result->num_rows > 0){
				
				$row = $result->fetch_assoc();
				foreach($result as $row){
				$sum+=$row["review_rating"];
				}
				$sum = $sum/($result->num_rows);
				$sum = number_format($sum,1,'.','');
				echo "<h1 style='text-align:center;'> Average rating: ".$sum."</h1>";
			
				foreach($result as $row){
					echo "<div class='allReviews'>";
					echo "<h2>".$row["review_title"]."</h2>";
					echo "<h4>".$row["review_desc"]."</h4>";
					echo "<h4>Rating: ".$row["review_rating"]."</h4>";
					echo "</div>";
				}
			}
			
?>

<!-- Write review Content -->
<div id = "review" class="review">
            <form action="handleReview.php" method="POST">
				<h3>Title</h3>
                <label><input type="text" name="title" required></label>
				<br>
				<h3>Rating</h3>
				<select name="rating">
				  <option value="1">&#10033;</option>
				  <option value="2">&#10033;&#10033;</option>
				  <option value="3">&#10033;&#10033;&#10033;</option>
				  <option value="4">&#10033;&#10033;&#10033;&#10033;</option>
				  <option value="5">&#10033;&#10033;&#10033;&#10033;&#10033;</option>
				</select>
				<h3>Comment</h3>
                <label><textarea type="text" name="comment" required style="height:200px"></textarea>
				<br>
				<?php
				$id=$_GET["id"];
				echo "<input type='hidden' name='id'";
				echo "value=";
				echo $id;
				echo ">"
				?>
                <input class="reviewButton" type="submit" name="submitReview" value="Submit!">
            </form>
    </div>

<script>
var session = '<?php echo $_SESSION["status"];?>';
console.log(session);
review = document.getElementById("review");
console.log(review);
if(session =="logged-in"){
	review.style.display = "block";
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
