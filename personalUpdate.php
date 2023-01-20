<?php
$bluegold_id = $_POST["bluegold_id"];
$updateSelect = $_POST["updateSelect"];
$updatedVal = $_POST["updatedVal"];


$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($updateSelect == 1){
    $stmt = $conn->prepare("UPDATE students SET fullName='$updatedVal' WHERE bluegold_id=$bluegold_id");
    $execval = $stmt->execute();
	echo $execval;
	echo "name update successful...";
    header('Location: http://localhost/sInfo/studentPage.php');
    $conn->close();
}
if($updateSelect == 2){
    $stmt = $conn->prepare("UPDATE students SET addr='$updatedVal' WHERE bluegold_id=$bluegold_id");
    $execval = $stmt->execute();
	echo $execval;
	echo "address update successful...";
    header('Location: http://localhost/sInfo/studentPage.php');
    $conn->close();
}
if($updateSelect == 3){
    $stmt = $conn->prepare("UPDATE students SET phone='$updatedVal' WHERE bluegold_id=$bluegold_id");
    $execval = $stmt->execute();
	echo $execval;
	echo "phone update successful...";
    header('Location: http://localhost/sInfo/studentPage.php');
    $conn->close();
    
}
else{
    header('Location: http://localhost/sInfo/studentPage.php');
}

?>