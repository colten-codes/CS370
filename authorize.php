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
$result->bind_result($user,$pwd,$role,$bluegold_id);
$result->fetch();


if ($password == $pwd){
    if($role == "student"){
        if($password == $bluegold_id){//If someone is a new student they need to update their password is it isnt their blugold_id
            session_start();
            $_SESSION['bluegold_id'] = $bluegold_id;
            header('Location: http://localhost/sInfo/userpwd.php');

        }
        else{        
            session_start();
            $_SESSION['bluegold_id'] = $bluegold_id;
            header('Location: http://localhost/sInfo/studentPage.php');
        }
    }
    if($role == "faculty"){
        session_start();
        $_SESSION['bluegold_id'] = $bluegold_id;
        header('Location: http://localhost/sInfo/facultyPage.php');
    }
    
}else{
    echo "Failed to login";
}
$conn->close();
?>