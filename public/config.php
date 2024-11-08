<?php
// Database connection configuration
$servername = "localhost";
$username = "root";  // Default MySQL username (change if necessary)
$password = "";      // MySQL password (change if necessary)
$dbname = "parking_management_system";  // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
