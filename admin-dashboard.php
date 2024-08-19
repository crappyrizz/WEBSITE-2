<?php
include 'db_connection.php';


session_start();

if ($_SESSION['user_type'] != 'Administrator') {
    header("Location: index2.html");
    exit();
}

$result = $conn->query('SELECT u.username, u.email, ut.usertype_name FROM users u JOIN user_types ut ON u.usertype_ID = ut.usertype_ID');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>All Users</h2>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>User Type</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['usertype_name']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
