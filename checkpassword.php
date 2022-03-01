<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "rtmfs";
$username = $_POST["username"];
$password = $_POST["password"];
$hash = password_hash($password, PASSWORD_DEFAULT);

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT password FROM users
WHERE username='$username';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
//echo $row['password'];
$hash=$row['password'];

if (password_verify($password, $hash)) {
    echo "login successful";
    echo nl2br ("\n");
    echo $password;
    echo nl2br ("\n");
    echo $hash;
}
else
{
    echo "incorrect password";
}

?>
