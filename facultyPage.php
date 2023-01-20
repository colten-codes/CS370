<?php
$conn = new mysqli('localhost','root','','cs370');

$query = "SELECT fullName, bluegold_id, addr, phone, gpa, total_credit, balance from students";
$result = mysqli_query($conn, $query);
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
  <a href="homepage.html">Home</a>
  <a href="#">Classes</a>
  <a href="#">Help</a>
  
</div>

<div class="content">
    <div class="addStudent">
        <p>New Student:</p>
        <form action="newStudent.php" method="post">
            <label for="bluegold_id">Bluegold_id: </label>
            <input type="text" id="bluegold_id" name="bluegold_id">
            <br>
            &emsp;&emsp;&nbsp;&nbsp;<label for="name">Name: </label>
            <input type="name" id="name" name="name">
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="updateStudent">
      <p>Update Student Information:</p>
      <form action="FacultyUpdate.php" method="post">
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
  </div>
</div>

</body>
</html>
