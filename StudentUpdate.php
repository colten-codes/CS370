<?php
$bluegold_id = $_POST['bluegold_id'];
$updateSelection = $_POST['updateSelection'];
$newValue = $_POST['newValue'];

$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($updateSelection == 1){
    $stmt = $conn->prepare("UPDATE students SET gpa=$newValue WHERE bluegold_id=$bluegold_id");
    $execval = $stmt->execute();
	echo $execval;
	echo "GPA update successful...";
    header('Location: http://localhost/studentInfo/facultyPage.html');
    $conn->close();
}
if($updateSelection == 2){
    $stmt = $conn->prepare("UPDATE students SET total_credit=$newValue WHERE bluegold_id=$bluegold_id");
    $execval = $stmt->execute();
	echo $execval;
	echo "Credit update successful...";
    header('Location: http://localhost/studentInfo/facultyPage.html');
    $conn->close();
}
if($updateSelection == 3){
    $stmt = $conn->prepare("UPDATE students SET balance=$newValue WHERE bluegold_id=$bluegold_id");
    $execval = $stmt->execute();
	echo $execval;
	echo "Balance update successful...";
    header('Location: http://localhost/studentInfo/facultyPage.html');
    $conn->close();
    
}

?>