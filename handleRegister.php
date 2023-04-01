 <?php
 	require ('utilities.php');
	if(isset($_POST["username"])){
		$firstname = $_POST["username"];
		$pass = $_POST["password"];
		$encrypted_pass = password_hash($pass,PASSWORD_DEFAULT);
		$add = $_POST["address"];
		$email = $_POST["email"];
	
 	$sql = "INSERT INTO tbl_users (user_full_name,user_pass,user_address,user_email) VALUES ('$firstname','$encrypted_pass','$add','$email')";

 	if($conn->query($sql)===TRUE){
 		echo "<p id ='status-msg' style='color:green;text-align:center;'>You have registered successfully</p>";
		echo "<br><br>";
		header("Location:register.php?register=success");
 	}
	 else {
			echo "Registration failed";
			header("Location:register.php");
	 }
	}
