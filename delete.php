<?php
require_once 'Class/Contact.php';
// delete process start by get the id by post method and remove from database
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize user inputs
    $id = $_POST['id'];

    // Create a new Contact object
    $contact = new Contact();

    // Delete the contact from the database
    $contact->deleteContact($id);

    // Redirect back to the contact list page
    header('Location: index.php');
    exit;
}
