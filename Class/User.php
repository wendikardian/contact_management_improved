<?php
require_once "DbConnection.php";

class User
{
    private $db;
    private $dbName = "users";

    public function __construct()
    {
        $connection = new DbConnection();
        $this->db   = $connection->getDb();
    }

    public function register($username, $email, $password)
    {
        // Check if the username or email already exists
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->dbName} WHERE username = :username OR email = :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            return false; // Username or email already exists
        }

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $stmt = $this->db->prepare("INSERT INTO {$this->dbName} (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        return $stmt->execute();
    }

    public function login($usernameOrEmail, $password)
    {
        // Find the user by username or email
        $stmt = $this->db->prepare("SELECT * FROM {$this->dbName} WHERE username = :username OR email = :email");
        $stmt->bindParam(':username', $usernameOrEmail);
        $stmt->bindParam(':email', $usernameOrEmail);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            // Login successful, store user data in session
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];

            return true;
        } else {
            return false; // Invalid login credentials
        }
    }

    public function isLoggedIn()
    {
        // Check if the user is logged in using session
        return isset($_SESSION["user_id"]);
    }
}
