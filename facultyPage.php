<?php
if ($_SERVER['HTTPS'] != "on") {
  $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  header("Location: $url");
  exit;
}
session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
$bluegold_id = $_SESSION['bluegold_id'];

$conn = new mysqli('localhost','root','','cs370');

$log = $conn->prepare("Select * from logins where bluegold_id = '$bluegold_id'");
$log->execute();
$log->store_result();
$log->bind_result($user,$pwd,$role,$blugold_id);
$log->fetch();

$log = $conn->prepare("Select * from faculty where bluegold_id = '$bluegold_id'");
$log->execute();
$log->store_result();
$log->bind_result($bid,$fName,$addr,$email);
$log->fetch();

if($fName == null){
  header('Location: http://localhost/sInfo/login.php');
}


$query = "SELECT fullName, bluegold_id, addr, phone, gpa, total_credit, balance from students where bluegold_id IN 
(SELECT student_id FROM teaches WHERE faculty_id = $bluegold_id)";
$result = mysqli_query($conn, $query);

$connHW = "SELECT * from homework where faculty_id = $bluegold_id ";
$hw = mysqli_query($conn, $connHW);
?>

<html lang="en">
<head>
<title>Convos Home Page</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="facultyPage.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="header">
  <h1>Convos</h1>
  <p>Where the academically gifted stand out.</p>
</div>

<div class="navbar">
  <a href="login.php">Log Out</a>
  <span class="welcome">Login successfull!!! Welcome <?php echo $fName; ?></span>
  <a class="right" href="userpwd.php">Change Username or Password</a>
  
</div>

<div class="content">
    <div class="addStudent">
        <p>New Student:</p>
        <form action="newStudent.php" method="post">
          <input class = "hide" id="role" name="role" value = "<?php echo $role; ?>">
            <label for="bluegold_id">Bluegold_id: </label>
            <input type="text" id="bluegold_id" name="bluegold_id">
            <br>
            &emsp;&emsp;&nbsp;&nbsp;<label for="name">Name: </label>
            <input type="name" id="name" name="name">
            <br><br>
            <input type="submit" value="Submit">
        </form>

        <p>Add Student:</p>
        <form action="addStudent.php" method="post">
          <input class = "hide" id="fac_id" name="fac_id" value = "<?php echo $bluegold_id; ?>">
            <label for="student_id">Bluegold_id: </label>
            <input type="text" id="student_id" name="student_id"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <div class="updateStudent">
      <p>Update Student Information:</p>
      <form action="FacultyUpdate.php" method="post">
      <input class = "hide" id="role" name="role" value = "<?php echo $role; ?>">
          <label for="bluegold_id">Bluegold_id: </label>
          <input type="text" id="bluegold_id" name="bluegold_id">
          <br>
          <p>What Would  you like to change:</p>
          <p> <select id = "updateSelection" name = "updateSelection"> 
            <option disabled selected value = "0">-----</option>
            <option value = "1">GPA</option>
            <option value = "2">Total Credits</option>
            <option value = "3">Balance</option>
        </select></p>
        <label for="newValue">New Value: </label>
          <input type="text" id="newValue" name="newValue">
          <br><br>
          <input type="submit" value="Submit">
      </form>
  </div>
  <div class="homework">
      <p>Assign Homework</p>
      <form action="homework.php" method="post">
        <input class = "hide" id="fac_id" name="fac_id" value = "<?php echo $bid; ?>">
          <label for="chapter">Chapter: </label>
          <input type="text" id="chapter" name="chapter">
          <label for="description">Description: </label>
          <input type="text" id="description" name="description">
          <br><br>
          <input type="submit" value="Submit">
      </form>
  </div>
  <div class = "information">
  <table border ="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>Name</th>
    <th>Blugold ID</th>
    <th>Address</th>
    <th>Phone Number</th>
    <th>GPA</th>
    <th>Total Credits</th>
    <th>Balance</th>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>

   <td><?php echo $data['fullName']; ?> </td>
   <td><?php echo $data["bluegold_id"]; ?> </td>
   <td><?php echo $data["addr"]; ?> </td>
   <td><?php echo $data['phone']; ?> </td>
   <td><?php echo $data['gpa']; ?> </td>
   <td><?php echo $data['total_credit']; ?> </td>
   <td><?php echo $data['balance']; ?> </td>
 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>
  </table>
  <br>
  <table border ="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>Chapter</th>
    <th>Description</th>
  </tr>
<?php
if (mysqli_num_rows($hw) > 0) {
  $sn=1;
  while($homew = mysqli_fetch_assoc($hw)) {
 ?>
 <tr>

   <td><?php echo $homew['chapter']; ?> </td>
   <td><?php echo $homew["descsript"]; ?> </td>
 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>
  </table>
  </div>


</div>

</body>
</html>