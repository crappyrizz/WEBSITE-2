<?php
include 'db_connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $usertype_ID = $_POST['usertype_ID'];

      // Handle file upload for profile picture
      $profile_pic = $_FILES['profile_pic']['name'];
      $profile_pic_temp = $_FILES['profile_pic']['tmp_name'];
      $profile_pic_path = 'uploads/profile_pics/' . $profile_pic;
  
      // Move uploaded file to desired directory
      move_uploaded_file($profile_pic_temp, $profile_pic_path);

    $stmt = $conn->prepare('INSERT INTO users (username, email, user_password, usertype_ID, profile_pic) VALUES (?, ?, ?, ?, ?)');
    $stmt->bind_param('sssis', $username, $email, $password, $usertype_ID, $profile_pic_path);
    $stmt->execute();

    header("Location: index2.html");
    exit();
}

// Fetch user types for the dropdown
$user_types_result = $conn->query('SELECT usertype_ID, usertype_name FROM user_types');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="usertype_ID">User Type:</label>
        <select id="usertype_ID" name="usertype_ID" required>
            <?php while ($row = $user_types_result->fetch_assoc()): ?>
                <option value="<?php echo $row['usertype_ID']; ?>"><?php echo $row['usertype_name']; ?></option>
            <?php endwhile; ?>
        </select>
        <input type="submit" value="Register">
    </form>
</body>
</html>
