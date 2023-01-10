<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	$captcha = $_POST['captcha'];

	// Database connection, table title will need to change
	$conn = new mysqli('localhost','root','','database');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		//feel free to change all connections
		$stmt = $conn->prepare("insert into login(username, password, captcha) values(?, ?, ?)");
		$stmt->bind_param("sss", $username, $password, $captcha);
		$execval = $stmt->execute();
		echo $execval;
		echo "Join successful...";
		header('Location: http://localhost/loginPage.html');
		$stmt->close();
		$conn->close();
	}
?>
