<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

  $myusername = trim($_POST["username"]);
  $mypassword = trim($_POST["password"]);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO books (Name, Author)
VALUES ('".$myusername."', '".$mypassword."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
    
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>