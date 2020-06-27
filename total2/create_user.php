<?php
$DBservername = "localhost";
$DBusername = "root";
$DBpassword = "";
$dbname = "rtmfs";
$username = $_POST["username"];
$password = $_POST["password"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$hash = password_hash($password, PASSWORD_DEFAULT);

// Create connection
$conn = new mysqli($DBservername, $DBusername, $DBpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
date_default_timezone_set("Australia/Melbourne"); 
$time_date = date('Y-m-d H:i:s');


$sql = "INSERT INTO users (username, password, firstname, lastname, email)
VALUES ('$username', '$hash', '$firstname', '$lastname', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("location: login.php");
exit;
?>
