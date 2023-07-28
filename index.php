<?php
session_start();

// Include contact class
require_once 'Class/Contact.php';
require_once 'Class/User.php';


// Check if the user is logged in
$user = new User();

if (!$user->isLoggedIn()) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Create a new Contact object
$contact = new Contact();

// Retrieve contacts from the database
$contacts = $contact->getAllContacts();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact Management System</title>
    <style>
        .btn-logout{
            background-color: #f44336;
            color: white;
            /* padding: 14px 20px; */
            margin: 8px 0;
            border: none;
            cursor: pointer;
            padding: 10px;
            margin-top: 50px;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Contact Management System</h1>
        <br>
        <div>
            <a href="?logout=true"
            class="btn-logout"
                onclick="return confirm('Are you sure you want to logout?');"
            >Logout</a>
        </div>
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

        <h2>Contact List</h2>
        <ul class="contact-list">
            <!-- Display each contact in the list -->
            <?php foreach ($contacts as $contact) : ?>
                <li><a href=<?php echo "view_contact.php?id={$contact['id']}" ?>><?php echo $contact['name'] ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</body>

</html>