<?php
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}
$bluegold_id = $_POST['bluegold_id'];
$name = $_POST['name'];
$personalInfo = "Student Info";
$newStudentValue = 0;
$tuition = 5000;
$student = "student";
$role = $_POST['role'];

$options = [
	'cost' => 12,
];
//$hashed_password = password_hash($bluegold_id, PASSWORD_BCRYPT, $options);
$hashed_password = md5($bluegold_id);
$hashed_username = md5($name);

$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("insert into students(bluegold_id, fullName, addr, phone, gpa, total_credit, balance) 
VALUES (?,?,?,?,?,?,?)");
		$stmt->bind_param("isssiii", $bluegold_id, $name,$personalInfo,$personalInfo,$newStudentValue,$newStudentValue, $tuition);
		$execval = $stmt->execute();
		$stmt = $conn->prepare("insert into logins(username, password, role, bluegold_id) VALUES (?,?,?,?)");
		$stmt->bind_param("sssi", $hashed_username, $hashed_password, $student, $bluegold_id);
		$execval = $stmt->execute();
		echo $execval;
		echo " update successful...";
		if($role == 'faculty'){
			header('Location: http://localhost/sInfo/facultyPage.php');
		}
		if($role == 'admin'){
			header('Location: http://localhost/sInfo/admin.php');
		}
$conn->close();
?>
