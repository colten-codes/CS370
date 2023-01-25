<?php
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}
$student_id = $_POST['student_id'];
$faculty_id = $_POST['fac_id'];

$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("Select * from students where bluegold_id = '$student_id'");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($i, $id, $n, $a, $p, $g, $t, $b);
$stmt->fetch();

if($id != null){
    $result = $conn->prepare("insert into teaches(student_id, faculty_id) VALUES (?,?)");
    $result->bind_param("ii", $student_id, $faculty_id);
    $execval = $result->execute();
    header('Location: http://localhost/sInfo/facultyPage.php');
    $conn->close();
}


