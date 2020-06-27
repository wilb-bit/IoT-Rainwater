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
    $sql = 'DROP TABLE IF EXISTS users;';
    
if ($conn->query($sql) === TRUE) {
    echo "Table users dropped successfully" . "<br>" ;
} else {
    echo "Error dropping table: " . $conn->error;
}

// sql to create table
    $sql = 'CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(255) NOT NULL UNIQUE    
);';

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

