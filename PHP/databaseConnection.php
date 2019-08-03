<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$server = new mysqli($servername, $username, $password);

// Check connection
if ($server->connect_error) {
    die("Connection failed: " . $server->connect_error);
} 
echo "Connected successfully";
?>