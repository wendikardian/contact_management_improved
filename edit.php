<?php
// Include contact class
require_once 'Class/Contact.php';

// Edit contact
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize user inputs
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $notes = $_POST['notes'];

    // Create a new Contact object
    $contact = new Contact();

    // Update the contact in the database
    $contact->editContact($id, $name, $phone, $email, $notes);

    // Redirect back to the contact list page
    header('Location: index.php');
    exit;
}
