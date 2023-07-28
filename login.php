<?php
session_start();

require_once 'Class/User.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usernameOrEmail = $_POST["username"];
    $password = $_POST["password"];

    // Create a new User object
    $user = new User();

    if ($user->login($usernameOrEmail, $password)) {
        // Login successful, redirect to dashboard (or any other page)
        header("Location: index.php");
        exit();
    } else {
        // Login failed, handle the error (e.g., display an error message)
        echo "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>

    <link rel="stylesheet" href="css/user.css">
</head>

<body>
    <div class="container">
        <h2>User Login</h2>
        <form action="" method="post">
            <label for="username">Username or Email:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Login">
        </form>

        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>
</body>

</html>