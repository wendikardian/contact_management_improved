<?php
// Include contact class
require_once 'Class/Contact.php';
require_once 'Class/User.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize user inputs
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $notes = $_POST['notes'];

    // Create a new Contact object
    $contact = new Contact();

    // Add the new contact to the database
    $contact->addContact($name, $phone, $email, $notes);

    // Redirect back to the contact list page
    header('Location: index.php');
    exit;
}




// Check if the user is logged in
$user = new User();

if (!$user->isLoggedIn()) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Contact Management System</h1>
    </header>

    <div class="container">
        <h2>Add New Contact</h2>
        <form action="add_contact.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" name="phone" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="notes">Notes:</label>
                <textarea name="notes"></textarea>
            </div>

            <input type="submit" value="Add Contact">
        </form>
    </div>
</body>
</html>
