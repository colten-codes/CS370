<?php
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}
$bluegold_id = $_POST['bluegold_id'];
$updateSelection = $_POST['updateSelection'];
$newValue = $_POST['newValue'];
$role = $_POST['role'];

$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($updateSelection == 1){
    $stmt = $conn->prepare("UPDATE students SET gpa=$newValue WHERE bluegold_id=$bluegold_id");
    $execval = $stmt->execute();
	echo $execval;
	echo "GPA update successful...";
    if($role == "faculty"){
        header('Location: http://localhost/sInfo/facultyPage.php');
        $conn->close();
    }
    if($role == "admin"){
        header('Location: http://localhost/sInfo/admin.php');
        $conn->close();
    }

}
if($updateSelection == 2){
    $stmt = $conn->prepare("UPDATE students SET total_credit=$newValue WHERE bluegold_id=$bluegold_id");
    $execval = $stmt->execute();
	echo $execval;
	echo "Credit update successful...";
    if($role == "faculty"){
        header('Location: http://localhost/sInfo/facultyPage.php');
        $conn->close();
    }
    if($role == "admin"){
        header('Location: http://localhost/sInfo/admin.php');
        $conn->close();
    }
}
if($updateSelection == 3){
    $stmt = $conn->prepare("UPDATE students SET balance=$newValue WHERE bluegold_id=$bluegold_id");
    $execval = $stmt->execute();
	echo $execval;
	echo "Balance update successful...";
    if($role == "faculty"){
        header('Location: http://localhost/sInfo/facultyPage.php');
        $conn->close();
    }
    if($role == "admin"){
        header('Location: http://localhost/sInfo/admin.php');
        $conn->close();
    }    
}

?>