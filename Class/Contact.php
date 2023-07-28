<?php
require_once "DbConnection.php";

class Contact
{
    private $db;
    private $dbName = "contacts";

    public function __construct()
    {
        $connection = new DbConnection();
        $this->db   = $connection->getDb();
    }

    public function getAllContacts()
    {
        $query = "SELECT * FROM {$this->dbName}";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContactById($id)
    {
        $query = "SELECT * FROM {$this->dbName} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addContact($name, $phone, $email, $notes)
    {
        $query = "INSERT INTO {$this->dbName} (name, phone, email, notes) VALUES (:name, :phone, :email, :notes)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':notes', $notes);
        $stmt->execute();
    }
    public function editContact($id, $name, $phone, $email, $notes)
    {
        $query = "UPDATE contacts SET name = :name, phone = :phone, email = :email, notes = :notes WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':notes', $notes);
        $stmt->execute();
    }

    public function deleteContact($id)
    {
        $query = "DELETE FROM contacts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
