<?php
session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
$bluegold_id = $_SESSION['bluegold_id'];

$conn = new mysqli('localhost','root','','cs370');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->prepare("Select * from students where bluegold_id = '$bluegold_id'");

$result->execute();
$result->store_result();
$result->bind_result($id,$b_id,$name,$address,$phone,$gpa,$total_credit,$balance);
$result->fetch();

$log = $conn->prepare("Select * from logins where bluegold_id = '$bluegold_id'");

$log->execute();
$log->store_result();
$log->bind_result($user,$pwd,$role,$blugold_id);
$log->fetch();

?>

<html lang="en">
<head>
<title>Convos Home Page</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="studentPage.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="header">
  <h1>Convos</h1>
  <p>Where the academically gifted stand out.</p>
  <p>Login successfull!!! Welcome <?php echo $name; ?></p>
</div>

<div class="navbar">
  <a href="homepage.html">Home</a>
  <a href="#">Classes</a>
  <a href="#">Help</a>
  <a class="right" href="userpwd.php">Change Username or Password</a>
  
</div>

<div class="content">
<div class="info">
        <p>Student Information:</p>
        <ul class = list>
          <li>Username: <?php echo $user; ?></li>
          <li>Blugold ID: <?php echo $bluegold_id; ?></li>
          <li>Address:  <?php echo $address; ?></li>
          <li>Phone #:  <?php echo $phone; ?></li>
          <li>GPA: <?php echo $gpa; ?></li>
          <li>Total Credits:  <?php echo $total_credit; ?></li>
          <li>Balance:  <?php echo $balance; ?></li>
        </ul>
        
    </div>
    <div class="update">
      <p>Update Personal Information:</p>
      <form action="personalUpdate.php" method="post">
        <span>
          <input class = "hide" id="bluegold_id" name="bluegold_id" value = "<?php echo $bluegold_id; ?>">
          Update <select id = "updateSelect" name = "updateSelect"> 
            <option disabled selected value = "0">-----</option>
            <option value = "1">Name</option>
            <option value = "2">Address</option>
            <option value = "3">Phone #</option>
        </select>
        <label for="updatedVal">To: </label>
          <input type="text" id="updatedVal" name="updatedVal">
          <br><br></span>
          <input type="submit" value="Change">
      </form>
  </div>
</div>

</body>
</html>