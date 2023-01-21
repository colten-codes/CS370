<?php
$password = 'mypassword';
$options = [
    'cost' => 12,
];
$hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

// Connect to the database
$host = 'hostname';
$dbname = 'dbname';
$username = 'username';
$password = 'password';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Save the hashed password to the database
$stmt = $conn->prepare('INSERT INTO logins (username, password) VALUES (:username, :password)');
$stmt->execute(['username' => 'myusername', 'password' => $hashed_password]);

// Hash the username
$username = 'myusername';
$hashed_username = md5($username);

// Save the hashed username to the database
$stmt = $conn->prepare('UPDATE logins SET username = :username WHERE username = :original_username');
$stmt->execute(['username' => $hashed_username, 'original_username' => $username]);

?>
