<?php
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}


session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
$bluegold_id = $_SESSION['bluegold_id'];

$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Retrieve data from the HTML form
$user = $_POST['user'];
$pwd = $_POST['pwd'];
$rpwd = $_POST['rpwd'];

$options = [
    'cost' => 12,
];
$hashed_password = md5($pwd);
$hashed_username = md5($user);


if($pwd != $rpwd){
    echo "Your passwords do not match!";
}
else{
    

    $result = $conn->prepare("Select * from logins where username = '$hashed_username'");
    $result->execute();
    $result->store_result();
    $result->bind_result($username,$password,$role,$b_id);
    $result->fetch();


    if($hashed_password == $password){
        echo "The new password is the same as the old one! Please make a new password";
    }
    else if($username != null){
        if($bluegold_id == $b_id){//if a user doesnt want a new username
            $stmt = $conn->prepare("UPDATE logins SET password='$hashed_password' WHERE bluegold_id=$bluegold_id");
            $execval = $stmt->execute();
	        echo $execval;
	        echo "name update successful...";
            header('Location: http://localhost/sInfo/login.php');
            $conn->close();
        }
        else{
            echo "This username is already taken!";
        }
    }
    else{
        $stmt = $conn->prepare("UPDATE logins SET password='$hashed_password' WHERE bluegold_id=$bluegold_id");
        $execval = $stmt->execute();
	    echo $execval;
	    echo "name update successful...";
        $stmt1 = $conn->prepare("UPDATE logins SET username='$hashed_username' WHERE bluegold_id=$bluegold_id");
        $execval1 = $stmt1->execute();
	    echo $execval1;
	    echo "name update successful...";
        header('Location: http://localhost/sInfo/login.php');
        $conn->close();
    }
}
$conn->close();
?>