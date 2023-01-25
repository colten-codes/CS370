<?php
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}
  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
  {
        $secret = '6LfTChAkAAAAAJxSxfk5VnU1-epZF4VAPFtsf9qS';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData==true)
        {
            echo "Your contact request have submitted successfully.";
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

 $options = [
     'cost' => 12,
 ];
// $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
// $hashed_username = md5($username);
// echo "Password: ";
// echo $hashed_password;
// echo "    Username: ";
// echo $hashed_username;

// $stmt = $conn->prepare("UPDATE logins SET username = '$hashed_username' WHERE username = '$username'");

// $stmt->execute();
// $stmt = $conn->prepare("UPDATE logins SET password = '$hashed_password' WHERE username = '$hashed_username'");
// $stmt->execute();

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
//$hashed_username = password_hash($username, PASSWORD_DEFAULT);
$hashed_password = md5($password);
$hashed_username = md5($username);


$result = $conn->prepare("Select * from logins where username = '$hashed_username'");
    $result->execute();
    $result->store_result();
    $result->bind_result($user,$pwd,$role,$b_id);
    $result->fetch();
    $hashed_b_id = md5($b_id);

if ($hashed_password == $pwd){
    if($role == "student"){      
            session_start();
            $_SESSION['bluegold_id'] = $b_id;
            header('Location: http://localhost/sInfo/studentPage.php');
        }
    }
    if($role == "faculty"){
        session_start();
        $_SESSION['bluegold_id'] = $b_id;
        header('Location: http://localhost/sInfo/facultyPage.php');
    }
    if($role == "admin"){
        session_start();
        $_SESSION['bluegold_id'] = $b_id;
        header('Location: http://localhost/sInfo/admin.php');
    }
    
else{
    if($hashed_password == $hashed_b_id){
        session_start();
        $_SESSION['bluegold_id'] = $b_id;
        header('Location: http://localhost/sInfo/userpwd.php');

    }
    
    else{
        // echo "<br>";
        // echo " #'ed Username: ";
        // echo $hashed_username;
        // echo "<br> real Username: ";
        // echo $user;
        // echo "  <br> #'ed Password: ";
        // echo $hashed_password;
        // echo "  <br> real Password: ";
        // echo $pwd;
        // echo "<br>";
        echo "Failed to login";}
}
$conn->close();
        }
        else if($responseData==false){
            echo "Robot verification failed, please try again.";
        }
        
   }
   else{
    echo "Please fill out robot verification.";
   }
?>