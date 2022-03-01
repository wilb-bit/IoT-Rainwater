<?php
$read = $_GET['read'];
$username = $_GET['username'];

date_default_timezone_set("Australia/Melbourne"); 
$date = date('Y-m-d');
$time = date('H:i:s');
$time_date = date('Y-m-d H:i:s');

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

$sql = "SELECT water, timedate FROM water WHERE username='$username' AND timedate=(
    SELECT MAX(timedate) FROM water WHERE username='Sam');";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$prev = $row['water'];
$ptime = $row['timedate'];
$conn->close();
$wdrop = $prev-$read;
if ($prev > $read) //if previous is larger than current
{
    if($wdrop>=20) //if previous is larger than current by 20%
       {
        $dbname = "rtmfs";
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO error (username, starttime, endtime, wdrop)
VALUES ('$username', '$ptime', '$time_date','$wdrop')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
           
       }
}

$dbname = "rtmfs";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

date_default_timezone_set("Australia/Melbourne"); 
$date = date('Y-m-d');
$time = date('H:i:s');
$time_date = date('Y-m-d H:i:s');

$sql = "INSERT INTO water (username, time, date, timedate, water)
VALUES ('$username', '$time', '$date', '$time_date','$read')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>