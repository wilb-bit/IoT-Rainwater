
<?php
date_default_timezone_set("Australia/Melbourne");

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "rtmfs";

for($x = 1; $x<=30; $x++){
    $x_padded = sprintf("%02d", $x);
    $date = "2018-09-$x_padded";
    for ($y = 0; $y<=23; $y++)
    {
        $y_padded = sprintf("%02d", $y);
        $time = "$y_padded:00:00";
        $time_date = $date. ' '.$time;
        echo $time_date;
        echo nl2br("\r\n");
        // Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$rand = rand(0,100); 

$sql = "INSERT INTO water (username, time, date, timedate, water)
VALUES ('Jerry', '$time', '$date', '$time_date','$rand')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    }
}
$date = date('Y-m-d');
$time = date('H:i:s');
$time_date = date('Y-m-d H:i:s');
echo $time_date;

/*echo $date;
echo $time;
    //echo 
    echo nl2br("\r\n");
*/
?>

