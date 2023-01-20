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
$student = "student";

$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("insert into students(bluegold_id, fullName, addr, phone, gpa, total_credit, balance) 
VALUES (?,?,?,?,?,?,?)");
		$stmt->bind_param("isssiii", $bluegold_id, $name,$personalInfo,$personalInfo,$newStudentValue,$newStudentValue, $tuition);
		$execval = $stmt->execute();
		$stmt = $conn->prepare("insert into logins(username, password, role, bluegold_id) VALUES (?,?,?,?)");
		$stmt->bind_param("sssi", $name, $bluegold_id, $student, $bluegold_id);
		$execval = $stmt->execute();
		echo $execval;
		echo " update successful...";
		header('Location: http://localhost/sInfo/facultyPage.php');
$conn->close();
?>
