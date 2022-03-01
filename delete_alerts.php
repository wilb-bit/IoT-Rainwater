<?php
session_start();

$username = $_SESSION["username"];
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "rtmfs";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM error WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("location: home.php");
exit;
?>