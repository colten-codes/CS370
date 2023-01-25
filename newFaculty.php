<?php
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}
$bluegold_id = $_POST['bluegold_id'];
$name = $_POST['name'];
$role = "faculty";
$info = "Faculty fills out";

// $options = [
// 	'cost' => 12,
// ];
//$hashed_password = password_hash($bluegold_id, PASSWORD_BCRYPT, $options);
$hashed_password = md5($bluegold_id);
$hashed_username = md5($name);

$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
		$stmt = $conn->prepare("insert into logins(username, password, role, bluegold_id) VALUES (?,?,?,?)");
		$stmt->bind_param("sssi", $hashed_username, $hashed_password, $role, $bluegold_id);
		$execval = $stmt->execute();
		$stmt = $conn->prepare("insert into faculty(bluegold_id, fName, addr, email) VALUES (?,?,?,?)");
		$stmt->bind_param("isss", $bluegold_id, $name, $info, $info);
		$execval = $stmt->execute();
		echo " update successful...";
		header('Location: http://localhost/sInfo/admin.php');
$conn->close();
?>
