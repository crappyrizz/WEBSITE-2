<?php
include 'db_connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipe_id = $_POST['recipe_id'];
    $recipe_name = $_POST['recipe_name'];
    $recipe_instructions = $_POST['recipe_instructions'];

    $stmt = $conn->prepare('UPDATE recipes SET recipe_name = ?, recipe_instructions = ? WHERE recipe_id = ?');
    $stmt->bind_param('ssi', $recipe_name, $recipe_instructions, $recipe_id);
    $stmt->execute();

    header("Location: user_dashboard.php");
    exit();
}
?>
