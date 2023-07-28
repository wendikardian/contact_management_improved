<?php
session_start();

require_once 'Class/User.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Create a new User object
    $user = new User();

    if ($user->register($username, $email, $password)) {
        // Registration successful, redirect to dashboard (or any other page)
        header("Location: index.php");
        exit();
    } else {
        // Registration failed, handle the error (e.g., display an error message)
        echo "Registration failed. Username or email already exists.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>

    <link rel="stylesheet" href="css/user.css">
</head>

<body>
    <div class="container">
        <h2>User Registration</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Register">
        </form>

        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>

</html>