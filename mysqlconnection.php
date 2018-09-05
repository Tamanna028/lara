<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
/*
// Create database
// sql to create table
$sql = "CREATE TABLE test (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
/*



if ($conn->query($sql) === TRUE) {
    echo "Table test created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();*/
?>