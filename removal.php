<?php
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}
$bid = $_POST['bid'];
$updateSelection = $_POST['updateSelection'];

$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($updateSelection == 1){
    $log = $conn->prepare("Select * from faculty where bluegold_id = '$bid'");
    $log->execute();
    $log->store_result();
    $log->bind_result($bluegold_id,$fName,$addr,$email);
    $log->fetch();
    if($fName != null){
    $stmt = $conn->prepare("DELETE FROM faculty WHERE bluegold_id=$bid");
    $execval = $stmt->execute();
    $stmt = $conn->prepare("DELETE FROM logins WHERE bluegold_id=$bid");
    $execval = $stmt->execute();
    $stmt = $conn->prepare("DELETE FROM homework WHERE faculty_id=$bid");
    $execval = $stmt->execute();
    $stmt = $conn->prepare("DELETE FROM teaches WHERE faculty_id=$bid");
    $execval = $stmt->execute();
	echo $execval;
    header('Location: http://localhost/sInfo/admin.php');
	echo "removal successful...";
}
else{
    echo "There is no faculty with that ID";
}
}
if($updateSelection == 2){
    $log = $conn->prepare("Select * from students where bluegold_id = '$bid'");
    $log->execute();
    $log->store_result();
    $log->bind_result($id,$b_id,$name,$address,$phone,$gpa,$total_credit,$balance);
    $log->fetch();
    if($name != null){
    $stmt = $conn->prepare("DELETE FROM students WHERE bluegold_id=$bid");
    $execval = $stmt->execute();
    $stmt = $conn->prepare("DELETE FROM logins WHERE bluegold_id=$bid");
    $execval = $stmt->execute();
    $stmt = $conn->prepare("DELETE FROM teaches WHERE student_id=$bid");
    $execval = $stmt->execute();
	echo $execval;
    header('Location: http://localhost/sInfo/admin.php');
	echo "removal successful...";
}
else{
    echo "There is no student with that ID";
}
}
?>