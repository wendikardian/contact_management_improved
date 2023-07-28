<?php
// Include contact class
require_once 'Class/Contact.php';

// get contact by id to form edit
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $contact_id = $_GET['id'];

    // Create a new Contact object
    $contact = new Contact();

    // Retrieve contact details from the database
    $contact_details = $contact->getContactById($contact_id);
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
        <form action="edit.php" method="post">
            <!-- create input type hidden for id -->
            <input type="hidden" name="id" value="<?php echo $contact_details['id']; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $contact_details['name']; ?>" required>

            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" name="phone" value="<?php echo $contact_details['phone']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" value="<?php echo $contact_details['email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="notes">Notes:</label>
                <textarea name="notes"><?php echo $contact_details['notes']; ?>
                </textarea>
            </div>

            <input type="submit" value="Edit Form">
        </form>
    </div>
</body>

</html>