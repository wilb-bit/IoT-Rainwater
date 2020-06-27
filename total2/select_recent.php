<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "rtmfs";

// Connect to the database, run a query, handle errors
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT date, time, water, username, timedate FROM water WHERE username='Sam' AND timedate=(
    SELECT MAX(timedate) FROM water WHERE username='Sam');";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo htmlspecialchars($row['date'], ENT_HTML5, 'UTF-8');
echo nl2br("\r\n");
echo htmlspecialchars($row['time'], ENT_HTML5, 'UTF-8');
            echo nl2br("\r\n");
    echo htmlspecialchars($row['water'], ENT_HTML5, 'UTF-8');
                echo nl2br("\r\n");
    echo htmlspecialchars($row['username'], ENT_HTML5, 'UTF-8');
                echo nl2br("\r\n");
    echo htmlspecialchars($row['MAX(timedate)'], ENT_HTML5, 'UTF-8');
$conn->close();

?>