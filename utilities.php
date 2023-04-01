<?php
//create connection
 	$conn = new mysqli("localhost","itchanturia", "Wuva2DDh", "itchanturia");

 	//check connection
 	if($conn->connect_error){
 		die("Connection failed: " . $conn->connect_error);

 	}
	//start the session
	session_start();

	
?>