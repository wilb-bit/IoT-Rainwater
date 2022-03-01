<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rtmfs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    // sql to drop table if it exists
    $sql = 'DROP TABLE IF EXISTS water;';
    
if ($conn->query($sql) === TRUE) {
    echo "Table water dropped successfully" . "<br>" ;
} else {
    echo "Error dropping table: " . $conn->error;
}

// sql to create table
    $sql = 'CREATE TABLE water (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    date DATE,
    time TIME,
    timedate DATETIME,
    water INT NOT NULL
);';

if ($conn->query($sql) === TRUE) {
    echo "Table water created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

