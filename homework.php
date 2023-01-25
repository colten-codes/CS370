<?php
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}
$fac_id = $_POST['fac_id'];
$chapter = $_POST['chapter'];
$description = $_POST['description'];

$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("insert into homework(faculty_id, chapter, descsript) 
VALUES (?,?,?)");
		$stmt->bind_param("iss", $fac_id, $chapter,$description);
		$execval = $stmt->execute();
        header('Location: http://localhost/sInfo/facultyPage.php');
        $conn->close();
?>