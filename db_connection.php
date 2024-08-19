<?php
$servername = "127.0.0.1"; // Update with your server name
$username = "root"; // Update with your MySQL username
$password = "DOMinica@2194"; // Update with your MySQL password
$dbname = "recipe_website"; // Update with your database name
$port = 3306; // Update with your MySQL port

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
