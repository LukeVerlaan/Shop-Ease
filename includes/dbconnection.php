<?php

$servername = "localhost";
$username = "ictlab_kennislab";
$password = "kennislab@2017!";
$db_name = "ictlab_kennislab";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

?>