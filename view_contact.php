<?php
// Include contact class
require_once 'Class/Contact.php';

// Check if the contact ID is provided in the URL
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
    <title>Contact Details</title>

    <link rel="stylesheet" href="css/view_contact.css">
</head>

<body>
    <header>
        <h1>Contact Management System</h1>
    </header>

    <div class="container">
        <?php if (isset($contact_details)) : ?>
            <h2>Contact Details</h2>
            <p><strong>Name:</strong> <?php echo $contact_details['name']; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $contact_details['phone']; ?></p>
            <p><strong>Email Address:</strong> <?php echo $contact_details['email']; ?></p>
            <?php if (!empty($contact_details['notes'])) : ?>
                <p><strong>Notes:</strong><br><?php echo $contact_details['notes']; ?></p>
            <?php endif ?>
        <?php else : ?>
            <p>Contact not found.</p>
        <?php endif ?>
        <a class="back-link" href="index.php">Back to Contact List</a><a class="back-link" href="edit_form.php?id=<?php echo $contact_details['id']; ?>">Edit Contact</a>
        <!-- link to delete.php by send the data id -->
        <a class="back-link" href="confirm_delete.php?id=<?php echo $contact_details['id']; ?>">Delete Contact</a>
    </div>
</body>

</html>