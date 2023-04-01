<?php
	require ('utilities.php');
	if(isset($_POST["submitReview"]) && isset($_POST["title"]) ){
		$title = $_POST["title"];
		$rating = $_POST["rating"];
		$comment = $_POST["comment"];
		$userId = $_SESSION["logged-user-id"];
		$id = $_POST["id"];
	$sql = "INSERT INTO tbl_reviews (user_id,product_id,review_title,review_desc,review_rating) VALUES ('$userId','$id','$title','$comment','$rating')";
	
	if($conn->query($sql)===TRUE){
		echo "<p id ='status-msg' style='color:green;text-align:center;'>Review submitted successfully!</p>";
	}
	else
		echo "<p id ='status-msg' style='color:red;text-align:center;'>Review submission failed</p>";
	}
	header("Location:item.php?id=".$id);

