<?php
require_once "./config/db.php";

class DbConnection
{
    private $db;
    private $config = DB_CONFIG;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->config['host']};dbname={$this->config['dbname']}";
            $this->db = new PDO($dsn, $this->config['username'], $this->config['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getDb()
    {
        return $this->db;
    }
}
