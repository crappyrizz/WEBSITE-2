<?php
include 'db_connection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $recipe_name = $_POST['recipe_name'];
    $recipe_instructions = $_POST['recipe_instructions'];
    $recipe_image = 'uploads/' . basename($_FILES['recipe_image']['name']);
    
    move_uploaded_file($_FILES['recipe_image']['tmp_name'], $recipe_image);

    $stmt = $conn->prepare('INSERT INTO recipes (username, recipe_name, recipe_instructions, recipe_image) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssss', $username, $recipe_name, $recipe_instructions, $recipe_image);
    $stmt->execute();

    header("Location: user_dashboard.php");
    exit();
}
?>
