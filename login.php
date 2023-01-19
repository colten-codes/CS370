<?php

$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Retrieve data from the HTML form
$username = $_POST['username'];
$password = $_POST['password'];

//prevent mySQL injection
$username = stripcslashes($username);
$password = stripcslashes($password);

$result = $conn->prepare("Select * from logins where username = '$username'");

$result->execute();
$result->store_result();
$result->bind_result($col1,$col2,$col3);
$result->fetch();


if ($password == $col2){
    echo "Login Successfull!!! Welcome ".$username;
}else{
    echo "Failed to login";
}
$conn->close();
?>
