<?php
include 'db_connection.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index2.html");
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Welcome, <?php echo $username; ?></h2>
    <!-- Add user-specific content here -->
</body>
</html>
