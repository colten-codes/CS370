<?php
// Connect to the database
$servername = "localhost";
$username = "db_username";
$password = "db_password";
$dbname = "db_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Retrieve data from students table
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

//Check if there are any results
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "student_id: " . $row["student_id"]. " - bluegold_id: " . $row["bluegold_id"]. " - Name: " . $row["name"]. 
	" - Address: " . $row["address"]. " - Phone: " . $row["phone"]. " - GPA: " . $row["gpa"]. " - Total Credit: " . $row["total_credit"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
