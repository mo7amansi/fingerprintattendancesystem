<?php
/* Database connection settings */
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fingerprintattendance";
    
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
?>