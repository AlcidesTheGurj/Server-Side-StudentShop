<?php
require ('utilities.php');
if(isset($_GET['checkout']) && isset($_GET['order'][0])){

	$orders = $_GET['order'];
	$max =  sizeof($orders);
	$i = 0;
		while($i < $max){
			$order = $orders[$i];
			$sql = "SELECT * FROM tbl_products WHERE product_id = $order";
			
			$result = $conn->query($sql);
				if($result->num_rows > 0){
					
					$row = $result->fetch_assoc();
					foreach($result as $row){
						$product = $row["product_id"];
						$userId = $_SESSION["logged-user-id"];
					}
					$sql = "INSERT INTO tbl_orders (user_id,product_ids) VALUES ('$userId','$product')";
					if($conn->query($sql)===TRUE){
						echo "<p id ='status-msg' style='color:green;text-align:center;'>Order placed successfully</p>";
						echo "<br><br>";
						header("Location:cart.php?checkoutStatus=success");
					}
					else{
						echo "<p id ='status-msg' style='color:green;text-align:center;'>Order failed</p>";
						header("Location:cart.php");
					}
			$i++;
		}
		}
}
else
	header("Location:cart.php");