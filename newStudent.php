<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$dbname = "cs370";

$bluegold_id = $_POST['bluegold_id'];
$name = $_POST['name'];
$personalInfo = "Student Info";
$newStudentValue = 0;
$tuition = 5000;

$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("insert into students(bluegold_id, name, address, phone, gpa, total_credit, balance) 
VALUES (?,?,?,?,?,?,?)");
		$stmt->bind_param("isssiii", $bluegold_id, $name,$personalInfo,$personalInfo,$newStudentValue,$newStudentValue, $tuition);
		$execval = $stmt->execute();
		echo $execval;
		echo " update successful...";
		header('Location: http://localhost/studentInfo/facultyPage.html');
$conn->close();
?>
